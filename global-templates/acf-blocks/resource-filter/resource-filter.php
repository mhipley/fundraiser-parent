<div class="resource-filter">
    <form>
    <div class="resource-filter-controls">

    </div>

    <div class="resource-filter-results">

    </div>
    </form>

    <?php 

//    $stepfox_query = new Stepfox_Query();
//    $post_items = $stepfox_query->start_query();
    ?>


        <?php
echo get_template_part('acf-blocks/resource-filter/resource-filter', 'card');
        /*
        if (!empty($post_items)) :
            while ($post_items->have_posts()) : $post_items->the_post();

                        echo get_template_part('acf-blocks/resource-filter', 'card');

            endwhile;
        else :
            _e('Sorry, no posts were found.', 'nkh-fundraising');
        endif;
        */

        ?>

    </div>
</div>