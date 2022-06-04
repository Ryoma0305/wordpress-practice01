<?php
	// ページ固有の情報を入力 ////////////////////////
	$gVars['title'] = '採用情報｜株式会社OEN';
	$gVars['id'] = "careers";
	$gVars['class'] = "careers";
	$gVars['url'] = $gVars['origin'] . "/careers/";
	// ページ固有の情報を入力 end ////////////////////////

	// careers
  $careersPosts = get_posts([
    'posts_per_page' => -1,
    'post_type' => "careers"
  ]);
	$careersPostsArray = array_map("getCareersListPost", $careersPosts);

	// jobs
  $jobsPosts = get_posts([
    'posts_per_page' => -1,
    'post_type' => "jobs"
  ]);
	$jobsPostsArray = array_map("getJobsListPost", $jobsPosts);

?>
<?php require_once __DIR__ . "/_cmsAssets/parts/head.php"; ?>
<?php require_once __DIR__ . "/_cmsAssets/parts/header.php"; ?>
<!-- contents start -->
<div class="pg-careers__bg"></div>
<div class="pg-careers">
	<div class="pg-careers__kv">
		<div class="pg-careers__kvInner">
			<h1 class="c-title pg-careers__title">
				<b></b>
				<span>Careers</span>
			</h1>
			<h2 class="pg-careers__subTitle">
				<span>Let's bring 熱狂 <br>to the world together!</span>
			</h2>
		</div>
		<!-- loop -->
		<div class="c-loopText pg-careers__loop js-loopText">
			<img class="pg-careers__loopText c-loopText__img js-loopTextImg" src="/wp-content/themes/o-e-n.co.jp/_assets/images/careers/loop.png" alt="Join Our Team">
		</div>
		<!--/ loop -->
	</div>
	<div class="pg-careers__body">
		<div class="pg-careers__lead">
<p>
私たちと共に、世界中に熱狂を届けてくれるチームメンバーを集めています。<br>
<br>
・世界水準の品質を。妥協しない。<br>
・日本で最も・・・を実現する。<br>
・日本のエンタメを世界に。アジアに。<br>
<br>
そんなプロフェッショナル集団を目指しています。
</p>
		</div>
		<section class="pg-careers__interview">
			<h2 class="c-title-center pg-careers__interviewTitle">
				<b></b>
				<span>Interview</span>
			</h2>
			<div class="pg-careers__interviewMain js-interview-wrap">
				<?php foreach($careersPostsArray as $career): ?>
					<div class="pg-careers__interviewCard">
						<a href="<?php echo esc_url($career["link"]); ?>" class="c-card c-card--col js-arrowHover">
							<div class="c-card__photo">
								<img loading="lazy" src="<?php echo esc_url($career["thumb"]); ?>" alt="">
							</div>
							<div class="c-card__detail">
								<div class="c-card__title"><?php echo nbr($career["title"]); ?></div>
								<div class="c-card__position"><?php echo esc_html($career["position"]); ?></div>
								<div class="c-card__category"><?php echo esc_html($career["category"]); ?></div>
							</div>
							<div class="c-card__arrow js-arrow"><i></i></div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="pg-careers__interviewBtn">
				<?php if(count($careersPostsArray) > 6): ?>
					<a class="c-btn c-btn--small js-interview-more" href="#">
						<div class="c-btn__text">View All</div>
						<div class="c-btn__arrow js-arrow"><s></s></div>
						<div class="c-btn__line"></div>
					</a>
				<?php endif; ?>
			</div>
		</section>
		<section class="pg-careers__job">
			<h2 class="c-title pg-careers__jobTitle">
				<b></b>
				<span>Job Opening</span>
			</h2>
			<div class="pg-careers__jobMain">
				<?php foreach($jobsPostsArray as $job): ?>
				<!-- @ -->
				<section class="pg-careers__jobSection" id="job-<?php echo $job["id"]; ?>">
					<div class="pg-careers__jobHead">
						<h3 class="pg-careers__jobHeadTitle"><?php echo esc_html($job["title"]); ?></h3>
						<div class="pg-careers__jobHeadText"><?php echo $job["description"]; ?></div>
						<div class="pg-careers__jobHeadBtn">
							<?php if($job["entry_link"] && !$job["stop_entry"]): ?>
								<a class="c-btn c-btn--small js-lineHover js-arrowHover" href="<?php echo esc_url($job["entry_link"]); ?>" ref="noopener" target="_blank">
									<div class="c-btn__text">Entry</div>
									<div class="c-btn__arrow js-arrow"><i></i></div>
									<div class="c-btn__line js-line"></div>
								</a>
							<?php endif; ?>
						</div>
					</div>
					<div class="pg-careers__jobBody">
						<?php if($job["stop_entry"]): ?>
							<div class="pg-careers__jobEmpty">
								<p>現在募集している職種はありません。</p>
							</div>
						<?php else: ?>
							<?php foreach($job["occupation"] as $occupation): ?>
								<!-- * -->
								<div class="pg-careers__jobDetail js-accordion">
									<div class="pg-careers__jobName js-accordion-head js-cursor">
										<span><?php echo esc_html($occupation["job_name"]); ?></span>
										<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/common/plus.svg" alt="">
									</div>
									<div class="pg-careers__jobInfo">
										<?php if($occupation["job_description"]): ?>
											<p><?php echo nbr($occupation["job_description"]); ?></p>
										<?php endif; ?>
										<?php if($occupation["job_list"]): ?>
											<?php foreach($occupation["job_list"] as $child): ?>
												<dl>
													<dt><?php echo esc_html($child["job_list_title"]); ?></dt>
													<dd><?php echo nbr($child["job_list_detail"]); ?></dd>
												</dl>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
								<!--/ * -->
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</section>
				<!--/ @ -->
				<?php endforeach; ?>
			</div>
		</section>
	</div>
</div>
<!--/ contents end -->
<?php require_once __DIR__ . "/_cmsAssets/parts/footer.php"; ?>
