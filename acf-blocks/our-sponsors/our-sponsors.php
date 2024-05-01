<div class="our-sponsors">
    <div class="sponsors-title">
        <?php echo get_field('title'); ?>
    </div>
    <div class="sponsor-cards">
        <?php
        if (have_rows('sponsor_repeater')):
            while (have_rows('sponsor_repeater')) : the_row();
                ?>


                <div class="sponsor-card">
                    <?php if(get_sub_field('core_partner')){ ?>
                    <div class="sponsor-core-partner">
                        core partner
                    </div>
                    <?php } ?>
                    <img src="<?php echo get_sub_field('image'); ?>"/>
                </div>
            <?php
            endwhile;
        else :

        endif; ?>
    </div>
</div>