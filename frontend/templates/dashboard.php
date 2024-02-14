<?php if($this->settings->getModuleStatus("product_sticky_bar")){ ?>
    <?php include WCEAZY_PATH . "frontend/templates/views/product_sticky_bar/view.php"; ?>
<?php } ?>
<?php if($this->settings->getModuleStatus("one_click_checkout")){ ?>
    <?php include WCEAZY_PATH . "frontend/templates/views/one_click_checkout/view.php"; ?>
<?php } ?>
<?php if($this->settings->getModuleStatus("floating_cart")){ ?>
    <?php include WCEAZY_PATH . "frontend/templates/views/floating_cart/view.php"; ?>
<?php } ?>
<?php if($this->settings->getModuleStatus("shipping_bar")){ ?>
    <?php include WCEAZY_PATH . "frontend/templates/views/shipping_bar/view.php"; ?>
<?php } ?>
