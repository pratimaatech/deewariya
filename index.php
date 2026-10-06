<?php
include("common/head.php");
include("common/custom-cursor.php");

$page = $_GET['page'] ?? 'home';

switch ($page) {

    case "home":
        include("page/home.php");
        break;

    case "about":
        include("page/about.php");
        break;

    case "projectdetail":
        include("page/projectdetail.php");
        break;

    case "gallery":
        include("page/gallery.php");
        break;

    case "blog":
        include("page/blog.php");
        break;

    case "blogdetal":
        include("page/blogdetal.php");
        break;

        case "events":
        include("page/events.php");
        break;

    case "open":
        include("page/open.php");
        break;

    case "service":
        include("page/service.php");
        break;

    case "servicedetail":
        include("page/servicedetail.php");
        break;

    case "team":
        include("page/team.php");
        break;

    case "testimonial":
        include("page/testimonial.php");
        break;

    case "price":
        include("page/price.php");
        break;

    case "contact":
        include("page/contact.php");
        break;

    default:
        include("page/404.php");
        break;
}

include("common/footer.php");
