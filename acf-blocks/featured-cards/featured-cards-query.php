<?php


if (!class_exists('Stepfox_Query')) {


    class Stepfox_Query
    {


        function __construct()
        {
            //add_action('start_query', array( $this, 'start_query'));
            //echo 'deeee';
//            add_action('end_query', array( $this, 'end_query' ));
            //var_dump($this->start_query());
        }

        function start_query()
        {


            if (get_field('source') == 'manual_selection') {
                $stepfox_posts = $this->manual_selection();
            }

            if (get_field('source') == 'current_archive') {
                $stepfox_posts = $this->current_archive();
            }

            if (get_field('source') == 'popular_posts') {
                $stepfox_posts = $this->popular_posts();
            }

            if (get_field('source') == 'related_posts') {
                $stepfox_posts = $this->related_posts();
            }

            $args = array(
                'public' => true,
            );
            $output = 'objects'; // names or objects, note names is the default
            $post_types = get_post_types($args, $output);
            foreach ($post_types as $post_type) {
                if (get_field('source') == $post_type->name) {
                    $stepfox_posts = $this->post();
                }
            }


            return $stepfox_posts;

        }

        function current_archive()
        {
            global $wp_query;

			global $paged;
			if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
				elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
				else { $paged = 1; }
				$paged_offset = (($paged-1) * get_field('posts_count')) + get_field('offset_posts');

            $wp_query->set('posts_per_page', get_field('posts_count'));
            $wp_query->set('offset', $paged_offset );

            $stepfox_posts = new WP_Query($wp_query->query_vars);
            return $stepfox_posts;
        }

        function manual_selection()
        {
            $manual_selection = get_field('manual_selection');

            if(!empty($manual_selection)){
                $args = array('post__in' => $manual_selection, 'post_type' => 'any');
                $stepfox_posts = new WP_Query($args);
                return $stepfox_posts;
            }else{
                echo '<h2>Pick Some Posts Please.</h2>';
            }
        }

        function popular_posts()
        {
            $popular_post = get_field('popular_posts');

            $category = get_field('category');

            $number = get_field('posts_count');

            $args = array(
                'cat' => $category,
                'posts_per_page' => $number,
                'meta_key' => 'stepfox_post_views_count',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
            );


            if ($popular_post == 'week') {
                $week = date('W');
                $args['w'] = $week;
            } elseif ($popular_post == 'year') {
                $year = date('Y');
                $args['year'] = $year;
            } elseif ($popular_post == 'month') {
                $month = date('m');
                $args['monthnum'] = $month;
            }


            $stepfox_posts = new WP_Query($args);
            return $stepfox_posts;
        }

        function related_posts()
        {
            $manual_selection = get_field('manual_selection');
            $args = array('post__in' => $manual_selection);
            $stepfox_posts = new WP_Query($args);
            return $stepfox_posts;
        }


        function post()
        {
            $number = get_field('posts_count');

            $args = array( 'posts_per_page' => $number);
            $taxonomy_objects = get_object_taxonomies(get_field('source'), 'objects');
            foreach ($taxonomy_objects as $taxonomy_object) {
                if(!empty(get_field($taxonomy_object->name))) {
                    $args['tax_query'] = array(array('taxonomy' => $taxonomy_object->name, 'field' => 'id', 'terms' => array(get_field($taxonomy_object->name))));
                }
            }
             $args['post_type'] = get_field('source');
            $args['offset'] = get_field('offset_posts');
            $args['order'] = get_field('order');
            $args['orderby'] = get_field('order_by');
            if(get_field('order_by') == 'meta_value'){
               $args['meta_key'] = 'key';
            }




            $stepfox_posts = new WP_Query($args);
            return $stepfox_posts;
        }
    }

    //new Stepfox_Query();
}


function stepfox_query_fields($section_slug)
{

    if (function_exists('acf_add_local_field_group')):

        acf_add_local_field_group(array(
            'key' => 'block_post_query' . $section_slug,
            'title' => 'Posts Query',
            'fields' => array(array(
                'key' => 'field_5f223cae7a494',
                'label' => 'Query',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
                array(
                    'key' => 'field_5f202be885bab',
                    'label' => 'Source',
                    'name' => 'source',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'manual_selection' => 'Manual Selection',
                        'current_archive' => 'Current Archive',
                        'related_posts' => 'Related Posts',
                        'popular_posts' => 'Popular Posts',
                        'post' => 'Posts',
                        'page' => 'Pages',
                        'attachment' => 'Media',
                    ),
                    'default_value' => 'post',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_5f20bb06b2f5f',
                    'label' => 'Manual Selection',
                    'name' => 'manual_selection',
                    'type' => 'post_object',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5f202be885bab',
                                'operator' => '==',
                                'value' => 'manual_selection',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'post_type' => '',
                    'taxonomy' => '',
                    'allow_null' => 0,
                    'multiple' => 1,
                    'return_format' => 'id',
                    'ui' => 1,
                ),
                array(
                    'key' => 'field_1231232123123344356',
                    'label' => 'Current Archive Preview',
                    'name' => 'current_archive_preview',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5f202be885bab',
                                'operator' => '==',
                                'value' => 'current_archive',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(),
                    'default_value' => false,
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_5f222e510c6d1',
                    'label' => 'Related Posts',
                    'name' => 'related_posts',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5f202be885bab',
                                'operator' => '==',
                                'value' => 'related_posts',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'related_by_author' => 'Related by author',
                        'related_by_category' => 'Related by category',
                        'related_by_tags' => 'Related by tags',
                    ),
                    'default_value' => false,
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_5f222f156186a',
                    'label' => 'Popular Posts',
                    'name' => 'popular_posts',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5f202be885bab',
                                'operator' => '==',
                                'value' => 'popular_posts',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'week' => 'week',
                        'month' => 'month',
                        'year' => 'year',
                        'forever' => 'forever',
                    ),
                    'default_value' => false,
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_5f20bcc416fad',
                    'label' => 'Posts Count',
                    'name' => 'posts_count',
                    'type' => 'number',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5f202be885bab',
                                'operator' => '!=',
                                'value' => 'manual_selection',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 3,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => 1,
                    'max' => '',
                    'step' => '',
                ),
                array(
                    'key' => 'field_5f20bcc416fae',
                    'label' => 'Offset Posts',
                    'name' => 'offset_posts',
                    'type' => 'number',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5f202be885bab',
                                'operator' => '!=',
                                'value' => 'manual_selection',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 0,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => 0,
                    'max' => '',
                    'step' => '',
                ),
                array(
                    'key' => 'field_5f20bcc416faf',
                    'label' => 'Order',
                    'name' => 'order',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5f202be885bab',
                                'operator' => '!=',
                                'value' => 'manual_selection',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'DESC' => 'DESC',
                        'ASC' => 'ASC',
                    ),
                    'default_value' => false,
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_5f20bcc416fb0',
                    'label' => 'Order by',
                    'name' => 'order_by',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5f202be885bab',
                                'operator' => '!=',
                                'value' => 'manual_selection',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'post_date' => 'Date',
                        'rand' => 'Random',
                        'post_title' => 'Title',
                        'meta_value' => 'Custom Field',
                    ),
                    'default_value' => false,
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_5f20bcc416fb1',
                    'label' => 'Custom Field',
                    'name' => 'custom_field',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5f20bcc416fb0',
                                'operator' => '==',
                                'value' => 'meta_value',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/' . acf_slugify($section_slug),
                    ),
                ),
            ),
            'menu_order' => 5,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));


        $args = array(
            'public' => true,

        );

        $output = 'objects'; // names or objects, note names is the default


        $post_types = get_post_types($args, $output);
//$taxonomy_object->label
//$taxonomy_object->name
        foreach ($post_types as $post_type) {


            $taxonomy_objects = get_object_taxonomies($post_type->name, 'objects');
            foreach ($taxonomy_objects as $taxonomy_object) {
                acf_add_local_field(
                    array(
                        'key' => 'field_5f2' . $taxonomy_object->name,
                        'label' => $taxonomy_object->label,
                        'name' => $taxonomy_object->name,
                        'type' => 'taxonomy',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_5f202be885bab',
                                    'operator' => '==',
                                    'value' => $post_type->name,
                                ),
                            ),
//                             array(
//                                array(
//                                    'field' => 'field_5f202be885bab',
//                                    'operator' => '==',
//                                    'value' => 'popular_posts',
//                                ),
//                             ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'taxonomy' => $taxonomy_object->name,
                        'field_type' => 'select',
                        'add_term' => 0,
                        'parent' => 'block_post_query' . $section_slug,
                        'save_terms' => 0,
                        'load_terms' => 0,
                        'return_format' => 'id',
                        'multiple' => 0,
                        'allow_null' => 1,
                    ));

            }
        }


    endif;


}

add_filter('acf/load_field/name=source', 'acf_load_post_types');
stepfox_query_fields("featured-cards");
function acf_load_post_types($field)
{


    $args = array(
        'public' => true,
    );

    $output = 'objects'; // names or objects, note names is the default


    $post_types = get_post_types($args, $output);

    foreach ($post_types as $post_type) {
        $field['choices'][$post_type->name] = $post_type->label;
    }

    // return the field
    return $field;
}


add_filter('acf/load_field/name=current_archive_preview', 'current_archive_preview_field_populate');

function current_archive_preview_field_populate($field)
{


    $args = array(
        'public' => true,
    );

    $output = 'objects'; // names or objects, note names is the default

    $post_types = get_post_types($args, $output);

    foreach ($post_types as $post_type) {

        $taxonomy_objects = get_object_taxonomies($post_type->name, 'objects');
        foreach ($taxonomy_objects as $taxonomy_object) {
            $field['choices'][$taxonomy_object->name] = $taxonomy_object->label;
        }
    }


    return $field;
}

?>