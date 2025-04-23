<?php get_header(); ?>

<section class="blog__area">
            <div class="container"> 
        <h2 class="category-title my-4">Category: <?php single_cat_title(); ?></h2>

       
            <div class="blog__inner-wrap mt-4"> 
            <div class="blog-post-wrap">
                <div class="row gutter-24">
                <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'cat'            => get_query_var('cat'), // Retrieve the category ID
        );

        $custom_query = new WP_Query($args);

        // Check if there are posts
        if ($custom_query->have_posts()) :
            while ($custom_query->have_posts()) : $custom_query->the_post();
        ?>
                        <div class="col-md-4">
                            <div class="blog__post-two shine-animate-item h-100">
                                <div class="blog__post-thumb-two">
                                    <a class='shine-animate' href='<?php the_permalink(); ?>'>
                                    <?php if (has_post_thumbnail()) : ?>
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
                                            <li><i class="fas fa-calendar-alt"></i><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></li>
                                        </ul>
                                    </div>
                                    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="blog-avatar">
                                        <div class="avatar-thumb">
                                            <img src="assets/img/blog/blog_avatar01.png" alt="">
                                        </div>
                                        <div class="avatar-content">
                                            <p>By <a href='<?php the_permalink(); ?>'> <?php echo esc_html(get_the_author()); ?> </a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
              
        <?php
            endwhile;
            wp_reset_postdata(); // Reset the query
        else :
            echo '<p>No posts found</p>';
        endif;
        ?>

</div>
            </div>  
        </div>

    </div>
</section>

<?php get_footer(); ?>
