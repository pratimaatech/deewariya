<?php

// ======================================================
// PROJECT DETAIL
// Database connection comes from common/head.php
// ======================================================

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid project ID.");
}

$project_id = (int) $_GET['id'];


// ======================================================
// FETCH CURRENT PROJECT
// ======================================================

$sql = "
    SELECT *
    FROM projects
    WHERE id = $project_id
    LIMIT 1
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) === 0) {
    die("Project not found.");
}

$project = mysqli_fetch_assoc($result);


// ======================================================
// FETCH RELATED PROJECTS
// ======================================================

$relatedSql = "
    SELECT *
    FROM projects
    WHERE id != $project_id
    ORDER BY id DESC
    LIMIT 4
";

$relatedProjects = mysqli_query($conn, $relatedSql);

?>


<!-- =====================================================
     PROJECT DETAIL PAGE
====================================================== -->

<div class="project-detail-page">


    <!-- =================================================
         PAGE HEADER
    ================================================== -->

  <section 
    class="project-detail-header"
    style="
        background-image: 
        linear-gradient(rgba(0,0,0,0.60), rgb(0, 0, 0)),
        url('images/projects/<?php echo htmlspecialchars($project['image']); ?>');
    "
>

    <div class="container">

        <div class="project-breadcrumb">

            <!-- Home -->
            <a href="./">
                Home
            </a>

            <span>/</span>

            <!-- Projects -->
            <a href="projects">
                Projects
            </a>

            <span>/</span>

            <span>
                Project Details
            </span>

        </div>


        <div class="project-header-content">

            <span class="project-header-label">
                Deewariya Artwork
            </span>

            <h1>
                <?php
                echo htmlspecialchars($project['name']);
                ?>
            </h1>


            <?php if (!empty($project['category'])) { ?>

                <div class="project-meta">

                    <span>

                        <i class="fa fa-paint-brush"></i>

                        <?php
                        echo htmlspecialchars(
                            $project['category']
                        );
                        ?>

                    </span>

                </div>

            <?php } ?>

        </div>

    </div>

</section>



    <!-- =================================================
         MAIN PROJECT CONTENT
    ================================================== -->

    <section class="project-detail-content">

        <div class="">

            <div class="row justify-content-center">

                <div class="col-lg-10">


                    <!-- PROJECT IMAGE -->

                    <div class="project-main-image">

                        <img
                            src="images/projects/<?php echo htmlspecialchars($project['image']); ?>"
                            alt="<?php echo htmlspecialchars($project['name']); ?>"
                            loading="lazy"
                        >

                    </div>



                    <!-- PROJECT INFORMATION -->

                    <article class="project-article">


                        <?php if (!empty($project['short_description'])) { ?>

                            <div class="project-intro">

                                <?php

                                echo htmlspecialchars(
                                    $project['short_description']
                                );

                                ?>

                            </div>

                        <?php } ?>


                        <?php if (!empty($project['details'])) { ?>

                            <div class="project-content">

                                <?php

                                /*
                                 * details contains HTML content.
                                 * Do NOT use htmlspecialchars() here
                                 * if HTML formatting is stored in DB.
                                 */

                                echo $project['details'];

                                ?>

                            </div>

                        <?php } ?>


                    </article>



                    <!-- BACK TO PROJECTS -->

                    <div class="project-back-button">

                        <a href="./">

                            <i class="fa fa-arrow-left"></i>

                            Back to Projects

                        </a>

                    </div>


                </div>

            </div>

        </div>

    </section>



    <!-- =================================================
         RELATED PROJECTS
    ================================================== -->

    <section class="related-project-section">

        <div class="container">


            <div class="related-heading">

                <span>
                    Discover More
                </span>

                <h2>
                    Related Artwork
                </h2>

                <p>
                    Explore more artwork and creative projects from Deewariya.
                </p>

            </div>



            <div class="row g-4">


                <?php if ($relatedProjects && mysqli_num_rows($relatedProjects) > 0) { ?>


                    <?php while ($row = mysqli_fetch_assoc($relatedProjects)) { ?>


                        <div class="col-lg-4 col-md-6">


                            <article class="related-project-card">


                                <!-- IMAGE -->

                                <a
                                    href="projectdetail/<?php echo (int)$row['id']; ?>"
                                    class="related-project-image"
                                >

                                    <img
                                        src="images/projects/<?php echo htmlspecialchars($row['image']); ?>"
                                        alt="<?php echo htmlspecialchars($row['name']); ?>"
                                        loading="lazy"
                                    >

                                </a>



                                <!-- CONTENT -->

                                <div class="related-project-content">


                                    <?php if (!empty($row['category'])) { ?>

                                        <span class="related-project-category">

                                            <?php

                                            echo htmlspecialchars(
                                                $row['category']
                                            );

                                            ?>

                                        </span>

                                    <?php } ?>


                                    <h3>

                                        <a
                                            href="projectdetail/<?php echo (int)$row['id']; ?>"
                                        >

                                            <?php

                                            echo htmlspecialchars(
                                                $row['name']
                                            );

                                            ?>

                                        </a>

                                    </h3>



                                    <?php if (!empty($row['short_description'])) { ?>

                                        <p>

                                            <?php

                                            echo htmlspecialchars(
                                                $row['short_description']
                                            );

                                            ?>

                                        </p>

                                    <?php } ?>



                                    <a
                                        href="projectdetail/<?php echo (int)$row['id']; ?>"
                                        class="related-project-read-more"
                                    >

                                        View Project

                                        <i class="fa fa-arrow-right"></i>

                                    </a>


                                </div>


                            </article>


                        </div>


                    <?php } ?>


                <?php } else { ?>


                    <div class="col-12">

                        <div class="no-related-project">

                            No related projects found.

                        </div>

                    </div>


                <?php } ?>


            </div>

        </div>

    </section>


</div>