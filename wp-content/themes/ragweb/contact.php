<?php
/*
Template Name: Contact
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

<main class="fix">
    <!-- contact-area -->
    <section class="contact__area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="contact__content">
                        <div class="section-title mb-35">
                            <h2 class="title">How can we help you?</h2>
                            <p>When an unknown printer took a galley of type and scrambled it to make type pecimen book.
                                It has survived not only five areafact types remaining essentially unchangedIt</p>
                        </div>
                        <div class="contact__info">
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-pin"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Address</h4>
                                        <p>Lion Place, Westlands, Nairobi-Kenya</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-phone-call"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Phone</h4>
                                        <a href="tel:0123456789">+254709090909</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-mail"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">E-mail</h4>
                                        <a href="mailto:info@gmail.com">info@gmail.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact__form-wrap">
                        <h2 class="title">Give Us a Message</h2>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <form id="contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
                            method="POST">
                            <div class="form-grp">
                                <textarea name="message" placeholder="Message" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-grp">
                                        <input type="text" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-grp">
                                        <input type="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-grp">
                                        <input type="number" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-grp checkbox-grp">
                                <input type="checkbox" name="checkbox" id="checkbox">
                                <label for="checkbox">Save my name, email, and website in this browser for the next time
                                    I comment.</label>
                            </div>
                            <input type="hidden" name="action" value="submit_contact_form">
                            <button type="submit" class="btn">Submit post</button>
                        </form>
                        <p class="ajax-response mb-0"></p>
                    </div>
                </div>

            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="contact-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8529163092444!2d36.79552729999999!3d-1.2604464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f176ed548d5a3%3A0x4b02b87ed3298ca7!2sLion%20Place%2C%20Waiyaki%20Wy%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1723538394587!5m2!1sen!2ske"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->
</main>
<?php
get_footer(); // Include footer
?>