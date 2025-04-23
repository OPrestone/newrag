<?php
function enqueue_custom_styles_and_scripts()
{
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
    wp_add_inline_script('main', 'function rangeSlide(value) {
        document.getElementById("rangeValue").innerHTML = value;
    }', 'after');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');

// Append scripts before </body> tag
function append_scripts_before_body_tag()
{
    // Enqueue additional scripts
    wp_enqueue_script('your-script', get_template_directory_uri() . '/assets/js/your-script.js', array(), null, true);
    // Enqueue other scripts...
}
add_action('wp_footer', 'append_scripts_before_body_tag');




add_theme_support('post-thumbnails');



$categories = get_the_category();
$separator = ', ';

if ($categories) {
    $output = '';

    // Display only the first category
    $output .= '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" title="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $categories[0]->name)) . '">' . esc_html($categories[0]->name) . '</a>' . $separator;

    echo trim($output, $separator); // Trim the trailing separator
}

function track_post_views($post_id)
{
    $key = 'post_views';
    $views = get_post_meta($post_id, $key, true);
    $views = ($views) ? $views : 0;
    $views++;
    update_post_meta($post_id, $key, $views);
}

function get_youtube_video_id($content)
{
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


function theme_prefix_setup()
{
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'theme_prefix_setup');

function custom_comment_callback($comment, $args, $depth)
{
    $tag = ('div' === $args['style']) ? 'div' : 'li';
    ?>
    <<?php echo $tag; ?> id="comment-
        <?php comment_ID(); ?>" <?php comment_class('comments-box'); ?>>
        <div class="comments-avatar">
            <?php if (0 != $args['avatar_size'])
                echo get_avatar($comment, $args['avatar_size']); ?>
        </div>
        <div class="comments-text">
            <div class="avatar-name">
                <h6 class="name">
                    <?php echo get_comment_author_link(); ?>
                </h6>
                <span class="date">
                    <?php echo get_comment_date(); ?>
                </span>
            </div>
            <?php comment_text(); ?>
            <div class="reply">
                <?php
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'],
                            'reply_text' => 'Reply',
                            'before' => '',
                            'after' => '',
                        )
                    )
                );
                ?>
            </div>
        </div>
    </<?php echo $tag; ?>>
    <?php
}
// Add custom post type for call backs
function register_call_back_post_type()
{
    $args = array(
        'public' => true,
        'label' => 'Call Backs',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon' => 'dashicons-phone',
    );
    register_post_type('call_back', $args);
}
add_action('init', 'register_call_back_post_type');

// Handle form submission and save to custom post type
function handle_call_back_submission()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle form submission
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Validate form data (you can add more validation if needed)
        if (!empty($name) && !empty($email) && !empty($phone)) {
            // Save form data to custom post type
            $post_id = wp_insert_post(array(
                'post_title' => $name,
                'post_type' => 'call_back',
                'post_status' => 'publish',
            ));

            // Save form data as post meta
            if ($post_id) {
                update_post_meta($post_id, 'name', $name);
                update_post_meta($post_id, 'email', $email);
                update_post_meta($post_id, 'phone', $phone);
            }

            // Redirect to success page
            wp_redirect(home_url('/')); // Change '/success' to your desired success page URL
            exit;
        }
    }
}
add_action('init', 'handle_call_back_submission');

// Add custom column for form entries on custom post type page
function custom_post_type_columns($columns)
{
    // Define custom columns
    $new_columns = array(
        'name' => 'Name',
        'email' => 'Email',
        'phone' => 'Phone',
    );

    // Remove default columns
    unset($columns['title']);
    unset($columns['author']);
    unset($columns['comments']);

    // Merge new columns with existing columns
    return array_merge($new_columns, $columns);
}
add_filter('manage_call_back_posts_columns', 'custom_post_type_columns');

// Populate custom column with form entry data in table format
function custom_post_type_column_content($column_name, $post_ID)
{
    if ($column_name === 'name') {
        $name = get_post_meta($post_ID, 'name', true);
        echo esc_html($name);
    }
    if ($column_name === 'email') {
        $email = get_post_meta($post_ID, 'email', true);
        echo esc_html($email);
    }
    if ($column_name === 'phone') {
        $phone = get_post_meta($post_ID, 'phone', true);
        echo esc_html($phone);
    }
}
add_action('manage_call_back_posts_custom_column', 'custom_post_type_column_content', 10, 2);


// Create management post type
function create_management_post_type()
{
    register_post_type(
        'management',
        array(
            'labels' => array(
                'name' => __('Management'),
                'singular_name' => __('management')
            ),
            'menu_icon' => 'dashicons-businessperson',
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'personalities'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_management_post_type');


// Add custom fields for management
function add_management_meta_boxes()
{
    add_meta_box(
        'management_info_meta_box',
        'management Information',
        'display_management_meta_box',
        'management',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes_management', 'add_management_meta_boxes');

// Display management meta box
function display_management_meta_box($post)
{
    // Retrieve current management information
    $twitter_link = get_post_meta($post->ID, '_management_twitter_link', true);
    $instagram_link = get_post_meta($post->ID, '_management_instagram_link', true);
    $position = get_post_meta($post->ID, '_management_position', true);

    // Display input fields for management information
    ?>

    <label for="management_twitter_link">Management Position:</label>
    <input type="text" id="management_position" name="management_position" value="<?php echo esc_attr($position); ?>" />

    <label for="management_twitter_link">Twitter Link:</label>
    <input type="text" id="management_twitter_link" name="management_twitter_link"
        value="<?php echo esc_url($twitter_link); ?>" />

    <label for="management_instagram_link">Instagram Link:</label>
    <input type="text" id="management_instagram_link" name="management_instagram_link"
        value="<?php echo esc_url($instagram_link); ?>" />
    <?php
}


// Save management meta data
function save_management_meta_data($post_id)
{

    if (isset($_POST['management_position'])) {
        update_post_meta($post_id, '_management_position', sanitize_text_field($_POST['management_position']));
    }

    if (isset($_POST['management_twitter_link'])) {
        update_post_meta($post_id, '_management_twitter_link', esc_url($_POST['management_twitter_link']));
    }

    if (isset($_POST['management_instagram_link'])) {
        update_post_meta($post_id, '_management_instagram_link', esc_url($_POST['management_instagram_link']));
    }
}
add_action('save_post_management', 'save_management_meta_data');

// Create faq post type
function create_faq_post_type()
{
    register_post_type(
        'faq',
        array(
            'labels' => array(
                'name' => __('FAQs'),
                'singular_name' => __('faq')
            ),
            'menu_icon' => 'dashicons-info',
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'faq'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_faq_post_type');

// Register Main Menu
function register_main_menu()
{
    register_nav_menu('main-menu', __('Main Menu'));
}
add_action('after_setup_theme', 'register_main_menu');

// Create case post type
function create_case_post_type()
{
    register_post_type(
        'casestudy',
        array(
            'labels' => array(
                'name' => __('Casestudies'),
                'singular_name' => __('casestudy')
            ),
            'menu_icon' => 'dashicons-share',
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'casestudy'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_case_post_type');

// Create Brand post type
function create_brand_post_type()
{
    register_post_type(
        'brand',
        array(
            'labels' => array(
                'name' => __('Our Brands'),
                'singular_name' => __('brand')
            ),
            'menu_icon' => 'dashicons-clipboard',
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'brand'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );

    // Register Brand Categories
    register_taxonomy('brand_category', 'brand', array(
        'labels' => array(
            'name' => __('Brand Categories'),
            'singular_name' => __('Brand Category'),
            'search_items' => __('Search Brand Categories'),
            'all_items' => __('All Brand Categories'),
            'edit_item' => __('Edit Brand Category'),
            'update_item' => __('Update Brand Category'),
            'add_new_item' => __('Add New Brand Category'),
            'new_item_name' => __('New Brand Category Name'),
            'menu_name' => __('Brand Categories'),
        ),
        'hierarchical' => true, // Set to false for tags-like behavior
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'brand-category'),
    ));
}
add_action('init', 'create_brand_post_type');

// Add Custom Field to "Brand" Post Type
function add_brand_meta_box()
{
    add_meta_box(
        'brand_website_meta_box', // Unique ID
        'Brand Website', // Box Title
        'brand_website_meta_box_callback', // Callback Function
        'brand', // Post Type
        'normal', // Context
        'high' // Priority
    );
}
add_action('add_meta_boxes', 'add_brand_meta_box');

// Callback Function to Display Input Field
function brand_website_meta_box_callback($post)
{
    $brand_website = get_post_meta($post->ID, 'brand_website', true);
    ?>
    <label for="brand_website">Website URL:</label>
    <input type="url" id="brand_website" name="brand_website" value="<?php echo esc_attr($brand_website); ?>"
        style="width: 100%;">
    <?php
}

// Save Custom Field Data
function save_brand_meta_data($post_id)
{
    if (isset($_POST['brand_website'])) {
        update_post_meta($post_id, 'brand_website', sanitize_text_field($_POST['brand_website']));
    }
}
add_action('save_post', 'save_brand_meta_data');

function get_brand_website($post_id) {
    $brand_website = get_post_meta($post_id, 'brand_website', true);
    return (!empty($brand_website)) ? esc_url($brand_website) : false;
}


function handle_contact_form_submission()
{
    if (isset($_POST['action']) && $_POST['action'] === 'submit_contact_form') {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $message = sanitize_textarea_field($_POST['message']);

        // Insert data into the database
        global $wpdb;
        $table_name = $wpdb->prefix . 'contact_form_submissions';

        $wpdb->insert(
            $table_name,
            [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'message' => $message,
                'submitted_at' => current_time('mysql')
            ]
        );

        // Redirect to a thank you page or display a success message
        wp_redirect(home_url('/thank-you/'));
        exit;
    }
}
add_action('admin_post_nopriv_submit_contact_form', 'handle_contact_form_submission');
add_action('admin_post_submit_contact_form', 'handle_contact_form_submission');
function create_contact_form_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_form_submissions';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        phone varchar(15) NULL,
        message text NOT NULL,
        submitted_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'create_contact_form_table');
function add_contact_form_menu()
{
    add_menu_page(
        'Contact Form Submissions',
        'Contact Submissions',
        'manage_options',
        'contact-form-submissions',
        'display_contact_form_submissions',
        'dashicons-email',
        6
    );
}
add_action('admin_menu', 'add_contact_form_menu');

function display_contact_form_submissions()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_form_submissions';
    $results = $wpdb->get_results("SELECT * FROM $table_name");

    echo '<div class="wrap">';
    echo '<h1>Contact Form Submissions</h1>';
    echo '<table class="widefat fixed" cellspacing="0">';
    echo '<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th><th>Submitted At</th></tr></thead>';
    echo '<tbody>';

    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . $row->id . '</td>';
        echo '<td>' . esc_html($row->name) . '</td>';
        echo '<td>' . esc_html($row->email) . '</td>';
        echo '<td>' . esc_html($row->phone) . '</td>';
        echo '<td>' . esc_html($row->message) . '</td>';
        echo '<td>' . esc_html($row->submitted_at) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}
