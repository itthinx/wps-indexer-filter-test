<?php
/**
 * Plugin Name: WPS Indexer Filter Test
 * Plugin URI: https://www.itthinx.com
 * Description: Test plugin for the woocommerce_product_search_indexer_filter_content filter.
 * Version: 1.0.0
 * Author: itthinx
 * Author URI: https://www.itthinx.com
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class WPS_Indexer_Filter_Test {

	public static function boot() {
		add_filter( 'woocommerce_product_search_indexer_filter_content', array( __CLASS__, 'woocommerce_product_search_indexer_filter_content' ), 10, 3 );
	}

	public static function woocommerce_product_search_indexer_filter_content( $content, $context, $post_id ) {
		if ( $context === 'post_content' ) {
			$product = wc_get_product( $post_id );
			$test_meta = $product->get_meta( 'test_meta' );
			if ( !empty( $test_meta ) ) {
				$content .= ' ' . $test_meta;
			}
		}
		return $content;
	}
}
WPS_Indexer_Filter_Test::boot();
