<?php

// ======================================================
// BLOG DETAIL
// Database connection comes from common/head.php
// ======================================================

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid blog ID.");
}

$blog_id = (int) $_GET['id'];


// ======================================================
// FETCH CURRENT BLOG
// ======================================================

$sql = "
    SELECT
        blogs.*,
        categories.title AS category_name
    FROM blogs
    LEFT JOIN categories
        ON blogs.category_id = categories.id
    WHERE blogs.id = $blog_id
    LIMIT 1
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) === 0) {
    die("Blog not found.");
}

$blog = mysqli_fetch_assoc($result);


// ======================================================
// FETCH RELATED BLOGS
// ======================================================

$relatedSql = "
    SELECT
        blogs.*,
        categories.title AS category_name
    FROM blogs
    LEFT JOIN categories
        ON blogs.category_id = categories.id
    WHERE blogs.id != $blog_id
    ORDER BY blogs.id DESC
    LIMIT 4
";

$relatedBlogs = mysqli_query($conn, $relatedSql);

?>


<!-- =====================================================
     BLOG DETAIL PAGE
====================================================== -->

<div class="blog-detail-page">


    <!-- =================================================
         PAGE HEADER
    ================================================== -->
<section 
    class="blog-detail-header"
    style="
        background-image:
        linear-gradient(rgba(0,0,0,0.60), rgba(0, 0, 0, 0.99)),
        url('images/blogs/<?php echo htmlspecialchars($blog['image']); ?>');
    "
>

    <div class="container">

        <div class="blog-breadcrumb">

            <!-- Home -->
            <a href="./">Home</a>

            <span>/</span>

            <!-- Blog -->
            <a href="blog">Blog</a>

            <span>/</span>

            <span>Blog Details</span>

        </div>


        <div class="blog-header-content">

            <span class="blog-header-label">
                Deewariya Art Insights
            </span>

            <h1>
                <?php echo htmlspecialchars($blog['title']); ?>
            </h1>


            <div class="blog-meta">

                <?php if (!empty($blog['created_at'])) { ?>

                    <span>
                        <i class="fa fa-calendar-alt"></i>

                        <?php
                        echo date(
                            'M d, Y',
                            strtotime($blog['created_at'])
                        );
                        ?>
                    </span>

                <?php } ?>


                <?php if (!empty($blog['category_name'])) { ?>

                    <span>
                        <i class="fa fa-folder-open"></i>

                        <?php
                        echo htmlspecialchars(
                            $blog['category_name']
                        );
                        ?>
                    </span>

                <?php } ?>


                <?php if (!empty($blog['author'])) { ?>

                    <span>
                        <i class="fa fa-user"></i>

                        <?php
                        echo htmlspecialchars(
                            $blog['author']
                        );
                        ?>
                    </span>

                <?php } ?>

            </div>

        </div>

    </div>

</section>


    <!-- =================================================
         MAIN BLOG CONTENT
    ================================================== -->

    <section class="blog-detail-content">

        <div class="container">

            <div class="row justify-content-center">

                <div class="">


                    <!-- BLOG IMAGE -->

                    <div class="blog-main-image">

                        <img
                            src="images/blogs/<?php echo htmlspecialchars($blog['image']); ?>"
                            alt="<?php echo htmlspecialchars($blog['title']); ?>"
                            loading="lazy"
                        >

                    </div>


                    <!-- BLOG ARTICLE -->

                    <article class="blog-article">


                        <?php if (!empty($blog['short_description'])) { ?>

                            <div class="blog-intro">

                                <?php
                                echo htmlspecialchars(
                                    $blog['short_description']
                                );
                                ?>

                            </div>

                        <?php } ?>


                        <div class="blog-content">

                            <?php

                            /*
                             * details column contains HTML content.
                             * Do NOT use htmlspecialchars() here,
                             * otherwise HTML tags will appear as text.
                             */

                            echo $blog['details'];

                            ?>

                        </div>

                    </article>


                    <!-- AUTHOR -->

                    <?php if (!empty($blog['author'])) { ?>

                        <div class="blog-author-box">


                            <?php if (!empty($blog['author_image'])) { ?>

                                <div class="blog-author-image">

                                    <img
                                        src="images/blogs/<?php echo htmlspecialchars($blog['author_image']); ?>"
                                        alt="<?php echo htmlspecialchars($blog['author']); ?>"
                                        loading="lazy"
                                    >

                                </div>

                            <?php } ?>


                            <div class="blog-author-info">

                                <span>Written by</span>

                                <h4>
                                    <?php
                                    echo htmlspecialchars(
                                        $blog['author']
                                    );
                                    ?>
                                </h4>

                            </div>

                        </div>

                    <?php } ?>


                    <!-- BACK TO BLOG -->

                    <div class="blog-back-button">

                        <a href="blog">

                            <i class="fa fa-arrow-left"></i>

                            Back to Blog

                        </a>

                    </div>


                </div>

            </div>

        </div>

    </section>


    <!-- =================================================
         RELATED BLOGS
    ================================================== -->

    <section class="related-blog-section">

        <div class="container">


            <div class="related-heading">

                <span>Discover More</span>

                <h2>
                    Related Blogs
                </h2>

                <p>
                    Explore more stories, ideas and insights from Deewariya.
                </p>

            </div>


            <div class="row g-4">


                <?php if ($relatedBlogs && mysqli_num_rows($relatedBlogs) > 0) { ?>


                    <?php while ($row = mysqli_fetch_assoc($relatedBlogs)) { ?>


                        <div class="col-lg-6">

                            <article class="related-blog-card">


                                <!-- IMAGE -->

                                <a
                                    href="blogdetal/<?php echo (int)$row['id']; ?>"
                                    class="related-blog-image"
                                >

                                    <img
                                        src="images/blogs/<?php echo htmlspecialchars($row['image']); ?>"
                                        alt="<?php echo htmlspecialchars($row['title']); ?>"
                                        loading="lazy"
                                    >

                                </a>


                                <!-- CONTENT -->

                                <div class="related-blog-content">


                                    <div class="related-blog-meta">


                                        <?php if (!empty($row['created_at'])) { ?>

                                            <span>

                                                <?php
                                                echo date(
                                                    'M d, Y',
                                                    strtotime($row['created_at'])
                                                );
                                                ?>

                                            </span>

                                        <?php } ?>


                                        <?php if (!empty($row['category_name'])) { ?>

                                            <span class="related-category">

                                                <?php
                                                echo htmlspecialchars(
                                                    $row['category_name']
                                                );
                                                ?>

                                            </span>

                                        <?php } ?>


                                    </div>


                                    <h3>

                                        <a
                                            href="blogdetal/<?php echo (int)$row['id']; ?>"
                                        >

                                            <?php
                                            echo htmlspecialchars(
                                                $row['title']
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
                                        href="blogdetal/<?php echo (int)$row['id']; ?>"
                                        class="related-read-more"
                                    >

                                        Read Article

                                        <i class="fa fa-arrow-right"></i>

                                    </a>


                                </div>

                            </article>

                        </div>


                    <?php } ?>


                <?php } else { ?>


                    <div class="col-12">

                        <div class="no-related-blog">

                            No related blog posts found.

                        </div>

                    </div>


                <?php } ?>


            </div>

        </div>

    </section>


</div>