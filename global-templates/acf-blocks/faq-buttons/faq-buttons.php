<section class="faq-buttons" style="background-image:url(<?php echo get_field('background_image'); ?>)">
  <div class="container">
    <div class="faq-cards">
      <?php
      if (have_rows('faq_repeater')):
        while (have_rows('faq_repeater')) :
          the_row();
          $link =   get_sub_field('button_text');
          $title =  get_sub_field('title');
          $text =   get_sub_field('text');
          ?>
          <div class="faq-card">
            <?php if($title): ?>
              <h3><?php echo $title; ?></h3>
            <?php endif; ?>
            <?php if($text): ?>
              <p><?php echo $text; ?></p>
            <?php endif; ?>
            <?php
            if ($link):
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <a class="faq-button <?php echo get_sub_field('button_color') ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
          </div>
        <?php
        endwhile;
      endif; ?>
    </div>
  </div>
</section>