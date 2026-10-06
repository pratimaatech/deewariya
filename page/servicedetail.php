<?php

// ======================================================
// SERVICE DETAIL
// Database connection comes from common/head.php
// ======================================================

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid service ID.");
}

$service_id = (int) $_GET['id'];


// ======================================================
// GET SERVICE
// ======================================================

$sql = "
    SELECT *
    FROM services
    WHERE id = $service_id
    LIMIT 1
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) === 0) {
    die("Service not found.");
}

$service = mysqli_fetch_assoc($result);


// ======================================================
// GET OTHER SERVICES
// ======================================================

$relatedSql = "
    SELECT *
    FROM services
    WHERE id != $service_id
    ORDER BY id ASC
    LIMIT 3
";

$relatedServices = mysqli_query($conn, $relatedSql);

?>


<!-- =====================================================
     SERVICE DETAIL PAGE
====================================================== -->

<div class="service-detail-page">


    <!-- =================================================
         PAGE HEADER
    ================================================== -->

   <section 
    class="service-detail-header"
    style="
        background-image:
        linear-gradient(rgba(0,0,0,0.60), rgb(0, 0, 0)),
        url('images/services/<?php echo htmlspecialchars($service['image']); ?>');
    "
>

    <div class="container">

        <div class="service-breadcrumb">

            <!-- Home -->
            <a href="./">
                Home
            </a>

            <span>/</span>

            <!-- Services -->
            <a href="service">
                Services
            </a>

            <span>/</span>

            <!-- Current Service -->
            <span>
                <?php
                echo htmlspecialchars(
                    $service['name']
                );
                ?>
            </span>

        </div>


        <div class="service-header-content">

            <span class="service-label">
                Our Services
            </span>

            <h1>
                <?php
                echo htmlspecialchars(
                    $service['name']
                );
                ?>
            </h1>


            <?php if (!empty($service['designation'])) { ?>

                <p>
                    <?php
                    echo htmlspecialchars(
                        $service['designation']
                    );
                    ?>
                </p>

            <?php } ?>

        </div>

    </div>

</section>


    <!-- =================================================
         SERVICE CONTENT
    ================================================== -->

    <section class="service-detail-content">

        <div class="container">

            <div class="row align-items-center g-5">


                <!-- IMAGE -->

                <div class="col-lg-12">

                    <div class="service-main-image">

                        <img
                            src="images/services/<?php echo htmlspecialchars($service['image']); ?>"
                            alt="<?php echo htmlspecialchars($service['name']); ?>"
                            loading="lazy"
                        >

                    </div>

                </div>


                <!-- CONTENT -->

                <div class="col-lg-12">

                    <div class="service-content-box">


                        <span class="service-small-title">
                            WHAT WE OFFER
                        </span>


                        <h2>
                            <?php
                            echo htmlspecialchars(
                                $service['name']
                            );
                            ?>
                        </h2>


                        <?php if (!empty($service['designation'])) { ?>

                            <p class="service-designation">

                                <?php
                                echo htmlspecialchars(
                                    $service['designation']
                                );
                                ?>

                            </p>

                        <?php } ?>


                        <?php if (!empty($service['details'])) { ?>

                            <div class="service-description">

                                <?php

                                /*
                                 * If details contains HTML,
                                 * keep HTML rendering.
                                 */

                                echo $service['details'];

                                ?>

                            </div>

                        <?php } ?>


                        <!-- PRICE -->

                        <div class="service-price-box">

                            <div>

                                <span>
                                    Pricing
                                </span>

                                <strong>
                                    Custom Pricing
                                </strong>

                            </div>

                            <i class="fa fa-paint-brush"></i>

                        </div>


                        <!-- ACTION BUTTONS -->

                        <div class="service-actions">


                            <!-- Get In Touch -->

                            <a
                                href="contact"
                                class="service-primary-btn"
                            >

                                Get in Touch

                                <i class="fa fa-arrow-right"></i>

                            </a>


                            <!-- All Services -->

                            <a
                                href="service"
                                class="service-secondary-btn"
                            >

                                <i class="fa fa-arrow-left"></i>

                                All Services

                            </a>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =================================================
         OTHER SERVICES
    ================================================== -->

    <?php if ($relatedServices && mysqli_num_rows($relatedServices) > 0) { ?>


        <section class="other-services-section">

            <div class="container">


                <div class="other-services-heading">

                    <span>
                        EXPLORE MORE
                    </span>

                    <h2>
                        Other Services
                    </h2>

                    <p>
                        Discover more creative art and wall design services.
                    </p>

                </div>


                <div class="row g-4">


                    <?php while ($row = mysqli_fetch_assoc($relatedServices)) { ?>


                        <div class="col-lg-4 col-md-6">

                            <div class="other-service-card">


                                <!-- SERVICE IMAGE -->

                                <a
                                    href="servicedetail/<?php echo (int)$row['id']; ?>"
                                    class="other-service-image"
                                >

                                    <img
                                        src="images/services/<?php echo htmlspecialchars($row['image']); ?>"
                                        alt="<?php echo htmlspecialchars($row['name']); ?>"
                                        loading="lazy"
                                    >

                                </a>


                                <!-- SERVICE CONTENT -->

                                <div class="other-service-content">


                                    <h3>

                                        <a
                                            href="servicedetail/<?php echo (int)$row['id']; ?>"
                                        >

                                            <?php
                                            echo htmlspecialchars(
                                                $row['name']
                                            );
                                            ?>

                                        </a>

                                    </h3>


                                    <?php if (!empty($row['designation'])) { ?>

                                        <p>

                                            <?php
                                            echo htmlspecialchars(
                                                $row['designation']
                                            );
                                            ?>

                                        </p>

                                    <?php } ?>


                                    <!-- VIEW SERVICE -->

                                    <a
                                        href="servicedetail/<?php echo (int)$row['id']; ?>"
                                        class="service-read-more"
                                    >

                                        View Service

                                        <i class="fa fa-arrow-right"></i>

                                    </a>


                                </div>

                            </div>

                        </div>


                    <?php } ?>


                </div>

            </div>

        </section>


    <?php } ?>


</div>