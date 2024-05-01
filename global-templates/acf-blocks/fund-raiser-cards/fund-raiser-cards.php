<?php
$section_title = get_field('section_title') ?: 'Some title here...';
$image_size = 'full';
?>

<section class="fund-raiser-cards">
  <div class="container">

    <?php if (!empty($section_title)): ?>
      <h2><?= $section_title; ?></h2>
    <?php endif; ?>

    <ul class="cards">

      <?php if (have_rows('fund_rasier_cards_repeater')):
        while (have_rows('fund_rasier_cards_repeater')) :
          the_row();
          $image = get_sub_field('image');
          $title = get_sub_field('title');
          $location = get_sub_field('location');
          $amount = get_sub_field('amount_raised');
          $copy = get_sub_field('copy');
          ?>

          <li class="cards-item">
            <div class="card">

              <div class="card-image">
                <?php if ($image) {
                  echo wp_get_attachment_image($image, $image_size);
                }; ?>
              </div>

              <div class="card-content">
                <?php if ($title): ?>
                  <h3><?php echo $title; ?><span><?php echo $location; ?></span></h3>
                <?php endif; ?>

                <?php if ($amount): ?>
                  <h5>Amount Raised: <span>$<?php echo $amount; ?></span></h5>
                <?php endif; ?>

                <?php if ($copy): ?>
                  <p><?php echo $copy; ?></p>
                <?php endif; ?>

              </div>

            </div>
          </li>

        <?php endwhile;
      endif; ?>
    </ul>
  </div>
</section>