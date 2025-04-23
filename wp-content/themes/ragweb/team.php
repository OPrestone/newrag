<?php
/*
Template Name: Management Page Template
*/

get_header();

?>

<!-- team-area -->
<section class="team-area pt-120 pb-90">
    <div class="container">
        <div class="team-item-wrap">
            <div class="row justify-content-center">
                <?php
                // Custom query to retrieve management posts
                $management_query = new WP_Query(array(
                    'post_type' => 'management',
                    'posts_per_page' => -1, // Retrieve all posts
                ));

                // Check if there are any management posts
                if ($management_query->have_posts()) :
                    // Loop through management posts
                    while ($management_query->have_posts()) : $management_query->the_post();
                        // Retrieve post meta data
                        $position = get_post_meta(get_the_ID(), '_management_position', true);
                        $twitter_link = get_post_meta(get_the_ID(), '_management_twitter_link', true);
                        $instagram_link = get_post_meta(get_the_ID(), '_management_instagram_link', true);
                ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="team-item">
                                <div class="team-thumb">
                                    <?php the_post_thumbnail('medium'); ?>
                                    <div class="team-social">
                                        <div class="social-toggle-icon">
                                            <i class="fas fa-share-alt"></i>
                                        </div>
                                        <ul class="list-wrap">
                                            <li><a href="<?php echo esc_url($twitter_link); ?>"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="<?php echo esc_url($instagram_link); ?>"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <h4 class="title"><?php the_title(); ?></h4>
                                    <span><?php echo esc_html($position); ?></span>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata(); // Reset post data query
                else :
                    echo 'No management posts found.';
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
<!-- team-area-end -->

<?php get_footer(); ?>
