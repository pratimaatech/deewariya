<!-- Lightbox CSS -->
<link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">


<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

    <div class="container text-center py-5">

        <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">
            Art & Mural Gallery
        </h1>

        <nav aria-label="breadcrumb animated slideInDown">

            <ol class="breadcrumb justify-content-center text-uppercase mb-0">

                <li class="breadcrumb-item">
                    <a class="text-white" href="./">
                        Home
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a class="text-white" href="#">
                        Pages
                    </a>
                </li>

                <li class="breadcrumb-item text-primary active"
                    aria-current="page">
                    Art & Mural Gallery
                </li>

            </ol>

        </nav>

    </div>

</div>
<!-- Page Header End -->


<?php

// Get gallery items from database
$sql = "SELECT * FROM gallery ORDER BY id ASC";

$gallery_items = mysqli_query($conn, $sql);

?>


<!-- Gallery Grid Start -->

<div class="container py-5">

    <div class="row g-4">

        <?php if ($gallery_items && mysqli_num_rows($gallery_items) > 0) { ?>

            <?php while ($gallery = mysqli_fetch_assoc($gallery_items)) { ?>

                <div class="col-lg-4 col-md-6 wow fadeInUp"
                     data-wow-delay="0.1s">

                    <div class="gallery-item">

                        <a
                            href="images/gallery/<?php echo htmlspecialchars($gallery['image']); ?>"
                            class="glightbox"
                            data-title="<?php echo htmlspecialchars($gallery['name']); ?>"
                            data-description="<?php echo htmlspecialchars(strip_tags($gallery['details'])); ?>"
                        >

                            <img
                                src="images/gallery/<?php echo htmlspecialchars($gallery['image']); ?>"
                                alt="<?php echo htmlspecialchars($gallery['name']); ?>"
                                class="img-fluid" loading="lazy"
                            >

                            <div class="overlay">

                                <h5>
                                    <?php echo htmlspecialchars($gallery['name']); ?>
                                </h5>

                                <?php if (!empty($gallery['designation'])) { ?>

                                    <span>
                                        <?php echo htmlspecialchars($gallery['designation']); ?>
                                    </span>

                                <?php } ?>

                            </div>

                        </a>

                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="col-12">

                <div class="text-center py-5">

                    <h4 class="text-white">
                        No gallery items available.
                    </h4>

                    <p class="text-muted">
                        Gallery items will appear here once added from the admin panel.
                    </p>

                </div>

            </div>

        <?php } ?>

    </div>

</div>

<!-- Gallery Grid End -->


<!-- GLightbox JS -->
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>

    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        zoomable: true
    });

</script>