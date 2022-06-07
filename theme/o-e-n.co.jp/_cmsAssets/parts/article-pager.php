<?php
	$prev_post_class = $prev_post_link ? "js-lineHover" : "is-disabled";
	$next_post_class = $next_post_link ? "js-lineHover" : "is-disabled";
?>
<div class="p-articlePager">
	<div class="c-pagerAround">
		<a class="c-pagerAround__link c-pagerAround__link--back js-pager <?php echo $prev_post_class; ?>" href="<?php echo esc_url($prev_post_link); ?>">
			<span>Back</span>
			<i></i>
			<b class="js-line"></b>
		</a>
		<a class="c-pagerAround__link c-pagerAround__link--next js-pager <?php echo $next_post_class; ?>" href="<?php echo esc_url($next_post_link); ?>">
			<span>Next</span>
			<i></i>
			<b class="js-line"></b>
		</a>
	</div>
	<div class="p-articlePager__btn">
		<a class="c-btn c-btn--small js-lineHover js-arrowHover" href="<?php echo $index_page_link; ?>">
			<div class="c-btn__text">Back to List</div>
			<div class="c-btn__arrow js-arrow"><i></i></div>
			<div class="c-btn__line js-line"></div>
		</a>
	</div>
</div>
