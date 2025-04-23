<?php
/*
Template Name: About Us
*/

get_header();

?>
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
<style>
    .about__content-four p {
    margin-bottom: 30px;
    font-size: 1.3rem;
    font-family: wppregular,Arial,sans-serif; 
    font-weight: 400;
    letter-spacing: normal;
    line-height: 1.75;
    margin: 0;
}
</style>
<section class="breadcrumb__area breadcrumb__bg py-4">
    <div class="video-background">
        <div class="video-foreground">
            <!-- Embed YouTube video with autoplay -->
            <iframe
                src="https://www.youtube.com/embed/paq-Pf0C7hY?autoplay=1&controls=0&rel=0&loop=1&playlist=paq-Pf0C7hY&mute=1"
                frameborder="0"
                allow="autoplay; encrypted-media"
                allowfullscreen
            ></iframe>
        </div>
    </div>
</section>

<style> 
header {
    z-index: 99;
    position: relative;
    background: white;
}
section, footer, .brand__area-four {
    background: white;
    position: relative;
    z-index: 9;
}
    .video-foreground,
    .video-background iframe {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -99;
    }
    .video-background {
    position: absolute;
    overflow: hidden;
        z-index: -99;
    width: 100%;
    height: 100%;
    padding-bottom: 56.25%;
    top: -100px;
}
.about__area-four{
    margin-top: calc(60vh);
    z-index: 9;
    position: relative;
    background: white;
}
</style>

        <!-- about-area -->
        <section class="about__area-four pt-4">
            <div class="container">
                <div class="row align-items-center">
                        <div class="about__content-four">
                            <div class="section-title mt-30">
                                <span class="sub-title">We Are RAG</span>
                                <h2 class=" ">WHO WE ARE</h2>
                            </div> 
                            <p>we at Radio Africa Group are at the forefront of Africa's marketing and communication landscape. Through a dedication to innovation, creativity, and collaboration centered around culture, we strive to push new boundaries and lead the way in our industry.</p>

                            <div class="section-title mt-30"> 
                                <h2 class=" ">ABOUT US</h2>
                            </div> 
                            <p>At Radio Africa Group, we're not just a marketing and communication company; we're a full-service creative transformation agency committed to shaping better futures for our clients. With a blend of exceptional creativity, deep insights, and cutting-edge technology, we bring together talented individuals to forge dynamic, meaningful connections between our clients and their audiences. Our key areas of expertise include:
                                
                                
                                Brand Stewardship & Communications, Customer Engagement & Experience, Technology, Commerce & Advisory: Under our umbrella, you'll find renowned entities such as Ogilvy Africa, Scanad & Squad.
Media Investment Management (Media, Content & Technology): Our portfolio includes Group M, Essencemediacom, Mindshare, and Wavemaker (MEC).
PR, Influence & Government Practice: We boast the expertise of Ogilvy and H+K Strategies.
Shopper Marketing & Engagement: Our capabilities extend to Geometry.
</p>
                            <div class="section-title mt-30"> 
                                <h2 class=" ">WHERE WE ARE</h2>
                            </div> 
                            <p>

Radio Africa Group maintains a strong presence in strategic locations across the continent, ensuring that we stay intimately connected with our markets. With physical offices in 23 countries in sub-Saharan Africa, our footprint includes:

9 Majority-owned: Gabon, Ghana, Kenya, Nigeria, Rwanda, South Africa, Tanzania, Uganda, Zambia.
2 Minority-owned: Namibia and Zimbabwe.
12 Affiliates: Angola, Botswana, Congo, Democratic Republic of Congo (DRC), Ethiopia, Madagascar, Malawi, Mauritius, Mozambique, Niger, Sierra Leone, and Sudan.</p>

<div class="section-title mt-30"> 
                                <h2 class=" ">WHY US?</h2>
                            </div> 
                            <p>

What sets us apart is our unparalleled understanding of Africa and its diverse consumer landscape. Leveraging the wealth of expertise and knowledge we've accumulated over the years, we respond swiftly to your business needs, effectively serving markets with unwavering quality. We operate as one cohesive team, pooling our strengths to inspire and empower our partners to achieve success, realize their aspirations, and overcome new challenges.
                            </p>
<div class="section-title mt-30"> 
                                <h2 class=" ">OUR HISTORY</h2>
                            </div> 

<p>
Radio Africa Group traces its roots back to January 1999 when it began as a private limited liability company under the name Media Initiative East Africa Limited. Over the years, we've undergone significant transformations, including a change of name to Scangroup Limited in October 2005. In August 2006, we made history by listing on the Nairobi Securities Exchange, becoming the sole marketing services company to do so. In late 2013, we became a subsidiary of WPP, leading to our renaming as WPP-Scangroup PLC in June 2015. Today, we continue to build on this rich legacy as a pioneering force in Africa's marketing and communication landscape.





</p>

                         </div>
                
                </div>
            </div>
        </section>
        <!-- about-area-end -->
        <!-- brand-area -->
        <div class="brand__area-four">
            <div class="container">
                <div class="swiper-container brand-active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand_img01.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand_img02.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand_img03.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand_img04.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand_img05.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand_img06.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/brand_img03.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand-area -->
        <!-- choose-area -->
        <section class="choose__area-four">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="choose__content-four">
                            <div class="section-title white-title mb-20">
                                <span class="sub-title">Why We Are The Best</span>
                                <h2 class="title">Digital Solutions For Your Online Business</h2>
                            </div>
                            <p>We successfully cope with tasks of varying complexity provide area longerty guarantees and regularly master new Practice Following gies heur.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="choose__list-two">
                            <ul class="list-wrap">
                                <li>
                                    <div class="choose__list-box-two">
                                        <div class="choose__list-icon-two">
                                            <i class="flaticon-investment"></i>
                                        </div>
                                        <div class="choose__list-content-two">
                                            <h4 class="title">Business Solutions</h4>
                                            <p>Semper egetuis kelly for tellus urna area condition.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="choose__list-box-two">
                                        <div class="choose__list-icon-two">
                                            <i class="flaticon-financial-profit"></i>
                                        </div>
                                        <div class="choose__list-content-two">
                                            <h4 class="title">Finance Planning</h4>
                                            <p>Semper egetuis kelly for tellus urna area condition.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="choose__list-box-two">
                                        <div class="choose__list-icon-two">
                                            <i class="flaticon-investment-1"></i>
                                        </div>
                                        <div class="choose__list-content-two">
                                            <h4 class="title">Market Analysis</h4>
                                            <p>Semper egetuis kelly for tellus urna area condition.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="choose__list-box-two">
                                        <div class="choose__list-icon-two">
                                            <i class="flaticon-report"></i>
                                        </div>
                                        <div class="choose__list-content-two">
                                            <h4 class="title">Business Solutions</h4>
                                            <p>Semper egetuis kelly for tellus urna area condition.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="choose__shape-wrap-four">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/inner_choose_shape01.png" alt="" data-aos="fade-right" data-aos-delay="400">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/inner_choose_shape02.png" alt="" data-aos="fade-left" data-aos-delay="400">
            </div>
        </section>
        <!-- choose-area-end -->
        <!-- counter-area -->
        <section class="counter-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <i class="flaticon-trophy"></i>
                            </div>
                            <div class="content">
                                <h2 class="count"><span class="odometer" data-count="45"></span>+</h2>
                                <p>Successfully <br> Completed Projects</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <i class="flaticon-happy"></i>
                            </div>
                            <div class="content">
                                <h2 class="count"><span class="odometer" data-count="92"></span>K</h2>
                                <p>Satisfied <br> 100% Our Clients</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <i class="flaticon-china"></i>
                            </div>
                            <div class="content">
                                <h2 class="count"><span class="odometer" data-count="19"></span>+</h2>
                                <p>All Over The World <br> We Are Available</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <i class="flaticon-time"></i>
                            </div>
                            <div class="content">
                                <h2 class="count"><span class="odometer" data-count="25"></span>+</h2>
                                <p>Years of Experiences <br> To Run This Company</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="counter-shape-wrap">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/counter_shape01.png" alt="" data-aos="fade-right" data-aos-delay="400">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/counter_shape02.png" alt="" data-parallax='{"x" : 100 , "y" : -100 }'>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/counter_shape03.png" alt="" data-aos="fade-left" data-aos-delay="400">
            </div>
        </section>
        <!-- counter-area-end -->
<!-- team-area -->
<section class="team-area pt-120 pb-90">
    <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center mb-40">
                            <span class="sub-title">MEET OUR TEAM</span>
                            <h2 class="title">Our Top Management </h2>
                        </div>
                    </div>
                </div>
        <div class="team-item-wrap">
            <div class="row justify-content-center">
                <?php
                // Custom query to retrieve management posts
                $management_query = new WP_Query(array(
                    'post_type' => 'management',
                    'posts_per_page' => -1, // Retrieve all posts
                ));

                // Check if there are any management posts
                if ($management_query->have_posts()) :
                    // Loop through management posts
                    while ($management_query->have_posts()) : $management_query->the_post();
                        // Retrieve post meta data
                        $position = get_post_meta(get_the_ID(), '_management_position', true);
                        $twitter_link = get_post_meta(get_the_ID(), '_management_twitter_link', true);
                        $instagram_link = get_post_meta(get_the_ID(), '_management_instagram_link', true);
                ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="team-item">
                                <div class="team-thumb">
                                    <?php the_post_thumbnail('medium'); ?>
                                    <div class="team-social">
                                        <div class="social-toggle-icon">
                                            <i class="fas fa-share-alt"></i>
                                        </div>
                                        <ul class="list-wrap">
                                            <li><a href="<?php echo esc_url($twitter_link); ?>"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="<?php echo esc_url($instagram_link); ?>"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <h4 class="title"><?php the_title(); ?></h4>
                                    <span><?php echo esc_html($position); ?></span>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata(); // Reset post data query
                else :
                    echo 'No management posts found.';
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
<!-- team-area-end -->

<?php get_footer(); ?>

<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
<script>
  const player = new Plyr('#player');
</script>
