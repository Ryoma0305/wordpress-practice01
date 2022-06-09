<?php
	// ページ固有の情報を入力 ////////////////////////
	$gVars['title'] = '実績紹介｜株式会社OEN';
	$gVars['id'] = "works";
	$gVars['class'] = "works";
	$gVars['url'] = $gVars['origin'] . "/works/";
	// ページ固有の情報を入力 end ////////////////////////

	//////////////////////////////////////////
	// case-studies
	//////////////////////////////////////////

	$caseStudiesPosts = get_field('case-studies_select', 'option');
	$caseStudiesPostsLength = count($caseStudiesPosts);
	$caseStudiesPostsArray = array_map("getCaseStudiesWorksPost",$caseStudiesPosts);

	//////////////////////////////////////////
	// releases
	//////////////////////////////////////////

	// カテゴリー一覧 のリストを取得
	$categories = get_terms( 'releases_category', ['hide_empty' => true]);
	$categories = $categories ?: [];
	$categories = array_map(function($c){
		return [
			"id" => $c->term_id,
			"name" => $c->name
		];
	}, $categories);

	// アーカイブ一覧 のリストを取得
	$archive_months = $wpdb->get_results(
			"SELECT DISTINCT MONTH( post_date ) AS month ,
				YEAR( post_date ) AS year FROM $wpdb->posts
				WHERE post_status = 'publish'
				and post_type = 'releases'
				GROUP BY month, year
				ORDER BY post_date DESC
			"
	);
	// パラメーターのチェック
	$page = 1;
	$period = "";
	$currentTerm = '';
	$currentUrl = getCurrentUrl();
	$params = parse_url($currentUrl, PHP_URL_QUERY);
  parse_str($params, $query_array);
	$releases_args = [
		'posts_per_page' => $gVars['posts_per_page']['releases'],
		'post_type' => "releases",
	];

	// カレントページのチェック
  if( isset($query_array["pg"]) ){
		$page = checkPageNumber($query_array["pg"]);
		$releases_args["offset"] =  $gVars['posts_per_page']['releases'] * ($page - 1);
	}

	// カテゴリーパラメータのチェック
	if( isset($query_array["category"]) ){
		$currentTerm = intval($query_array["category"]);
		if( term_exists( $currentTerm, 'releases_category' ) ){
			$releases_args['tax_query'] = [
				[
					'taxonomy' => 'releases_category',
					'field' => 'term_id',
					'terms' => $currentTerm,
				]
			];
		}else{
			$currentTerm = "";
		}
	}

	// 日付パラメータのチェック
	if( isset($query_array["period"]) ){
		$now = date("Y-n");
		$now = explode('-',$now);
		$period = explode('-', $query_array["period"]);
		$y = isset($period[0]) ? intval($period[0]) : "";
		$m = isset($period[1]) ? intval($period[1]) : "";
		$releases_args['date_query'] = [
			[
				'year'  => $y >= 1000 && $y <= 9999 ? $y : $now[0],
				'month' => $m >= 1 && $m <= 12 ? $m : $now[1],
			]
		];
		$period = $query_array["period"];
	}

	$releasesPosts = get_posts($releases_args);
	$releasesPostsArray = array_map("getReleasesListPost", $releasesPosts);

?>
<?php require_once __DIR__ . "/_cmsAssets/parts/head.php"; ?>
<?php require_once __DIR__ . "/_cmsAssets/parts/header.php"; ?>
<!-- contents start -->
<div class="pg-works">
	<!-- case-study -->
	<div class="pg-works__case-study js-case-study">
		<div class="c-loader js-kvLoader pg-works__case-studyLoader"></div>
		<div class="pg-works__slidersUpper">
			<div class="pg-works__case-studyTitle">
				<h2 class="c-title">
					<b></b>
					<span>Case Study</span>
				</h2>
			</div>
			<!-- indicator -->
			<div class="pg-works__indicator">
				<?php for( $i = 1; $i <= $caseStudiesPostsLength; $i++ ): ?>
					<div class="pg-works__indicatorChild js-cursor js-indicator <?php echo $i === 1  ? "is-current" : ""; ?>">
						<span><?php echo str_pad($i, 2, 0, STR_PAD_LEFT); ?></span>
						<div class="pg-works__indicatorLine js-indicatorLine"></div>
					</div>
				<?php endfor; ?>
			</div>
			<!--/ indicator -->
		</div>
		<!-- sliders -->
		<div class="pg-works__sliders js-works-slider">
			<div class="swiper-wrapper">
				<?php foreach($caseStudiesPostsArray as $casestudy): ?>
					<!-- @ -->
					<div class="pg-works__slider swiper-slide js-slider-slide">
						<a href="<?php echo esc_url($casestudy["link"]); ?>" class="js-lineHover js-arrowHover">
							<div class="pg-works__sliderCircle js-slider-circle">
								<img
									data-src=""
									data-pc="<?php echo esc_url($casestudy["thumb_pc"]); ?>"
									data-sp="<?php echo esc_url($casestudy["thumb_sp"]); ?>"
									class="swiper-lazy js-swiper-img" />
								<div class="swiper-lazy-preloader"></div>
							</div>
							<div class="pg-works__sliderBody">
								<div class="pg-works__sliderCategory js-slider-category"><?php echo esc_html($casestudy["category"]); ?></div>
								<h3 class="pg-works__sliderTitle js-slider-title"><?php echo brTxt($casestudy["title"]); ?></h3>
								<div class="pg-works__sliderUnder js-slider-under">
									<div class="pg-works__sliderDescription"><?php echo brTxt($casestudy["description"]); ?></div>
									<div class="c-btn c-btn--small pg-works__sliderBtn">
										<div class="c-btn__text">Learn More</div>
										<div class="c-btn__arrow js-arrow"><i></i></div>
										<div class="c-btn__line js-line"></div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<!--/ @ -->
				<?php endforeach; ?>
			</div>
		</div>
		<!--/ sliders -->
	</div>
	<!--/ case-study -->
	<!-- release -->
	<div class="pg-works__release js-release" id="release">
		<div class="pg-works__releaseHead">
			<div class="pg-works__releaseTitle">
				<h2 class="c-title">
					<b></b>
					<span>Release</span>
				</h2>
			</div>
			<div class="pg-works__releaseSelects">
				<div class="pg-works__releaseSelect">
					<select name="" id="js-release-category">
						<option value="">Categories</option>
						<?php foreach($categories as $category): ?>
							<option value="<?php echo esc_attr($category["id"]); ?>" <?php echo $currentTerm == $category["id"] ? "selected" : ""; ?>><?php echo esc_html($category["name"]); ?></option>
						<?php endforeach; ?>
					</select>
					<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/common/under-arrow.svg" alt="">
				</div>
				<div class="pg-works__releaseSelect">
					<select name="" id="js-release-archive">
						<option value="">Archives</option>
						<?php foreach($archive_months as $month): ?>
							<option value="<?php echo $month->year . "-" . $month->month; ?>" <?php echo $period == $month->year . "-" . $month->month ? "selected" : ""; ?>><?php echo $month->year . " / " . str_pad($month->month, 2, 0, STR_PAD_LEFT); ?></option>
						<?php endforeach; ?>
					</select>
					<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/common/under-arrow.svg" alt="">
				</div>
			</div>
		</div>
		<div class="pg-works__releaseBody">
			<?php if(empty($releasesPostsArray)): ?>
				<div class="p-articles p-articles--empty">
					<p>記事が見つかりませんでした</p>
				</div>
			<?php else: ?>
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
			<?php endif; ?>
			<!-- pager -->
			<?php require_once __DIR__ . "/_cmsAssets/parts/archive-pager.php"; ?>
			<!--/ pager -->
		</div>
	</div>
	<!--/ release -->
</div>
<!--/ contents end -->
<?php require_once __DIR__ . "/_cmsAssets/parts/footer.php"; ?>
