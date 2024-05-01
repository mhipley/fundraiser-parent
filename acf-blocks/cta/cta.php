<?php
$cta_text = get_field('text');
$no_margin = get_field('no_margin');
?>

<section class="cta-block <?php if ($no_margin === NULL || $no_margin == '1'): ?>last<?php endif; ?>">
  <div class="container">
    <div class="cta-text-wrap">
      <?php
      if (!empty($cta_text)): ?>
        <div class="cta-text">
          <p><?php echo $cta_text; ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>