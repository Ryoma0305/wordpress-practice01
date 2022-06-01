<?php

// author ページを非表示

add_filter('author_rewrite_rules', '__return_empty_array');
function disable_author_archive() {
	if( isset($_GET['author']) || preg_match('#/author/.+#', $_SERVER['REQUEST_URI'])){
		wp_redirect( home_url('/404.php') );
		exit;
	}
}
add_action('init', 'disable_author_archive');

// プロジェクトのグローバル変数
locate_template('_cmsAssets/functionsModules/globalVars.php', true);


// カスタム投稿 & タクソノミーを設定
locate_template('_cmsAssets/functionsModules/postTypes.php', true);

// 管理画面のカスタマイズ
locate_template('_cmsAssets/functionsModules/admin.php', true);

// ダッシュボードのカスタマイズ
locate_template('_cmsAssets/functionsModules/dashboard.php', true);

// 便利関数の登録
locate_template('_cmsAssets/functionsModules/utils.php', true);

// それぞれのブログの記事データを取得する関数群
locate_template('_cmsAssets/functionsModules/postFunctions.php', true);

// wp-sitemap の設定
locate_template('_cmsAssets/functionsModules/sitemap.php', true);

// バージョンの管理
locate_template('_cmsAssets/functionsModules/version.php', true);
