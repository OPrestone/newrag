<?php
$post = $wp_query->post;

// Check if the post type is 'casestudy'
if ( 'casestudy' === get_post_type() ) {
    get_template_part('single-casestudy');
} 
// Check if the post type is 'personality'
elseif ( 'personality' === get_post_type() ) {
    get_template_part('single-personality');
} 
// For other post types or fallback to the default template
else {
    get_template_part('single-post');
}
?>