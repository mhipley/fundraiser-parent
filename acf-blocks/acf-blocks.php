<?php
/**
 * Add ACF gutenberg blocks
 * DO NOT FORGET there is an allow list in the functions.php to turn off all blocks. After registering a block here, add it there to be allowed.
 */
add_theme_support('align-wide');
// Add support for custom line height controls.
add_theme_support('custom-line-height');


add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init()
{

  // Check function exists.
  if (function_exists('acf_register_block_type')) {

    // Register block.
    acf_register_block_type(array(
        'name' => 'cta',
        'title' => __('Cta'),
        'description' => __('Add Cta'),
        'render_template' => 'acf-blocks/cta/cta.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/cta/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'megaphone',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'big-cta',
        'title' => __('Big Cta'),
        'description' => __('Add Big Cta'),
        'render_template' => 'acf-blocks/big-cta/big-cta.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/big-cta/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'megaphone',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'countdown',
        'title' => __('Countdown'),
        'description' => __('Add Countdown'),
        'render_template' => 'acf-blocks/countdown/countdown.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/countdown/style.css',
        'enqueue_script' => get_template_directory_uri() . '/acf-blocks/countdown/countdown.js',
        'category' => 'NKH-Patterns',
        'icon' => 'clock',
        'supports' => array('align' => array('full')),
    ));

    include get_template_directory() . '/acf-blocks/featured-cards/featured-cards-query.php';
    acf_register_block_type(array(
        'name' => 'featured-cards',
        'title' => __('Featured Cards'),
        'description' => __('Add Featured Cards'),
        'render_template' => 'acf-blocks/featured-cards/featured-cards.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/featured-cards/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'columns',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'faq-buttons',
        'title' => __('FAQ buttons'),
        'description' => __('Add FAQ buttons'),
        'render_template' => 'acf-blocks/faq-buttons/faq-buttons.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/faq-buttons/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'lightbulb',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'link-list',
        'title' => __('Link List'),
        'description' => __('Add Link List'),
        'render_template' => 'acf-blocks/link-list/link-list.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/link-list/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'admin-links',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'image-and-text',
        'title' => __('Image And Text'),
        'description' => __('Add Image And Text'),
        'render_template' => 'acf-blocks/image-and-text/image-and-text.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/image-and-text/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'id-alt',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'our-sponsors',
        'title' => __('Our Sponsors'),
        'description' => __('Add Our Sponsors'),
        'render_template' => 'acf-blocks/our-sponsors/our-sponsors.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/our-sponsors/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'megaphone',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'resource-filter',
        'title' => __('Resource Filter'),
        'description' => __('Add Resource Filter'),
        'render_template' => 'acf-blocks/resource-filter/resource-filter.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/resource-filter/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'filter',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'four-cards',
        'title' => __('Four Cards'),
        'description' => __('Add Four Cards'),
        'render_template' => 'acf-blocks/four-cards/four-cards.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/four-cards/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'screenoptions',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'cta-counter',
        'title' => __('CTA Counter'),
        'description' => __('Add CTA Counter'),
        'render_template' => 'acf-blocks/cta-counter/cta-counter.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/cta-counter/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'megaphone',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'partners',
        'title' => __('Partners'),
        'description' => __('Add Partners'),
        'render_template' => 'acf-blocks/partners/partners.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/partners/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'images-alt2',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'copy-block',
        'title' => __('Basic Copy'),
        'description' => __('Add Basic Copy'),
        'render_template' => 'acf-blocks/copy-block/copy-block.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/copy-block/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'text-page',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'fund-raiser',
        'title' => __('Fund Raiser Cards'),
        'description' => __('Add Fund Raiser Cards'),
        'render_template' => 'acf-blocks/fund-raiser-cards/fund-raiser-cards.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/fund-raiser-cards/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'screenoptions',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'login',
        'title' => __('Log In'),
        'description' => __('Add Log In'),
        'render_template' => 'acf-blocks/login/login.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/login/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'universal-access-alt',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'stories',
        'title' => __('Stories'),
        'description' => __('Add Story'),
        'render_template' => 'acf-blocks/stories/stories.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/stories/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'screenoptions',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'copy-area',
        'title' => __('Copy Area'),
        'description' => __('Add Copy Area'),
        'render_template' => 'acf-blocks/copy-area/copy-area.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/copy-area/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'text-page',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'cpt-resource-loop',
        'title' => __('CPT Resource Loop'),
        'description' => __('Add CPT Resource Loop'),
        'render_template' => 'acf-blocks/cpt-resource-loop/cpt-resource-loop.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/cpt-resource-loop/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'list-view',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'cpt-resource-loop-filter',
        'title' => __('CPT Resource Loop w/Filter'),
        'description' => __('Add CPT Resource Loop w/Filter'),
        'render_template' => 'acf-blocks/cpt-resource-loop-filter/cpt-resource-loop-filter.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/cpt-resource-loop-filter/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'list-view',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'five-cards',
        'title' => __('Five Cards'),
        'description' => __('Add Five Cards'),
        'render_template' => 'acf-blocks/five-cards/five-cards.php',
        'enqueue_style' => get_template_directory_uri() . '/acf-blocks/five-cards/style.css',
        'category' => 'NKH-Patterns',
        'icon' => 'screenoptions',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

    acf_register_block_type(array(
        'name' => 'cpt-campaign-resources',
        'title' => __('CPT Campaign Resources'),
        'description' => __('Add CPT Campaign Related Resource'),
        'render_template' => 'acf-blocks/cpt-campaign-resources/cpt-campaign-resources.php',
        // stylesheet is folded into the theme at sass/layouts/_campaign.scss
        'category' => 'NKH-Patterns',
        'icon' => 'list-view',
        'supports' => array(
            'align' => array('wide', 'full'),
            'jsx' => true
        ),
        'align' => 'wide',
    ));

  }
}

// End add_action ACF gutenberg blocks

/**
 * Set ACF's json files to save in this plugin.
 */
add_filter('acf/settings/save_json', function ($path) {
  $path = get_stylesheet_directory() . '/acf-blocks/acf-json';
  return $path;
});

/**
 * Set ACF's json files to load from this plugin.
 */
add_filter('acf/settings/load_json', function ($paths) {

  // unset default load point
  unset($paths[0]);

  $paths[] = get_stylesheet_directory() . '/acf-blocks/acf-json';
  return $paths;

});

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
      'page_title' => 'Theme General Settings',
      'menu_title' => 'Theme Settings',
      'menu_slug' => 'theme-general-settings',
      'capability' => 'edit_posts',
      'redirect' => false
  ));
}

function legit_block_editor_styles()
{
  $block_style = "

main {
    display: flex;
    width: 100%;
    flex-direction: column;
}
div [data-align=wide], .alignwide, div [data-align=wide] .wp-block, .wp-block[data-align=wide]  {
    max-width:1256px;
	margin-left: auto;
    margin-right: auto;
}
.editor-styles-wrapper{padding:0;}
.paragraph-block{max-width:1256px;margin:0 auto;}

";

  wp_register_style('block-style-backend', false);
  wp_enqueue_style('block-style-backend');
  wp_add_inline_style('block-style-backend', $block_style);
}

add_action('enqueue_block_editor_assets', 'legit_block_editor_styles', 1000000);
add_action('wp_head', 'legit_block_editor_styles', 1000000);

// Add support for experimental cover block spacing.
add_theme_support('custom-spacing');

// Add support for custom units.
// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
add_theme_support('custom-units');

// Take out core Gutenberg Blocks by not allowing them
add_filter('allowed_block_types', 'nkh_allowed_block_types');

// Now add in only what you need
function nkh_allowed_block_types($allowed_blocks)
{
  return array(
      'core/block',
    //'core/heading',
    'core/paragraph',
    //'core/separator',
    'core/spacer',
    'core/buttons',
    //'core/video',
    //'acf/countdown',
    //'acf/featured-cards',
    //'acf/resource-filter',
      'acf/big-cta',
      'acf/cta',
      'acf/cta-counter',
      'acf/faq-buttons',
      'acf/image-and-text',
      'acf/four-cards',
      'acf/five-cards',
      'acf/copy-block',
      'acf/cpt-resource-loop',
      'acf/cpt-resource-loop-filter',
      'acf/fund-raiser',
      'acf/link-list',
      'acf/partners',
      'acf/login',
      'acf/stories',
      'acf/copy-area',
      'acf/cpt-campaign-resources'
  );
}

// Add custom block category
function nkh_category($categories, $post)
{
  return array_merge(
      $categories,
      array(
          array(
              'slug' => 'NKH-Patterns',
              'title' => __('NKH-Patterns', 'nkh-patterns'),
          ),
      )
  );
}

add_filter('block_categories', 'nkh_category', 10, 2);