<?php
$copy_text = get_field('copy_text');
$has_border = get_field('copy_border');
?>

<section class="copy-area">
  <div class="container">
    <div class="copy-area-wrap<?php if ($has_border === NULL || $has_border == '1'): ?> has-border<?php endif; ?>">
      <?php
      if (!empty($copy_text)): ?>
        <div class="copy">
          <?php echo $copy_text; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>