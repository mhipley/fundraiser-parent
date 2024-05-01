<div class="featured-card <?php echo get_field('block_size'); ?>">

  <div class="featured-image">
    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
      <!--      <a href="--><?php //the_permalink(); ?><!--" title="--><?php //the_title(); ?><!--">-->
      <?php
      the_post_thumbnail('featured_half_size');
      if ('video' == get_post_format() && get_term_by('id', get_field('post_format'), 'post_format')->slug == 'post-format-video'): echo '<span class="play-icon"></span>'; endif; ?>
      <!--      </a>-->
    <?php } ?>
  </div>

  <div class="featured-textbox">
    <div class="featured-card-title">
      <?php echo get_the_title(); ?>
    </div>
    <div class="featured-category-link">
      <?php $category = get_the_category();
      if ($category[0]) {
        echo '<a href="' . esc_url(get_category_link($category[0]->term_id)) . '" title="' . esc_attr($category[0]->cat_name) . '">' . esc_html($category[0]->cat_name) . '</a>';
      } ?>
    </div>
    <div class="featured-author">
      <?php //the_author_posts_link(); ?>
      &nbsp;|&nbsp;<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More</a>
    </div>
  </div>

</div>