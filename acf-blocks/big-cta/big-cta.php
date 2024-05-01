<?php
$cta_image = get_field('image');
$cta_title = get_field('title');
$image_size = 'full';
$cta_copy = get_field('text');
$no_margin = get_field('no_margin');

$cta_login = get_field('log_in');
if ($cta_login):
  $link_url_1 = $cta_login['url'];
  $link_title_1 = $cta_login['title'];
  $link_target_1 = $cta_login['target'] ? $cta_login['target'] : '_self';
endif;

$cta_question = get_field('questions');
if ($cta_question):
  $link_url_2 = $cta_question['url'];
  $link_title_2 = $cta_question['title'];
  $link_target_2 = $cta_question['target'] ? $cta_question['target'] : '_self';
endif;
?>

<section class="big-cta <?php if ($no_margin === NULL || $no_margin == '1'): ?>no-bottom-margin<?php endif; ?>">

  <div class="big-cta-wrap">

    <?php if ($cta_title): ?>
      <div class="big-cta-title">
        <h3><?php echo $cta_title; ?></h3>
      </div>
    <?php endif; ?>

    <?php if ($cta_copy): ?>
      <div class="big-cta-text">
        <p><?php echo $cta_copy; ?></p>
      </div>
    <?php endif; ?>

    <?php if ($cta_login): ?>
      <div class="big-cta-login">
        <h4><?php echo $link_title_1; ?></h4>
        <a class="button" href="<?php echo esc_url($link_url_1); ?>" target="<?php echo esc_attr($link_target_1); ?>">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="19.25" stroke="white" stroke-width="1.5"/>
            <path d="M18.4614 15.3846L23.0768 20L18.4614 24.6154" stroke="white" stroke-width="1.5"/>
          </svg>
        </a>
      </div>
    <?php endif; ?>

    <?php if ($cta_question): ?>
      <div class="big-cta-more-questions">
        <h4><?php echo $link_title_2; ?></h4>
        <a class="button" href="<?php echo esc_url($link_url_2); ?>" target="<?php echo esc_attr($link_target_2); ?>">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="19.25" stroke="white" stroke-width="1.5"/>
            <path d="M18.4614 15.3846L23.0768 20L18.4614 24.6154" stroke="white" stroke-width="1.5"/>
          </svg>
        </a>
      </div>
    <?php endif; ?>

  </div>

  <div class="big-cta-image" style="background-image: url('<?php echo get_field('image'); ?>');">
<!--    <img src="--><?php //echo get_field('image'); ?><!--"/>-->
  </div>
</section>
