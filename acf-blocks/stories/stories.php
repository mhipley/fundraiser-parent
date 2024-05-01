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

      <?php if (have_rows('stories_repeater')):
        while (have_rows('stories_repeater')) :
          the_row();
          $image = get_sub_field('image_aspect');
          $title = get_sub_field('title');
          $category = get_sub_field('category');
          $link = get_sub_field('link');
          if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
          endif;
          ?>

          <li class="cards-item">
            <div class="card">

              <div class="card-image">
                <?php if (!empty($image)): ?>
                  <?php if ($link): ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                    </a>
                  <?php endif; ?>
                <?php endif; ?>
              </div>

              <div class="card-content">
                <?php if ($title): ?>
                  <?php if ($link): ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                      <h3><?php echo $title; ?></h3>
                    </a>
                  <?php endif; ?>
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
