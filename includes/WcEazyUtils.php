<?php

// If this file is called directly, exit.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'WcEazyUtils' ) ) {
    class WcEazyUtils
    {

        public $base_admin;
        public function __construct($base_admin)
        {
            $this->base_admin = $base_admin;
        }

    }
}