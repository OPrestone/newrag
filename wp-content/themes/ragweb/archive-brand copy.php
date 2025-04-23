<?php
get_header();
?>
<?php get_header(); ?>
<style>
    /* Dropcap styling */
    /* .dropcap:first-letter {
        float: left;
        font-size: 3em;
        line-height: 1;
        margin-right: 0.1em;
    } */

    .bottom-posts .cat {
        position: relative;
        top: 15px;
        left: 0;
        transform: translate(0, -50%);
    }

    .image-lightbox {
        width: 100%;
    }
</style>


<?php
// Check if there is a post
if (have_posts()):
    while (have_posts()):
        the_post();
        track_post_views(get_the_ID());
        ?>
        <article <?php post_class(); ?>>

            <div class="container mt-4">

                <div class="bottom-posts">
                    <div class="row">

                        <div class="col-md-9 pb-3">
                            <div class="card border-0">
                                <?php
                                $categories = get_the_category();

                                if ($categories) {
                                    echo '<div class="category-list d-flex">';

                                    foreach ($categories as $category) {
                                        echo '<span class="mb-3 cat me-2">' . $category->name . '</span>';
                                    }

                                    echo '</div>';
                                }
                                ?>
                                <h4 class="title mb-3 mx-3 mx-md-0">
                                    <?php the_title(); ?>
                                </h4>
                                <?php
                                $kicker = get_post_meta(get_the_ID(), '_post_kicker', true);
                                if ($kicker) {
                                    echo '<ul><li class="post-kicker">' . esc_html($kicker) . '</li></ul>';
                                }
                                ?>
                                <?php
                                $content = get_the_content();
                                $youtube_video_id = get_youtube_video_id($content);

                                if ($youtube_video_id):
                                    ?>
                                    <div class="plyr__video-embed mb-4" id="player">
                                        <iframe
                                            src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_video_id); ?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;autoplay=1&amp;muted=1&amp;rel=0&amp;enablejsapi=1"
                                            allowfullscreen allowtransparency allow="autoplay" height="570"></iframe>
                                    </div>
                                <?php endif; ?>
                                <?php if (has_post_thumbnail() && !$youtube_video_id): ?>
                                    <figure>
                                        <?php
                                        the_post_thumbnail('large', [
                                            'class' => 'w-100 shadow-sm h500',
                                            'loading' => 'lazy',
                                            'alt' => get_the_title()
                                        ]);
                                        ?>
                                        <figcaption class="wp-element-caption mb-0">
                                            <?php echo get_the_post_thumbnail_caption(); ?>
                                        </figcaption>
                                    </figure>

                                <?php endif; ?>

                                <div class="content-body mx-0 mt-3">

                                    <div class=" byline">
                                        <div class="sticky-top d-flex justify-content-between align-items-center">
                                            <div class="card border-0">
                                                <div class="row mb-md-4">
                                                    <div class="d-flex">
                                                        <div class="post_thumb">
                                                            <?php echo get_avatar(get_the_author_meta('ID'), 50, '', '', array('class' => 'w-100 shadow-sm circled')); ?>
                                                        </div>
                                                        <div class="ps-2">
                                                            <small class="card-text text-muted"> By
                                                                <span class="mb-3 text-danger">
                                                                    <a
                                                                        href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                                        <?php echo get_the_author_meta('display_name'); ?>
                                                                    </a></span> <br>
                                                                <?php echo get_the_date(); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="social">
                                                <span class="text-white">
                                                    <a href="#" class="border text-dark"><small><i
                                                                class="fa fa-share-alt"></i></small></a>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
                                                        class="bg-fb" target="_blank">
                                                        <i class="fa-brands fa-facebook-f"></i>
                                                    </a>
                                                    <a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"
                                                        class="bg-linkedin" target="_blank">
                                                        <i class="fa-brands fa-linkedin-in"></i>
                                                    </a>
                                                    <a href="https://api.whatsapp.com/send?text=<?php echo rawurlencode(get_the_title() . ' - ' . get_the_permalink()); ?>"
                                                        class="bg-whatsapp" target="_blank">
                                                        <i class="fa-brands fa-whatsapp"></i>
                                                    </a>
                                                    <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo rawurlencode(get_the_title()); ?>"
                                                        class="bg-twitter" target="_blank">
                                                        <i class="fa-brands fa-twitter"></i>
                                                    </a>
                                                </span>

                                            </div>
                                            <div class="py-2 d-none">
                                                <img src="https://placehold.co/90x300?text=Ad+Slot" class="w-100 ad" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="text-center w-100 py-3 bg-light mb-4">
                                            <script async
                                                src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1577441987156578"
                                                crossorigin="anonymous"></script>
                                            <ins class="adsbygoogle" style="display:block; text-align:center;"
                                                data-ad-layout="in-article" data-ad-format="fluid"
                                                data-ad-client="ca-pub-1577441987156578" data-ad-slot="6190445422"></ins>
                                            <script>
                                                (adsbygoogle = window.adsbygoogle || []).push({});
                                            </script>
                                        </div>
                                        <div class="entry-content post-content">
                                            <?php
                                            $content = apply_filters('the_content', get_the_content());
                                            $content = preg_replace('/<p>/', '<p class="dropcap">', $content, 1);
                                            echo $content;
                                            ?>

                                            <script async
                                                src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1577441987156578"
                                                crossorigin="anonymous"></script>
                                            <!-- test -->
                                            <ins class="adsbygoogle" style="display:block"
                                                data-ad-client="ca-pub-1577441987156578" data-ad-slot="2007125006"
                                                data-ad-format="auto" data-full-width-responsive="true"></ins>
                                            <script>
                                                (adsbygoogle = window.adsbygoogle || []).push({});
                                            </script>
                                        </div>

                                        <div class="tags mt-3">
                                            <h5>Topics:</h5>
                                            <?php
                                            // Display tags
                                            $tags = get_the_tags();
                                            if ($tags) {
                                                echo '<div>';
                                                foreach ($tags as $tag) {
                                                    echo '<span class="btn me-2 mb-2"><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></span>';
                                                }
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row py-2 mt-4 next border-bottom border-top mx-0">
                                        <div class="col-6">
                                            <?php previous_post_link('<small class="text-muted">&lt; PREVIOUS ARTICLE</small><h6>%link</h6>'); ?>
                                        </div>
                                        <div class="col-6 border-left">
                                            <?php next_post_link('<small class="text-muted">NEXT ARTICLE &gt;</small><h6>%link</h6>'); ?>
                                        </div>
                                    </div>

                                    <nav>
                                        <div class="nav nav-tabs my-4" id="nav-tab" role="tablist">
                                            <button class="nav-link active text-black" id="nav-home-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                                aria-selected="true">Facebook Comments</button>
                                            <button class="nav-link text-black" id="nav-profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-profile" type="button" role="tab"
                                                aria-controls="nav-profile" aria-selected="false"> Comments</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane show active  fade" id="nav-home" role="tabpanel"
                                            aria-labelledby="nav-home-tab" tabindex="0">
                                            <div class="fb-comments" data-href="<?php the_permalink() ?>" data-width=""
                                                data-numposts="5"></div>
                                        </div>
                                        <div class="tab-pane fade comments" id="nav-profile" role="tabpanel"
                                            aria-labelledby="nav-profile-tab" tabindex="0">
                                            <?php comments_template(); ?>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="bg-light w-100 text-center mb-4">
                                <script async
                                    src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1577441987156578"
                                    crossorigin="anonymous"></script>
                                <!-- article square1 -->
                                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1577441987156578"
                                    data-ad-slot="2977958727" data-ad-format="auto" data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                            <div class="h80 bg-white p-0 sticky-top">

                                <div class="wrapper__list__article">
                                    <h4 class="border_section">Trending Now</h4>
                                </div>

                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 6,
                                );

                                $custom_query = new WP_Query($args);

                                // Check if there are posts
                                if ($custom_query->have_posts()):
                                    $counter = 0;
                                    while ($custom_query->have_posts()):
                                        $custom_query->the_post();
                                        ?>

                                        <?php if ($counter == 0): ?>
                                            <div class="row g-2">
                                                <div class="col-8 mt-0">
                                                    <div class="">
                                                        <?php echo custom_get_post_category(); ?> .
                                                        <small class="card-text text-muted byline">
                                                            <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                                                        </small>
                                                        <h6 class="title-3 mb-0"><a href="<?php the_permalink(); ?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_post_thumbnail('large', array('class' => 'w-100 shadow-sm h400', 'loading' => 'lazy', 'alt' => get_the_title())); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                                <p class="mb-0 mx-0">
                                                    <?php echo wp_trim_words(esc_html(get_the_excerpt()), 13); ?>
                                                </p>
                                            </div>


                                        <?php else: ?>
                                            <div class="row g-2 border-top pt-3 mt-3 mx-0">
                                                <div class="col-8 mt-0 ps-0">
                                                    <div class="pe-1">
                                                        <?php echo custom_get_post_category(); ?> .
                                                        <small class="card-text text-muted byline">
                                                            <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                                                        </small>
                                                        <h6 class="title-3 mb-0"><a href="<?php the_permalink(); ?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-4 pe-0">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_post_thumbnail('large', array('class' => 'w-100 shadow-sm h400', 'loading' => 'lazy', 'alt' => get_the_title())); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php
                                        $counter++;
                                    endwhile;
                                    wp_reset_postdata(); // Reset the query
                                else:
                                    echo '<p>No posts found</p>';
                                endif;
                                ?>
                                <hr>
                                <div class="bg-light w-100 text-center">
                                    <script async
                                        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1577441987156578"
                                        crossorigin="anonymous"></script>
                                    <!-- auto display -->
                                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1577441987156578"
                                        data-ad-slot="1173922460" data-ad-format="auto" data-full-width-responsive="true"></ins>
                                    <script>
                                        (adsbygoogle = window.adsbygoogle || []).push({});
                                    </script>
                                </div>
                                <div class="bg-light-kiss p-3 my-4">
                                    <h5 class="my-3">Subscribe to Our Newsletter</h5>
                                    <form action="">
                                        <input type="text" placeholder="Enter email" class="form-control my-3">
                                        <input type="submit" class="form-control btn btn-warning">
                                        <p>*we hate spam as much as you do</p>
                                    </form>
                                </div>

                                <div class="wrapper__list__article">
                                    <h4 class="border_section">More From
                                        <?php the_author() ?>
                                    </h4>
                                </div>
                                <?php
                                $current_author = get_the_author_meta('ID');
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 6,
                                    'author' => $current_author,
                                    'post__not_in' => array(get_the_ID()), // Exclude current post
                                );

                                $author_posts = new WP_Query($args);

                                if ($author_posts->have_posts()):
                                    while ($author_posts->have_posts()):
                                        $author_posts->the_post();
                                        ?>
                                        <div class="card-body border-bottom">
                                            <?php echo custom_get_post_categories(); ?> .
                                            <small class="card-text text-muted byline">
                                                <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                                            </small>
                                            <h5 class="title-3 mt-2"><a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h5>
                                        </div>


                                        <?php
                                    endwhile;
                                    wp_reset_postdata(); // Reset the query
                                else:
                                    echo '<p>No posts found</p>';
                                endif;
                                ?>
                            </div>
                            <div class="bg-light w-100 text-center">
                                <script async
                                    src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1577441987156578"
                                    crossorigin="anonymous"></script>
                                <ins class="adsbygoogle" style="display:block" data-ad-format="fluid"
                                    data-ad-layout-key="-ef+6k-30-ac+ty" data-ad-client="ca-pub-1577441987156578"
                                    data-ad-slot="7384107595"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                        </div>
                    </div>
        </article>
        <?php
    endwhile;
else:
    echo '<p>No posts found</p>';
endif;
?>
<section>
    <div class="container my-5 top-posts">
        <div class="p-4 mt-5 bg-light text-center d-none">
            <img src="https://placehold.co/970x200?text=Ad+Slot" class="ad mx-auto" alt="">
        </div>


        <div class="right-posts">

            <?php
            // Fetch related posts based on categories
            $args = array(
                'post_type' => 'post', // Post type
                'category__in' => wp_get_post_categories($post->ID), // Get categories of current post
                'posts_per_page' => 4, // Number of related posts to display
                'post__not_in' => array($post->ID), // Exclude current post
            );

            // Create custom query
            $related_query = new WP_Query($args);

            // Check if there are related posts
            if ($related_query->have_posts()):
                echo '<div class="wrapper__list__article">
                    <h4 class="border_section">Related Posts</h4>
                </div> <div class="row h300">';
                while ($related_query->have_posts()):
                    $related_query->the_post();
                    ?>

                    <div class="col-md-3 mb-3">
                        <div class="card border-0 h-100">
                            <?php
                            if (has_post_thumbnail()):
                                ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large', array('class' => 'w-100 shadow-sm ratio16', 'loading' => 'lazy', 'alt' => get_the_title())); ?>
                                </a>
                            <?php else:
                                // If there's no featured image, check for images in the post content
                                $content = apply_filters('the_content', get_the_content());
                                $first_image = get_first_image_from_content($content);

                                if ($first_image):
                                    ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo esc_url($first_image); ?>" class="w-100 shadow-sm ratio16" loading="lazy"
                                            alt="<?php echo esc_attr(get_the_title()); ?>">
                                    </a>
                                <?php endif;
                            endif;
                            ?>
                            <?php
                            $content = get_the_content();
                            if (strpos($content, 'wp-block-embed-youtube') !== false) {
                                echo '<div class="plays"><i class="fa-solid fa-video"></i></div>';
                            }
                            ?>
                            <div class="card-body px-0">
                                <span class="mb-3 text-danger">
                                    <?php echo get_the_category_list(', '); ?>
                                </span> .
                                <small class="card-text text-muted byline">
                                    <?php echo esc_html(get_the_author()); ?> |
                                    <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                                </small>
                                <h5 class="title-2"><a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h5>
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

</section>
<section>
    <div class="container my-5 top-posts">
        <div class="p-4 mt-5 bg-light text-center d-none">
            <img src="https://placehold.co/970x200?text=Ad+Slot" class="ad mx-auto" alt="">
        </div>
        <div class="wrapper__list__article">
            <h4 class="border_section">Latest Posts</h4>
        </div>
        <div class="right-posts">
            <div class="row h300">
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

                        <div class="col-md-3 mb-3">
                            <div class="card border-0 h-100">
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
                                <div class="card-body px-0">
                                    <span class="mb-3 text-danger">
                                        <?php echo get_the_category_list(', '); ?>
                                    </span> .
                                    <small class="card-text text-muted byline">
                                        <?php echo esc_html(get_the_author()); ?> |
                                        <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                                    </small>
                                    <h5 class="title-2"><a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h5>
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

</section>
<?php
wp_footer();
?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v20.0"
    nonce="pmg5q32A"></script>
<script>
    const player = new Plyr('#player');
</script>