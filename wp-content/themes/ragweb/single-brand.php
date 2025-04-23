<?php
get_header();
?>
<?php get_header(); ?>
<style>
    /* Dropcap styling */
    .dropcap:first-letter {
        float: left;
        font-size: 3em;
        line-height: 1;
        margin-right: 0.1em;
    }
</style>



<!-- blog-details-area -->
<section class="blog__details-area">
    <div class="container">
        <div class="blog__inner-wrap">
            <div class="row">
                <div class="col-70">
                    <div class="blog__details-wrap">
                        <div class="blog__details-thumb">

                            <?php
                            $content = get_the_content();
                          ?>


                        </div>
                        <div class="blog__details-content">
                            <h2 class="title">
                                <?php the_title(); ?>
                            </h2>
                            <?php
                            $content = apply_filters('the_content', get_the_content());
                            $content = preg_replace('/<p>/', '<p class="dropcap">', $content, 1);
                            echo $content;
                            ?>
                        </div>

                       
                    </div>
                </div>
                <div class="col-30">
                    <aside class="blog__sidebar">
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title">Latest Posts</h4>
                            <div class="sidebar__post-list">
                                <?php
                                $latest_posts = new WP_Query(array(
                                    'posts_per_page' => 4,
                                    'post_status' => 'publish',
                                ));

                                if ($latest_posts->have_posts()):
                                    while ($latest_posts->have_posts()):
                                        $latest_posts->the_post();
                                        ?>
                                        <div class="sidebar__post-item">
                                            <div class="sidebar__post-thumb">
                                                <a href="<?php the_permalink(); ?>"><img
                                                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>"
                                                        alt="<?php the_title_attribute(); ?>"></a>
                                            </div>
                                            <div class="sidebar__post-content">
                                                <h5 class="title"><a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a></h5>
                                                <span class="date"><i class="flaticon-time"></i>
                                                    <?php echo get_the_date('M d, Y'); ?></span>
                                            </div>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else:
                                    echo '<p>No posts found</p>';
                                endif;
                                ?>
                            </div>
                        </div>

                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title">Tags</h4>
                            <div class="sidebar__tag-list">
                                <ul class="list-wrap">
                                    <?php
                                    // Get tags
                                    $tags = get_tags();

                                    // Loop through each tag
                                    foreach ($tags as $tag):
                                        ?>
                                        <li><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                                                <?php echo esc_html($tag->name); ?>
                                            </a></li>
                                        <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog-details-area-end -->

<section class="blog__area">
    <div class="container">
        <div class="blog__inner-wrap">
            <div class="blog-post-wrap">
                <div class="row gutter-24">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                    );


                    $custom_query = new WP_Query($args);

                    // Check if there are posts
                    if ($custom_query->have_posts()):
                        while ($custom_query->have_posts()):
                            $custom_query->the_post();
                            ?>

                            <div class="col-md-4">
                                <div class="blog__post-two shine-animate-item h-100">
                                    <div class="blog__post-thumb-two">
                                        <a class='shine-animate' href='<?php the_permalink(); ?>'>
                                            <?php if (has_post_thumbnail()): ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('large', array('class' => 'w-100 shadow-sm ratio16', 'loading' => 'lazy', 'alt' => get_the_title())); ?>
                                                </a>
                                            <?php endif; ?>
                                            <?php
                                            $content = get_the_content();
                                            if (strpos($content, 'wp-block-embed-youtube') !== false) {
                                                echo '<div class="plays"><i class="fa-solid fa-video"></i></div>';
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="blog__post-content-two">
                                        <div class="blog-post-meta">
                                            <ul class="list-wrap">
                                                <li>
                                                    <?php echo get_the_category_list(', '); ?>
                                                </li>
                                                <li><i class="fas fa-calendar-alt"></i>
                                                    <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <h2 class="title"><a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a></h2>
                                        <div class="blog-avatar">
                                            <div class="avatar-thumb">
                                                <img src="assets/img/blog/blog_avatar01.png" alt="">
                                            </div>
                                            <div class="avatar-content">
                                                <p>By <a href='blog-details.html'>
                                                        <?php echo esc_html(get_the_author()); ?>
                                                    </a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                        endwhile;
                        wp_reset_postdata(); // Reset the query
                    else:
                        echo '<p>No posts found</p>';
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>



<?php
get_footer();
?>