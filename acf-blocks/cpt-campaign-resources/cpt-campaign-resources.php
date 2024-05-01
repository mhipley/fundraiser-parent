<div class="related">

        <div class="wrap">
        
            <section class="description">
                <h3>
                    <?php echo(the_title() .' Resources for You'); ?>
                </h3>

                <p>
                    <?php echo esc_html(the_field('description')); ?>
                </p>
                
                <a class="button" href="/resources/">Browse All Resources</a>
            </section>

            <section class="cpt-resource-loop">

                <div class="container">
                    <h4><?php echo the_title(); ?> resources</h4>

                    <?php
                    $featured_posts = get_field('related_resources');
                    
                    if( $featured_posts ): ?>
                        <ul class="cpt-resource">
                        <?php foreach( $featured_posts as $post ): 
                            
                            $resource_type = get_the_terms( $post, 'Campaign' );
                            $title_d = get_field('title', $post);
                            $image = get_field('display_image', $post);
                            $image_size = 'full';
                            $summary = get_field('summary', $post);
                            $file = get_field('file', $post);
                            $file_format = get_field('file_format', $post);
                            $image = get_field('display_image', $post);
                            $image_size = 'full';
                            $resource_type = get_the_terms( $post->ID, 'Campaign' );
                            $video = get_field('video', $post);
                            $video_url = get_field('video', $post, false, false);

                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post);
                            
                            ?>
                            <li class="resource">

                                <div class="resource-image">
                                    <?php
                                    if ($image):
                                    echo wp_get_attachment_image($image, $image_size);
                                    endif;
                                    ?>
                                </div>

                                <div class="resource-copy">
                                    <h3><?php echo $title_d; ?></h3>
                                    <p><?php echo $summary; ?></p>
                                    <div class="meta-link">
                                    <span>
                                      <?php
                                      $related = explode(', ', the_field('category', $post));
                                      if ($related): ?>
                                        <?php foreach ($related as $related): ?>
                                          <?php echo $related; ?>
                                        <?php endforeach; ?>
                                      <?php endif; ?>

                                    </span>
                                    <?php if ($video): ?>
                                        <a href="<?php echo $video_url; ?>" target="_blank">Watch Video</a>
                                    <?php else: ?>
                                        <?php if ($file_format == 'pdf'): ?>
                                        <a download="pdf" href="<?php echo $file; ?>">Download .<?php echo $file_format; ?></a>
                                        <?php elseif ($file_format == 'jpeg'): ?>
                                        <a download="jpg" href="<?php echo $file; ?>">Download .<?php echo $file_format; ?></a>
                                        <?php elseif ($file_format == 'png'): ?>
                                        <a download="png" href="<?php echo $file; ?>">Download .<?php echo $file_format; ?></a>
                                        <?php elseif ($file_format == 'dox'): ?>
                                        <a download="dox" href="<?php echo $file; ?>">Download .<?php echo $file_format; ?></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    </div>
                                </div>

                            </li>
                        <?php endforeach; ?>
                        </ul>
                        <?php 
                        // Reset the global post object so that the rest of the page works correctly.
                        wp_reset_postdata(); ?>
                    <?php endif; ?>

                </div> <!-- .container -->
            </section>
        
        </div> <!-- .wrap -->

    </div> <!-- .related -->