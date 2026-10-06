<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">

        <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">
            Our Blog
        </h1>

        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center text-uppercase mb-0">

                <li class="breadcrumb-item">
                    <a class="text-white" href="./">Home</a>
                </li>

                <li class="breadcrumb-item">
                    <a class="text-white" href="blog">
                        Deewariya Art Insights
                    </a>
                </li>

                <li class="breadcrumb-item text-primary active" aria-current="page">
                    Blog
                </li>

            </ol>
        </nav>

    </div>
</div>
<!-- Page Header End -->


<?php

$category_id = isset($_GET['category']) && is_numeric($_GET['category'])
    ? (int)$_GET['category']
    : 0;


/*
|--------------------------------------------------------------------------
| Blog Query
|--------------------------------------------------------------------------
*/

if ($category_id > 0) {

    $sql = "
        SELECT
            blogs.*,
            categories.title AS category_name
        FROM blogs
        LEFT JOIN categories
            ON blogs.category_id = categories.id
        WHERE blogs.category_id = $category_id
        ORDER BY blogs.id DESC
    ";

} else {

    $sql = "
        SELECT
            blogs.*,
            categories.title AS category_name
        FROM blogs
        LEFT JOIN categories
            ON blogs.category_id = categories.id
        ORDER BY blogs.id DESC
    ";

}

$blogs = mysqli_query($conn, $sql);

?>


<!-- Blog Content -->
<div class="container mb-5">

    <div class="row g-4">


        <!-- Blog Posts -->
        <div class="col-lg-8">

            <?php if (mysqli_num_rows($blogs) > 0) { ?>

                <?php while ($blog = mysqli_fetch_assoc($blogs)) { ?>

                    <!-- Blog Post -->
                    <a href="blogdetal/<?php echo (int)$blog['id']; ?>" 
   class="text-decoration-none text-dark d-block">

    <div class="card mb-4 blog-card shadow-sm">

        <!-- Blog Image -->
        <img 
            src="images/blogs/<?php echo htmlspecialchars($blog['image']); ?>" 
            class="card-img-top" 
            loading="lazy" 
            alt="<?php echo htmlspecialchars($blog['title']); ?>"
        >

        <div class="card-body">

            <!-- Blog Title -->
            <h5 class="card-title blogs-title">
                <?php echo htmlspecialchars($blog['title']); ?>
            </h5>

            <!-- Blog Short Description -->
            <p class="card-text">
                <?php echo htmlspecialchars($blog['short_description']); ?>
            </p>

            <!-- Read More -->
            <span class="btn read-more-btn">
                Read More
                <i class="fa fa-arrow-right ms-1"></i>
            </span>

        </div>

    </div>

</a>
                    <!-- Blog Post End -->

                <?php } ?>

            <?php } else { ?>

                <div class="text-center">

                    <p>No blogs available.</p>

                </div>

            <?php } ?>

        </div>
        <!-- Blog Posts End -->


        <!-- Sidebar -->
        <div class="col-lg-4">

            <div class="sidebar">


                <!-- Categories -->
                <h5>Categories</h5>

                <ul class="list-unstyled">

                    <?php

                    $category_sql = "
                        SELECT *
                        FROM categories
                        ORDER BY id ASC
                    ";

                    $category_result = mysqli_query($conn, $category_sql);


                    while ($category = mysqli_fetch_assoc($category_result)) {

                    ?>

                        <li>

                            <a
                                href="blog/category/<?php echo (int)$category['id']; ?>"
                                class="text-decoration-none"
                            >
                                <?php echo htmlspecialchars($category['title']); ?>
                            </a>

                        </li>

                    <?php } ?>

                </ul>
                <!-- Categories End -->


                <!-- Recent Posts -->
                <h5>Recent Posts</h5>

                <ul class="list-unstyled">

                    <?php

                    $recent_sql = "
                        SELECT id, title
                        FROM blogs
                        ORDER BY id DESC
                        LIMIT 5
                    ";

                    $recent_result = mysqli_query($conn, $recent_sql);


                    while ($recent = mysqli_fetch_assoc($recent_result)) {

                    ?>

                        <li>

                            <a
                                href="blogdetal/<?php echo (int)$recent['id']; ?>"
                                class="text-decoration-none text-dark"
                            >
                                <?php echo htmlspecialchars($recent['title']); ?>
                            </a>

                        </li>

                    <?php } ?>

                </ul>
                <!-- Recent Posts End -->


                <!-- Contact -->
                <h5>Contact</h5>

                <p>
                    <i class="fa fa-phone-alt me-2"></i>
                    +91 749-300-5903
                </p>

                <p>
                    <i class="fa fa-envelope me-2"></i>
                    deewariyaart@gmail.com
                </p>
                <!-- Contact End -->


            </div>

        </div>
        <!-- Sidebar End -->


    </div>

</div>
<!-- Blog Content End -->