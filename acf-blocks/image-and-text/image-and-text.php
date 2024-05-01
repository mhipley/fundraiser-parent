<?php
$page = get_field('page');
?>

<section class="image-and-text <?php if (!empty($page)): echo esc_html($page->post_title); endif; ?>">
  <div class="container">
    <div class="image-and-text-wrapper <?php echo get_field('position') ?>">
      <div class="image-with-frame">
        <img src="<?php echo get_field('image'); ?>"/>
      </div>
      <div class="text-content-wrapper">
        <h2><?php echo get_field('title'); ?><i></i></h2>
        <div class="text-content-part-one">
          <p><?php echo get_field('content_part_one'); ?></p>
        </div>
        <div class="text-content-part-two">
          <p><?php echo get_field('content_part_two'); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>