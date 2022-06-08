<?php
	// ページ固有の情報を入力 ////////////////////////
  $link = get_permalink();
	$gVars['title'] = get_the_title($post->ID) . "｜株式会社OEN";
	$gVars['description'] = get_field("description", $post->ID) ?: $gVars['description'];
	$gVars['id'] = "case-studies-detail";
	$gVars['class'] = "case-studies";
	$gVars['url'] = $link;
	$gVars['ogp'] = getImageFromPostId("ogimage",$post->ID) ?: $gVars['ogp'];
	// ページ固有の情報を入力 end ////////////////////////

	// Current Post
	$current = getCaseStudiesSinglePost($post);

	// Related Post
	$caseStudiesPosts = get_posts([
		'posts_per_page' => -1,
		'post_type'      => "case-studies",
		'post__not_in'   => array($post->ID),
	]);
	$caseStudiesPostsArray = array_map("getCaseStudiesRelatedPost", $caseStudiesPosts);

	// index page link
	$index_page_link = "/works/";

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
<div class="pg-case-studies-detail__bg">
	<picture class="pg-case-studies-detail__bgInner">
		<source srcset="<?php echo $current["thumb_sp"]; ?>" media="(max-width: <?php echo $gVars["breakpoint"]; ?>px)" />
		<img src="<?php echo $current["thumb_pc"]; ?>" alt="" />
	</picture>
</div>
<div class="pg-case-studies-detail">
	<article class="pg-case-studies-detail__inner">
		<!-- kv -->
		<div class="pg-case-studies-detail__kv">
			<div class="pg-case-studies-detail__kvInner">
				<h1 class="c-title pg-case-studies-detail__title">
					<b></b>
					<span>Release</span>
				</h1>
				<div class="pg-case-studies-detail__category"><?php echo esc_html($current["category"]); ?></div>
				<h2 class="pg-case-studies-detail__subTitle"><?php echo brTxt($current["title"]); ?></h2>
				<div class="pg-case-studies-detail__description"><?php echo brTxt($current["description"]); ?></div>
				<?php if($current["links"]): ?>
						<ul class="c-links pg-case-studies-detail__links">
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
		<!--/ kv -->
		<!-- body -->
		<div class="pg-case-studies-detail__body">
			<?php require_once __DIR__ . "/_cmsAssets/parts/article-section.php"; ?>
		</div>
		<!--/ body -->
	</article>
		<!-- under -->
		<div class="pg-case-studies-detail__under">
			<!-- staff -->
			<div class="pg-case-studies-detail__staff">
				<?php require_once __DIR__ . "/_cmsAssets/parts/staff-list.php"; ?>
			</div>
			<!--/ staff -->
			<!-- pager -->
			<div class="pg-case-studies-detail__pager">
				<?php require_once __DIR__ . "/_cmsAssets/parts/article-pager.php"; ?>
			</div>
			<!--/ pager  -->
			<!-- related -->
			<div class="pg-case-studies-detail__related">
				<h2 class="c-title pg-case-studies-detail__relatedTitle">
					<b></b>
					<span>Case Study</span>
				</h2>
				<div class="pg-case-studies-detail__relatedBody">
					<?php foreach($caseStudiesPostsArray as $casestudy): ?>
						<article class="pg-case-studies-detail__article">
							<a class="pg-case-studies-detail__articleLink" href="<?php echo $casestudy["link"]; ?>">
								<div class="pg-case-studies-detail__articlePhoto">
									<picture>
										<source srcset="<?php echo $casestudy["thumb_sp"]; ?>" media="(max-width: <?php echo $gVars["breakpoint"]; ?>px)" />
										<img src="<?php echo $casestudy["thumb_pc"]; ?>" alt="" />
									</picture>
								</div>
								<div class="pg-case-studies-detail__articleInfo">
									<div class="pg-case-studies-detail__articleCategory"><?php echo $casestudy["category"]; ?></div>
									<h3 class="pg-case-studies-detail__articleTitle"><?php echo $casestudy["title"]; ?></h3>
								</div>
								<div class="pg-case-studies-detail__articleArrow"><i></i></div>
							</a>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
			<!--/ related -->
		</div>
		<!-- under -->
</div>
<!--/ contents end -->
<?php require_once __DIR__ . "/_cmsAssets/parts/footer.php"; ?>
