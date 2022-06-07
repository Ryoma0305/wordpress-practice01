<?php
//////////////////////////////////////////////
// カスタム投稿の設定
//////////////////////////////////////////////

function setRegisterPostType()
{

  register_post_type(
      'releases',
      [
      'labels' => [
        'name' => __('Release'),
        'singular_name' => __('releases'),
      ],
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'works/releases', 'with_front' => false),
      'supports' => ['title'],
      ]
  );

	register_post_type(
      'case-studies',
      [
      'labels' => [
        'name' => __('Case Study 作成'),
        'singular_name' => __('case-studies'),
      ],
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'works/case-studies', 'with_front' => false),
      'supports' => ['title'],
      ]
  );

	register_post_type(
		'careers',
		[
		'labels' => [
			'name' => __('Interview'),
			'singular_name' => __('careers'),
		],
		'public' => true,
		'has_archive' => true,
		'supports' => ['title'],
		]
	);

	register_post_type(
		'jobs',
		[
		'labels' => [
			'name' => __('Job Opening(募集職種)'),
			'singular_name' => __('jobs'),
		],
		'public' => true,
		'has_archive' => false,
		'supports' => ['title'],
		]
	);

}

add_action('init', 'setRegisterPostType');

function setRegisterTaxonomy()
{
    register_taxonomy(
        'releases_category',
        ['releases'],
        [
        'label' => 'Release カテゴリー',
        'hierarchical' => true,
        'show_ui' => true,
        ]
    );

    register_taxonomy(
			'case-studies_category',
			['case-studies'],
			[
			'label' => 'Case Study カテゴリー',
			'hierarchical' => true,
			'show_ui' => true,
			]
	);

	register_taxonomy(
		'careers_category',
		['careers'],
		[
		'label' => 'Interview カテゴリー',
		'hierarchical' => true,
		'show_ui' => true,
		]
	);

}

add_action('init', 'setRegisterTaxonomy');

//////////////////////////////////////////////
// カスタム投稿の個別ページのURL設定
//////////////////////////////////////////////

function set_post_type_link( $link, $post ){
  if ( $post->post_type === 'careers' ) {
			return home_url( '/careers/' . $post->ID  . '/');
	} elseif ( $post->post_type === 'case-studies' ) {
			return home_url( '/works/case-studies/' . $post->ID . '/');
	} elseif ( $post->post_type === 'releases' ) {
			return home_url( '/works/releases/' . $post->ID . '/');
	} else {
			return $link;
  }
}
add_filter( 'post_type_link', 'set_post_type_link', 1, 2 );

function set_rewrite_rules_array( $rules ) {
  $new_rewrite_rules = array(
    'careers/([0-9]+)/?$' => 'index.php?post_type=careers&p=$matches[1]',
    'works/case-studies/([0-9]+)/?$' => 'index.php?post_type=case-studies&p=$matches[1]',
    'works/releases/([0-9]+)/?$' => 'index.php?post_type=releases&p=$matches[1]',
	);
  return $new_rewrite_rules + $rules;
}
add_filter( 'rewrite_rules_array', 'set_rewrite_rules_array' );
