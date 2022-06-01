<?php
//////////////////////////////////////////////
//  キャッシュクリア用の変数を管理
//////////////////////////////////////////////
	global $gVars;
	$asset_file = include get_theme_file_path('/_build/index.asset.php');
	$gVars["version"] = $asset_file['version'];
