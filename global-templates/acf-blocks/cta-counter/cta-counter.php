<?php
$cta_text = get_field('copy');
$cta_counter_value = get_field('counter_value');
$cta_counter_copy = get_field('counter_copy');
?>

<section class="cta-counter">
  <div class="container">
    <div class="cta-counter-wrap">

      <div class="cta-counter-value">
      <?php if (!empty($cta_counter_copy)): ?>
          <div class="counter-wrap">
            <div class="counter-value"><?php echo $cta_counter_value; ?></div>
            <div class="counter-text"><?php echo $cta_counter_copy; ?></div>
          </div>
      <?php endif; ?>
      </div>

      <?php if (!empty($cta_text)): ?>
        <div class="cta-counter-copy">
          <h3><?php echo $cta_text; ?></h3>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>
