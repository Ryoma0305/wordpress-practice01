<?php
  $metaTitle = sanitizeMetaText($gVars['title']);
  $metaDescription = sanitizeMetaText($gVars['description']):
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/wp-content/themes/o-e-n.co.jp/_assets/images/common/favicon.ico">
  <link rel="apple-touch-icon-precomposed" href="/wp-content/themes/o-e-n.co.jp/_assets/images/common/apple-touch-icon.png">
  <link rel="sitemap" type="application/xml" title="Sitemap" href="/wp-sitemap.xml">
  <title><?php echo $metaTitle; ?></title>
  <meta name="description" content="<?php echo $metaDescription; ?>"/>
  <meta property="fb:app_id" content="522776621188656"/>
  <!-- og -->
  <meta property="og:locale" content="ja_JP"/>
    <meta property="og:type" content="<?php echo $gVars['ogtype']; ?>" />
    <meta property="og:title" content="<?php echo $metaTitle; ?>" />
    <meta property="og:description" content="<?php echo $metaDescription; ?>" />
    <meta property="og:image" content="<?php echo $gVars['ogp']; ?>">
    <meta property="og:url" content="<?php echo $gVars['url']; ?>" />
    <meta property="og:site_name" content="<?php echo $gVars['site_name']; ?>" />
  <!-- twitter card -->
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:url" content="<?php echo $gVars['url']; ?>" />
	<meta name="twitter:site" content="<?php echo $gVars['site_name']; ?>" />
  <!-- webfont -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://cdn.jsdelivr.net">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/yakuhanjp@3.4.1/dist/css/yakuhanjp.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">
	<!--/ webfont -->
  <!-- css -->
	<link href="/wp-content/themes/o-e-n.co.jp/_build/index.css?version=<?php echo $gVars["version"]; ?>" rel="stylesheet">
	<!--/ css -->
	<!-- js -->
	<script src="/wp-content/themes/o-e-n.co.jp/_assets/vendor/jquery-3.6.0.min.js" ></script>
	<script defer src="/wp-content/themes/o-e-n.co.jp/_build/index.js?version=<?php echo $gVars["version"]; ?>" ></script>
	<!--/ js -->
  <?php wp_head(); ?>
</head>
<body class="<?php echo $gVars["class"]; ?>" id="<?php echo $gVars["id"]; ?>">
