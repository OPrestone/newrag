
</main>
<!-- main-area-end -->

   <!-- call-back-area -->
<section class="call-back-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="call-back-content">
                    <div class="section-title white-title mb-10">
                        <h2 class="title">Request A Call Back</h2>
                    </div>
                    <p>Ever find yourself staring at your computer screen a good consulting slogan to come to mind? Oftentimes.</p>
                    <div class="shape">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/call_back_shape.png" alt="" data-aos="fade-right" data-aos-delay="400">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="call-back-form">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Handle form submission
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];

                        // Validate form data (you can add more validation if needed)
                        if (!empty($name) && !empty($email) && !empty($phone)) {
                            // Process the submission (e.g., send email, save to database)
                            // For now, we'll just display a success message
                            echo '<div class="alert alert-success" role="alert">Thank you for your call back request!</div>';
                            // Redirect to a success page to prevent resubmission on page refresh
                            header("Location: index.php"); // Replace "success.php" with the URL of your success page
                            exit; // Ensure that no further code is executed after the redirect
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Please fill out all required fields.</div>';
                        }
                    }  
                    ?>

                    
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <input type="text" name="name" placeholder="Name *" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <input type="email" name="email" placeholder="E-mail *" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <input type="tel" name="phone" placeholder="Phone *" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn">Send Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- call-back-area-end -->

<!-- footer-area -->
<footer>
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <div class="fw-logo mb-25">
                                <a href='/'><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <div class="footer-content">
                                <p>Radio Africa Group is a fast growing and dynamic media company based in Kenya consisting of 6 national radio stations, one TV station and a national newspaper. We are the home of great and unique talent. Our media brands include Kiss 100, Classic 105, Radio Jambo, East FM, Smooth FM, The Star newspaper and Kiss Television.</p>
                                <div class="footer-social">
                                    <ul class="list-wrap">
                                        <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4 class="fw-title">Information</h4>
                            <div class="footer-info-list">
                                <ul class="list-wrap">
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-phone-call"></i>
                                        </div>
                                        <div class="content">
                                            <a href="tel:0123456789">+123 888 9999</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-envelope"></i>
                                        </div>
                                        <div class="content">
                                            <a href="mailto:info@radioafricagroup.co.ke">info@radioafricagroup.co.ke</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-pin"></i>
                                        </div>
                                        <div class="content">
                                            <p>Lion Place, Westlands, Nairobi-Kenya</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4 class="fw-title">Top Links</h4>
                            <div class="footer-link-list">
                                <ul class="list-wrap">
                                    <li><a href='about.html'>How it’s Work</a></li>
                                    <li><a href='contact.html'>Partners</a></li>
                                    <li><a href='contact.html'>Testimonials</a></li>
                                    <li><a href='services.html'>Case Studies</a></li>
                                    <li><a href='contact.html'>Pricing</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 order-0 order-lg-2">
                        <div class="footer-newsletter">
                            <h4 class="title">Newsletter SignUp!</h4>
                            <form action="#">
                                <input type="text" placeholder="Enter your email. . .">
                                <button class="btn btn-two" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="copyright-text">
                            <p>Copyright © <a href='index.php'>Radio Africa Group</a> | All Right Reserved</p>
                            <a href='contact.html'>Support Terms & Conditions Privacy Policy.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-shape">
            <img src="http://localhost/wp-content/themes/ragweb/assets/img/images/footer_shape01.png" alt="" data-aos="fade-right" data-aos-delay="400">
            <img src="http://localhost/wp-content/themes/ragweb/assets/img/images/footer_shape02.png" alt="" data-aos="fade-left" data-aos-delay="400">
            <img src="http://localhost/wp-content/themes/ragweb/assets/img/images/footer_shape03.png" alt="" data-parallax='{"x" : 100 , "y" : -100 }'>
        </div>
    </div>
</footer>

<?php
wp_footer();
?>
</body>
</html>
 