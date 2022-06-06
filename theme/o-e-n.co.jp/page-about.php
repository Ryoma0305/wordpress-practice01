<?php
	// ページ固有の情報を入力 ////////////////////////
	$gVars['title'] = '会社概要｜株式会社OEN';
	$gVars['id'] = "about";
	$gVars['class'] = "about";
	$gVars['url'] = $gVars['origin'] . "/about/";
	// ページ固有の情報を入力 end ////////////////////////

	// youtube ID
	$modal_youtube_id = "0-vefgf6pBc";

	/// Our Business
	$about_1 = get_field("about_1");

	/// Company Profile
	$about_2 = get_field("about_2");

?>
<?php require_once __DIR__ . "/_cmsAssets/parts/head.php"; ?>
<?php require_once __DIR__ . "/_cmsAssets/parts/header.php"; ?>
<!-- contents start -->
<canvas class="c-bg js-bg-canvas"></canvas>
<div class="pg-about">
	<!-- inner -->
	<div class="pg-about__inner">
		<!-- kv -->

		<!-- 動画の場合 -->
		<div class="pg-about__kv" id="js-loop-movie">
			<video class="pg-about__kvVideo" playsinline muted loop poster="<?php echo $gVars["loop_movie_poster"]; ?>" src="<?php echo $gVars["loop_movie"]; ?>"></video>
		</div>
		<!--/ 動画の場合 -->
		<!-- 画像の場合 -->
		<!--
			<div class="pg-about__kv">
				<img class="pg-about__kvImage" src="/wp-content/themes/o-e-n.co.jp/_assets/images/about/kv.png" alt="">
			</div>
		 -->
		<!--/ 画像の場合 -->

		<div class="pg-about__layer js-kv-layer js-cursor-play"></div>
		<!--/ kv -->
		<!-- lead -->
		<div class="pg-about__lead">
			<h1 class="pg-about__leadTitle">
				Enthuse the <br class="u-spbr">world <br class="u-pcbr">
				with Japanese <br>entertainment
			</h1>
			<p class="pg-about__leadSubTitle">
				世界中に熱狂を届ける
			</p>
			<p class="pg-about__leadText">
			アイドル、アニメ、格闘技をはじめあらゆるエンターテインメントの産業は、<br class="u-pcbr">コアなファンによる熱狂があって成立しています。<br>
			<br>それは日本だけではなく世界中で同じ。<br><br>私たちは新しい力とインターネットで、エンターテインメントが生み出す熱狂を世界中に届けていきます。<br class="u-pcbr">エンターテインメント産業の新たな機会創出を応援します。
			</p>
		</div>
		<!--/ lead -->
		<!-- business -->
		<section class="pg-about__business">
			<h2 class="c-title">
				<b></b>
				<span>Our Business</span>
			</h2>
			<div class="pg-about__businessBody">
				<div class="pg-about__businessChart">
					<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/about/organization_chart.jpg" alt="組織図">
				</div>
				<?php if($about_1): ?>
					<?php foreach($about_1 as $child): ?>
						<dl>
							<dt><?php echo nbr($child["title"]); ?></dt>
							<dd><?php echo nbr($child["text"]); ?></dd>
						</dl>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</section>
		<!--/ business -->
		<!-- company -->
		<section class="pg-about__company">
			<div class="pg-about__companyHead">
				<h2 class="c-title c-title--vertical">
					<b></b>
					<span>Company Profile</span>
				</h2>
			</div>
			<div class="pg-about__companyBody">
				<?php if($about_2): ?>
					<?php foreach($about_2 as $child): ?>
						<dl>
							<dt><?php echo nbr($child["title"]); ?></dt>
							<dd><?php echo nbr($child["text"]); ?></dd>
						</dl>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</section>
		<!--/ company -->
	</div>
	<!--/ inner -->
	<!-- contact -->
	<section class="pg-about__contact">
		<!-- loop -->
		<div class="c-loopText pg-about__loop js-loopText">
			<img class="pg-about__loopText c-loopText__img" src="/wp-content/themes/o-e-n.co.jp/_assets/images/about/loop.svg" alt="">
		</div>
		<!--/ loop -->
		<div class="pg-about__contactHead">
			<h2 class="c-title-center">
				<b></b>
				<span>Contact</span>
			</h2>
		</div>
		<div class="pg-about__contactBody">
			<ul class="pg-about__contactBtns">
				<li>
					<a class="c-btn c-btn--large js-lineHover js-arrowHover" href="<?php echo $gVars["contact_recruit"]; ?>" ref="noopener" target="_blank">
						<div class="c-btn__text">採用についてのお問い合わせ</div>
						<div class="c-btn__arrow js-arrow"><i></i></div>
						<div class="c-btn__line js-line"></div>
					</a>
				</li>
				<li>
					<a class="c-btn c-btn--large js-lineHover js-arrowHover" href="<?php echo $gVars["contact"]; ?>" ref="noopener" target="_blank">
						<div class="c-btn__text">その他のお問い合わせ</div>
						<div class="c-btn__arrow js-arrow"><i></i></div>
						<div class="c-btn__line js-line"></div>
					</a>
				</li>
			</ul>
		</div>

	</section>
	<!--/ contact -->
</div>
<!-- movieModal -->
<div class="p-movieModal js-movieModal">
	<div class="p-movieModal__inner">
		<div class="p-movieModal__inner2">
			<div id="js-modal-player" data-movie="<?php echo $modal_youtube_id; ?>"></div>
		</div>
		<div class="p-movieModal__movie" id="js-modal-player" data-movie="<?php echo $modal_youtube_id; ?>"></div>
		<button class="p-movieModal__close js-modal-close">
			<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/common/close.svg" alt="">
		</button>
	</div>
</div>
<!--/ movieModal -->
<!--/ contents end -->
<?php require_once __DIR__ . "/_cmsAssets/parts/footer.php"; ?>
