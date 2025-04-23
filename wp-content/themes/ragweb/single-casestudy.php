<?php get_header();  
// Check if we have casestudy posts
if (have_posts()) {
    // Loop through each post
    while (have_posts()) {
        the_post();

?>


        <section class="team__details-area">
            <div class="container">
                <div class="team__details-inner">
                    <div class="row align-items-center">
                        <div class="col-36">
                            <div class="team__details-img">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        </div>
                        <div class="col-64">
                            <div class="team__details-content">
                                <h2 class="title"><?php the_title(); ?></h2>
                                <span class="position"><?php echo esc_html($position); ?></span>
                                <p><?php the_content(); ?></p>
                                <div class="team__details-info">
                                    <ul class="list-wrap d-flex">
                                        <li>
                                            <i class="flaticon-phone-call"></i>
                                            <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
                                        </li>
                                        <li>
                                            <i class="flaticon-mail"></i>
                                            <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                                        </li>
                                        <li>
                                            <i class="flaticon-pin"></i>
                                            <?php echo esc_html($address); ?>
                                        </li>
                                        <li>
                                            <i class="fab fa-twitter"></i>
                                            <?php echo esc_html($address); ?>
                                        </li> 
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    } // End of the while loop
} else {
    // If no posts found
    echo 'No casestudy posts found.';
}
?>

<?php get_footer(); ?>