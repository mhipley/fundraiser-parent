<?php
$title = get_field('title');
$link = get_field('learn_more');
if ($link):
  $link_url = $link['url'];
  $link_title = $link['title'];
  $link_target = $link['target'] ? $link['target'] : '_self';
endif;
?>

<section class="partners-wrapper">
  <div class="container">
    <div class="partners-content">
      <?php if ('$title'): ?>
        <h2><?php echo $title; ?></h2>
      <?php endif; ?>
      <ul>
        <?php
        if (have_rows('partners_list_repeater')):
          while (have_rows('partners_list_repeater')) : the_row();
            $image = get_sub_field('image');
            $size = 'full';
            $partner_title = get_sub_field('partner_title');
            ?>
            <li>
              <?php if ($partner_title): ?>
                <h6><?php echo $partner_title; ?></h6>
              <?php endif; ?>

              <?php if ($image):
                echo wp_get_attachment_image($image, $size);
              endif; ?>
            </li>
          <?php
          endwhile;
        endif;
        ?>
      </ul>
      <a class="read-more" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
    </div>
  </div>
</section>