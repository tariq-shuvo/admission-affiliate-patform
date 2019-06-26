<!DOCTYPE html>
<html data-brackets-id='271'>
<head data-brackets-id='272'>
    <meta data-brackets-id='273' charset="utf-8">
    <meta data-brackets-id='274' http-equiv="X-UA-Compatible" content="IE=edge">
    <title data-brackets-id='275'><?php echo $title; ?></title>
    <meta data-brackets-id='276' name="description" content="">
    <meta data-brackets-id='277' name="viewport" content="width=device-width, initial-scale=1">
    <meta data-brackets-id='278' name="robots" content="all,follow">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--    <link data-brackets-id='283' rel="stylesheet" href="--><?php //echo base_url('assets/css/bootstrap.min.css'); ?><!--">-->

    <!-- Fontastic Custom icon font-->
    <link data-brackets-id='281' rel="stylesheet" href="<?php echo base_url('assets/css/dashboard/fontastic.css'); ?>">
    <!-- Google fonts -->
    <link data-brackets-id='282' href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- custom stylesheet-->
    <link data-brackets-id='283' rel="stylesheet" href="<?php echo base_url('assets/css/dashboard/style.default.css'); ?>">
    <!--    Admission Page Css-->
    <link data-brackets-id='283' rel="stylesheet" href="<?php echo base_url('assets/css/admission/course.css'); ?>">
    <!--    Create User Css-->
    <link data-brackets-id='283' rel="stylesheet" href="<?php echo base_url('assets/css/createuser/newuser.css'); ?>">
    <!--    All Students CSS-->
    <link data-brackets-id='283' rel="stylesheet" href="<?php echo base_url('assets/css/students/view_std_info.css'); ?>">
    <!--    View Students-->
    <link data-brackets-id='283' rel="stylesheet" href="<?php echo base_url('assets/css/students/view_student.css'); ?>">
    <!-- media stylesheet -->
    <link data-brackets-id='284' rel="stylesheet" href="<?php echo base_url('assets/css/dashboard/media.css'); ?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fav.png'); ?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body data-brackets-id='286'>
<!-- Side Navbar -->
<nav data-brackets-id='287' class="side-navbar">
    <div data-brackets-id='288' class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div data-brackets-id='289' class="sidenav-header d-flex align-items-center justify-content-center">
            <div data-brackets-id='290' class="sidenav-header-inner text-center">
                <img data-brackets-id='291' src="<?php echo base_url('assets/images/ss2.jpg'); ?>" alt="Logo image" class="img-fluid">
            </div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div data-brackets-id='292' class="main-menu">
            <ul data-brackets-id='293' id="side-main-menu" class="side-menu list-unstyled">
                <li data-brackets-id='294' class="<?php if(isset($navigation)){
                    echo $navigation=='dashboard'?"active":"";
                } ?>">
                    <a data-brackets-id='295' href="<?php echo base_url('affiliate/dashboard'); ?>">AFFILIATE DASHBOARD</a>
                </li>
                <li data-brackets-id='298' class="<?php if(isset($navigation)){
                    echo $navigation=='referrals'?"active":"";
                } ?>">
                    <a data-brackets-id='299' href="<?php echo base_url('affiliate/referrals'); ?>">REFERRAL LIST</a>
                </li>
                <li data-brackets-id='298' class="<?php if(isset($navigation)){
                    echo $navigation=='earnings'?"active":"";
                } ?>">
                    <a data-brackets-id='299' href="<?php echo base_url('affiliate/earnings'); ?>">EARNINGS</a>
                </li>
                <li data-brackets-id='298' class="<?php if(isset($navigation)){
                    echo $navigation=='transactions'?"active":"";
                } ?>">
                    <a data-brackets-id='299' href="<?php echo base_url('affiliate/transactions'); ?>">TRANSACTIONS</a>
                </li>
                <li data-brackets-id='298' class="<?php if(isset($navigation)){
                    echo $navigation=='courses'?"active":"";
                } ?>">
                    <a data-brackets-id='299' href="<?php echo base_url('affiliate/courses'); ?>">COURSES</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div data-brackets-id='300' class="page">
    <!--  navbar-->
    <header data-brackets-id='301' class="header">
        <nav data-brackets-id='302' class="navbar">
            <div data-brackets-id='303' class="container-fluid">
                <div data-brackets-id='304' class="navbar-holder d-flex align-items-center justify-content-between">
                    <div data-brackets-id='305' class="navbar-header d-block d-lg-none">
                        <a data-brackets-id='306' id="toggle-btn" href="#" class="menu-btn"><i data-brackets-id='307' class="icon-bars"></i></a>
                    </div>
                    <div data-brackets-id='308' class="brand-text d-none d-md-inline-block">
                        <p data-brackets-id='309' class="custom_text1"><?php echo $affilate_name; ?></p><p data-brackets-id='310' class="custom_text2">Affiliate Partner</p>
                    </div>
                    <ul data-brackets-id='311' class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center ">
                        <li data-brackets-id='312' class="nav-item">

                            <div data-brackets-id='313' class="dropdown show">
                                <a data-brackets-id='314' class="btn btn-secondary dropdown-toggle custom_settings_btn btn-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-brackets-id='315' class="fas fa-cog"></i> SETTINGS
                                </a>

                                <div data-brackets-id='316' class="dropdown-menu custom_dropdown" aria-labelledby="dropdownMenuLink">
                                    <a data-brackets-id='318' class="dropdown-item" href="#">Help</a>
                                    <a data-brackets-id='319' class="dropdown-item" href="<?php echo base_url('affiliate/logout'); ?>">Signout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div id="content">