<?php
/*
Plugin Name:  BEST-PRODUCT-SORTER
Plugin URI:   https://www.bestproduct.com 
Description:  This is a plugin which serches the 5 best products of woocommerce
Version:      1.0
Author:       TEMBAN BLAISE AYIM 
Author URI:   https://www.bestproduct.com
License:      ---
License URI:  ---
Text Domain:  ---
Domain Path:  ---
*/

add_action('admin_menu', 'bestproduct_options_page');

function bestproduct_options_page() {
  add_menu_page('BEST-PRODUCT', 'BEST-PRODUCT-Menu', 'manage_options', 'bestproduct', 'bestproduct');
}

function bestproduct ()	{
	include_once('View/best_product_View.php');
}