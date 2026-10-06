<!-- CTA Start -->

<section class="deewariya-cta">

    <div class="container">

        <div class="cta-content">

            <div class="cta-text">

                <span class="cta-label">
                    BRING YOUR WALLS TO LIFE
                </span>

                <h2>
                    Have a Wall in Mind?
                </h2>

                <p>
                    Let's transform your space with a unique
                    mural or artistic wall design made just for you.
                </p>

            </div>

            <div class="cta-action">

                <a href="contact" class="cta-btn">
                    Start Your Project
                    <i class="fa fa-arrow-right"></i>
                </a>

            </div>

        </div>

    </div>

</section>

<!-- CTA End -->


<!-- Footer Start -->

<div class="container-fluid bg-secondary text-light footer mt-5 pt-5 wow fadeIn"
     data-wow-delay="0.1s">

    <div class="container py-5">

        <div class="row g-5">


            <!-- ============================= -->
            <!-- CONTACT INFORMATION -->
            <!-- ============================= -->

            <div class="col-lg-4 col-md-6">

                <h4 class="text-uppercase mb-4">
                    Get In Touch
                </h4>


                <!-- Address -->

                <?php if (!empty($setting['address'])): ?>

                    <div class="d-flex align-items-center mb-2">

                        <div class="btn-square bg-dark flex-shrink-0 me-3">

                            <span class="fa fa-map-marker-alt text-primary"></span>

                        </div>

                        <span>
                            <?= htmlspecialchars($setting['address']) ?>
                        </span>

                    </div>

                <?php endif; ?>


                <!-- Phone -->

                <?php if (!empty($phone)): ?>

                    <div class="d-flex align-items-center mb-2">

                        <div class="btn-square bg-dark flex-shrink-0 me-3">

                            <span class="fa fa-phone-alt text-primary"></span>

                        </div>

                        <a
                            href="tel:<?= htmlspecialchars($phone) ?>"
                            class="text-light">

                            <?= htmlspecialchars($phone) ?>

                        </a>

                    </div>

                <?php endif; ?>


                <!-- Email -->

                <?php if (!empty($email)): ?>

                    <div class="d-flex align-items-center">

                        <div class="btn-square bg-dark flex-shrink-0 me-3">

                            <span class="fa fa-envelope-open text-primary"></span>

                        </div>

                        <a
                            href="mailto:<?= htmlspecialchars($email) ?>"
                            class="text-light">

                            <?= htmlspecialchars($email) ?>

                        </a>

                    </div>

                <?php endif; ?>

            </div>


            <!-- ============================= -->
            <!-- QUICK LINKS -->
            <!-- ============================= -->

            <div class="col-lg-4 col-md-6">

                <h4 class="text-uppercase mb-4">
                    Quick Links
                </h4>


                <a
                    class="btn btn-link"
                    href="about">

                    About Us

                </a>


                <a
                    class="btn btn-link"
                    href="service">

                    Services

                </a>


                <a
                    class="btn btn-link"
                    href="gallery">

                    Gallery

                </a>


                <a
                    class="btn btn-link"
                    href="blog">

                    Blog

                </a>


                <a
                    class="btn btn-link"
                    href="contact">

                    Contact

                </a>

            </div>


            <!-- ============================= -->
            <!-- NEWSLETTER + SOCIAL -->
            <!-- ============================= -->

            <div class="col-lg-4 col-md-6">

                <h4 class="text-uppercase mb-4">
                    Newsletter
                </h4>


                <div class="position-relative mb-4">

                    <input
                        class="form-control border-0 w-100 py-3 ps-4 pe-5"
                        type="email"
                        placeholder="Your email"
                    >

                    <button
                        type="button"
                        class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">

                        SignUp

                    </button>

                </div>


                <!-- ============================= -->
                <!-- SOCIAL MEDIA -->
                <!-- ============================= -->

                <div class="d-flex pt-1 m-n1">


                    <!-- Instagram -->

                    <?php if (!empty($social['instagram'])): ?>

                        <a
                            class="btn btn-lg-square btn-dark text-primary m-1"
                            href="<?= htmlspecialchars($social['instagram']) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Instagram">

                            <i class="fab fa-instagram"></i>

                        </a>

                    <?php endif; ?>


                    <!-- Facebook -->

                    <?php if (!empty($social['facebook'])): ?>

                        <a
                            class="btn btn-lg-square btn-dark text-primary m-1"
                            href="<?= htmlspecialchars($social['facebook']) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Facebook">

                            <i class="fab fa-facebook-f"></i>

                        </a>

                    <?php endif; ?>


                    <!-- LinkedIn -->

                    <?php if (!empty($social['linkedin'])): ?>

                        <a
                            class="btn btn-lg-square btn-dark text-primary m-1"
                            href="<?= htmlspecialchars($social['linkedin']) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="LinkedIn">

                            <i class="fab fa-linkedin-in"></i>

                        </a>

                    <?php endif; ?>


                    <!-- YouTube -->

                    <?php if (!empty($social['youtube'])): ?>

                        <a
                            class="btn btn-lg-square btn-dark text-primary m-1"
                            href="<?= htmlspecialchars($social['youtube']) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="YouTube">

                            <i class="fab fa-youtube"></i>

                        </a>

                    <?php endif; ?>


                    <!-- Twitter / X -->

                    <?php if (!empty($social['twitter'])): ?>

                        <a
                            class="btn btn-lg-square btn-dark text-primary m-1"
                            href="<?= htmlspecialchars($social['twitter']) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Twitter">

                            <i class="fab fa-twitter"></i>

                        </a>

                    <?php endif; ?>


                </div>

            </div>

        </div>

    </div>


    <!-- ============================= -->
    <!-- COPYRIGHT -->
    <!-- ============================= -->

    <div class="container">

        <div class="copyright">

            <div class="row">


                <!-- Copyright -->

                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">

                    &copy;
                    <?= date('Y') ?>

                    <a
                        class="border-bottom"
                        href="./">

                        <?= htmlspecialchars(
                            $setting['website_name'] ?? 'Deewariya'
                        ) ?>

                    </a>,

                    All Right Reserved.

                </div>


                <!-- Developer -->

                <div class="col-md-6 text-center text-md-end">

                    Designed By

                    <a
                        class="border-bottom"
                        href="https://wwwpratimaatech.in"
                        target="_blank"
                        rel="noopener noreferrer">

                        PratimaaTech

                    </a>

                </div>


            </div>

        </div>

    </div>

</div>

<!-- Footer End -->


<!-- Bootstrap Icons -->

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
>


<!-- ============================= -->
<!-- BACK TO TOP -->
<!-- ============================= -->

<a
    href="#"
    class="btn btn-primary btn-lg-square back-to-top">

    <i class="bi bi-arrow-up"></i>

</a>


<!-- ============================= -->
<!-- JAVASCRIPT LIBRARIES -->
<!-- ============================= -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="lib/wow/wow.min.js"></script>

<script src="lib/easing/easing.min.js"></script>

<script src="lib/waypoints/waypoints.min.js"></script>

<script src="lib/owlcarousel/owl.carousel.min.js"></script>


<!-- Template Javascript -->

<script src="js/main.js"></script>


</body>

</html>