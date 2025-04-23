<?php
get_header();
?>

<section class="services__area-six services__bg-six"
    data-background="<?php echo get_template_directory_uri(); ?>/assets/img/bg/h3_services_bg.jpg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-title white-title mb-40">
                    <span class="sub-title">WHAT WE OFFER</span>
                    <h2 class="title">Discover Our Brands <br> & Services</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="services__tab-wrap">
                    <?php
                    // Fetch all brand categories
                    $brand_categories = get_terms([
                        'taxonomy' => 'brand_category',
                        'hide_empty' => true,
                    ]);

                    if (!empty($brand_categories) && !is_wp_error($brand_categories)):
                        ?>
                        <div class="row">

                            <!-- Tab Navigation -->
                            <ul class="nav nav-tabs" id="brandTabs" role="tablist">
                                <?php foreach ($brand_categories as $index => $category): ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php echo $index === 0 ? 'active' : ''; ?>"
                                            id="tab-<?php echo esc_attr($category->slug); ?>" data-bs-toggle="tab"
                                            data-bs-target="#pane-<?php echo esc_attr($category->slug); ?>" type="button"
                                            role="tab" aria-controls="pane-<?php echo esc_attr($category->slug); ?>"
                                            aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                            <?php echo esc_html($category->name); ?>
                                        </button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- Tab Content -->
                        <div class="tab-content" id="brandTabsContent">
                            <?php foreach ($brand_categories as $index => $category): ?>
                                <div class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?>"
                                    id="pane-<?php echo esc_attr($category->slug); ?>" role="tabpanel"
                                    aria-labelledby="tab-<?php echo esc_attr($category->slug); ?>">

                                    <?php
                                    $brands = new WP_Query([
                                        'post_type' => 'brand',
                                        'tax_query' => [
                                            [
                                                'taxonomy' => 'brand_category',
                                                'field' => 'term_id',
                                                'terms' => $category->term_id,
                                            ],
                                        ],
                                        'posts_per_page' => -1,
                                    ]);

                                    if ($brands->have_posts()):
                                        while ($brands->have_posts()):
                                            $brands->the_post();
                                            ?>
                                            <div class="services__item-four shine-animate-item mb-4 w-100">
                                                <div class="shine-animate col-4">
                                                    <img class="w-100" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>"
                                                        alt="<?php the_title_attribute(); ?>">
                                                </div>

                                                <div class="services__content-four">
                                                    <h2 class="title">
                                                    <?php the_title(); ?>
                                                    </h2>
                                                    <p>
                                                        <?php echo esc_html($category->description ?: 'Explore our amazing brands.'); ?>
                                                    </p>


                                                    <a class="btn" href="<?php echo esc_url(get_term_link($category)); ?>">
                                                        Explore
                                                        <?php the_title(); ?>
                                                    </a>
                                                </div>
                                            </div>

                                            <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    else:
                                        echo '<li>No brands available.</li>';
                                    endif;
                                    ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    <?php else: ?>
                        <p>No brand categories found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</section>


<?php get_footer(); ?>