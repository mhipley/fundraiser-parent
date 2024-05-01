<?php
$section_title = get_field('fc_section_title') ?: 'Some title here...';
$image_size = 'full';
$logo_size = 'full';
?>

<section class="four-cards">
  <div class="container">

    <?php if (!empty($section_title)): ?>
      <h2><?= $section_title; ?></h2>
    <?php endif; ?>

    <ul class="cards">

      <?php if (have_rows('four_cards_repeater')):
        while (have_rows('four_cards_repeater')) :
          the_row();
          $image = get_sub_field('fc_image') ?: 224;
          $logo = get_sub_field('fc_logo');
          $title = get_sub_field('fc_title');
          $copy = get_sub_field('fc_copy');
          $link = get_sub_field('fc_link');
          if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
          endif;
          ?>

          <li class="cards-item">
            <div class="card">

              <div class="card-image">
                <?php if ($image): ?>
                  <?php if ($link): ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                  <?php endif; ?>
                  <?php echo wp_get_attachment_image($image, $image_size); ?>
                  <?php if ($link): ?>
                    </a>
                  <?php endif; ?>
                <?php endif; ?>
              </div>

              <div class="card-logo">
                <?php if ($logo): ?>
                  <?php echo wp_get_attachment_image($logo, $logo_size); ?>
                <?php endif; ?>
              </div>

              <div class="card-content">
                <?php if ($title): ?>
                  <?php if ($link): ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                  <?php endif; ?>
                  <h3><?php echo $title; ?></h3>
                  <?php if ($link): ?>
                    </a>
                  <?php endif; ?>
                <?php endif; ?>

                <?php if ($copy): ?>
                  <p><?php echo $copy; ?></p>
                <?php endif; ?>

                <?php if ($link): ?>
                  <a class="card-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <svg class="featured-read-more-icon" width="40" height="40" viewBox="0 0 40 40" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                      <circle cx="20" cy="20" r="19.25" stroke="#FE6A0D" stroke-width="1.5"/>
                      <path d="M18.4616 15.3846L23.077 20L18.4616 24.6154" stroke="#FE6A0D" stroke-width="1.5"/>
                    </svg>
                  </a>
                <?php endif; ?>
              </div>

            </div>
          </li>

        <?php endwhile;
      endif; ?>
    </ul>
  </div>
</section>