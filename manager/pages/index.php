<!DOCTYPE html>
<html lang="en">


<head>
    <?php $web_data = $model->fetch($model->selectByCF(['table' => 'setting', 'check' => ['id' => 1]])); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $web_data['website_title'] ?> - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="images/setting/<?= $data['favicon'] ?>" rel="icon">
    <link href="images/setting/<?= $data['favicon'] ?>" rel="apple-touch-icon">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/ckeditor/ckeditor.js"></script>
    <style>
        .cke {
            visibility: hidden;
        }
    </style>
    <script src="vendor/ckeditor/config.js" type="text/javascript"></script>
    <link href="vendor/ckeditor/skins/moono/editor_gecko.css" type="text/css" rel="stylesheet">
    <script src="vendor/ckeditor/lang/en.js" type="text/javascript"></script>
    <script src="vendor/ckeditor/styles.js" type="text/javascript"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php $page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : null;
        include("common/sidebar.php") ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php
                $profile = $model->fetch($model->selectByCF([
                    'table' => 'admin',
                    'check' => [
                        'id' => 1
                    ]
                ]));
                include("common/header.php");

                if (isset($_REQUEST["page"])) {

                    $page = $_REQUEST["page"];

                    switch ($page) {

                        case 'dashboard':

                            include("pages/dashboard.php");

                            break;



                        case 'product':
                            if (isset($_GET['id'])) {
                                $page_title = "Edit Product";

                                $data = $model->fetch($model->selectByCF([
                                    'table' => 'product',
                                    'check' => [
                                        'id' => $_GET['id']
                                    ]
                                ]));
                                include("pages/product/manage.php");
                            } else {
                                $page_title = "Product";
                                $orders_query = $model->query("select * from product order by id ASC");
                                include("pages/product/list.php");
                            }
                            break;

                        case 'add-product':
                            $page_title = "Add Product";
                            include("pages/product/manage.php");
                            break;

                        case 'delete-product':
                            $table = "product";
                            $id = ($_GET['id']);
                            $filter = array("table" => $table, "check" => array("id" => $id), "sort_by" => "id", "sort_type" => "desc");
                            $query = $model->deleteRow($filter);
                            $model->redirect("?page=product");
                            break;


                        case 'blogs':
                            if (isset($_GET['id'])) {
                                $page_title = "Edit Blogs";

                                $data = $model->fetch($model->selectByCF([
                                    'table' => 'blogs',
                                    'check' => [
                                        'id' => $_GET['id']
                                    ]
                                ]));
                                include("pages/blogs/manage.php");
                            } else {
                                $page_title = "Blogs";
                                $orders_query = $model->query("select * from blogs order by id ASC");
                                include("pages/blogs/list.php");
                            }
                            break;

                        case 'add-blogs':
                            $page_title = "Add Blogs";
                            include("pages/blogs/manage.php");
                            break;

                        case 'delete-blogs':
                            $table = "blogs";
                            $id = ($_GET['id']);
                            $filter = array("table" => $table, "check" => array("id" => $id), "sort_by" => "id", "sort_type" => "desc");
                            $query = $model->deleteRow($filter);
                            $model->redirect("?page=blogs");
                            break;



                        case 'categories':
                            if (isset($_GET['id'])) {
                                $page_title = "Edit Categories";

                                $data = $model->fetch($model->selectByCF([
                                    'table' => 'categories',
                                    'check' => [
                                        'id' => $_GET['id']
                                    ]
                                ]));
                                include("pages/categories/manage.php");
                            } else {
                                $page_title = "Categories";
                                $orders_query = $model->query("select * from categories order by id ASC");
                                include("pages/categories/list.php");
                            }
                            break;

                        case 'add-categories':
                            $page_title = "Add Categories";
                            include("pages/categories/manage.php");
                            break;

                        case 'delete-categories':

                            $table = "categories";

                            $id = ($_GET['id']);

                            $filter = array("table" => $table, "check" => array("id" => $id), "sort_by" => "id", "sort_type" => "desc");

                            $query = $model->deleteRow($filter);

                            $model->redirect("?page=categories");

                            break;


                        case 'testimonials':
                            if (isset($_GET['id'])) {
                                $page_title = "Edit Testimonial";

                                $data = $model->fetch($model->selectByCF([
                                    'table' => 'testimonials',
                                    'check' => [
                                        'id' => $_GET['id']
                                    ]
                                ]));
                                include("pages/testimonials/manage.php");
                            } else {
                                $page_title = "Testimonials";
                                $orders_query = $model->query("select * from testimonials order by id ASC");
                                include("pages/testimonials/list.php");
                            }
                            break;

                        case 'add-testimonials':
                            $page_title = "Add Testimonials";
                            include("pages/testimonials/manage.php");
                            break;

                        case 'delete-testimonials':
                            $table = "testimonials";
                            $id = ($_GET['id']);
                            $filter = array("table" => $table, "check" => array("id" => $id), "sort_by" => "id", "sort_type" => "desc");
                            $query = $model->deleteRow($filter);
                            $model->redirect("?page=testimonials");
                            break;

                            
                        // gellery
                            case 'gallery':
                            if (isset($_GET['id'])) {
                                $page_title = "Edit Gallery";

                                $data = $model->fetch($model->selectByCF([
                                    'table' => 'gallery',
                                    'check' => [
                                        'id' => $_GET['id']
                                    ]
                                ]));
                                include("pages/gallery/manage.php");
                            } else {
                                $page_title = "Gallery";
                                $orders_query = $model->query("select * from gallery order by id ASC");
                                include("pages/gallery/list.php");
                            }
                            break;

                        case 'add-gallery':
                            $page_title = "Add Gallery";
                            include("pages/gallery/manage.php");
                            break;

                        case 'delete-gallery':
                            $table = "gallery";
                            $id = ($_GET['id']);
                            $filter = array("table" => $table, "check" => array("id" => $id), "sort_by" => "id", "sort_type" => "desc");
                            $query = $model->deleteRow($filter);
                            $model->redirect("?page=gallery");
                            break;

                        case 'services':
                            if (isset($_GET['id'])) {
                                $page_title = "Edit Services";

                                $data = $model->fetch($model->selectByCF([
                                    'table' => 'services',
                                    'check' => [
                                        'id' => $_GET['id']
                                    ]
                                ]));
                                include("pages/services/manage.php");
                            } else {
                                $page_title = "Services";
                                $orders_query = $model->query("select * from services order by id ASC");
                                include("pages/services/list.php");
                            }
                            break;

                        case 'add-services':
                            $page_title = "Add Services";
                            include("pages/services/manage.php");
                            break;

                        case 'delete-services':
                            $table = "services";
                            $id = ($_GET['id']);
                            $filter = array("table" => $table, "check" => array("id" => $id), "sort_by" => "id", "sort_type" => "desc");
                            $query = $model->deleteRow($filter);
                            $model->redirect("?page=services");
                            break;

                        case 'slider':
                            if (isset($_GET['id'])) {
                                $page_title = "Edit slider";

                                $data = $model->fetch($model->selectByCF([
                                    'table' => 'slider',
                                    'check' => [
                                        'id' => $_GET['id']
                                    ]
                                ]));
                                include("pages/slider/manage.php");
                            } else {
                                $page_title = "slider";
                                $orders_query = $model->query("select * from slider order by id ASC");
                                include("pages/slider/list.php");
                            }
                            break;

                        case 'add-slider':
                            $page_title = "Add Services";
                            include("pages/slider/manage.php");
                            break;

                        case 'delete-slider':
                            $table = "slider";
                            $id = ($_GET['id']);
                            $filter = array("table" => $table, "check" => array("id" => $id), "sort_by" => "id", "sort_type" => "desc");
                            $query = $model->deleteRow($filter);
                            $model->redirect("?page=slider");
                            break;



                        case 'projects':

                            if (isset($_GET['id'])) {

                                // Edit Project
                                $page_title = "Edit Project";

                                $data = $model->fetch(
                                    $model->selectByCF([
                                        'table' => 'projects',
                                        'check' => [
                                            'id' => $_GET['id']
                                        ]
                                    ])
                                );

                                include("pages/projects/manage.php");
                            } else {

                                // Project List
                                $page_title = "Projects";

                                $orders_query = $model->query(
                                    "SELECT * FROM projects ORDER BY id ASC"
                                );

                                include("pages/projects/list.php");
                            }

                            break;


                        case 'add-project':

                            // Add Project
                            $page_title = "Add-Project";

                            include("pages/projects/manage.php");

                            break;


                        case 'delete-project':

                            // Delete Project
                            $table = "projects";

                            $id = $_GET['id'];

                            $filter = [
                                "table" => $table,
                                "check" => [
                                    "id" => $id
                                ],
                                "sort_by" => "id",
                                "sort_type" => "desc"
                            ];

                            $query = $model->deleteRow($filter);

                            $model->redirect("?page=projects");

                            break;




                        case 'logout':
                            unset($_SESSION['userId']);
                            unset($_SESSION['role']);
                            session_destroy();
                            $model->redirect(BASE_URL);

                            break;

                        case 'profile':
                            $page_title = "Profile Settings";
                            $data = $model->fetch($model->selectByCF(['table' => 'admin', 'check' => ['id' => 1]]));
                            include("pages/common/profile.php");

                            break;

                        case 'setting':
                            $page_title = "Website Settings";
                            $data = $model->fetch($model->selectByCF(['table' => 'setting', 'check' => ['id' => 1]]));
                            include("pages/setting.php");

                            break;

                        default:
                            include("pages/404.php");
                            break;
                    }
                } else {
                    include("pages/dashboard.php");
                }

                ?>

            </div>
            <!-- End of Main Content -->


            <?php include("common/footer.php") ?>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>

    <?php

    if ($page == "transactions") { ?>
        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bulma.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
    <?php } ?>

    <script type="text/javascript"
        src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/6/tinymce.min.js"></script>

    <script type="text/javascript">
        tinymce.init({
            selector: '#editor',
            menubar: false,
            statusbar: false,
            plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ',
            skin: 'bootstrap',
            toolbar_drawer: 'floating',
            min_height: 200,
            autoresize_bottom_margin: 16,
            setup: (editor) => {
                editor.on('init', () => {
                    editor.getContainer().style.transition = "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
                });
                editor.on('focus', () => {
                    editor.getContainer().style.boxShadow = "0 0 0 .2rem rgba(0, 123, 255, .25)",
                        editor.getContainer().style.borderColor = "#80bdff"
                });
                editor.on('blur', () => {
                    editor.getContainer().style.boxShadow = "",
                        editor.getContainer().style.borderColor = ""
                });
            }
        });
    </script>
</body>

</html>