<?php
	// ページ固有の情報を入力 ////////////////////////
  $link = get_permalink();
	$gVars['title'] = get_the_title($post->ID) . "｜株式会社OEN";
	$gVars['description'] = get_field("description", $post->ID) ?: $gVars['description'];
	$gVars['id'] = "releases-detail";
	$gVars['class'] = "releases";
	$gVars['url'] = $link;
	$gVars['ogp'] = getImageFromPostId("ogimage",$post->ID) ?: $gVars['ogp'];
	// ページ固有の情報を入力 end ////////////////////////

	// Current Post
	$current = getReleasesSinglePost($post);

	// Related Post
	$releases_args = [
		'posts_per_page' => 6,
		'post_type' => "releases",
		'post__not_in'=> array($post->ID),
	];

	if( $current["category_id"] !== "" ){
		$releases_args['tax_query'] = [
			[
				'taxonomy' => 'releases_category',
				'field' => 'term_id',
				'terms' => $current["category_id"],
			]
		];
	}

	$releasesPosts = get_posts($releases_args);
	$releasesPostsArray = array_map("getReleasesListPost", $releasesPosts);

	// index page link
	$index_page_link = "/works/?release";

	// prev page link
  $prev_post = get_previous_post();
	$prev_post_link = $prev_post ? get_permalink( $prev_post->ID ) : "";
	// next page link
	$next_post = get_next_post();
	$next_post_link = $next_post ? get_permalink( $next_post->ID ) : "";

?>
<?php require_once __DIR__ . "/_cmsAssets/parts/head.php"; ?>
<?php require_once __DIR__ . "/_cmsAssets/parts/header.php"; ?>
<!-- contents start -->
<canvas class="c-bg js-bg-canvas"></canvas>
<div class="pg-releases-detail">
	<article class="pg-releases-detail__article">
		<!-- kv -->
		<div class="pg-releases-detail__kv">
			<h1 class="c-title pg-releases-detail__kvTitle">
				<b></b>
				<span>Release</span>
			</h1>
			<div class="pg-releases-detail__kvInner">
				<div class="pg-releases-detail__photo">
					<div class="pg-releases-detail__photoInner">
						<img src="<?php echo esc_url($current["thumb"]); ?>" alt="">
					</div>
				</div>
				<div class="c-title pg-releases-detail__kvSpTitle">
					<b></b>
					<span>Release</span>
				</div>
				<div class="pg-releases-detail__time">
					<time datetime="<?php echo esc_attr($current["time"]); ?>">
						<span><?php echo esc_html($current["time_arr"][0]); ?></span>
						<span><?php echo esc_html($current["time_arr"][1]); ?></span>
						<span></span>
						<span><?php echo esc_html($current["time_arr"][2]); ?></span>
					</time>
				</div>
				<div class="pg-releases-detail__info">
					<div class="pg-releases-detail__category"><?php echo esc_html($current["category"]); ?></div>
					<h3 class="pg-releases-detail__title"><?php echo brTxt($current["title"]); ?></h3>
					<div class="pg-releases-detail__description"><?php echo brTxt($current["description"]); ?></div>
					<?php if($current["links"]): ?>
						<ul class="c-links pg-releases-detail__links">
							<?php foreach($current["links"] as $link): ?>
								<li>
									<a href="<?php echo esc_url($link["link"]); ?>" target="_blank" rel="noopener">
										<b></b><span><?php echo esc_html($link["link_text"]); ?></span>
									</a>
								</li>
							<?php endforeach;  ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
			<div class="pg-releases-detail__kvLine"></div>
		</div>
		<!--/ kv -->
		<!-- body -->
		<div class="pg-releases-detail__body">
			<?php require_once __DIR__ . "/_cmsAssets/parts/article-section.php"; ?>
		</div>
		<!--/ body -->
	</article>
		<!-- under -->
		<div class="pg-releases-detail__under">
			<!-- staff -->
			<div class="pg-releases-detail__staff">
				<?php require_once __DIR__ . "/_cmsAssets/parts/staff-list.php"; ?>
			</div>
			<!--/ staff -->
			<!-- pager -->
			<div class="pg-releases-detail__pager">
				<?php require_once __DIR__ . "/_cmsAssets/parts/article-pager.php"; ?>
			</div>
			<!--/ pager  -->
			<!-- related -->
			<div class="pg-releases-detail__related">
				<h1 class="c-title pg-releases-detail__relatedTitle">
					<b></b>
					<span>Related Post</span>
				</h1>
				<div class="pg-releases-detail__relatedBody">
					<div class="p-articles">
						<?php foreach($releasesPostsArray as $release): ?>
						<!-- @ -->
						<article class="c-article">
							<a class="c-article__link js-lineHover js-arrowHover" href="<?php echo esc_url($release["link"]); ?>">
								<div class="c-article__time">
									<time datetime="<?php echo esc_attr($release["time"]); ?>">
										<span><?php echo esc_html($release["time_arr"][0]); ?></span>
										<span><?php echo esc_html($release["time_arr"][1]); ?></span>
										<span></span>
										<span><?php echo esc_html($release["time_arr"][2]); ?></span>
									</time>
								</div>
								<div class="c-article__photo">
									<img loading="lazy" src="<?php echo esc_url($release["thumb"]); ?>" alt="">
								</div>
								<div class="c-article__info">
									<div class="c-article__category"><?php echo esc_html($release["category"]); ?></div>
									<h3 class="c-article__title"><?php echo brTxt($release["title"]); ?></h3>
									<div class="c-article__description"><?php echo brTxt($release["description"]); ?></div>
									<div class="c-article__arrow js-arrow"><i></i></div>
								</div>
								<div class="c-article__line js-line"></div>
							</a>
						</article>
						<!--/ @ -->
						<?php endforeach; ?>
				</div>
			</div>
			<!--/ related -->
		</div>
		<!-- under -->
</div>
<!--/ contents end -->
<?php require_once __DIR__ . "/_cmsAssets/parts/footer.php"; ?>
