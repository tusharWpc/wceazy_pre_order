<?php

// If this file is called directly, exit.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('WcEazySettings')) {
    class WcEazySettings
    {

        public $base_admin;

        public function __construct($base_admin)
        {
            $this->base_admin = $base_admin;

            $defaultOption = array();
            if (!get_option("wceazy_modules")) {
                update_option('wceazy_modules', $defaultOption);
            }
        }

        public function updateModuleStatus($module_slug, $module_status)
        {
            $dataNewResults = array();
            $dataResults = get_option("wceazy_modules");

            $is_exits = false;
            foreach ($dataResults as $singleData) {
                if (isset($singleData['module_slug'])) {
                    if ($singleData['module_slug'] == $module_slug) {
                        $is_exits = true;
                        $singleData['module_status'] = (int) $module_status;
                    }
                }
                $dataNewResults[] = $singleData;
            }
            if (!$is_exits) {
                $dataNewResults[] = array(
                    "module_slug" => $module_slug,
                    "module_status" => (int) $module_status,
                );
            }
            update_option('wceazy_modules', $dataNewResults);
        }

        public function getModuleStatus($module_slug)
        {
            $dataResults = get_option("wceazy_modules");
            foreach ($dataResults as $singleData) {
                if (isset($singleData['module_slug'])) {
                    if ($singleData['module_slug'] == $module_slug) {
                        return (int) $singleData['module_status'];
                    }
                }
            }
            return 0;
        }

    }

}
