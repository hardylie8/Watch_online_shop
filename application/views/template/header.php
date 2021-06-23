<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Watch shop | eCommers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css '); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css '); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/flaticon.css '); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/slicknav.css '); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css '); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/magnific-popup.css '); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome-all.min.css '); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css '); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/slick.css '); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/nice-select.css '); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css '); ?>">
</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?php echo base_url('assets/img/logo/logo.png'); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="<?php echo base_url('assets/img/logo/logo.png'); ?>" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav id="navigation">
                                <ul>
                                    <li><a href="<?= site_url('/'); ?>">home</a></li>
                                    <li><a href="<?= site_url('/shop'); ?>">shop</a></li>
                                    <?php if (isset($status) && $status == 'Admin') { ?>
                                        <li>
                                            <a href="<?= site_url('/addproduct'); ?>">New Product</a>
                                        </li>
                                        <li><a href="<?= site_url('/order'); ?>">Order</a></li>
                                    <?php } ?>
                                    <li><a href="<?= site_url('/history'); ?>">History</a></li>
                                    <li><a href="contact.html">Contact</a></li>

                                </ul>

                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                        <span class="flaticon-search"></span>
                                    </div>
                                </li>

                                <li><a href="<?= site_url('/cart'); ?>"><span class="flaticon-shopping-cart"></span></a> </li>

                                <li>
                                    <a class="text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php if (isset($name)) {
                                            echo $name;
                                        } else {
                                            echo '<span class="flaticon-user"></span>';
                                        } ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <?php if (!isset($name)) { ?>
                                            <a class="dropdown-item" href="<?= site_url('/login'); ?>">Login</a>
                                            <a class="dropdown-item" href="<?= site_url('/signup'); ?>">Sign Up</a>
                                        <?php } else { ?>
                                            <a class="dropdown-item" href="<?= site_url('/logout'); ?>">Log Out</a>
                                        <?php } ?>
                                    </div>
                                    <!-- <a href="#" class="text-dark"></a>
                                    <ul class="submenu">
                                        <li><a href="<?= site_url('/login'); ?>" >Login</a></li>
                                        <li><a href="<?= site_url('/signup'); ?>">Sign Up</a></li>
                                        <li><a href="<?= site_url('/logout'); ?>">logout</a></li>
                                    </ul> -->
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>