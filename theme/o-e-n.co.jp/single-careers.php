<?php
	// ページ固有の情報を入力 ////////////////////////
  $link = get_permalink();
	$gVars['title'] = get_the_title($post->ID) . "｜株式会社OEN";
	$gVars['description'] = get_field("description", $post->ID) ?: $gVars['description'];
	$gVars['id'] = "careers-detail";
	$gVars['class'] = "careers";
	$gVars['url'] = $link;
	$gVars['ogp'] = getImageFromPostId("ogimage",$post->ID) ?: $gVars['ogp'];
	// ページ固有の情報を入力 end ////////////////////////

	// Current Post
	$current = getCareersSinglePost($post);

	// index page link
	$index_page_link = "/careers/";

	// prev page link
  $prev_post = get_previous_post();
	$prev_post_link = $prev_post ? get_permalink( $prev_post->ID ) : "";
	// next page link
	$next_post = get_next_post();
	$next_post_link = $next_post ? get_permalink( $next_post->ID ) : "";

	// Related Post
  $careersPosts = get_posts([
    'posts_per_page' => -1,
    'post_type' => "careers",
		'post__not_in'=> array($post->ID),
  ]);
	$careersPostsArray = array_map("getCareersListPost", $careersPosts);

?>
<?php require_once __DIR__ . "/_cmsAssets/parts/head.php"; ?>
<?php require_once __DIR__ . "/_cmsAssets/parts/header.php"; ?>
<!-- contents start -->
<div class="pg-careers-detail">
	<article class="pg-careers-detail__article">
		<!-- kv -->
		<div class="pg-careers-detail__kv js-careers-detail-kv">
			<div class="pg-careers-detail__kvPhoto">
				<div class="pg-careers-detail__kvPhotoInner js-kv-photo-flip-wrap">
					<img class="js-kv-photo-flip" src="<?php echo esc_url($current["thumb"]); ?>" alt="">
				</div>
			</div>
			<div class="pg-careers-detail__kvInfo">
				<div class="pg-careers-detail__kvInfoInner">
					<h1 class="c-title pg-careers-detail__KvTitle">
						<b></b>
						<span>Interview</span>
					</h1>
					<h2 class="pg-careers-detail__kvSubTitle"><?php echo brTxt($current["article_title"]); ?></h2>
					<div class="pg-careers-detail__kvName"><?php echo brTxt($current["title"]); ?></div>
					<div class="pg-careers-detail__kvPosition"><?php echo esc_html($current["position"]); ?></div>
					<div class="pg-careers-detail__kvCategory"><?php echo esc_html($current["category"]); ?></div>
				</div>
			</div>
		</div>
		<!--/ kv -->
		<!-- body -->
		<div class="pg-careers-detail__body">
			<?php require_once __DIR__ . "/_cmsAssets/parts/article-section.php"; ?>
		</div>
		<!--/ body -->
	</article>
	<!-- interview -->
	<!-- pager -->
	<div class="pg-careers-detail__pager">
		<?php require_once __DIR__ . "/_cmsAssets/parts/article-pager.php"; ?>
	</div>
	<!--/ pager  -->
	<div class="pg-careers-detail__interview">
		<h2 class="c-title pg-careers-detail__interviewTitle">
			<b></b>
			<span>Interview</span>
		</h2>
		<div class="pg-careers-detail__interviewBody">
			<!-- slider -->
			<div class="c-slider js-interview-slider">
				<div class="c-slider__listContainer">
					<ul class="c-slider__list">
						<?php foreach($careersPostsArray as $carrer): ?>
							<!-- listItem -->
							<li class="c-slider__listItem">
								<a href="<?php echo esc_url($carrer["link"]); ?>" class="c-card c-card--normal js-cursor-detail js-arrowHover">
									<div class="c-card__photo">
										<img src="<?php echo esc_url($carrer["thumb"]); ?>" alt="">
									</div>
									<div class="c-card__detail">
										<div class="c-card__title"><?php echo brTxt($carrer["title"]); ?></div>
										<div class="c-card__position"><?php echo esc_html($carrer["position"]); ?></div>
										<div class="c-card__category"><?php echo esc_html($carrer["category"]); ?></div>
									</div>
									<div class="c-card__arrow js-arrow"><i></i></div>
								</a>
							</li>
						<!--/ listItem -->
						<?php endforeach; ?>
					</ul>
					<a href="#" class="c-slider__ui c-slider__ui--prev js-cursor-prev"></a>
					<a href="#" class="c-slider__ui c-slider__ui--next js-cursor-next"></a>
				</div>
				<div class="c-slider__scrollbar">
					<div class="c-slider__scrollbarThumb js-cursor"></div>
				</div>
			</div>
			<!--/ slider -->
		</div>
	</div>
	<!--/ interview -->
</div>
<!--/ contents end -->
<?php require_once __DIR__ . "/_cmsAssets/parts/footer.php"; ?>
