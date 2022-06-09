<?php
	// ページ固有の情報を入力 ////////////////////////
	$gVars['title'] = 'sampleのタイトル';
	$gVars['id'] = "sample";
	$gVars['class'] = "sample";
	$gVars['url'] = $gVars['origin'] . "/sample/";
	// ページ固有の情報を入力 end ////////////////////////
?>
<?php require_once __DIR__ . "/_cmsAssets/parts/head.php"; ?>
<?php require_once __DIR__ . "/_cmsAssets/parts/header.php"; ?>
<!-- contents start -->
<canvas class="c-bg js-bg-canvas"></canvas>
<div class="pg-sample">


	<!-- @ -->
	<div class="pg-sample__section">
		<h1 class="pg-sample__title">ループテキスト</h1>
		<div class="pg-sample__box">
			<canvas class="pg-sample__contactBG js-contact-bg-canvas"></canvas>
			<div class="c-loopText js-sample-loopText">
				<img class="pg-sample__loopText c-loopText__img" src="/wp-content/themes/o-e-n.co.jp/_assets/images/about/loop.svg" alt="">
			</div>
		</div>
	</div>
	<!--/ @ -->



	<!-- @ -->
	<div class="pg-sample__section">
		<h1 class="pg-sample__title">タイトル　通常</h1>

		<h2 class="c-title">
			<b></b>
			<span>Contact</span>
		</h2>
	</div>
	<!--/ @ -->

	<!-- @ -->
	<div class="pg-sample__section">
		<h1 class="pg-sample__title">タイトル　センター</h1>

		<h2 class="c-title-center">
			<b></b>
			<span>Contact</span>
		</h2>
	</div>
	<!--/ @ -->

	<!-- @ -->
	<div class="pg-sample__section">
		<h1 class="pg-sample__title">ボタン大</h1>
		<a class="c-btn c-btn--large js-lineHover js-arrowHover" href="#" ref="noopener" target="_blank">
			<div class="c-btn__text">その他のお問い合わせ</div>
			<div class="c-btn__arrow js-arrow"><i></i></div>
			<div class="c-btn__line js-line"></div>
		</a>
	</div>
	<!--/ @ -->
	<!-- @ -->
	<div class="pg-sample__section">
	<h1 class="pg-sample__title">ボタン小</h1>
		<a class="c-btn c-btn--small js-lineHover js-arrowHover" href="#" ref="noopener" target="_blank">
			<div class="c-btn__text">その他のお問い合わせ</div>
			<div class="c-btn__arrow js-arrow"><i></i></div>
			<div class="c-btn__line js-line"></div>
		</a>
	</div>
	<!--/ @ -->
	<!-- @ -->
	<div class="pg-sample__section">
	<h1 class="pg-sample__title">カード　ノーマル</h1>
		<div class="pg-sample__card">
			<!--  -->
			<a href="#" class="c-card c-card--normal js-arrowHover">
				<div class="c-card__photo">
					<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/_dummy/careers/0.jpg" alt="">
				</div>
				<div class="c-card__detail">
					<div class="c-card__title">Shotaro Yamanaka</div>
					<div class="c-card__position">Producer</div>
					<div class="c-card__category">ABEMA PPV ONLINE LIVE</div>
				</div>
				<div class="c-card__arrow js-arrow"><i></i></div>
			</a>
			<!--  -->
		</div>
	</div>
	<!--/ @ -->
	<!-- @ -->
	<div class="pg-sample__section">
	<h1 class="pg-sample__title">カード　スマフォ→2カラム</h1>
		<div class="pg-sample__card2">
			<!--  -->
			<a href="#" class="c-card c-card--col js-arrowHover">
				<div class="c-card__photo">
					<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/_dummy/careers/0.jpg" alt="">
				</div>
				<div class="c-card__detail">
					<div class="c-card__title">Shotaro Yamanaka</div>
					<div class="c-card__position">Producer</div>
					<div class="c-card__category">ABEMA PPV ONLINE LIVE</div>
				</div>
				<div class="c-card__arrow js-arrow"><i></i></div>
			</a>
			<!--  -->
			<a href="#" class="c-card c-card--col js-arrowHover">
				<div class="c-card__photo">
					<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/_dummy/careers/1.jpg" alt="">
				</div>
				<div class="c-card__detail">
					<div class="c-card__title">Shotaro Yamanaka</div>
					<div class="c-card__position">Producer</div>
					<div class="c-card__category">ABEMA PPV ONLINE LIVE</div>
				</div>
				<div class="c-card__arrow js-arrow"><i></i></div>
			</a>
			<!--  -->
		</div>
	</div>
	<!--/ @ -->
	<!-- @ -->
	<div class="pg-sample__section pg-sample__section--cursor">
	<h1 class="pg-sample__title">カスタムカーソル</h1>
	<a href="#" class="pg-sample__cursorLink js-cursor-contact">.js-cursor-contact</a>
	<a href="#" class="pg-sample__cursorLink js-cursor-play">.js-cursor-play</a>
	<a href="#" class="pg-sample__cursorLink js-cursor-detail">.js-cursor-detail</a>
	</div>
	<!--/ @ -->
</div>

<h1 class="pg-sample__title">interview スライダー</h1>
		<div class="c-slider js-interview-slider">
			<div class="c-slider__listContainer">
				<ul class="c-slider__list">
					<!-- listItem -->
					<li class="c-slider__listItem">
						<a href="#" class="c-card c-card--normal js-cursor-detail js-arrowHover">
							<div class="c-card__photo">
								<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/_dummy/careers/0.jpg" alt="">
							</div>
							<div class="c-card__detail">
								<div class="c-card__title">Shotaro Yamanaka</div>
								<div class="c-card__position">Producer</div>
								<div class="c-card__category">ABEMA PPV ONLINE LIVE</div>
							</div>
							<div class="c-card__arrow js-arrow"><i></i></div>
						</a>
					</li>
					<!-- listItem -->
					<li class="c-slider__listItem">
						<a href="#" class="c-card c-card--normal js-cursor-detail js-arrowHover">
							<div class="c-card__photo">
								<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/_dummy/careers/1.jpg" alt="">
							</div>
							<div class="c-card__detail">
								<div class="c-card__title">Shotaro Yamanaka</div>
								<div class="c-card__position">Producer</div>
								<div class="c-card__category">ABEMA PPV ONLINE LIVE</div>
							</div>
							<div class="c-card__arrow js-arrow"><i></i></div>
						</a>
					</li>
					<!-- listItem -->
					<li class="c-slider__listItem">
						<a href="#" class="c-card c-card--normal js-cursor-detail js-arrowHover">
							<div class="c-card__photo">
								<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/_dummy/careers/2.jpg" alt="">
							</div>
							<div class="c-card__detail">
								<div class="c-card__title">Shotaro Yamanaka</div>
								<div class="c-card__position">Producer</div>
								<div class="c-card__category">ABEMA PPV ONLINE LIVE</div>
							</div>
							<div class="c-card__arrow js-arrow"><i></i></div>
						</a>
					</li>
					<!-- listItem -->
					<li class="c-slider__listItem">
						<a href="#" class="c-card c-card--normal js-cursor-detail js-arrowHover">
							<div class="c-card__photo">
								<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/_dummy/careers/3.jpg" alt="">
							</div>
							<div class="c-card__detail">
								<div class="c-card__title">Shotaro Yamanaka</div>
								<div class="c-card__position">Producer</div>
								<div class="c-card__category">ABEMA PPV ONLINE LIVE</div>
							</div>
							<div class="c-card__arrow js-arrow"><i></i></div>
						</a>
					</li>
					<!-- listItem -->
					<li class="c-slider__listItem">
						<a href="#" class="c-card c-card--normal js-cursor-detail js-arrowHover">
							<div class="c-card__photo">
								<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/_dummy/careers/4.jpg" alt="">
							</div>
							<div class="c-card__detail">
								<div class="c-card__title">Shotaro Yamanaka</div>
								<div class="c-card__position">Producer</div>
								<div class="c-card__category">ABEMA PPV ONLINE LIVE</div>
							</div>
							<div class="c-card__arrow js-arrow"><i></i></div>
						</a>
					</li>
					<!-- listItem -->
					<li class="c-slider__listItem">
						<a href="#" class="c-card c-card--normal js-cursor-detail js-arrowHover">
							<div class="c-card__photo">
								<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/_dummy/careers/5.jpg" alt="">
							</div>
							<div class="c-card__detail">
								<div class="c-card__title">Shotaro Yamanaka</div>
								<div class="c-card__position">Producer</div>
								<div class="c-card__category">ABEMA PPV ONLINE LIVE</div>
							</div>
							<div class="c-card__arrow js-arrow"><i></i></div>
						</a>
					</li>
				</ul>
				<a href="#" class="c-slider__ui c-slider__ui--prev js-cursor-prev"></a>
				<a href="#" class="c-slider__ui c-slider__ui--next js-cursor-next"></a>
			</div>
			<div class="c-slider__scrollbar">
				<div class="c-slider__scrollbarThumb js-cursor"></div>
			</div>
		</div>

<!--/ contents end -->
<?php require_once __DIR__ . "/_cmsAssets/parts/footer.php"; ?>
