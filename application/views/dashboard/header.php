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
                    <a data-brackets-id='295' href="<?php echo base_url(); ?>">DASHBOARD</a>
                </li>
                <li data-brackets-id='296' class="<?php if(isset($navigation)){
                    echo $navigation=='admission'?"active":"";
                } ?>">
                    <a data-brackets-id='297' href="<?php echo base_url('students/admission'); ?>">ADD STUDENT INFO</a>
                </li>
                <li data-brackets-id='298' class="<?php if(isset($navigation)){
                    echo $navigation=='students'?"active":"";
                } ?>">
                    <a data-brackets-id='299' href="<?php echo base_url('students'); ?>">VIEW STUDENT INFO</a>
                </li>
                <!-- new added -->
                <li>
                    <a href="#dropdownAdmin" aria-expanded="false" data-toggle="collapse">
                        ADMINISTRATOR &nbsp;<i class="fas fa-angle-down"></i>
                    </a>
                    <ul id="dropdownAdmin" class="collapse list-unstyled <?php if(isset($navigation)){echo $navigation=="mentors" || $navigation=="courses"?"show":"hide";} ?>">
                        <li class="<?php if(isset($navigation)){
                            echo $navigation=='mentors'?"active":"";
                        } ?>"><a href="<?php echo base_url('administrator/mentors'); ?>">MENTORS</a></li>
                        <li class="<?php if(isset($navigation)){
                            echo $navigation=='courses'?"active":"";
                        } ?>"><a href="<?php echo base_url('administrator/courses'); ?>">COURSES</a></li>
                        <li class="<?php if(isset($navigation)){
                            echo $navigation=='affiliates'?"active":"";
                        } ?>"><a href="<?php echo base_url('administrator/affiliates'); ?>">AFFILIATES</a></li>
                    </ul>
                </li>
                <!-- new added -->
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
                        <p data-brackets-id='309' class="custom_text1">SAKIB ADNAN</p><p data-brackets-id='310' class="custom_text2">Super Admin User</p>
                    </div>
                    <ul data-brackets-id='311' class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center ">
                        <li data-brackets-id='312' class="nav-item">

                            <div data-brackets-id='313' class="dropdown show">
                                <a data-brackets-id='314' class="btn btn-secondary dropdown-toggle custom_settings_btn btn-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-brackets-id='315' class="fas fa-cog"></i> SETTINGS
                                </a>

                                <div data-brackets-id='316' class="dropdown-menu custom_dropdown" aria-labelledby="dropdownMenuLink">
                                    <a data-brackets-id='317' class="dropdown-item" href="<?php echo base_url('dashboard/createuser'); ?>">Create New User</a>
                                    <a data-brackets-id='318' class="dropdown-item" href="#">Help</a>
                                    <a data-brackets-id='319' class="dropdown-item" href="<?php echo base_url('admin/logout'); ?>">Signout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php
    if(isset($search_section)){
        if($search_section=='students') {
            ?>
            <section class="full_database">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <form class="form-group" id="search_form">
                                <input class="form-control custom_search" value="<?php if (isset($search_value)) {
                                    echo $search_value;
                                } ?>" id="searchData" type="search" placeholder="Search Student info"
                                       aria-label="Search" data-id="">
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 dorp text-right">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle dropdown_custom" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Sort By (None)
                                </button>
                                <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item students-item" id="id_search" data-id="id" href="#">Sort By (Id)</a>
                                    <a class="dropdown-item students-item" id="batch_search" data-id="batch" href="#">Sort By
                                        (Batch)</a>
                                    <a class="dropdown-item students-item" id="phone_search" data-id="phone" href="#">Sort By
                                        (Phone)</a>
                                    <a class="dropdown-item students-item" id="sort_default" data-id="none" style="display: none;"
                                       href="#">Sort By (None)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade" id="deleteStudent">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Do you really want to delete this student?
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <a href="" class="btn btn-info" id="deleteConfirmBtn">Yes</a>
                        </div>

                    </div>
                </div>
            </div>

            <?php
        }else if ($search_section=='courses'){?>
            <section class="full_database">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <form class="form-group">
                                <input class="form-control custom_search" value="<?php if(isset($search_value)){echo $search_value;} ?>" id="courseSearch" type="search" placeholder="Search course info" aria-label="Search">
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 dorp text-right">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle dropdown_custom" type="button" id="dropdownMenuButtonCourse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    Sort By (None)
                                </button>
                                <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButtonCourse">
                                    <a class="dropdown-item course-item" id="course_batch_search" data-id="course_batch" href="#">Sort By
                                        (Batch Name)</a>
                                    <a class="dropdown-item course-item" id="course_mentor_search" data-id="course_mentor" href="#">Sort By
                                        (Mentor Name)</a>
                                    <a class="dropdown-item course-item" id="course_sort_default" data-id="none" style="display: none;"
                                       href="#">Sort By (None)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Modal -->
            <div class="modal fade" id="addCourses" tabindex="-1" role="dialog" aria-labelledby="addCourses" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url('administrator/add_course'); ?>" name="" method="post">
                            <input type="hidden" value="base" name="admin_auth">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" id="batchTitle" name="batchTitle" aria-describedby="batchTitle" placeholder="Batch Title" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" id="batchName" name="batchName" aria-describedby="batchName" placeholder="Batch Name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control custom_bg" id="courseType" name="courseType">
                                                <option value="0">Course Type</option>
                                                <option value="1">Online</option>
                                                <option value="2">Offline</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" id="courseDuration" name="courseDuration" aria-describedby="courseDuration" placeholder="Course Duration" type="text">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control custom_bg" id="mentorName" name="mentorName">
                                                <option value="0">Select Mentor</option>
                                                <?php foreach ($mentors as $mentor){ ?>
                                                    <option value="<?php echo $mentor->mentor_name; ?>"><?php echo $mentor->mentor_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" id="summery" name="summery" placeholder="Summery"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Course</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="updateCourses" tabindex="-1" role="dialog" aria-labelledby="updateCourses" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="edit_course_content" action="<?php echo base_url('administrator/update_course'); ?>" name="" method="post">
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteCourse">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Do you really want to delete this course?
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <a href="" class="btn btn-info" id="deleteConfirmBtn">Yes</a>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        }else{
            echo "";
        }
        } ?>
    <div id="content">