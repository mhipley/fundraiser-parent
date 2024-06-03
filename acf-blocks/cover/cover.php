<?php
/**
 * Cover Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$heading = get_field( 'heading' );
$subheading = get_field( 'subheading' );


?>

<section class="cover-block">
  <div class="container">
      <h1><?php echo esc_html( $heading ); ?></h1>
      <h2><?php echo esc_html( $subheading ); ?></h2>
    
  </div>
</section>