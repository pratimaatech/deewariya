<!-- Hero Video Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="position-relative">

        <!-- Desktop Video -->
        <video class="w-100 hero-video hero-video-desktop" autoplay muted loop playsinline>
            <source src="image/homevideos.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>


        <!-- Mobile Video -->
        <video class="w-100 hero-video hero-video-mobile" autoplay muted loop playsinline>
            <source src="image/mobilevideos.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Hero Content -->
        <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
            <div class="hero-content">
                <h1 class="art-title">Deewariya</h1>

                <p class="art-subtitle">
                    Custom Mural Art & Wall Painting
                </p>

                <div class="art-location">
                    <i class="fa fa-map-marker-alt"></i>
                    Pan India • Jharkhand • Rajasthan • Madhya Pradesh
                </div>

                <div class="art-phone">
                    <i class="fa fa-phone-alt"></i>
                    +91 749-300-5903
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Hero Video End -->




<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">

            <!-- Image Section -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column">
                    <img class="img-fluid w-75 align-self-end" src="image/ayush.png" alt="Custom mural art wall painting">
                    <div class="w-50 bg-secondary p-5" style="margin-top: -25%;">
                        <h2 class="text-uppercase text-primary mb-3">6+ Years</h2>
                        <h2 class="text-uppercase mb-0">Art Experience</h2>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="d-inline-block bg-secondary text-primary py-1 px-4">About Us</p>

                <h2 class="text-uppercase mb-4">
                    More Than Art — We Create Stories <span class="green">on</span> Walls
                </h2>

                <p>
                    Deewariya is a creative mural art and wall painting studio dedicated to transforming blank walls into meaningful works of art.
                    We specialize in custom-designed murals that reflect culture, creativity, and the unique personality of every space.
                </p>

                <p class="mb-4">
                    From homes and cafes to hotels and offices, our artwork is handcrafted with premium materials and thoughtful design.
                    We proudly serve art-loving cities like Delhi, Jaipur, Udaipur, and Indore.
                </p>

                <div class="row g-4">
                    <div class="col-md-6">
                        <h3 class="text-uppercase mb-3">Since 2019</h3>
                        <p class="mb-0">
                            Creating artistic wall designs inspired by culture, modern aesthetics, and personal stories.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-uppercase mb-3">50+ Projects</h3>
                        <p class="mb-0">
                            Successfully completed mural and wall art projects across homes, cafes, hotels, and offices.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- About End -->





<?php

// Get services from database

$sql = "SELECT * FROM services ORDER BY id ASC";

$services = mysqli_query($conn, $sql);

?>


<!-- Service Start -->

<div class="container-xxl py-5">

    <div class="container">


        <!-- Section Heading -->

        <div
            class="text-center mx-auto mb-5 wow fadeInUp"
            data-wow-delay="0.1s"
            style="max-width: 600px;">

            <p class="d-inline-block bg-secondary text-primary py-1 px-4">
                Our Services
            </p>

            <h1 class="text-uppercase">
                Art & Wall Design Services
            </h1>

        </div>


        <!-- Services -->

        <div class="row g-4">


            <?php if ($services && mysqli_num_rows($services) > 0) { ?>


                <?php while ($service = mysqli_fetch_assoc($services)) { ?>


                    <div
                        class="col-lg-4 col-md-6 wow fadeInUp"
                        data-wow-delay="0.1s">


                        <!-- Entire Card Clickable -->

                        <a
                            href="servicedetail/<?php echo (int)$service['id']; ?>"
                            class="text-decoration-none text-light d-block h-100">


                            <div
                                class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">


                                <!-- Service Image -->

                                <div
                                    class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center"
                                    style="width: 60px; height: 60px;">

                                    <img
                                        class="img-fluid"
                                        src="images/services/<?php echo htmlspecialchars($service['image']); ?>"
                                        alt="<?php echo htmlspecialchars($service['name']); ?>"
                                        loading="lazy">

                                </div>


                                <!-- Service Content -->

                                <div class="ps-4">

                                    <h3 class="text-uppercase mb-3">

                                        <?php
                                        echo htmlspecialchars(
                                            $service['name']
                                        );
                                        ?>

                                    </h3>


                                    <p>

                                        <?php
                                        echo htmlspecialchars(
                                            $service['designation']
                                        );
                                        ?>

                                    </p>


                                    <span class="text-uppercase text-primary">

                                        Custom Pricing

                                    </span>

                                </div>


                                <!-- Plus Icon -->

                                <span class="btn btn-square">

                                    <i class="fa fa-plus text-primary"></i>

                                </span>


                            </div>


                        </a>


                    </div>


                <?php } ?>


            <?php } else { ?>


                <div class="col-12">

                    <p class="text-center">
                        No services available.
                    </p>

                </div>


            <?php } ?>


        </div>

    </div>

</div>

<!-- Service End -->


<!-- Price Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0">

            <!-- Price Content -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
                    <p class="d-inline-flex bg-dark text-primary py-1 px-4 me-auto">Price & Plans</p>

                    <h2 class="text-uppercase mb-4">
                        Art, Mural & Wall Design Pricing
                    </h2>

                    <p class="mb-4">
                        Every wall is unique. Our pricing depends on size, design complexity
                        and location. Below are **starting prices** for reference.
                    </p>

                    <div>
                        <div class="d-flex justify-content-between border-bottom py-2">
                            <h6 class="text-uppercase mb-0">Mural Art (Per Sq. Ft.)</h6>
                            <span class="text-uppercase text-primary">₹250+</span>
                        </div>

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <h6 class="text-uppercase mb-0">Room Wall Painting</h6>
                            <span class="text-uppercase text-primary">₹6,999+</span>
                        </div>

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <h6 class="text-uppercase mb-0">3D Wall Art</h6>
                            <span class="text-uppercase text-primary">₹12,999+</span>
                        </div>

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <h6 class="text-uppercase mb-0">Commercial Wall Art</h6>
                            <span class="text-uppercase text-primary">₹15,000+</span>
                        </div>

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <h6 class="text-uppercase mb-0">Traditional / Folk Art</h6>
                            <span class="text-uppercase text-primary">₹8,999+</span>
                        </div>

                        <div class="d-flex justify-content-between py-2">
                            <h6 class="text-uppercase mb-0">Outdoor & Street Art</h6>
                            <span class="text-uppercase text-primary">On Request</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Image -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100">
                    <img class="img-fluid h-100" src="image/price.jpeg" alt="Mural Art Pricing in Delhi Jaipur Udaipur" loading="lazy">
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Price End -->


<!-- Project Start -->

<?php

$sql = "SELECT * FROM projects ORDER BY sort_order ASC, id ASC";

$projects = mysqli_query($conn, $sql);

?>

<!-- Projects Start -->

<div class="container-xxl py-5">

    <div class="container">

        <!-- Section Heading -->

        <div
            class="text-center mx-auto mb-5 wow fadeInUp"
            data-wow-delay="0.1s"
            style="max-width: 600px;">

            <p class="d-inline-block bg-secondary text-primary py-1 px-4">
                Our Projects
            </p>

            <h2 class="text-uppercase">
                Our Artwork
            </h2>

        </div>


        <!-- Projects -->

        <div class="row g-4">

            <?php if ($projects && mysqli_num_rows($projects) > 0) { ?>

                <?php while ($project = mysqli_fetch_assoc($projects)) { ?>

                    <div
                        class="col-lg-3 col-md-6 wow fadeInUp"
                        data-wow-delay="0.1s">

                        <!-- Entire Project Card Clickable -->

                        <a
                            href="projectdetail/<?php echo (int)$project['id']; ?>"
                            class="text-decoration-none text-dark d-block h-100">

                            <div class="project-item h-100">

                                <!-- Project Image -->

                                <div class="project-img position-relative overflow-hidden">

                                    <img
                                        class="img-fluid w-100"
                                        src="images/projects/<?php echo htmlspecialchars($project['image']); ?>"
                                        alt="<?php echo htmlspecialchars($project['name']); ?>"
                                        loading="lazy">


                                    <!-- Hover Overlay -->

                                    <div class="project-social">

                                        <span class="btn btn-square">

                                            <i class="fa fa-eye"></i>

                                        </span>

                                    </div>

                                </div>


                                <!-- Project Information -->

                                <div class="bg-secondary text-center p-4">

                                    <h5 class="text-uppercase mb-2">

                                        <?php
                                        echo htmlspecialchars(
                                            $project['name']
                                        );
                                        ?>

                                    </h5>


                                    <span class="text-primary">

                                        <?php
                                        echo htmlspecialchars(
                                            $project['category']
                                        );
                                        ?>

                                    </span>

                                </div>

                            </div>

                        </a>

                    </div>

                <?php } ?>

            <?php } else { ?>

                <div class="col-12">

                    <div class="text-center py-5">

                        <p class="text-muted">
                            No projects available.
                        </p>

                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

</div>

<!-- Projects End -->


<!-- Working Hours Start -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0">

            <!-- Image -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="h-100">
                    <img class="img-fluid h-100" src="image/WorkingHours.jpeg" alt="Mural art studio working hours" loading="lazy">
                </div>
            </div>

            <!-- Content -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
                    <p class="d-inline-flex bg-dark text-primary py-1 px-4 me-auto">
                        Working Hours
                    </p>

                    <h2 class="text-uppercase mb-4">
                        Let’s Create Art Together
                    </h2>

                    <p class="mb-4">
                        We are available for consultations, site visits, and custom mural art discussions.
                        Feel free to contact us during working hours.
                    </p>

                    <div>
                        <div class="d-flex justify-content-between border-bottom py-2">
                            <h6 class="text-uppercase mb-0">Monday – Friday</h6>
                            <span class="text-uppercase">10 AM – 7 PM</span>
                        </div>

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <h6 class="text-uppercase mb-0">Saturday</h6>
                            <span class="text-uppercase">10 AM – 5 PM</span>
                        </div>

                        <div class="d-flex justify-content-between py-2">
                            <h6 class="text-uppercase mb-0">Sunday</h6>
                            <span class="text-uppercase text-primary">
                                Appointment Only
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Working Hours End -->




<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="lib/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="lib/owlcarousel/assets/owl.theme.default.min.css">

<!-- Testimonial Start -->

<?php
$sql = "SELECT * FROM testimonials ORDER BY id ASC";
$testimonials = mysqli_query($conn, $sql);
?>

<section class="modern-testimonials">

    <div class="container">

        <!-- Heading -->
        <div class="testimonial-heading text-center">


            <p class="d-inline-block bg-secondary mb-3 text-primary py-1 px-4">
                Client Stories
            </p>

            <h2>
                What Our <span>Clients</span> Say
            </h2>

            <p>
                Real experiences from clients who trusted us with their
                walls, spaces and artistic projects.
            </p>

        </div>


        <!-- Carousel -->
        <div class="owl-carousel testimonial-modern-carousel">

            <?php if ($testimonials && mysqli_num_rows($testimonials) > 0) { ?>

                <?php while ($testimonial = mysqli_fetch_assoc($testimonials)) { ?>

                    <div class="modern-testimonial-item">

                        <!-- Big Quote -->
                        <div class="quote-mark">
                            “
                        </div>


                        <!-- Review -->
                        <div class="modern-review">
                            <?php echo $testimonial['details']; ?>
                        </div>


                        <!-- Client -->
                        <div class="modern-client">

                            <div class="client-image">

                                <img
                                    src="images/testimonials/<?php echo htmlspecialchars($testimonial['image']); ?>"
                                    alt="<?php echo htmlspecialchars($testimonial['name']); ?>" loading="lazy">

                            </div>

                            <div class="client-info">

                                <h4>
                                    <?php echo htmlspecialchars($testimonial['name']); ?>
                                </h4>

                                <p>
                                    <?php echo htmlspecialchars($testimonial['designation']); ?>
                                </p>

                            </div>

                        </div>

                    </div>

                <?php } ?>

            <?php } else { ?>

                <div class="modern-testimonial-item text-center">

                    <div class="modern-review">
                        No testimonials available.
                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

</section>

<!-- Testimonial End -->


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<script>
    $(document).ready(function() {

        $(".testimonial-modern-carousel").owlCarousel({

            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,

            smartSpeed: 800,

            loop: true,

            margin: 25,

            // nav: true,
            dots: true,

            navText: [
                '<i class="fa fa-arrow-left"></i>',
                '<i class="fa fa-arrow-right"></i>'
            ],

            responsive: {

                0: {
                    items: 1
                },

                768: {
                    items: 1
                },

                1200: {
                    items: 1
                }

            }

        });

    });
</script>