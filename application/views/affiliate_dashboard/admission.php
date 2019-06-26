<form action="<?php echo base_url('students/admission'); ?>" enctype="multipart/form-data" id="admission_form" method="post">
<section class="general_info admission_page_1">
    <div class="container">
        <!-- Page Header-->
        <header>
            <!-- <h1 class="h3 display">Tables</h1> -->
        </header>
        <div class="row">
            <div class="col-12">
                <div class="notification">
                    <?php
                        if(isset($_SESSION['notification'])){
                            echo $this->session->flashdata('notification');
                        }
                    ?>
                </div>
            </div>
        </div>
        <!--=============== page design start =====================-->
        <div class="row">
            <div class="col-lg-12">
                <div class="g_info">
                    <P>Student Info</P>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <span id="image-preview">

                    </span>
                    <span class="image_upload_btn">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                    </span>
                </div>
            </div>
            <div class="col-md-3 offset-md-5">
                <div class="form-group">
                    <select class="form-control custom_bg" id="gender" name="gender">
                        <option value="0">Select gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- form -->
        <div class="row">
            <div class="col-lg-12">
                <!-- <form action="" method="" enctype=""> -->
                <div class="form-group">
                    <input type="hidden" name="affiliateID" id="affiliateID" value="">
                    <input type="text" class="form-control" id="affiliateName" name="affiliateName" value="" aria-describedby="affiliateName" placeholder="Affiliate email or phone" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="fullName" name="fullName" aria-describedby="fullName" placeholder="Student full name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="emailAddress" name="emailAddress" aria-describedby="emailAddress" placeholder="Contact email" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="contactNumber" name="contactNumber" aria-describedby="contactNumber" placeholder="Contact number" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="fathersName" name="fathersName" aria-describedby="fathersName" placeholder="Fathers name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="mothersName" name="mothersName" aria-describedby="mothersName" placeholder="Mothers name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="birthdayDate" name="birthdayDate" aria-describedby="birthdayDate" placeholder="Birthday Date" autocomplete="off">
                </div>


                <div class="form-group">
                    <input type="text" class="form-control" id="nationalId" name="nationalId" aria-describedby="nationalId" placeholder="National ID" autocomplete="off">
                </div>

                <div class="form-group">
                    <textarea class="form-control" rows="2" id="address" name="address" placeholder="Address"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="stateName" name="stateName" aria-describedby="stateName" placeholder="Enter state name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="countryName" name="countryName" value="Bangladesh" aria-describedby="countryName" placeholder="Enter country name" autocomplete="off">
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12 text-right">
                <button type="button" class="btn btn-primary btn_custom next_btn_student_info">Next</button>
            </div>
        </div>
    <!--=============== page design end =====================-->
    </div>
</section>

<section class="general_info admission_page_2" style="display: none;">
    <div class="container">
        <!-- Page Header-->
        <header>
            <!-- <h1 class="h3 display">Tables</h1> -->
        </header>
        <!--=============== page design start =====================-->
        <!-- title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="g_info">
                    <P>Course Info</P>
                </div>
            </div>
        </div>
        <!-- form -->
        <div class="row">
            <div class="col-lg-12">
                <!-- <form action="" method="" enctype=""> -->
                <div class="form-group">
                    <input type="text" class="form-control" id="joinDate" name="joinDate" aria-describedby="joinDate" placeholder="Joining Date" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="courseFee" name="courseFee" aria-describedby="courseFee" placeholder="Course Free" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="paidAmount" name="paidAmount" aria-describedby="paidAmount" placeholder="Paid" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="dueAmount" name="dueAmount" aria-describedby="dueAmount" placeholder="Due" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="invoiceNumber" name="invoiceNumber" aria-describedby="invoiceNumber" placeholder="Invoice Number" autocomplete="off">
                </div>
                <div class="form-group">
                    <select class="form-control custom_bg" id="batchName" name="batchName">
                        <option value="0">Batch Name</option>
                        <?php foreach ($courses as $course){ ?>
                            <option value="<?php echo $course->batch_name; ?>" data-id="<?php echo $course->id; ?>"><?php echo $course->batch_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control custom_bg" id="courseType" name="courseType">
                        <option value="0">Select Course Type</option>
                        <option value="1">online</option>
                        <option value="2">offline</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="courseName" name="courseName" aria-describedby="courseName" placeholder="Course Name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="courseDuration" name="courseDuration" aria-describedby="courseDuration" placeholder="Course Duration" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="mentorName" name="mentorName" aria-describedby="mentorName" placeholder="Mentor Name" autocomplete="off">
                </div>
                <div class="form-group">
                    <select class="form-control custom_bg" id="courseStatus" name="courseStatus">
                        <option value="0">Course Status</option>
                        <option value="1" selected>On Going</option>
                        <option value="2">Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control custom_bg" id="certification" name="certification">
                        <option value="0">Certification</option>
                        <option value="1" selected>In completed</option>
                        <option value="2">Completed</option>
                    </select>
                </div>
                <!--                    <div class="form-group">-->
                <!--                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Completed">-->
                <!--                    </div>-->
                <!--                    <div class="form-group">-->
                <!--                        <input type="text" class="form-control custom_bg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="incomplete">-->
                <!--                    </div>-->
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-6">
                        <button type="button" class="btn btn-primary btn_custom_pre previous_btn_1">Previous</button>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 text-right">
                        <button type="button" class="btn btn-primary btn_custom next_btn_course_info">Next</button>
                    </div>
                </div>
            </div>
        </div>
        <!--=============== page design end =====================-->
    </div>
</section>

<section class="general_info admission_page_3" style="display: none;">
    <div class="container">
        <!-- Page Header-->
        <header>
            <!-- <h1 class="h3 display">Tables</h1> -->
        </header>
        <!--=============== page design start =====================-->
        <!-- title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="g_info">
                        <P>Marketplace Earning Information</P>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 border_buttom">
                    <!-- Marketplace link -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="fiverrProfile" name="fiverrProfile" aria-describedby="fiverrProfile" placeholder="Fiverr profile link(optional)" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="upworkProfile" name="upworkProfile" aria-describedby="upworkProfile" placeholder="Upwork profile link(optional)" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pphProfile" name="pphProfile" aria-describedby="pphProfile" placeholder="People per hour link(optional)" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jobCompany" name="jobCompany" aria-describedby="jobCompany" placeholder="Local job/remote job(company name)(optional)" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="fiverrEarnings" name="fiverrEarnings" aria-describedby="fiverrEarnings" placeholder="Fiverr earnings(optional)" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="upworkEarnings" name="upworkEarnings" aria-describedby="upworkEarnings" placeholder="Upwork earnings(optional)" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pphEarnings" name="pphEarnings" aria-describedby="pphEarnings" placeholder="People per hour earnings(optional)" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jobEarnings" name="jobEarnings" aria-describedby="jobEarnings" placeholder="Local job/remote job earnings(optional)" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- Marketplace link -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="g_info">
                                <P>Social Accounts Infomation</P>
                            </div>
                        </div>
                    </div>
                    <!-- Socail link -->
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fab fa-facebook float-left"></i><span contenteditable="false" id="facebookLinkPlaceholder" class="common_media_field float-left"> Facebook Profile URL</span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="facebookLink" id="facebookLink" value="">
                                    <input type="checkbox" id="facebookConnect" name="facebookConnect" class="custom-control-input">Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fab fa-linkedin float-left"></i><span contenteditable="false" id="linkedinPlaceholder" class="common_media_field float-left"> Linkedin Profile URL</span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="linkedinLink" id="linkedinLink" value="">
                                    <input type="checkbox" class="custom-control-input" name="linkedinConnect" id="linkedinConnect">Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fab fa-twitter-square float-left"></i><span contenteditable="false" id="twitterPlaceholder" class="common_media_field float-left">  Twitter Profile URL</span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="twitterLink" id="twitterLink" value="">
                                    <input type="checkbox" class="custom-control-input" name="twitterConnect" id="twitterConnect">Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fab fa-youtube-square float-left"></i><span contenteditable="false" id="youtubePlaceholder" class="common_media_field float-left">  Youtube Profile URL</span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="youtubeLink" id="youtubeLink" value="">
                                    <input type="checkbox" class="custom-control-input" name="youtubeConnect" id="youtubeConnect">Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fab fa-dribbble-square float-left"></i><span contenteditable="false" id="dribblePlaceholder" class="common_media_field float-left">  Dribble Profile URL</span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="dribbleLink" id="dribbleLink" value="">
                                    <input type="checkbox" class="custom-control-input" name="dribbleConnect" id="dribbleConnect">Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fab fa-behance-square float-left"></i><span contenteditable="false" id="behancePlaceholder" class="common_media_field float-left">  Behance Profile URL</span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="behanceLink" id="behanceLink" value="">
                                    <input type="checkbox" class="custom-control-input" name="behanceConnect" id="behanceConnect">Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fas fa-globe float-left"></i><span contenteditable="false" id="websitePlaceholder" class="common_media_field float-left">  Website Profile URL</span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="websiteLink" id="websiteLink" value="">
                                    <input type="checkbox" class="custom-control-input" name="websiteConnect" id="websiteConnect">Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                            <button type="button" class="btn btn-primary btn_custom_pre previous_btn_2">Previous</button>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-6 text-right">
                            <input type="hidden" value="base" name="admin_auth">
                            <button type="submit" class="btn btn-primary btn_custom">Submit</button>
                        </div>
                    </div>

    </div>
    </div>
    <!--=============== page design end =====================-->

    </div>
</section>
</form>
