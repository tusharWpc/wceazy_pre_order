<?php
/**
 * Plugin Name:       wcEazy
 * Plugin URI:        https://wceazy.com
 * Description:       wcEazy provides multiple WooCommerce extensions in a single package you'll ever require.
 * Version:           1.1.7
 * Author:            wcEazy
 * Author URI:        https://wceazy.com
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wceazy
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('WCEAZY_VERSION', '1.1.6');
defined('WCEAZY_PATH') or define('WCEAZY_PATH', plugin_dir_path(__FILE__));
defined('WCEAZY_URL') or define('WCEAZY_URL', plugin_dir_url(__FILE__));
defined('WCEAZY_BASE_FILE') or define('WCEAZY_BASE_FILE', __FILE__);
defined('WCEAZY_BASE_PATH') or define('WCEAZY_BASE_PATH', plugin_basename(__FILE__));
defined('WCEAZY_IMG_DIR') or define('WCEAZY_IMG_DIR', plugin_dir_url(__FILE__) . 'assets/img/');
defined('WCEAZY_CSS_DIR') or define('WCEAZY_CSS_DIR', plugin_dir_url(__FILE__) . 'assets/css/');
defined('WCEAZY_JS_DIR') or define('WCEAZY_JS_DIR', plugin_dir_url(__FILE__) . 'assets/js/');
defined('WCEAZY_HELP_PAGE') or define('WCEAZY_HELP_PAGE', "https://wceazy.com/contact");
defined('WCEAZY_DOCS_PAGE') or define('WCEAZY_DOCS_PAGE', "https://wceazy.com/documentation");
defined('WCEAZY_GET_PRO_URL') or define('WCEAZY_GET_PRO_URL', "https://wceazy.com");



/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_wceazy() {

    if ( ! class_exists( 'Appsero\Client' ) ) {
      require_once __DIR__ . '/appsero/src/Client.php';
    }

    $client = new Appsero\Client( '1024e01f-0ff0-4232-ae7c-31add4414c7b', 'wcEazy I Supercharge your WooCommerce Store', __FILE__ );

    // Active insights
    $client->insights()->init();

}

appsero_init_tracker_wceazy();



function wceazy_check_premium_activation()
{
    if (!in_array('wceazy-pro/wceazy.php', apply_filters('active_plugins', get_option('active_plugins')))) {

        require_once WCEAZY_PATH . 'includes/WcEazyUtils.php';
        require_once WCEAZY_PATH . 'includes/WcEazySettings.php';

        require_once WCEAZY_PATH . 'backend/class-wceazy-ajax.php';
        require_once WCEAZY_PATH . 'backend/class-wceazy-admin.php';

        require_once WCEAZY_PATH . 'frontend/class-wceazy-ajax.php';
        require_once WCEAZY_PATH . 'frontend/class-wceazy-client.php';

    }
}
add_action('wceazy_pro_check_init', 'wceazy_check_premium_activation', 10, 2);
do_action('wceazy_pro_check_init');

function wceazy_load_textdomain()
{
    error_log('Loading text domain...');
    load_plugin_textdomain('wceazy', false, dirname(plugin_basename(__FILE__)) . '/languages/'); 
}
add_action('plugins_loaded', 'wceazy_load_textdomain');