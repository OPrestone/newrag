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
    $youtube_video_id = get_youtube_video_id($content);

    if ($youtube_video_id) :
    ?>
            <div class="plyr__video-embed mb-4" id="player">
        <iframe
            src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_video_id); ?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;autoplay=1&amp;muted=1&amp;rel=0&amp;enablejsapi=1"
            allowfullscreen
            allowtransparency
            allow="autoplay"
            height="570"
        ></iframe>
</div>
    <?php endif; ?>

<?php if (has_post_thumbnail() && !$youtube_video_id) : ?>
    <?php the_post_thumbnail('large', array('class' => 'w-100 shadow-sm h500', 'loading' => 'lazy', 'alt' => get_the_title())); ?>
<?php endif; ?>

                   
                                </div>
                                <div class="blog__details-content">
                                    <h2 class="title"><?php the_title(); ?></h2>
                                    <div class="blog-post-meta">
                                        <ul class="list-wrap">
                                            <li>                                  
 <?php 
$categories = get_the_category();

if ($categories) {
    echo '<div class="category-list d-flex">';

    foreach ($categories as $category) {
        echo '<span class="blog__post-tag-two">' . $category->name . '</span>';
    }

    echo '</div>';
}
?> </li>
                                            <li>
                                                <div class="blog-avatar">
                                                <div class="avatar-thumb">
    <?php
    $author_image_url = get_the_author_meta('image');
    if (!empty($author_image_url)) {
        echo '<img src="' . esc_url($author_image_url) . '" alt="">';
    } else {
        // If no image is set, you can display a default placeholder image
        echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/avatar.png" alt="Default Image">';
    }
    ?>
</div>

                                                    <div class="avatar-content">
                                                        <p>By <a href='<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>'> <?php echo get_the_author_meta('display_name'); ?></a></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><i class="fas fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
                                            <li><i class="far fa-comment"></i><a href='@'><?php echo get_comments_number_text( '0 Comments', '1 Comment', '% Comments' ); ?></a></li>
                                        </ul> 
             
                                    </div>  
                                    <?php
    $content = apply_filters('the_content', get_the_content());
    $content = preg_replace('/<p>/', '<p class="dropcap">', $content, 1);
    echo $content;
    ?>
                                    <div class="blog__details-bottom">
                                        <div class="row align-items-center">
                                            <div class="col-md-7">
                                                <div class="post-tags">
                                                    <h5 class="title">Tags:</h5>
                                                    <?php
                            // Display tags
                            $tags = get_the_tags();
                            if ($tags) {
                                echo '<ul class="list-wrap">';
                                foreach ($tags as $tag) {
                                    echo '<li class="btn me-2 mb-2"><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                                }
                                echo '</ul>';
                            }
                            ?>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="post-share">
                                                    <h5 class="title">Share:</h5>
                                                    <ul class="list-wrap">
                                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo rawurlencode(get_the_title()); ?>"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="https://api.whatsapp.com/send?text=<?php echo rawurlencode(get_the_title() . ' - ' . get_the_permalink()); ?>"><i class="fab fa-whatsapp"></i></a></li>
                                                        <li><a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><i class="fab fa-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $author_id = get_the_author_meta('ID');
                                $author_avatar = get_avatar_url($author_id);
                                $author_name = get_the_author_meta('display_name');
                                $author_description = get_the_author_meta('description');
                                ?>

                                <div class="blog__avatar-wrap mb-60">
                                    <div class="blog__avatar-img">
                                        <a href="<?php echo get_author_posts_url($author_id); ?>"><img src="<?php echo $author_avatar; ?>" alt="<?php echo esc_attr($author_name); ?>"></a>
                                    </div>
                                    <div class="blog__avatar-info">
                                        <span class="designation">Author</span>
                                        <h4 class="name"><a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo $author_name; ?></a></h4>
                                        <p><?php echo $author_description; ?></p>
                                    </div>
                                </div>

                                <div class="comments-wrap">
                                    <h3 class="comments-wrap-title"><?php echo get_comments_number_text( '0 Comments', '1 Comment', '% Comments' ); ?></h3>
                                    <div class="latest-comments">
                                        <ul class="list-wrap">
                                            <?php
                                            // Check if comments are open for the post
                                            if (comments_open()) {
                                                // Display the comments
                                                wp_list_comments(array(
                                                    'style'       => 'ul',
                                                    'short_ping'  => true,
                                                    'avatar_size' => 64,
                                                    'callback'    => 'custom_comment_callback', // Custom callback function for comment output
                                                ));
                                            } else {
                                                echo '<p>No comments found.</p>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="latest-comments">
                                        <ul class="list-wrap">
                                <?php
// Get comments for the current post
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( array( 'post_id' => get_the_ID() ) );

// Check if there are comments
if ( $comments ) {
    foreach ( $comments as $comment ) {
        ?>
                                            <li>
                                                <div class="comments-box">
                                                    <div class="comments-avatar">
                                                    <?php echo get_avatar( $comment, 64 ); ?>
                
                                                    </div>
                                                    <div class="comments-text">
                                                        <div class="avatar-name">
                                                            <h6 class="name"><?php echo get_comment_author_link(); ?></h6> <div class="mx-1">|</div>
                                                            <span class="date ml-2"><?php echo get_comment_date( 'F j, Y', $comment ); ?></span>
                                                        </div>
                                                        <p><?php echo get_comment_text(); ?></p> 
                                                    </div>
                                                </div>
                                            </li>
        <?php
    }
} else {
    echo '<li>No comments found.</li>';
}
?>

                                        </ul>
                                    </div> 
                                    <?php
                                    // Customize the comment form
                                    $commenter = wp_get_current_commenter();
                                    $req = get_option( 'require_name_email' );
                                    $aria_req = ($req ? " aria-required='true'" : '');

                                    $fields = array(
                                        'author' =>
                                        '<div class="row">' .
                                        '<div class="col-md-6">' .
                                            '<div class="form-grp">' .
                                            '<input id="author" name="author" type="text" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
                                            '</div>' .
                                            '</div>',
                                        'email' =>
                                            '<div class="col-md-6">' .
                                            '<div class="form-grp">' .
                                            '<input id="email" name="email" type="email" placeholder="Email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' .
                                            '</div>' .
                                            '</div>' .
                                            '</div>',
                                    );

                                    $comment_field = '<div class="form-grp">' .
                                        '<textarea id="comment" name="comment" placeholder="Comment" aria-required="true"></textarea>' .
                                        '</div>';

                                    $args = array(
                                        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
                                        'comment_field' => $comment_field,
                                        'must_log_in' => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
                                        'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
                                        'comment_notes_before' => '<p class="comment-notes">Your email address will not be published. Required fields are marked *</p>',
                                        'comment_notes_after' => '',
                                        'class_submit' => 'btn',
                                        'label_submit' => 'Submit Post'
                                    );

                                    comment_form($args);
                                    ?> 
                            </div>
                        </div>
                        <div class="col-30">
                            <aside class="blog__sidebar">
                                <div class="sidebar__widget sidebar__widget-two">
                                    <div class="sidebar__search">
                                    <div class="sidebar__widget">
                                        <h4 class="sidebar__widget-title">Search</h4>
                                        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                                            <input type="search" class="search-field" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />
                                            <button type="submit" class="search-submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                                    <path d="M19.0002 19.0002L14.6572 14.6572M14.6572 14.6572C15.4001 13.9143 15.9894 13.0324 16.3914 12.0618C16.7935 11.0911 17.0004 10.0508 17.0004 9.00021C17.0004 7.9496 16.7935 6.90929 16.3914 5.93866C15.9894 4.96803 15.4001 4.08609 14.6572 3.34321C13.9143 2.60032 13.0324 2.01103 12.0618 1.60898C11.0911 1.20693 10.0508 1 9.00021 1C7.9496 1 6.90929 1.20693 5.93866 1.60898C4.96803 2.01103 4.08609 2.60032 3.34321 3.34321C1.84288 4.84354 1 6.87842 1 9.00021C1 11.122 1.84288 13.1569 3.34321 14.6572C4.84354 16.1575 6.87842 17.0004 9.00021 17.0004C11.122 17.0004 13.1569 16.1575 14.6572 14.6572Z" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>

                                    </div>
                                </div>
                                <div class="sidebar__widget">
                                    <h4 class="sidebar__widget-title">Categories</h4>
                                    <div class="sidebar__cat-list">
    <ul class="list-wrap">
        <?php 
        $categories = get_categories(); 
        foreach ($categories as $category) :
        ?>
            <li>
                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><i class="flaticon-arrow-button"></i><?php echo esc_html($category->name); ?> (<?php echo esc_html($category->count); ?>)</a>
            </li>
        <?php
        endforeach;
        ?>
    </ul>
</div>

                                </div>
                                <div class="sidebar__widget">
    <h4 class="sidebar__widget-title">Latest Posts</h4>
    <div class="sidebar__post-list">
        <?php 
        $latest_posts = new WP_Query(array(
            'posts_per_page' => 4, 
            'post_status' => 'publish',  
        ));
 
        if ($latest_posts->have_posts()) : 
            while ($latest_posts->have_posts()) :
                $latest_posts->the_post();
        ?>
                <div class="sidebar__post-item">
                    <div class="sidebar__post-thumb">
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="<?php the_title_attribute(); ?>"></a>
                    </div>
                    <div class="sidebar__post-content">
                        <h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <span class="date"><i class="flaticon-time"></i><?php echo get_the_date('M d, Y'); ?></span>
                    </div>
                </div>
        <?php
            endwhile; 
            wp_reset_postdata();
        else : 
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
            foreach ($tags as $tag) :
            ?>
                <li><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a></li>
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
    'post_type'      => 'post',  
    'posts_per_page' => 4,        
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
                                                <p>By <a href='blog-details.html'> <?php echo esc_html(get_the_author()); ?> </a></p>
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



<?php
get_footer();
?> 

