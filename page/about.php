    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">About</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="./">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


  <!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">

            <!-- Image Section -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column">
                    <img class="img-fluid w-75 align-self-end" src="image/profile.jpeg" alt="Custom mural art wall painting">
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
                    More Than Art — We Create Stories on Walls
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




