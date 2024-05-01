<div class="featured-cards">

  <div class="container">

  <?php if (get_field('title')) { ?>
    <h2><?php echo get_field('title'); ?></h2>
  <?php } ?>

  <?php
  if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
  }
  $stepfox_query = new Stepfox_Query();
  $post_items = $stepfox_query->start_query();
  ?>

  <div class="featured-loop <?php echo esc_attr($className); ?>">
    <?php if (!empty($post_items)) :
      while ($post_items->have_posts()) : $post_items->the_post();

        if (get_post_type() == 'campaign') {
          echo get_template_part('acf-blocks/featured-cards/cards/card', 'one');
        } elseif (get_post_type() == 'post' || get_post_type() == 'page') {
          echo get_template_part('acf-blocks/featured-cards/cards/card', 'two');
        } elseif (get_post_type() == 'post') {
          // add for resources?
        }
      endwhile;
    else :
      _e('Sorry, no posts were found.', 'nkh-fundraising');
    endif; ?>
  </div>

  </div>

</div>





