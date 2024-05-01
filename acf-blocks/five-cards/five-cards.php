<?php
$image_size = 'full';
$section_title = get_field('section_title');
?>

<section class="five-cards">
  <div class="container">
        <?php if (!empty($section_title)): ?>
          <h2><?= $section_title; ?></h2>
        <?php endif; ?>

    <ul class="cards">

      <?php if (have_rows('five_card_repeater')):
        while (have_rows('five_card_repeater')) :
          the_row();
          $image = get_sub_field('image') ?: 224;
          $title = get_sub_field('title');
          $is_video = get_sub_field('is_video');
          $category = get_sub_field('category');
          $link = get_sub_field('link');
          if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
          endif;
          ?>

          <li class="cards-item <?php if ($is_video === NULL || $is_video == '1'): ?>video<?php endif; ?>">
            <div class="card">

              <div class="card-image">
                <?php if ($is_video === NULL || $is_video == '1'): ?>
                  <div class="overlay"></div>
                <?php endif; ?>

                <?php if ($image) {
                  echo wp_get_attachment_image($image, $image_size);
                }; ?>
              </div>

              <div class="card-content">
                <?php if ($title): ?>
                  <h3><?php echo $title; ?></h3>
                <?php endif; ?>

                <div class="card-link">
                  <?php if ($link): ?>
                  <span><?php echo $category; ?></span>
                  <?php endif; ?>

                  <?php if ($link): ?>
                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo $link_title; ?></a>
                  <?php endif; ?>
                </div>

              </div>

            </div>
          </li>

        <?php endwhile;
      endif; ?>
    </ul>


  </div>
</section>
