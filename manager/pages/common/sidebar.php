<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand my-3 d-flex align-items-center justify-content-center" href="<?=BASE_URL?>">
        <div class="sidebar-brand-icon ">
           <img src="<?=(SITE_URL.'images/setting/'.$web_data['favicon'])?>">
        </div>
        <div class="sidebar-brand-text mx-3"></div>
    </a>

    <li class="nav-item mt-3 <?=$page==null ? 'active' : ''?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

   

    <li class="nav-item <?=($page=='categories' || $page=='add-categories' ? 'active' : '')?>">
        <a class="nav-link" href="?page=categories">
            <i class="fas fa-layer-group"></i>
            <span>Categories</span>
        </a>
    </li>


    <li class="nav-item <?=($page=='services' || $page=='add-services' ? 'active' : '')?>">
        <a class="nav-link" href="?page=services">
            <i class="fas fa-concierge-bell"></i>
            <span>Services</span>
        </a>
    </li>
    

    <li class="nav-item <?=($page=='projects' || $page=='add-projects' ? 'active' : '')?>">
        <a class="nav-link" href="?page=projects">
            <i class="fas fa-th-large"></i>
            <span>Projects</span>
        </a>
    </li>
    

    <li class="nav-item <?=($page=='gallery' || $page=='add-gallery' ? 'active' : '')?>">
        <a class="nav-link" href="?page=gallery">
            <i class="fas fa-images"></i>
            <span>Gallery</span>
        </a>
    </li>

    <li class="nav-item <?=($page=='blogs' || $page=='add-blogs' ? 'active' : '')?>">
        <a class="nav-link" href="?page=blogs">
            <i class="fas fa-blog"></i>
            <span>Blogs</span>
        </a>
    </li>

    <li class="nav-item <?=($page=='testimonials' || $page=='add-testimonial' ? 'active' : '')?>">
        <a class="nav-link" href="?page=testimonials">
            <i class="fas fa-quote-left"></i>
            <span>Testimonials</span>
        </a>
    </li>

    <li class="nav-item <?=($page=='setting' || $page=='add-setting' ? 'active' : '')?>">
        <a class="nav-link" href="?page=setting">
            <i class="fas fa-cog"></i>
            <span>Setting</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
</ul>
