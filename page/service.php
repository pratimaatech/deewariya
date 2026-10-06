<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

    <div class="container text-center py-5">

        <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">
            Service
        </h1>

        <nav aria-label="breadcrumb animated slideInDown">

            <ol class="breadcrumb justify-content-center text-uppercase mb-0">

                <li class="breadcrumb-item">
                    <a class="text-white" href="./">
                        Home
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a class="text-white" href="service">
                        Services
                    </a>
                </li>

                <li class="breadcrumb-item text-primary active" aria-current="page">
                    Service
                </li>

            </ol>

        </nav>

    </div>

</div>
<!-- Page Header End -->


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
            style="max-width: 600px;"
        >

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
                        data-wow-delay="0.1s"
                    >


                        <!-- Entire Card Clickable -->

                        <a
                            href="servicedetail/<?php echo (int)$service['id']; ?>"
                            class="text-decoration-none text-light d-block h-100"
                        >


                            <div
                                class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0"
                            >


                                <!-- Service Image -->

                                <div
                                    class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center"
                                    style="width: 60px; height: 60px;"
                                >

                                    <img
                                        class="img-fluid"
                                        src="images/services/<?php echo htmlspecialchars($service['image']); ?>"
                                        alt="<?php echo htmlspecialchars($service['name']); ?>"
                                        loading="lazy"
                                    >

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