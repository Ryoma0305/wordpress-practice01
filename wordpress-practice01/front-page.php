<?php
	// ページ固有の情報を入力 ////////////////////////
  $gVar['title'] = '世界中に熱狂を届ける｜株式会社OEN';
  $gVars['id'] = "top";
	$gVars['class'] = "top";
  $gVars['ogtype'] = "website";
	$gVars['url'] = $gVars['origin'] . "/";
	// ページ固有の情報を入力 end ////////////////////////

  // careers
  $careersPosts = get_posts([
    'posts_per_page' => -1,
    'post_type' => "careers"
  ] )
  $careersPostsArray = array_map("getCareersListPost", $careerPosts);

  // case-studies
  $caseStudiesPosts = get_field('case-studies_select', 'option');
  $caseStudiesPostsArray = array_map("getCaseStudiesTopListPost", $caseStudiesPosts);

  // jobs
  $jobsPosts = get_posts([
    'posts_per_page' => -1,
    'post_type' => "jobs"
  ]);
  $jobsPostsArray = array_map("getJobsTopListPost", $jobsPosts);
  $jobsPostsArray = array_filter($jobsPostsArray, function($p){
    return $p != false;
  });
?>
<?php require_once __DIR__ . "/_cmsAssets/parts/head.php"; ?>
<?php require_once __DIR__ . "/_cmsAssets/parts/header.php"; ?>
<!-- contents start -->
<canvas class="c-bg js-bg-canvas"></canvas>
<div class="pg-top">

  <!-- copy -->
  <p class="pg-top__copy">
      <span class="pg-top__copy--en">Enthuse the world with <br class="u-pcbr">Japanese entertainment</span>
      <span class="pg-top__copy--jp">世界中に熱狂を届ける</span>
    </p>
    <!-- /copy -->

    <!-- about -->
    <section class="pg-top__about">

      <!-- 動画の場合 -->
      <div class="pg-top__aboutMovieContainer" id="js-loop-movie">
        <video class="pg-top__aboutMovie" playsinline muted loop poster="<?php echo $gVars["loop_movie_poster"]; ?>" src="<?php echo $gVars["loop_movie"]; ?>"></video>
      </div>
		  <!--/ 動画の場合 -->
      <!-- 画像の場合 -->
      <!--
        <div class="pg-top__aboutMovieContainer">
          <img class="pg-top__aboutImage" src="/wp-content/themes/o-e-n.co.jp/_assets/images/about/kv.png" alt="">
        </div>
        -->
      <!--/ 画像の場合 -->

        <div class="pg-top__aboutContentsContainer">
        <div class="pg-top__aboutTitle">
          <h2 class="c-title">
            <b></b>
            <span>About Us</span>
          </h2>
        </div>
        <p class="pg-top__aboutStatement">
          <span class="pg-top__aboutStatementEn">We support the globalization and digital transformation of Japan’s entertainment industry.</span>
          <span class="pg-top__aboutStatementJp">日本のエンタメ産業の<br class="u-spbr">グローバル化・DX化を支援</span>
        </p>
        <div class="pg-top__aboutDescription">
          <div class="pg-top__aboutDescriptionWrapper">
            <p class="pg-top__aboutDescriptionBody">
            私たちは新しい力とインターネットで、エンターテインメントが生み出す熱狂を世界中に届けていきます。エンターテインメント産業の新たな機会創出を応援します。
            </p>
            <a class="c-btn c-btn--small js-lineHover js-arrowHover" href="/about/">
              <div class="c-btn__text">Learn More</div>
              <div class="c-btn__arrow js-arrow"><i></i></div>
              <div class="c-btn__line js-line"></div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- /about -->

    <!-- caseStudy -->
    <section class="pg-top__caseStudy">
      <div class="pg-top__caseStudyTitle">
        <h2 class="c-title">
          <b></b>
          <span>Case Study</span>
        </h2>
      </div>
      <div class="pg-top__caseStudyWrapper">
        <div class="pg-top__caseStudyCenter"></div>
        <div class="pg-top__caseStudyImages">
          <div class="pg-top__caseStudyImagesWrapper">
            <?php foreach($caseStudiesPostsArray as $casestudy): ?>
              <div style="background-image: url('<?php echo esc_url($casestudy["thumb"]); ?>')"></div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="pg-top__caseStudyLoopText c-loopText js-caseStudy-loopText">
          <img class="pg-top__caseStudyLoopTextImg c-loopText__img" src="/wp-content/themes/o-e-n.co.jp/_assets/images/top/casestudy_loop_txt.png" alt="CASE STUDY">
        </div>
        <a class="c-btn c-btn--small js-lineHover js-arrowHover pg-top__caseStudyMoreBtn" href="/works/">
          <div class="c-btn__text">More Works</div>
          <div class="c-btn__arrow js-arrow"><i></i></div>
          <div class="c-btn__line js-line"></div>
        </a>
        <ul class="pg-top__caseStudyList">
          <?php foreach($caseStudiesPostsArray as $casestudy): ?>
            <li class="pg-top__caseStudyListItem">
              <a href="<?php echo esc_url($casestudy["link"]); ?>" class="pg-top__caseStudyListBtn js-lineHover js-arrowHover">
                <div class="pg-top__caseStudyListItemWrapper">
                  <div class="pg-top__caseStudyListItemCategory"><?php echo esc_html($casestudy["category"]); ?></div>
                  <div class="pg-top__caseStudyListItemText">
                    <span><?php echo brTxt($casestudy["title"]); ?></span>
                    <span><?php echo brTxt($casestudy["description"]); ?></span>
                  </div>
                </div>
                <div class="pg-top__caseStudyListItemArrow js-arrow"><i></i></div>
                <div class="pg-top__caseStudyListItemLine js-line"></div>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div><!-- /caseStudyWrapper -->
    </section>
    <!-- /caseStudy -->

    <!-- career -->
    <section class="pg-top__career">
      <h2 class="c-title-center pg-top__careerTitle">
        <b></b>
        <span>Career</span>
      </h2>
      <p class="pg-top__careerCopy">
        <span class="pg-top__careerCopy--en">
        Let’s break through <br>
  Japan’s sense of stagnation <br>
  with New Power and the Internet.
        </span>
        <span class="pg-top__careerCopy--jp">新しい力とインターネットで日本の閉塞感を打破する仲間を募集しています</span>
      </p>
      <a class="c-btn c-btn--small js-lineHover js-arrowHover pg-top__careerMoreBtn" href="/careers/" ref="noopener" target="_blank">
          <div class="c-btn__text">Learn More</div>
          <div class="c-btn__arrow js-arrow"><i></i></div>
          <div class="c-btn__line js-line"></div>
      </a>
    </section>
	  <!-- /career -->

    <!-- interview -->
    <section class="pg-top__interview">
      <h2 class="c-title pg-top__interviewTitle">
        <b></b>
        <span>Interview</span>
      </h2>
      <div class="c-slider pg-top__interviewSlider js-pg-top-slider">
        <div class="c-slider__listContainer">
          <ul class="c-slider__list">
            <?php foreach($careersPostsArray as $career): ?>
              <!-- listItem -->
                <li class="c-slider__listItem">
                  <a href="<?php echo esc_url($career["link"]); ?>" class="c-card c-card--normal js-cursor-detail js-arrowHover">
                    <div class="c-card__photo">
                      <img loading="lazy" src="<?php echo esc_url($career["thumb"]); ?>" alt="">
                    </div>
                    <div class="c-card__detail">
                      <div class="c-card__title"><?php echo brTxt($career["title"]); ?></div>
                      <div class="c-card__position"><?php echo esc_html($career["position"]); ?></div>
                      <div class="c-card__category"><?php echo esc_html($career["category"]); ?></div>
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
    </section>
    <!-- /interview -->

    <!-- job -->
    <section class="pg-top__job">
      <div class="pg-top__jobContainer">
        <h2 class="c-title pg-top__jobTitle">
          <b></b>
          <span>Job Opening</span>
        </h2>
        <ul class="pg-top__jobList">
          <?php if($jobsPostsArray): ?>
            <?php foreach($jobsPostsArray as $job): ?>
              <li class="pg-top__jobListItem">
                <a href="<?php echo esc_url($job["link"]); ?>" class="pg-top__jobListItemBtn js-lineHover js-arrowHover">
                  <div class="pg-top__jobListItemWrapper">
                    <div class="pg-top__jobListItemName"><?php echo esc_html($job["title"]); ?> <sup><?php echo $job["count"]; ?></sup></div>
                    <div class="pg-top__jobListItemOccupation"><?php echo esc_html($job["job_names"]); ?></div>
                  </div>
                  <div class="pg-top__jobListItemArrow js-arrow"><i></i></div>
                  <div class="pg-top__jobListItemLine js-line"></div>
                </a>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>
    </section>
    <!-- /job -->

    <!-- contact -->
    <section class="pg-top__contact js-contact">
      <div class="pg-top__contactWrapper js-contact-wrapper">
        <canvas class="pg-top__contactBG js-contact-bg-canvas"></canvas>
        <a href="<?php echo $gVars["contact"]; ?>" ref="noopener" target="_blank" class="c-loopText js-contact-loopText js-cursor-contact">
          <img class="c-loopText__img pg-top__contactLoopText" src="/wp-content/themes/o-e-n.co.jp/_assets/images/top/contact_loop_txt.png" alt="Keep in touch Contact">
        </a>
      </div>
    </section>
    <!-- /contact -->

</div>
<!--/ contents end -->
<?php require_once __DIR__ . "/_cmsAssets/parts/footer.php"; ?>
