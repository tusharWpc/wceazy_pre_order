<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

// Start session if not already started
if (!isset ($_SESSION)) {
	session_start();
}

// Get frequently bought settings from options
$wceazy_frequently_bought_settings = get_option('wceazy_frequently_bought_settings', false);
$wceazy_po_settings = $wceazy_frequently_bought_settings ? json_decode($wceazy_frequently_bought_settings, true) : array();

// Retrieve frequently bought settings
$wceazy_po_frequently_bought_avl_date_label = isset ($wceazy_po_settings["frequently_bought_avl_date_label"]) ? $wceazy_po_settings["frequently_bought_avl_date_label"] : "Default Avl Data";
 

// Define WcEazyFrequentlyBoughtUtils class
if (!class_exists('WcEazyFrequentlyBoughtUtils')) {
	class WcEazyFrequentlyBoughtUtils
	{
		// Properties declaration
		public $base_admin;
		public $module_admin;
		public $wceazy_po_frequently_bought_btn_text;
		public $wceazy_po_enable_frequently_bought;
		public $wceazy_po_frequently_bought_avl_date_label;
		public $wceazy_po_frequently_bought_enable_avl_date_label;

		// Constructor to initialize class properties
		public function __construct($base_admin, $module_admin)
		{
			$this->base_admin = $base_admin;
			$this->module_admin = $module_admin;

			// Get frequently bought settings
			$wceazy_frequently_bought_settings = get_option('wceazy_frequently_bought_settings', false);
			$this->wceazy_po_settings = $wceazy_frequently_bought_settings ? json_decode($wceazy_frequently_bought_settings, true) : array();
		}



		public function wcz_get_prop($object, $key, $single = true, $context = 'view')
		{
			$prop_map = wcz_return_new_attribute_map();
			$is_wc_data = $object instanceof WC_Data;
	
			if ($is_wc_data) {
				$key = (array_key_exists($key, $prop_map)) ? $prop_map[$key] : $key;
				$getter = false;
				if (method_exists($object, "get{$key}")) {
					$getter = "get{$key}";
				} elseif (method_exists($object, "get_{$key}")) {
					$getter = "get_{$key}";
				}
	
				if ($getter) {
					return $object->$getter($context);
				} else {
					return $object->get_meta($key, $single);
				}
			} else {
				$key = (in_array($key, $prop_map, true)) ? array_search($key, $prop_map, true) : $key;
	
				if (isset ($object->$key)) {
					return $object->$key;
				} elseif (wcz_wc_check_post_columns($key)) {
					return $object->post->$key;
				} else {
					$object_id = 0;
					$getter = $object instanceof WC_Customer ? 'get_user_meta' : 'get_post_meta';
	
					if (!!$object) {
						$object_id = is_callable(array($object, 'get_id')) ? $object->get_id() : $object->id;
					}
	
					return !!$object_id ? $getter($object_id, $key, true) : null;
				}
			}
		}






		// Add tab for Frequently Bought Together
		public function add_bought_together_tab($tabs)
		{
			$tabs['wceazy-wfbt'] = array(
				'label' => _x('Frequently Bought Together X', 'tab in product data box', 'wceazy-woocommerce-frequently-bought-together'),
				'target' => 'wceazy_wfbt_data_option',
				'class' => array('hide_if_grouped', 'hide_if_external', 'hide_if_bundle'),
			);

			return $tabs;
		}

		// Add panel for Frequently Bought Together in product edit page
		public function add_bought_together_panel()
		{
			global $post, $product_object;

			$product_id = $post->ID;
			if (is_null($product_object)) {
				$product_object = wc_get_product($product_id);
			}
			$to_exclude = array($product_id);

			?>

			<div id="wcz_wfbt_data_option" class="panel woocommerce_options_panel">
				<div class="options_group">
					<p class="form-field">
						<label for="wcz_wfbt_ids">
							<?php esc_html_e('Select products', 'wcz-woocommerce-frequently-bought-together'); ?>
						</label>
						<?php
						$product_ids = wcz_get_prop($product_object, wcz_WFBT_META, true);
						$product_ids = array_filter(array_map('absint', (array) $product_ids));
						$json_ids = array();

						foreach ($product_ids as $product_id) {
							$product = wc_get_product($product_id);
							if (is_object($product)) {
								$json_ids[$product_id] = wp_kses_post(html_entity_decode($product->get_formatted_name()));
							}
						}

						wcz_add_select2_fields(
							array(
								'class' => 'wc-product-search',
								'style' => 'width: 50%;',
								'id' => 'wcz_wfbt_ids',
								'name' => 'wcz_wfbt_ids',
								'data-placeholder' => __('Search for a product&hellip;', 'wcz-woocommerce-frequently-bought-together'),
								'data-multiple' => true,
								'data-action' => 'wcz_ajax_search_product',
								'data-selected' => $json_ids,
								'value' => implode(',', array_keys($json_ids)),
								'custom-attributes' => array(
									'data-exclude' => implode(',', $to_exclude),
								),
							)
						);
						?>

						<img class="help_tip"
							data-tip='<?php esc_html_e('Select products for "Frequently bought together" group', 'wcz-woocommerce-frequently-bought-together'); ?>'
							src="<?php echo esc_url(WC()->plugin_url()); ?>/assets/images/help.png" height="16" width="16" />
					</p>
				</div>
			</div>
			<?php
		}

		// Ajax action to search for products
		public function wceazy_ajax_search_product()
		{
			ob_start();

			check_ajax_referer('search-products', 'security');
			// @codingStandardsIgnoreStart

			$term = isset ($_GET['term']) ? (string) wc_clean(stripslashes($_GET['term'])) : '';
			$post_types = array('product', 'product_variation');

			$to_exclude = isset ($_GET['exclude']) ? explode(',', wc_clean(stripslashes($_GET['exclude']))) : false;
			// @codingStandardsIgnoreEnd
			if (empty ($term)) {
				die();
			}

			$args = array(
				'post_type' => $post_types,
				'post_status' => 'publish',
				'posts_per_page' => -1,
				's' => $term,
				'fields' => 'ids',
			);

			if ($to_exclude) {
				$args['post__not_in'] = $to_exclude;
			}

			if (is_numeric($term)) {
				$args2 = array(
					'post_type' => $post_types,
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'post__in' => array(0, $term),
					'fields' => 'ids',
				);

				$args3 = array(
					'post_type' => $post_types,
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'post_parent' => $term,
					'fields' => 'ids',
				);

				$args4 = array(
					'post_type' => $post_types,
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'meta_query' => array( //phpcs:ignore slow query ok.
						array(
							'key' => '_sku',
							'value' => $term,
							'compare' => 'LIKE',
						),
					),
					'fields' => 'ids',
				);

				$posts = array_unique(array_merge(get_posts($args), get_posts($args2), get_posts($args3), get_posts($args4)));
			} else {
				$args2 = array(
					'post_type' => $post_types,
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'meta_query' => array( //phpcs:ignore slow query ok.
						array(
							'key' => '_sku',
							'value' => $term,
							'compare' => 'LIKE',
						),
					),
					'fields' => 'ids',
				);

				$posts = array_unique(array_merge(get_posts($args), get_posts($args2)));
			}

			$found_products = array();

			if ($posts) {
				foreach ($posts as $post) {
					$current_id = $post;
					$product = wc_get_product($post);
					// exclude variable product.
					if (!$product || $product->is_type(array('variable', 'external'))) {
						continue;
					} elseif ($product->is_type('variation')) {
						$current_id = wp_get_post_parent_id($post);
						if (!wc_get_product($current_id)) {
							continue;
						}
					}

					$found_products[$post] = rawurldecode($product->get_formatted_name());
				}
			}

			wp_send_json(apply_filters('wceazy_wfbt_ajax_search_product_result', $found_products));
		}

		// Register plugin settings
		public function register_settings()
		{
			// settings
			register_setting('woosb_settings', 'woosb_settings');
			// localization
			register_setting('woosb_localization', 'woosb_localization');
		}

		// Add admin menu
		public function admin_menu()
		{
			add_submenu_page('wpclever', esc_html__('WPC Product Bundles', 'woo-product-bundle'), esc_html__('Product Bundles', 'woo-product-bundle'), 'manage_options', 'wpclever-woosb', [
				$this,
				'admin_menu_content'
			]);
		}

		// Function to save settings data
		public function saveSettings($post_data)
		{
			if (!empty ($post_data)) {
				update_option('wceazy_frequently_bought_settings', json_encode($post_data));
			}
		}

		// Product type selector
		public function product_type_selector($types)
		{
			$types['woosb'] = esc_html__('Smart bundleX', 'woo-product-bundle');

			return $types;
		}
	}
}
