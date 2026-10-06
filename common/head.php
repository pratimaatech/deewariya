
<?php

// ======================================================
// CURRENT PAGE
// ======================================================

$currentPage = $_GET['page'] ?? 'home';


// ======================================================
// DATABASE CONNECTION
// ======================================================

include 'manager/settings/config.php';

$config = new Config();
$conn = $config->Check();


// ======================================================
// GENERAL SETTINGS
// ======================================================

$settingSql = "SELECT * FROM setting WHERE id = 1 LIMIT 1";
$settingResult = mysqli_query($conn, $settingSql);
$setting = mysqli_fetch_assoc($settingResult) ?: [];


// ======================================================
// JSON SETTINGS
// ======================================================

$emailList = json_decode($setting['email'] ?? '', true) ?: [];
$phoneList = json_decode($setting['phone'] ?? '', true) ?: [];
$social = json_decode($setting['social_media'] ?? '', true) ?: [];

$email = $emailList[0] ?? '';
$phone = $phoneList[0] ?? '';


// ======================================================
// WEBSITE INFORMATION
// ======================================================

$websiteName = $setting['website_name'] ?? 'Deewariya';

$websiteTitle = $setting['website_title']
    ?? 'Deewariya | Mural Art & Wall Painting Studio';

$address = $setting['address'] ?? '';


// ======================================================
// LIVE WEBSITE URL
// ======================================================

$baseUrl = 'https://deewariya.space';


// ======================================================
// DEFAULT SEO
// ======================================================

$pageTitle =
    'Deewariya | Custom Mural Art & Wall Painting Studio';

$pageDescription =
    'Deewariya creates custom mural art, wall paintings, cafe murals, restaurant murals, home wall art, office artwork and creative spaces across India.';

$pageKeywords =
    'Deewariya, mural art, mural painting, wall painting, wall art, custom mural art, mural artist India, wall painting artist, cafe mural, restaurant mural, home wall painting, office wall art, hotel wall painting, Jharkhand mural artist, Rajasthan mural artist, Madhya Pradesh mural artist';

$pageUrl = $baseUrl . '/';

$pageImage =
    $baseUrl . '/image/logo2.png';


// ======================================================
// PAGE SEO
// ======================================================


// ------------------------------------------------------
// HOME
// ------------------------------------------------------

if ($currentPage === 'home') {

    $pageTitle =
        'Deewariya | Custom Mural Art & Wall Painting Studio';

    $pageDescription =
        'Deewariya creates custom mural art, wall painting, cafe murals, restaurant murals, home wall art, office artwork and creative spaces across India.';

    $pageKeywords =
        'Deewariya, mural art India, wall painting India, custom mural artist, wall art, mural painting, cafe mural, restaurant mural, home wall art, office wall painting';

    $pageUrl =
        $baseUrl . '/';

}


// ------------------------------------------------------
// ABOUT
// ------------------------------------------------------

elseif ($currentPage === 'about') {

    $pageTitle =
        'About Deewariya | Mural Art & Wall Painting Studio';

    $pageDescription =
        'Discover Deewariya, a creative mural art and wall painting studio creating custom artwork for homes, cafes, restaurants, offices, hotels and commercial spaces.';

    $pageKeywords =
        'about Deewariya, mural art studio, wall painting studio, mural artist India, custom wall art artist';

    $pageUrl =
        $baseUrl . '/about';

}


// ------------------------------------------------------
// GALLERY
// ------------------------------------------------------

elseif ($currentPage === 'gallery') {

    $pageTitle =
        'Mural Art Gallery | Wall Painting Projects | Deewariya';

    $pageDescription =
        'Explore Deewariya artwork including mural paintings, wall art, cafe murals, room artwork, restaurant murals, office artwork and creative wall designs.';

    $pageKeywords =
        'mural art gallery, wall painting gallery, mural artwork, wall art projects, Deewariya artwork, cafe mural gallery, wall painting designs';

    $pageUrl =
        $baseUrl . '/gallery';

}


// ------------------------------------------------------
// SERVICES
// ------------------------------------------------------

elseif ($currentPage === 'service') {

    $pageTitle =
        'Mural Art & Wall Painting Services | Deewariya';

    $pageDescription =
        'Explore Deewariya mural art and wall painting services including custom murals, cafe murals, restaurant artwork, home wall art, office wall painting and creative space design.';

    $pageKeywords =
        'mural art services, wall painting services, custom mural painting, cafe mural service, restaurant wall painting, home wall art, office wall painting, hotel wall painting';

    $pageUrl =
        $baseUrl . '/service';

}


// ------------------------------------------------------
// SERVICE DETAIL
// ------------------------------------------------------

elseif ($currentPage === 'servicedetail' && isset($_GET['id']) && is_numeric($_GET['id'])) {

    $serviceId = (int) $_GET['id'];

    $serviceSql = "
        SELECT *
        FROM services
        WHERE id = $serviceId
        LIMIT 1
    ";

    $serviceResult = mysqli_query($conn, $serviceSql);

    if ($serviceResult && mysqli_num_rows($serviceResult) > 0) {

        $service = mysqli_fetch_assoc($serviceResult);

        $serviceName =
            trim($service['name'] ?? '');

        $serviceDescription =
            trim(
                strip_tags(
                    $service['short_description']
                    ?? $service['description']
                    ?? $service['designation']
                    ?? ''
                )
            );

        if ($serviceName !== '') {

            $pageTitle =
                $serviceName . ' | Mural Art & Wall Painting | Deewariya';

            $pageDescription =
                $serviceDescription !== ''
                ? mb_substr($serviceDescription, 0, 155)
                : 'Explore ' . $serviceName . ' by Deewariya, a custom mural art and wall painting studio creating artwork for homes, cafes, restaurants, offices and commercial spaces.';

            $pageKeywords =
                $serviceName .
                ', mural art, wall painting, custom wall art, Deewariya, mural artist India';

            $pageUrl =
                $baseUrl .
                '/servicedetail/' .
                $serviceId;


            // Service Image

            if (!empty($service['image'])) {

                $pageImage =
                    $baseUrl .
                    '/images/services/' .
                    rawurlencode($service['image']);

            }

        }

    }

}


// ------------------------------------------------------
// BLOG
// ------------------------------------------------------

elseif ($currentPage === 'blog') {

    $pageTitle =
        'Mural Art Blog & Wall Painting Ideas | Deewariya';

    $pageDescription =
        'Read Deewariya articles about mural art, wall painting ideas, creative spaces, interior artwork, cafe murals, custom wall designs and artistic inspiration.';

    $pageKeywords =
        'mural art blog, wall painting ideas, mural painting ideas, wall art ideas, interior wall art, cafe mural ideas, Deewariya blog';

    $pageUrl =
        $baseUrl . '/blog';

}


// ------------------------------------------------------
// BLOG DETAIL
// ------------------------------------------------------

elseif ($currentPage === 'blogdetal' && isset($_GET['id']) && is_numeric($_GET['id'])) {

    $blogId = (int) $_GET['id'];

    $blogSql = "
        SELECT blogs.*, categories.title AS category_name
        FROM blogs
        LEFT JOIN categories
            ON blogs.category_id = categories.id
        WHERE blogs.id = $blogId
        LIMIT 1
    ";

    $blogResult = mysqli_query($conn, $blogSql);

    if ($blogResult && mysqli_num_rows($blogResult) > 0) {

        $blog = mysqli_fetch_assoc($blogResult);

        $blogTitle =
            trim($blog['title'] ?? '');

        $blogDescription =
            trim(
                strip_tags(
                    $blog['short_description']
                    ?? $blog['description']
                    ?? $blog['details']
                    ?? ''
                )
            );

        $blogCategory =
            trim($blog['category_name'] ?? '');

        if ($blogTitle !== '') {

            $pageTitle =
                $blogTitle . ' | Deewariya Art';

            if ($blogDescription !== '') {

                $pageDescription =
                    mb_substr(
                        $blogDescription,
                        0,
                        155
                    );

            } else {

                $pageDescription =
                    'Read ' .
                    $blogTitle .
                    ' on Deewariya, featuring mural art, wall painting ideas, creative artwork and artistic inspiration.';

            }

            $pageKeywords =
                $blogTitle .
                ', mural art, wall painting, Deewariya, ' .
                $blogCategory;

            $pageUrl =
                $baseUrl .
                '/blogdetal/' .
                $blogId;


            // Blog Image

            if (!empty($blog['image'])) {

                /*
                 * IMPORTANT:
                 * If your actual folder is images/blog/
                 * instead of images/blogs/, change blogs
                 * to blog here.
                 */

                $pageImage =
                    $baseUrl .
                    '/images/blogs/' .
                    rawurlencode($blog['image']);

            }

        }

    }

}


// ------------------------------------------------------
// PROJECT DETAIL
// ------------------------------------------------------

elseif ($currentPage === 'projectdetail' && isset($_GET['id']) && is_numeric($_GET['id'])) {

    $projectId = (int) $_GET['id'];

    $projectSql = "
        SELECT *
        FROM projects
        WHERE id = $projectId
        LIMIT 1
    ";

    $projectResult = mysqli_query($conn, $projectSql);

    if ($projectResult && mysqli_num_rows($projectResult) > 0) {

        $project = mysqli_fetch_assoc($projectResult);

        $projectName =
            trim($project['name'] ?? '');

        $projectDescription =
            trim(
                strip_tags(
                    $project['short_description']
                    ?? $project['description']
                    ?? $project['details']
                    ?? ''
                )
            );

        $projectCategory =
            trim($project['category'] ?? '');

        if ($projectName !== '') {

            $pageTitle =
                $projectName .
                ' | Mural Art Project | Deewariya';

            if ($projectDescription !== '') {

                $pageDescription =
                    mb_substr(
                        $projectDescription,
                        0,
                        155
                    );

            } else {

                $pageDescription =
                    'Explore ' .
                    $projectName .
                    ', a mural art and wall painting project by Deewariya.';

            }

            $pageKeywords =
                $projectName .
                ', mural art project, wall painting project, Deewariya, ' .
                $projectCategory;

            $pageUrl =
                $baseUrl .
                '/projectdetail/' .
                $projectId;


            // Project Image

            if (!empty($project['image'])) {

                $pageImage =
                    $baseUrl .
                    '/images/projects/' .
                    rawurlencode($project['image']);

            }

        }

    }

}


// ------------------------------------------------------
// CONTACT
// ------------------------------------------------------

elseif ($currentPage === 'contact') {

    $pageTitle =
        'Contact Deewariya | Mural Art & Wall Painting Studio';

    $pageDescription =
        'Contact Deewariya for custom mural art, wall painting, cafe murals, restaurant artwork, home wall art, office artwork and creative wall projects across India.';

    $pageKeywords =
        'contact mural artist, contact Deewariya, mural artist India, wall painting artist, custom mural art';

    $pageUrl =
        $baseUrl . '/contact';

}


// ======================================================
// CLEAN SEO VALUES
// ======================================================

$pageTitle =
    trim($pageTitle);

$pageDescription =
    trim($pageDescription);

$pageKeywords =
    trim($pageKeywords);

$pageTitleEscaped =
    htmlspecialchars(
        $pageTitle,
        ENT_QUOTES,
        'UTF-8'
    );

$pageDescriptionEscaped =
    htmlspecialchars(
        $pageDescription,
        ENT_QUOTES,
        'UTF-8'
    );

$pageKeywordsEscaped =
    htmlspecialchars(
        $pageKeywords,
        ENT_QUOTES,
        'UTF-8'
    );

$pageUrlEscaped =
    htmlspecialchars(
        $pageUrl,
        ENT_QUOTES,
        'UTF-8'
    );

$pageImageEscaped =
    htmlspecialchars(
        $pageImage,
        ENT_QUOTES,
        'UTF-8'
    );


// ======================================================
// ORGANIZATION / SOCIAL LINKS
// ======================================================

$instagramUrl = $social['instagram'] ?? '';
$linkedinUrl  = $social['linkedin'] ?? '';
$facebookUrl  = $social['facebook'] ?? '';
$youtubeUrl   = $social['youtube'] ?? '';
$twitterUrl   = $social['twitter'] ?? '';

$logoFile = trim($setting['logo'] ?? '');
$faviconFile = trim($setting['favicon'] ?? '');

if (
    empty($logoFile) ||
    $logoFile === 'Not valid image type!'
) {
    $logoUrl = $baseUrl . '/image/logo2.png';
} else {
    $logoUrl = $baseUrl . '/images/setting/' . rawurlencode($logoFile);
}

if (
    empty($faviconFile) ||
    $faviconFile === 'Not valid image type!'
) {
    $faviconUrl = $baseUrl . '/image/favicon.png';
} else {
    $faviconUrl = $baseUrl . '/images/setting/' . rawurlencode($faviconFile);
}

$logoUrlEscaped = htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8');
$faviconUrlEscaped = htmlspecialchars($faviconUrl, ENT_QUOTES, 'UTF-8');


?>

<!DOCTYPE html>

<html lang="en">

<head>


    <!-- ==================================================
         BASIC SEO
    =================================================== -->

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="robots"
        content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1"
    >

    <meta
        name="googlebot"
        content="index, follow, max-image-preview:large"
    >

    <meta
        name="author"
        content="<?php echo htmlspecialchars($websiteName, ENT_QUOTES, 'UTF-8'); ?> Art Studio"
    >

    <meta
        name="theme-color"
        content="#1f1f1f"
    >


    <!-- ==================================================
         TITLE
    =================================================== -->

    <title>
        <?php echo $pageTitleEscaped; ?>
    </title>


    <!-- ==================================================
         META DESCRIPTION
    =================================================== -->

    <meta
        name="description"
        content="<?php echo $pageDescriptionEscaped; ?>"
    >


    <!-- ==================================================
         KEYWORDS
    =================================================== -->

    <meta
        name="keywords"
        content="<?php echo $pageKeywordsEscaped; ?>"
    >


    <!-- ==================================================
         CANONICAL
    =================================================== -->

    <link
        rel="canonical"
        href="<?php echo $pageUrlEscaped; ?>"
    >


    <!-- ==================================================
         BASE URL
    =================================================== -->

    <?php
$isLocal = (
    ($_SERVER['HTTP_HOST'] ?? '') === 'localhost' ||
    ($_SERVER['HTTP_HOST'] ?? '') === '127.0.0.1'
);
?>
<base href="<?php echo $isLocal ? '/arts/' : '/'; ?>">


    <!-- ==================================================
         OPEN GRAPH
         WhatsApp / Facebook / LinkedIn
    =================================================== -->

    <meta
        property="og:locale"
        content="en_IN"
    >

    <meta
        property="og:type"
        content="website"
    >

    <meta
        property="og:site_name"
        content="<?php echo htmlspecialchars($websiteName, ENT_QUOTES, 'UTF-8'); ?>"
    >

    <meta
        property="og:title"
        content="<?php echo $pageTitleEscaped; ?>"
    >

    <meta
        property="og:description"
        content="<?php echo $pageDescriptionEscaped; ?>"
    >

    <meta
        property="og:url"
        content="<?php echo $pageUrlEscaped; ?>"
    >

    <meta
        property="og:image"
        content="<?php echo $pageImageEscaped; ?>"
    >

    <meta
        property="og:image:alt"
        content="Deewariya Mural Art and Wall Painting"
    >

    <meta
        property="og:image:type"
        content="image/jpeg"
    >


    <!-- ==================================================
         TWITTER / X
    =================================================== -->

    <meta
        name="twitter:card"
        content="summary_large_image"
    >

    <meta
        name="twitter:title"
        content="<?php echo $pageTitleEscaped; ?>"
    >

    <meta
        name="twitter:description"
        content="<?php echo $pageDescriptionEscaped; ?>"
    >

    <meta
        name="twitter:image"
        content="<?php echo $pageImageEscaped; ?>"
    >

    <meta
        name="twitter:image:alt"
        content="Deewariya Mural Art and Wall Painting"
    >


    <!-- ==================================================
         FAVICON
    =================================================== -->

    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="<?php echo $faviconUrlEscaped; ?>"
    >

    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="<?php echo $faviconUrlEscaped; ?>"
    >

    <link
        rel="apple-touch-icon"
        href="<?php echo $logoUrlEscaped; ?>"
    >


    <!-- ==================================================
         GOOGLE FONTS
    =================================================== -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Oswald:wght@600&display=swap"
        rel="stylesheet"
    >


    <!-- ==================================================
         FONT AWESOME
    =================================================== -->

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet"
    >


    <!-- ==================================================
         BOOTSTRAP
    =================================================== -->

    <link
        href="css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- ==================================================
         CUSTOM CSS
    =================================================== -->

    <link
        href="css/style.css"
        rel="stylesheet"
    >


    <!-- ==================================================
         STRUCTURED DATA
    =================================================== -->

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ArtGallery",
        "@id": "<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/#organization",

        "name": "<?php echo htmlspecialchars($websiteName, ENT_QUOTES, 'UTF-8'); ?>",

        "alternateName": "<?php echo htmlspecialchars($websiteTitle, ENT_QUOTES, 'UTF-8'); ?>",

        "url": "<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/",

        "logo": {
            "@type": "ImageObject",
            "url": "<?php echo $logoUrlEscaped; ?>"
        },

        "image": "<?php echo $logoUrlEscaped; ?>",

        "description": "Custom mural art and wall painting studio creating artwork for homes, cafes, restaurants, offices, hotels and commercial spaces across India.",

        "telephone": "<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>",

        "email": "<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>",

        "address": {
            "@type": "PostalAddress",
            "addressLocality": "<?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?>",
            "addressCountry": "IN"
        },

        "areaServed": [
            {
                "@type": "Country",
                "name": "India"
            },
            {
                "@type": "State",
                "name": "Jharkhand"
            },
            {
                "@type": "State",
                "name": "Rajasthan"
            },
            {
                "@type": "State",
                "name": "Madhya Pradesh"
            }
        ],

        "knowsAbout": [
            "Mural Art",
            "Wall Painting",
            "Custom Wall Art",
            "Cafe Murals",
            "Restaurant Murals",
            "Home Wall Art",
            "Office Wall Art",
            "Hotel Wall Painting"
        ],

        "sameAs": [
            <?php
            $sameAsUrls = array_values(array_filter([
                $instagramUrl,
                $linkedinUrl,
                $facebookUrl,
                $youtubeUrl,
                $twitterUrl
            ]));

            $sameAsJson = array_map(
                static function ($url) {
                    return htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
                },
                $sameAsUrls
            );

            echo '"' . implode('", "', $sameAsJson) . '"';
            ?>
        ]
    }
    </script>


    
    <!-- ==================================================
         WEBSITE STRUCTURED DATA
    =================================================== -->

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "@id": "<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/#website",

        "url": "<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/",

        "name": "<?php echo htmlspecialchars($websiteName, ENT_QUOTES, 'UTF-8'); ?>",

        "description": "Custom Mural Art & Wall Painting Studio",

        "publisher": {
            "@id": "<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/#organization"
        }
    }
    </script>


</head>


<body>


<!-- =====================================================
     NAVBAR
====================================================== -->

<nav
    class="navbar navbar-expand-lg bg-secondary navbar-dark sticky-top py-lg-0 px-lg-5"
>

    <!-- LOGO -->

    <a
        href="./"
        class="navbar-brand d-flex align-items-center"
        aria-label="Deewariya Home"
    >

        <img
            src="image/logo2.png"
            alt="<?php echo htmlspecialchars($websiteName, ENT_QUOTES, 'UTF-8'); ?> Custom Mural Art and Wall Painting Studio"
            class="logo-img"
            width="180"
            height="60"
        >

    </a>


    <!-- MOBILE MENU -->

    <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse"
        aria-expanded="false"
        aria-label="Open navigation menu"
    >

        <span class="navbar-toggler-icon"></span>

    </button>


    <!-- NAVIGATION -->

    <div
        class="collapse navbar-collapse"
        id="navbarCollapse"
    >

        <div class="navbar-nav ms-auto">

            <a
                href="./"
                class="nav-item nav-link"
            >
                Home
            </a>

            <a
                href="about"
                class="nav-item nav-link"
            >
                About
            </a>

            

            <a
                href="service"
                class="nav-item nav-link"
            >
                Services
            </a>

            <a
                href="blog"
                class="nav-item nav-link"
            >
                Blog
            </a>

            <a
                href="gallery"
                class="nav-item nav-link"
            >
                Gallery
            </a>
            
            <a
                href="contact"
                class="nav-item nav-link"
            >
                Contact
            </a>

        </div>

    </div>

</nav>


<!-- =====================================================
     NAVBAR END
====================================================== -->


<!-- =====================================================
     PAGE LOADER START
====================================================== -->

<div id="page-loader">

    <div class="loader-wrapper">

        <!-- Favicon / Logo -->
        <div class="loader-logo">
            <img
                src="image/favicon.png"
                alt="<?php echo htmlspecialchars($websiteName, ENT_QUOTES, 'UTF-8'); ?>"
            >
        </div>

        <!-- Animated Ring -->
        <div class="loader-ring"></div>

        <!-- Loading Text -->
        <div class="loader-text">
            <span>DEEWARIYA</span>
            <small>ART STUDIO</small>
        </div>

    </div>

</div>

<!-- =====================================================
     PAGE LOADER END
====================================================== -->

<script>
document.addEventListener("DOMContentLoaded", function () {

    const loader = document.getElementById("page-loader");

    setTimeout(function () {

        loader.classList.add("loader-hidden");

    }, 500);

});
</script>

<!-- Artistic Cursor -->
<div class="art-cursor"></div>
<div class="art-cursor-ring"></div>