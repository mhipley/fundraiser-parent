<?php
$section_title = get_field('section_title');
?>

<section class="login-block">
  <div class="container">
    <div class="login-wrap">

      <?php if ($section_title): ?>
        <p><?php echo $section_title; ?></p>
      <?php endif; ?>

      <div class="login-cards">

        <ul class="cards">
          <?php if (have_rows('log_in_repeater')):
            while (have_rows('log_in_repeater')) :
              the_row();
              $title = get_sub_field('title');
              $log_in_link = get_sub_field('log_in_link');
              $register_link = get_sub_field('register_link');
              $register_copy = get_sub_field('register_copy');
              ?>

              <li class="cards-item">

                <div class="card">

                  <div class="card-content">

                    <?php if ($title): ?>
                      <h3><?php echo $title; ?></h3>
                    <?php endif; ?>

                    <?php
                    if ($log_in_link):
                      $link_url = $log_in_link['url'];
                      $link_title = $log_in_link['title'];
                      $link_target = $log_in_link['target'] ? $log_in_link['target'] : '_self';
                      ?>
                      <a class="login-btn <?php echo get_sub_field('button_color') ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>

                    <div class="register-link">
                    <?php
                    if ($register_link):
                      $link_url = $register_link['url'];
                      $link_title = $register_link['title'];
                      $link_target = $register_link['target'] ? $register_link['target'] : '_self';
                      ?>

                      <?php if ($register_copy): ?>
                        <span><?php echo $register_copy; ?></span>
                      <?php endif; ?>

                      <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                    </div>


                  </div>

                </div>

              </li>

            <?php endwhile;
          endif; ?>
        </ul>

      </div>

    </div>
  </div>
</section>