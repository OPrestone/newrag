<?php
/*
Template Name: Custom Search Results
*/
get_header(); // Include header

// Retrieve search query
$search_query = get_search_query();

// Perform search query
$search_results = new WP_Query(
    array(
        's' => $search_query,
        'post_type' => 'post', // You can adjust the post type if needed
        'posts_per_page' => -1 // Number of posts per page
    )
);
?>

<section class="blog__area">
    <div class="container">
                        <div class="sidebar__widget sidebar__widget-two">
                            <div class="sidebar__search">
                                <div class="sidebar__widget"> 
                                    <form role="search" method="get" class="search-form"
                                        action="<?php echo esc_url(home_url('/')); ?>">
                                        <input type="search" class="search-field" placeholder="Search..."
                                            value="<?php echo get_search_query(); ?>" name="s" />
                                        <button type="submit" class="search-submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M19.0002 19.0002L14.6572 14.6572M14.6572 14.6572C15.4001 13.9143 15.9894 13.0324 16.3914 12.0618C16.7935 11.0911 17.0004 10.0508 17.0004 9.00021C17.0004 7.9496 16.7935 6.90929 16.3914 5.93866C15.9894 4.96803 15.4001 4.08609 14.6572 3.34321C13.9143 2.60032 13.0324 2.01103 12.0618 1.60898C11.0911 1.20693 10.0508 1 9.00021 1C7.9496 1 6.90929 1.20693 5.93866 1.60898C4.96803 2.01103 4.08609 2.60032 3.34321 3.34321C1.84288 4.84354 1 6.87842 1 9.00021C1 11.122 1.84288 13.1569 3.34321 14.6572C4.84354 16.1575 6.87842 17.0004 9.00021 17.0004C11.122 17.0004 13.1569 16.1575 14.6572 14.6572Z"
                                                    stroke="currentcolor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
        <?php
        $search_query = get_search_query();
        $search_results_count = $wp_query->post_count;
        ?>
        <h2>Search results for '
            <?php echo esc_html($search_query); ?>' (
            <?php echo $search_results_count; ?> results)
        </h2>

        <div class="blog__inner-wrap mt-4">
            <div class="blog-post-wrap">
                <div class="row gutter-24">
                    <?php
                    // Display search results
                    if ($search_results->have_posts()):
                        while ($search_results->have_posts()):
                            $search_results->the_post();
                            ?>
                            <div class="col-md-4 mb-4">
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
                                                <p>By <a href='<?php the_permalink(); ?>'>
                                                        <?php echo esc_html(get_the_author()); ?>
                                                    </a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        // Pagination
                        the_posts_pagination();
                    else:
                        // If no posts found
                        ?>
                        <p>No results found for '
                            <?php echo esc_html($search_query); ?>'
                        </p>
                        <?php
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer(); // Include footer
?>