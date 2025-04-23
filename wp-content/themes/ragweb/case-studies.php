<?php
/*
Template Name: Case Studies
*/
get_header(); // Include header
 
?>
<!-- breadcrumb-area -->
<section class="breadcrumb__area breadcrumb__bg py-4__bg py-3" data-background="<?php echo get_template_directory_uri(); ?>/assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb__content">
                        <div class="section-title mb-40">
                            <span class="sub-title">WHAT WE OFFER</span>
                            <h2 class="title">Our Case Studies</h2>
                        </div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href='index.php'>Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Case Studies</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__shape">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/breadcrumb_shape01.png" alt="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/breadcrumb_shape02.png" alt="" class="rightToLeft">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/breadcrumb_shape03.png" alt="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/breadcrumb_shape04.png" alt="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/breadcrumb_shape05.png" alt="" class="alltuchtopdown">
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        <!-- services-area -->
        <section class="services__area-five services__bg-five" data-background="<?php echo get_template_directory_uri(); ?>/assets/img/bg/inner_services_bg02.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        
                    </div>
                </div>
               
                <div class="services-item-wrap">
                    <div class="row justify-content-center">
                    <div class="row">
    <?php
    $case_studies_query = new WP_Query(array(
        'post_type' => 'casestudy',
        'posts_per_page' => -1, // Display all case studies
    ));

    if ($case_studies_query->have_posts()) :
        while ($case_studies_query->have_posts()) : $case_studies_query->the_post();
    ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                <div class="services-item shine-animate-item h-100">
                    <div class="services-thumb">
                        <a class='shine-animate' href='<?php the_permalink(); ?>'>
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large', array('class' => 'w-100 shadow-sm ratio16', 'loading' => 'lazy', 'alt' => get_the_title())); ?>
                                </a>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="services-content">
                        <div class="icon">
                            <i class="flaticon-profit"></i>
                        </div>
                        <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p><?php echo wp_trim_words(esc_html(get_the_excerpt()), 15); ?></p>
                        <a class='btn' href='<?php the_permalink(); ?>'>Read More</a>
                    </div>
                </div>
            </div>
    <?php
        endwhile;
        wp_reset_postdata(); // Reset post data query
    else :
        echo '<p>No case studies found.</p>';
    endif;
    ?>
</div>

                    </div>
                </div>
            </div>
        </section>
        <!-- services-area-end -->
 

<?php
get_footer(); // Include footer
?>
