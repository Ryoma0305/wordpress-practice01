<?php
	$article_section = get_field("article_section");
?>

<div class="p-articleSection">
  <?php if($article_section):?>
  <!-- loop start -->
  <?php foreach($article_section as $section): ?>
  <?php if($section['article_select'] === "article_title"):?>
  <!-- title -->
  <h3 class="p-articleSection__title"><?php echo nbr($section['article_title']); ?></h3>
  <!--/ title -->
  <?php elseif($section['article_select'] === "article_text"): ?>
  <!-- text -->
  <div
    class="p-articleSection__text<?php echo $section['is_small_text_size'] ? " small" : ""; ?>">
    <?php echo nl2br($section['article_text']); ?>
  </div>
  <!--/ text -->
  <?php elseif($section['article_select'] === "article_editor"): ?>
  <!-- editor -->
  <div
    class="p-articleSection__text<?php echo $section['is_small_text_size'] ? " small" : ""; ?>">
    <?php echo($section['article_editor']); ?>
  </div>
  <!--/ editor -->
  <?php elseif($section['article_select'] === "article_image"): ?>
  <?php
		$article_align = $section['article_align'];
		$article_image_size = $section['article_image_size'];
		$article_caption = $section['article_caption'];
		$article_link = $section['article_link'];
		$article_image = getImageFromId($section['article_image']);
		$article_image_sp = getImageFromId($section['article_image'],"medium_large");
	?>
  <?php if($article_image): ?>
  <!-- photo -->
  <div class="p-articleSection__photo <?php echo $article_image_size; ?> <?php echo $article_align; ?>">
    <?php if($article_link): ?>
      <a href="<?php echo esc_url($article_link); ?>" target="_blank" rel="noopener">
    <?php else: ?>
      <a>
    <?php endif; ?>
        <picture>
          <source srcset="<?php echo esc_url($article_image_sp); ?>"
            media="(max-width: <?php echo $gVars["breakpoint"]; ?>px)" />
          <img src="<?php echo esc_url($article_image); ?>" alt="" />
        </picture>
      </a>
  </div>
  <div class="p-articleSection__caption <?php echo $article_align; ?>"><?php echo esc_html($article_caption); ?></div>
  <!--/ photo -->
  <?php endif; ?>
  <?php elseif($section['article_select'] === "article_iframe"): ?>
  <!-- iframe -->
  <div class="p-articleSection__iframe">
    <?php echo $section['article_iframe']; ?>
  </div>
  <!--/ iframe -->
  <?php elseif($section['article_select'] === "article_slider"): ?>
  <!-- slider -->
  <div class="p-articleSection__slider">
    <div class="js-article-slider p-articleSection__sliderInner">
      <div class="swiper-wrapper">
        <?php
					$article_slider = $section['article_slider'];
					foreach($article_slider as $slider):
						if($slider["article_slider_photo"] !== false):
							$slider_photo = getImageFromId($slider["article_slider_photo"]);
							$slider_photo_sp = getImageFromId($slider["article_slider_photo"],"medium_large");
							$slider_caption = $slider["article_slider_caption"];
							$slider_link = $slider["article_slider_link"];
				?>
        <div class="p-articleSection__sliderChild p-articleSection__photo swiper-slide">
          <?php if($slider_link): ?>
          <a href="<?php echo esc_url($slider_link); ?>" target="_blank" rel="noopener">
            <?php else: ?>
            <a>
              <?php endif; ?>
              <picture>
                <source srcset="<?php echo esc_url($slider_photo_sp); ?>"
                  media="(max-width: <?php echo $gVars["breakpoint"]; ?>px)" />
                <img src="<?php echo esc_url($slider_photo); ?>" alt="" />
              </picture>
            </a>
            <div class="p-articleSection__sliderCaption"><?php echo $slider_caption; ?></div>
        </div>
        <?php	endif; endforeach;  ?>
      </div>
      <div class="p-articleSection__sliderNav">
        <button class="p-articleSection__sliderBtn p-articleSection__sliderBtn--prev js-slider-prev"><img
            src="/wp-content/themes/o-e-n.co.jp/_assets/images/common/slider-arrow-prev.svg" alt="前へ"></button>
        <button class="p-articleSection__sliderBtn p-articleSection__sliderBtn--next js-slider-next"><img
            src="/wp-content/themes/o-e-n.co.jp/_assets/images/common/slider-arrow-next.svg" alt="次へ"></button>
      </div>
    </div>
  </div>
  <!--/ loop end -->
  <!--/ slider -->
  <?php endif; ?>
  <?php endforeach; endif; ?>
</div>

