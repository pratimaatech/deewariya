<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

    <title><?=$setting['website_title']?></title>
    <link rel="shortcut icon" type="image/ico" href="images/setting/<?=$setting['favicon']?>">

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  
  <!-- Lightbox2 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet" />


</head>

<body>

  <div class="hero_area">
  
    <!-- header section strats -->
    <header class="header_section <?=(!isset($_GET['page']) ? '' : 'header--normal')?>">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="<?=SITE_URL?>">
          <span>
              <?= !empty($setting['website_name']) ? $setting['website_name'] : 'Aunty Momos'; ?>
          </span>

          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item ">
                <a class="nav-link <?=(!isset($_GET['page']) ? 'active' : '')?>" href="<?=SITE_URL?>">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item  <?=(isset($_GET['page']) && $_GET['page'] ==='about' ? 'active' : '')?>">
                <a class="nav-link" href="?page=about">About</a>
              </li>
              <li class="nav-item" <?=(isset($_GET['page']) && $_GET['page'] ==='menu' ? 'active' : '')?>>
                <a class="nav-link" href="?page=menu">Menu</a>
              </li>
              <li class="nav-item" <?=(isset($_GET['page']) && $_GET['page'] ==='gallery' ? 'active' : '')?>>
                <a class="nav-link" href="?page=gallery">Gallery</a>
              </li>
              <li class="nav-item" <?=(isset($_GET['page']) && $_GET['page'] ==='contact-us' ? 'active' : '')?>>
                <a class="nav-link" href="?page=contact-us">Contact Us</a>
              </li>
            </ul>
            
            <div class="user_option">
              <a href="?page=contact-us" class="order_online">
                Order Online
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
   


