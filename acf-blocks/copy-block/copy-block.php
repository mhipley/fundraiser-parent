<section class="copy-block">
  <div class="container">
    <div class="copy-block-wrap">
      <?php
      $copy = get_field('copy');

      if (!empty($copy)): ?>

        <div class="block-copy">
          <p><?php echo $copy; ?></p>
        </div>

      <?php endif; ?>

    </div>
  </div>
</section>