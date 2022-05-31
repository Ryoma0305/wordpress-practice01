<?php
//////////////////////////////////////////////
//  管理画面設定
//////////////////////////////////////////////

/**
 * WYSIWYGエディターを編集
 */

add_filter( 'acf/fields/wysiwyg/toolbars' , 'article_toolbars'  );
function article_toolbars( $toolbars )
{
	$toolbars['article_toolbars'] = array();
	$toolbars['article_toolbars'][1] = array('bold', 'italic', 'blockquote', 'strikethrough', 'link', 'unlink', 'aligncenter','alignleft','alignright');
	return $toolbars;
}

/**
 * acf-options-page を有効化
 */

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(
      [
      'page_title' => 'Case Study 選択', // ページタイトル
      'menu_title' => 'Case Study 選択', // メニュータイトル
      'menu_slug' => 'case-studies-select', // メニュースラッグ
      'capability' => 'edit_posts',
      'redirect' => false,
      'position' => '32.1'
      ]
  );
}

/**
 * サイドメニューをカスタマイズ
 */

function remove_menus()
{
    global $menu;
    //    unset($menu[2]);  // ダッシュボード
    //    unset($menu[4]);  // メニューの線1
    unset($menu[5]);  // 投稿
    //    unset($menu[10]); // メディア
    //    unset($menu[15]); // リンク
    //    unset($menu[20]); // ページ
    unset($menu[25]); // コメント
    //    unset($menu[59]); // メニューの線2
    //    unset($menu[60]); // テーマ
    //    unset($menu[65]); // プラグイン
    //    unset($menu[70]); // プロフィール
    //    unset($menu[75]); // ツール
    //    unset($menu[80]); // 設定
    //    unset($menu[90]); // メニューの線3
}
add_action('admin_menu', 'remove_menus');

/**
 * 管理画面用のjsとcssを読み込み
 */

add_action('admin_enqueue_scripts', 'load_admin_js_css');

function load_admin_js_css()
{
	// postType 別
	$postType = get_post_type();
    wp_enqueue_style('admin_style', get_template_directory_uri() . '/_cmsAssets/styles/admin.css');
	wp_enqueue_style('post_'. $postType .'_style', get_template_directory_uri() . '/_cmsAssets/styles/postType/' . $postType . '.css');
	wp_enqueue_script('category', get_template_directory_uri() . '/_cmsAssets/scripts/limitCategorySelect.js', array('jquery'), '', true);

}

