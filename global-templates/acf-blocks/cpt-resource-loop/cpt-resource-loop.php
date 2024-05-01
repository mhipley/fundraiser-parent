<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'resource',
    'post_status' => 'publish',
    'posts_per_page' => 10,
    'paged' => $paged,
);
$arr_posts = new WP_Query($args);
$count_posts = wp_count_posts('resource')->publish;
$slug = basename(get_permalink());
if ($arr_posts->have_posts()) :
?>

<section class="cpt-resource-loop">
  <div class="container">
    <h4>Showing 10 of <?php echo $count_posts; ?> All resources</h4>
    <ul class="cpt-resource">
      <?php
      while ($arr_posts->have_posts()) : $arr_posts->the_post();
        $post_id = get_the_ID();
        $title_d = get_field('title', $post_id);
        $summary = get_field('summary', $post_id);
        $file = get_field('file', $post_id);
        $file_format = get_field('file_format', $post_id);
        $image = get_field('display_image', $post_id);
        $image_size = 'full';

        $video = get_field('video', $post_id);
        $video_url = get_field('video', $post_id, false, false);
        ?>

        <li class="resource">
          <div class="resource-image">
            <?php
            if ($image):
              echo wp_get_attachment_image($image, $image_size);
            endif;
            ?>
          </div>
          <div class="resource-copy">
            <h3><?php echo $title_d; ?></h3>
            <p><?php echo $summary; ?></p>
            <div class="meta-link">
              <span>

                <?php
                $related = explode(', ', the_field('category', $post_id));
                if ($related): ?>
                  <?php foreach ($related as $related): ?>
                    <?php echo $related; ?>
                  <?php endforeach; ?>
                <?php endif; ?>

              </span>
              <?php if ($video): ?>
                <a href="<?php echo $video_url; ?>" target="_blank">Watch Video</a>
              <?php else: ?>
                <?php if ($file_format == 'pdf'): ?>
                  <a download="pdf" href="<?php echo $file; ?>">Download .<?php echo $file_format; ?></a>
                <?php elseif ($file_format == 'jpeg'): ?>
                  <a download="jpg" href="<?php echo $file; ?>">Download .<?php echo $file_format; ?></a>
                <?php elseif ($file_format == 'png'): ?>
                  <a download="png" href="<?php echo $file; ?>">Download .<?php echo $file_format; ?></a>
                <?php elseif ($file_format == 'dox'): ?>
                  <a download="dox" href="<?php echo $file; ?>">Download .<?php echo $file_format; ?></a>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
        </li>
      <?php endwhile ?>
    </ul>
    <div class="cpt-resource-pagination">
      <?php
      $total_pages = $arr_posts->max_num_pages;
      if ($total_pages > 1) {
        $current_page = max(1, get_query_var('paged'));
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text' => __(''),
            'next_text' => __('next'),
            'add_args' => array()
        ));
      }
      ?>
      <a class="last" href="/<?php echo $slug; ?>/page/<?php echo $total_pages; ?>">Last</a>
    </div>
    <?php else : ?>
      <h3><?php _e('404 Error: Not Found', ''); ?></h3>
    <?php endif;
    wp_reset_postdata(); ?>
  </div>
</section>
