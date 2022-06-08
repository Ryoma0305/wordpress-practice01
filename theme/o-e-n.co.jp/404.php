<?php
	// ページ固有の情報を入力 ////////////////////////
	$gVars['title'] = '404のタイトル';
	$gVars['description'] = '404のディスクリプション';
	$gVars['id'] = "notfound";
	$gVars['class'] = "notfound";
	$gVars['url'] = "/notFound/";
	// ページ固有の情報を入力 end ////////////////////////
?>
<?php require_once __DIR__ . "/_cmsAssets/parts/head.php"; ?>
<?php require_once __DIR__ . "/_cmsAssets/parts/header.php"; ?>
<!-- contents start -->
<canvas class="c-bg js-bg-canvas"></canvas>
<div class="pg-notFound">
	<div class="pg-notFound__body">
		<h1 class="pg-notFound__title">ページが見つかりませんでした</h1>
		<div class="pg-notFound__btn">
			<a class="c-btn c-btn--small js-lineHover js-arrowHover" href="/">
				<div class="c-btn__text">Back to Top</div>
				<div class="c-btn__arrow js-arrow"><i></i></div>
				<div class="c-btn__line js-line"></div>
			</a>
		</div>
	</div>
</div>
<!--/ contents end -->
<?php require_once __DIR__ . "/_cmsAssets/parts/footer.php"; ?>
