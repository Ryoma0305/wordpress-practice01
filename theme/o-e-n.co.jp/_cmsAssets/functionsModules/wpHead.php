<?php
/* head内の不要な要素を削除
https://labo.kon-ruri.co.jp/remove-tags-in-wp_head/
---------------------------------------------------------- */
remove_action( 'wp_head', 'feed_links', 2 ); //RSSフィード
remove_action( 'wp_head', 'feed_links_extra', 3 ); //RSSフィード
remove_action( 'wp_head', 'rsd_link' ); //Really Simple Discovery
remove_action( 'wp_head', 'wlwmanifest_link' ); //Windows Live Writer
remove_action( 'wp_head', 'index_rel_link' ); //indexへのリンク
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); //分割ページへのリンク
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); //分割ページへのリンク
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); //前後のページへのリンク
remove_action( 'wp_head', 'wp_generator' ); //WordPressのバージョン
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); //絵文字対応
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); //絵文字対応
remove_action( 'wp_print_styles', 'print_emoji_styles' ); //絵文字対応
remove_action( 'admin_print_styles', 'print_emoji_styles' ); //絵文字対応
remove_action( 'wp_head','rest_output_link_wp_head' ); //Embed対応
remove_action( 'wp_head', 'wp_shortlink_wp_head' ) ; //
remove_action( 'wp_head','wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'rel_canonical' );

function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );


// global-styles-inline-css
function remove_my_global_styles() {
	wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'remove_my_global_styles' );


// wp-block-library-css
function dequeue_plugins_style() {
	//プラグインIDを指定し解除する
	wp_dequeue_style('wp-block-library');
}
add_action( 'wp_enqueue_scripts', 'dequeue_plugins_style', 9999);


// dns_prefetch
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );
function remove_dns_prefetch( $hints, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		return array_diff( wp_dependencies_unique_hosts(), $hints );
	}
	return $hints;
}

/**
 * 全てのユーザーの管理バーを非表示にする
 */

add_filter( 'show_admin_bar', '__return_false' );
