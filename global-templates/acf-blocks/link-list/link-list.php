<section class="link-list">
  <div class="container">
    <ul>
      <?php
      if (have_rows('link_list')):
        while (have_rows('link_list')) : the_row();
          $link = get_sub_field('link');
          if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
          endif;
          ?>
          <li>
            <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
          </li>
        <?php
        endwhile;
      endif;
      ?>
    </ul>
  </div>
</section>