<?php

// sitemap
add_filter(
	'wp_sitemaps_post_types',
	function( $post_types ) {
		unset( $post_types['jobs'] );
		unset( $post_types['qa'] );
		unset( $post_types['shop'] );
    return $post_types;
	}
);
add_filter(
	'wp_sitemaps_taxonomies',
	function( $taxonomies ) {
		unset( $taxonomies['careers_category'] );
		unset( $taxonomies['releases_category'] );
		unset( $taxonomies['case-studies_category'] );
    return $taxonomies;
	}
);
//wp-sitemapユーザー名を隠す
add_filter(
  'wp_sitemaps_add_provider',
  function( $provider, $name ) {
      if ( 'users' === $name ) {
          return false;
      }
      return $provider;
  },
  10,2
);
