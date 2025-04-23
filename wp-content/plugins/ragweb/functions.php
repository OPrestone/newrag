<?php
function enqueue_custom_styles_and_scripts() {
    // Enqueue stylesheets
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.min.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.min.css');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/css/flaticon.css');
    wp_enqueue_style('odometer', get_template_directory_uri() . '/assets/css/odometer.css');
    wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.css');
    wp_enqueue_style('aos', get_template_directory_uri() . '/assets/css/aos.css');
    wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
    // Enqueue other stylesheets...

    // Enqueue scripts
   // Enqueue scripts
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), null, true);
    wp_enqueue_script('odometer', get_template_directory_uri() . '/assets/js/jquery.odometer.min.js', array('jquery'), null, true);
    wp_enqueue_script('appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array('jquery'), null, true);
    wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/js/gsap.js', array(), null, true);
    wp_enqueue_script('ScrollTrigger', get_template_directory_uri() . '/assets/js/ScrollTrigger.js', array(), null, true);
    wp_enqueue_script('SplitText', get_template_directory_uri() . '/assets/js/SplitText.js', array(), null, true);
    wp_enqueue_script('gsap-animation', get_template_directory_uri() . '/assets/js/gsap-animation.js', array(), null, true);
    wp_enqueue_script('parallaxScroll', get_template_directory_uri() . '/assets/js/jquery.parallaxScroll.min.js', array(), null, true);
    wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.js', array(), null, true);
    wp_enqueue_script('ajax-form', get_template_directory_uri() . '/assets/js/ajax-form.js', array(), null, true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), null, true);
    wp_enqueue_script('aos', get_template_directory_uri() . '/assets/js/aos.js', array(), null, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);
    
    // Enqueue other scripts...

    // Inline script
    wp_add_inline_script( 'main', 'function rangeSlide(value) {
        document.getElementById("rangeValue").innerHTML = value;
    }', 'after' );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');

// Append scripts before </body> tag
function append_scripts_before_body_tag() {
    // Enqueue additional scripts
    wp_enqueue_script('your-script', get_template_directory_uri() . '/assets/js/your-script.js', array(), null, true);
    // Enqueue other scripts...
}
add_action('wp_footer', 'append_scripts_before_body_tag');




add_theme_support('post-thumbnails');


function register_main_menu() {
    register_nav_menu('main-menu', __('Main Menu'));
}

add_action('after_setup_theme', 'register_main_menu');

$categories = get_the_category();
$separator = ', ';

if ($categories) {
    $output = '';

    // Display only the first category
    $output .= '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" title="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $categories[0]->name)) . '">' . esc_html($categories[0]->name) . '</a>' . $separator;

    echo trim($output, $separator); // Trim the trailing separator
}

function display_related_posts_in_content($content) {
    // Define the number of paragraphs after which to display related posts
    $paragraph_number = 5;

    // Check if we are on a single post and it has more than the specified number of paragraphs
    if (is_single() && substr_count($content, '</p>') > $paragraph_number) {
        // Split the content into paragraphs
        $paragraphs = explode('</p>', $content);

        // Insert related posts after the specified paragraph number
        array_splice($paragraphs, $paragraph_number, 0, get_related_posts_html());

        // Join the paragraphs back into the content
        $content = implode('</p>', $paragraphs);
    }

    return $content;
}
function get_related_posts_html() {
    $post_id = get_the_ID();

    // Get post tags and categories
    $post_tags = wp_get_post_tags($post_id);
    $post_categories = get_the_category($post_id);

    // Combine tag and category IDs into an array
    $tag_and_category_ids = array();

    foreach ($post_tags as $tag) {
        $tag_and_category_ids[] = $tag->term_id;
    }

    foreach ($post_categories as $category) {
        $tag_and_category_ids[] = $category->term_id;
    }

    // Remove duplicates
    $tag_and_category_ids = array_unique($tag_and_category_ids);

    // Customize the query parameters as needed for your related posts
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'post__not_in'   => array($post_id), // Exclude the current post
        'tax_query'      => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'id',
                'terms'    => $tag_and_category_ids,
            ),
            array(
                'taxonomy' => 'category',
                'field'    => 'id',
                'terms'    => $tag_and_category_ids,
            ),
        ),
    );

    $related_posts = new WP_Query($args);

    // Check if there are related posts
    if ($related_posts->have_posts()) {
        ob_start(); // Start output buffering

        // Display the related posts HTML
        echo '<div class="related-posts">';
        echo '<h3 class="title-section">Read Also</h3>';
        echo '<ul>';

        while ($related_posts->have_posts()) {
            $related_posts->the_post();

            // Check if the post content contains a video
            $has_video = has_video_content(get_the_content());

            echo '<li>';
            echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';

            // Add play icon if the post has a video
            if ($has_video) {
                echo '<p class="fas fa-play">ugh</p>';
            }

            echo '</li>';
        }

        echo '</ul>';
        echo '</div>';

        wp_reset_postdata(); // Reset the query
        return ob_get_clean(); // Return the buffered output
    }

    return ''; // Return an empty string if no related posts
}

add_filter('the_content', 'display_related_posts_in_content');

function track_post_views($post_id) {
    $key = 'post_views';
    $views = get_post_meta($post_id, $key, true);
    $views = ($views) ? $views : 0;
    $views++;
    update_post_meta($post_id, $key, $views);
}

function get_youtube_video_id($content) {
    // Regular expression to match YouTube video URLs or embed codes
    $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
    
    // Perform the regular expression match
    preg_match($pattern, $content, $matches);

    // Check if a match is found and return the video ID
    return !empty($matches[1]) ? $matches[1] : false;
}


$categories = get_the_category();
$separator = ' > ';

if ($categories) {
    $output = '';
    $count = 0;

    foreach ($categories as $category) {
        $output .= '<span class="mb-3 cat">' . esc_html($category->name) . '</span>' . $separator;

        $count++;
        if ($count >= count($categories) - 1) {
            break;
        }
    }

    echo trim($output, $separator); // Trim the trailing separator
}

// Create Personality post type
function create_personality_post_type() {
    register_post_type('personality',
        array(
            'labels' => array(
                'name' => __('Personalities'),
                'singular_name' => __('Personality')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'personalities'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_personality_post_type');

// Add custom fields for Personality
function add_personality_meta_boxes() {
    add_meta_box(
        'personality_info_meta_box',
        'Personality Information',
        'display_personality_meta_box',
        'personality',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes_personality', 'add_personality_meta_boxes');

// Display Personality meta box
function display_personality_meta_box($post) {
    // Retrieve current Personality information
    $twitter_link = get_post_meta($post->ID, '_personality_twitter_link', true);
    $instagram_link = get_post_meta($post->ID, '_personality_instagram_link', true);

    // Display input fields for Personality information
    ?>
    <label for="personality_twitter_link">Twitter Link:</label>
    <input type="text" id="personality_twitter_link" name="personality_twitter_link" value="<?php echo esc_url($twitter_link); ?>" />

    <label for="personality_instagram_link">Instagram Link:</label>
    <input type="text" id="personality_instagram_link" name="personality_instagram_link" value="<?php echo esc_url($instagram_link); ?>" />
    <?php
}
 

// Save Personality meta data
function save_personality_meta_data($post_id) {

    if (isset($_POST['personality_twitter_link'])) {
        update_post_meta($post_id, '_personality_twitter_link', esc_url($_POST['personality_twitter_link']));
    }

    if (isset($_POST['personality_instagram_link'])) {
        update_post_meta($post_id, '_personality_instagram_link', esc_url($_POST['personality_instagram_link']));
    }
}
add_action('save_post_personality', 'save_personality_meta_data');
