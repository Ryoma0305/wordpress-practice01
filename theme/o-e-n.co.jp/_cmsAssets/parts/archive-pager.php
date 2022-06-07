<?php
  $range = 1;
  $pages = 1;
  $showitems = ( $range * 2 ) + 1;
	$posttype = "releases";

	$pagerArgs = [
		'posts_per_page' => -1,
		'post_type' => $posttype,
	];

	if($currentTerm && $period){ // カテゴリ & 月間
		$pagerArgs["tax_query"] = $releases_args['tax_query'];
		$pagerArgs["date_query"] = $releases_args['date_query'];
		$query = new WP_Query( $pagerArgs );
		$pages = ceil($query->found_posts / $gVars['posts_per_page'][$posttype]);
		// vd("A");
		// vd($query->found_posts);
	}else if($period){ // 月間
		$pagerArgs["date_query"] = $releases_args['date_query'];
		$query = new WP_Query( $pagerArgs );
		$pages = ceil($query->found_posts / $gVars['posts_per_page'][$posttype]);
		// vd("B");
		// vd($query->found_posts);
	}else if($currentTerm){ // カテゴリ
		$tag_properties = get_term_by( 'term_id', $currentTerm, 'releases_category' );
		$pages = ceil($tag_properties->count / $gVars['posts_per_page'][$posttype]);
		// vd("C");
		// vd($tag_properties->count);
	}else{
		$posts_count = wp_count_posts($posttype)->publish;
		$pages = ceil($posts_count / $gVars['posts_per_page'][$posttype]);
		// vd("D");
		// vd($posts_count);
	};

  $isPrev   = false;
  $isNext   = false;
  $first    = 0;
  $last     = 0;
  $start    = 0;
  $end      = 0;
  $startDot = false;
  $endDot   = false;

  if($page > 1){
    $isPrev   = true;
  }
  if($page < $pages){
    $isNext   = true;
  }

  if($pages <= $showitems + 2){
    $start    = 1;
    $end      = $pages;
  }else{
    $start = $page - $range;
    $end   = $page + $range;
    if($start > 1 && $end < $pages){
      $first   = 1;
      $last    = $pages;
    }elseif($start <= 1){
      $end    = $end - $start + 2;
      $start  = 1;
      $last   = $pages;
    }elseif($end >= $pages){
      $start    = $start - ($end - $pages) - 1;
      $end      = $pages;
      $first    = 1;
    }
    if($start > $first + 1){
      $startDot = true;
    }
    if($end < $last - 1){
      $endDot = true;
    }
  }
?>
<div class="p-pager pg-works__pager">
	<div class="c-pagerNumber">
		<!-- first -->
		<?php if( $first ): ?>
			<a class="c-pagerNumber__number is-first js-pager" href="<?php echo getPagerLink($first, $currentTerm, $period); ?>">1</a>
			<?php if( $startDot ): ?>
			<a class="c-pagerNumber__dot">..</a>
			<?php endif; ?>
		<?php endif; ?>
		<!--/ first -->
		<!-- number loop -->
		<?php
			for ($i=$start; $i <= $end; $i++):
					$current = ($page == $i) ? "c-pagerNumber__number--current" : '';
		?>
			<a class="c-pagerNumber__number js-pager <?php echo $current; ?>" href="<?php echo getPagerLink($i, $currentTerm, $period); ?>"><?php echo $i; ?></a>
		<?php endfor; ?>
		<!--/ number loop -->
		<!-- last -->
		<?php if ( $last ): ?>
			<?php if( $endDot ): ?>
				<a class="c-pagerNumber__dot">..</a>
			<?php endif; ?>
			<a class="c-pagerNumber__number is-last js-pager" href="<?php echo getPagerLink($pages, $currentTerm, $period); ?>"><?php echo $pages; ?></a>
		<?php endif; ?>
		<!--/ last -->
	</div>
	<div class="c-pagerAround">
		<!-- prev -->
		<?php if( $isPrev ): ?>
			<a class="c-pagerAround__link c-pagerAround__link--back js-pager js-lineHover" href="<?php echo getPagerLink($page - 1, $currentTerm, $period); ?>">
				<span>Back</span>
				<i></i>
				<b class="js-line"></b>
			</a>
		<?php else: ?>
			<a class="c-pagerAround__link c-pagerAround__link--back js-pager is-disabled">
				<span>Back</span>
				<i></i>
				<b class="js-line"></b>
			</a>
		<?php endif; ?>
		<!--/ prev -->
    <!-- next -->
    <?php if( $isNext ): ?>
			<a class="c-pagerAround__link c-pagerAround__link--next js-pager js-lineHover" href="<?php echo getPagerLink($page + 1, $currentTerm, $period); ?>">
				<span>Next</span>
				<i></i>
				<b class="js-line"></b>
			</a>
    <?php else: ?>
			<a class="c-pagerAround__link c-pagerAround__link--next js-pager is-disabled">
				<span>Next</span>
				<i></i>
				<b class="js-line"></b>
			</a>
    <?php endif; ?>
    <!--/ next -->
	</div>
</div>
