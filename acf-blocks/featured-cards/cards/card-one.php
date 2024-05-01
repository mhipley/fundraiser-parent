<div class="featured-card <?php echo get_field('block_size'); ?>">

  <div class="featured-image">
    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())): ?>
      <?php the_post_thumbnail('featured_half_size');
      if ('video' == get_post_format()): echo '<span class="play-icon"></span>'; endif; ?>
    <?php else: ?>
      <img src="/wp-content/uploads/2021/11/nkh-default.png">
      <?php if ('video' == get_post_format()): echo '<span class="play-icon"></span>';endif; ?>
    <?php endif; ?>
  </div>

  <div class="featured-textbox">

    <div class="featured-logo">
      <?php
      $image = get_field('featured_logo', $post->ID);
      if( !empty( $image ) ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
      <?php endif; ?>
    </div>

    <div class="featured-card-title">
      <h3><?php echo get_the_title(); ?></h3>
    </div>

    <div class="featured-excerpt">
      <p><?php echo wp_trim_words(esc_html(get_the_excerpt()), 30); ?></p>
    </div>

  </div>

  <a class="read-more-wrap" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    <svg class="featured-read-more-icon" width="40" height="40" viewBox="0 0 40 40" fill="none"
         xmlns="http://www.w3.org/2000/svg">
      <circle cx="20" cy="20" r="19.25" stroke="#FE6A0D" stroke-width="1.5"/>
      <path d="M18.4616 15.3846L23.077 20L18.4616 24.6154" stroke="#FE6A0D" stroke-width="1.5"/>
    </svg>
  </a>

</div>