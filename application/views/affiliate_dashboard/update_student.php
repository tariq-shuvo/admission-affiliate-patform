<?php
if(count($edit_data['student_info'])>0) {
?>

<form action="<?php echo base_url('students/edit/'.$id); ?>" enctype="multipart/form-data" id="admission_form" method="post">
    <?php
    foreach ($edit_data['student_info'] as $student) {
        ?>
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
                <div class="breadc">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('students'); ?>">All Students</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Student Information Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

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
                    <span id="image-preview" style="background-image: url('<?php if($student->profile_pic==""){
                        echo base_url('uploads/students/no-image-available.jpg');
                    }else{
                        echo base_url($student->profile_pic);
                    } ?>')">

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
                        <option value="1" <?php echo $student->gender==1?"selected":""; ?>>Male</option>
                        <option value="2" <?php echo $student->gender==2?"selected":""; ?>>Female</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- form -->
        <div class="row">
            <div class="col-lg-12">
                <!-- <form action="" method="" enctype=""> -->
                <div class="form-group">
                    <input type="text" value="<?php echo $student->name; ?>" class="form-control" id="fullName" name="fullName" aria-describedby="fullName" placeholder="Student full name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->email; ?>" class="form-control" id="emailAddress" name="emailAddress" aria-describedby="emailAddress" placeholder="Contact email" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->phone_no; ?>" class="form-control" id="contactNumber" name="contactNumber" aria-describedby="contactNumber" placeholder="Contact number" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->fathers_name; ?>" class="form-control" id="fathersName" name="fathersName" aria-describedby="fathersName" placeholder="Fathers name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->mothers_name; ?>" class="form-control" id="mothersName" name="mothersName" aria-describedby="mothersName" placeholder="Mothers name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo date('d-m-Y',strtotime($student->date_of_birth)); ?>" class="form-control" id="birthdayDate" name="birthdayDate" aria-describedby="birthdayDate" placeholder="Birthday Date" autocomplete="off">
                </div>


                <div class="form-group">
                    <input type="text" value="<?php echo $student->national_id; ?>" class="form-control" id="nationalId" name="nationalId" aria-describedby="nationalId" placeholder="National ID" autocomplete="off">
                </div>

                <div class="form-group">
                    <textarea class="form-control" rows="2" id="address" name="address" placeholder="Address"><?php echo $student->address; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->division; ?>" class="form-control" id="stateName" name="stateName" aria-describedby="stateName" placeholder="Enter state name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->country; ?>" class="form-control" id="countryName" name="countryName" aria-describedby="countryName" placeholder="Enter country name" autocomplete="off">
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
                    <input type="text" value="<?php echo date('d-m-Y',strtotime($student->join_date)); ?>" class="form-control" id="joinDate" name="joinDate" aria-describedby="joinDate" placeholder="Joining Date" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->course_fee; ?>" class="form-control" id="courseFee" name="courseFee" aria-describedby="courseFee" placeholder="Course Free" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->paid; ?>" class="form-control" id="paidAmount" name="paidAmount" aria-describedby="paidAmount" placeholder="Paid" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->due; ?>" class="form-control" id="dueAmount" name="dueAmount" aria-describedby="dueAmount" placeholder="Due" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->invoice; ?>" class="form-control" id="invoiceNumber" name="invoiceNumber" aria-describedby="invoiceNumber" placeholder="Invoice Number" autocomplete="off">
                </div>
                <div class="form-group">
                    <select class="form-control custom_bg" id="batchName" name="batchName">
                        <option value="0">Batch Name</option>
                        <?php foreach ($courses as $course){ ?>
                            <option value="<?php echo $course->batch_name; ?>" data-id="<?php echo $course->id; ?>" <?php echo $student->batch_name==$course->batch_name?"selected":""; ?>><?php echo $course->batch_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control custom_bg" id="courseType" name="courseType">
                        <option value="0">Select Course Type</option>
                        <option value="1" <?php echo $student->course_type==1?"selected":""; ?>>online</option>
                        <option value="2" <?php echo $student->course_type==2?"selected":""; ?>>offline</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->course_name; ?>" class="form-control" id="courseName" name="courseName" aria-describedby="courseName" placeholder="Course Name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->course_duration; ?>" class="form-control" id="courseDuration" name="courseDuration" aria-describedby="courseDuration" placeholder="Course Duration" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $student->mentor_name; ?>" class="form-control" id="mentorName" name="mentorName" aria-describedby="mentorName" placeholder="Mentor Name" autocomplete="off">
                </div>
                <div class="form-group">
                    <select class="form-control custom_bg" id="courseStatus" name="courseStatus">
                        <option value="0">Course Status</option>
                        <option value="1" <?php echo $student->course_status==1?"selected":""; ?>>On Going</option>
                        <option value="2" <?php echo $student->course_status==2?"selected":""; ?>>Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control custom_bg" id="certification" name="certification">
                        <option value="0">Certification</option>
                        <option value="1" <?php echo $student->certification==1?"selected":""; ?>>In completed</option>
                        <option value="2" <?php echo $student->certification==2?"selected":""; ?>>Completed</option>
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
    <?php } ?>

    <?php

    $market_places=$edit_data['marketplaces'];

    ?>
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
                                <input type="text" class="form-control" value="<?php echo $market_places[0]->profile_link; ?>" id="fiverrProfile" name="fiverrProfile" aria-describedby="fiverrProfile" placeholder="Fiverr profile link(optional)" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $market_places[1]->profile_link; ?>" id="upworkProfile" name="upworkProfile" aria-describedby="upworkProfile" placeholder="Upwork profile link(optional)" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $market_places[2]->profile_link; ?>" id="pphProfile" name="pphProfile" aria-describedby="pphProfile" placeholder="People per hour link(optional)" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $market_places[3]->profile_link; ?>" id="jobCompany" name="jobCompany" aria-describedby="jobCompany" placeholder="Local job/remote job(company name)(optional)" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" value="<?php echo $market_places[0]->earn_amount==0?"":$market_places[0]->earn_amount; ?>" class="form-control" id="fiverrEarnings" name="fiverrEarnings" aria-describedby="fiverrEarnings" placeholder="Fiverr earnings(optional)" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $market_places[1]->earn_amount==0?"":$market_places[1]->earn_amount; ?>" class="form-control" id="upworkEarnings" name="upworkEarnings" aria-describedby="upworkEarnings" placeholder="Upwork earnings(optional)" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $market_places[2]->earn_amount==0?"":$market_places[2]->earn_amount; ?>" class="form-control" id="pphEarnings" name="pphEarnings" aria-describedby="pphEarnings" placeholder="People per hour earnings(optional)" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $market_places[3]->earn_amount==0?"":$market_places[3]->earn_amount; ?>" class="form-control" id="jobEarnings" name="jobEarnings" aria-describedby="jobEarnings" placeholder="Local job/remote job earnings(optional)" autocomplete="off">
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
                    <?php
                    $media = $edit_data['social_media'];
                    if(count($media)>0)
                    {
                    ?>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fab fa-facebook float-left"></i><span contenteditable="false" id="facebookLinkPlaceholder" class="common_media_field float-left"> <?php echo $media[0]->profile_link==""?"Facebook Profile URL":$media[0]->profile_link; ?></span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="facebookLink" id="facebookLink" value="<?php echo $media[0]->profile_link; ?>">
                                    <input type="checkbox" id="facebookConnect" name="facebookConnect" class="custom-control-input" <?php echo $media[0]->profile_link==""?"":"checked";?>>Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fab fa-linkedin float-left"></i><span contenteditable="false" id="linkedinPlaceholder" class="common_media_field float-left"> <?php echo $media[1]->profile_link==""?"Linkedin Profile URL":$media[1]->profile_link; ?></span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="linkedinLink" id="linkedinLink" value="<?php echo $media[1]->profile_link; ?>">
                                    <input type="checkbox" class="custom-control-input" name="linkedinConnect" id="linkedinConnect" <?php echo $media[1]->profile_link==""?"":"checked";?>>Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fab fa-twitter-square float-left"></i><span contenteditable="false" id="twitterPlaceholder" class="common_media_field float-left">  <?php echo $media[2]->profile_link==""?"Twitter Profile URL":$media[2]->profile_link; ?></span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="twitterLink" id="twitterLink" value="<?php echo $media[2]->profile_link; ?>">
                                    <input type="checkbox" class="custom-control-input" name="twitterConnect" id="twitterConnect" <?php echo $media[2]->profile_link==""?"":"checked";?>>Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fab fa-youtube-square float-left"></i><span contenteditable="false" id="youtubePlaceholder" class="common_media_field float-left">  <?php echo $media[3]->profile_link==""?"Youtube Profile URL":$media[3]->profile_link; ?></span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="youtubeLink" id="youtubeLink" value="<?php echo $media[3]->profile_link; ?>">
                                    <input type="checkbox" class="custom-control-input" name="youtubeConnect" id="youtubeConnect" <?php echo $media[3]->profile_link==""?"":"checked";?>>Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fab fa-dribbble-square float-left"></i><span contenteditable="false" id="dribblePlaceholder" class="common_media_field float-left">  <?php echo $media[4]->profile_link==""?"Dribble Profile URL":$media[4]->profile_link; ?></span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="dribbleLink" id="dribbleLink" value="<?php echo $media[4]->profile_link; ?>">
                                    <input type="checkbox" class="custom-control-input" name="dribbleConnect" id="dribbleConnect" <?php echo $media[4]->profile_link==""?"":"checked";?>>Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fab fa-behance-square float-left"></i><span contenteditable="false" id="behancePlaceholder" class="common_media_field float-left">  <?php echo $media[5]->profile_link==""?"Behance Profile URL":$media[5]->profile_link; ?></span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="behanceLink" id="behanceLink" value="<?php echo $media[5]->profile_link; ?>">
                                    <input type="checkbox" class="custom-control-input" name="behanceConnect" id="behanceConnect" <?php echo $media[5]->profile_link==""?"":"checked";?>>Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row socail_pro">
                        <div class="col-lg-8 padding_top">
                            <i class="fas fa-globe float-left"></i><span contenteditable="false" id="websitePlaceholder" class="common_media_field float-left">  <?php echo $media[6]->profile_link==""?"Website Profile URL":$media[6]->profile_link; ?></span>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="custom-control custom-checkbox">
                                    <input type="hidden" name="websiteLink" id="websiteLink" value="<?php echo $media[6]->profile_link; ?>">
                                    <input type="checkbox" class="custom-control-input" name="websiteConnect" id="websiteConnect" <?php echo $media[6]->profile_link==""?"":"checked";?>>Disconnected
                                    <span class="custom-control-indicator"></span>Connected
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                            <button type="button" class="btn btn-primary btn_custom_pre previous_btn_2">Previous</button>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-6 text-right">
                            <input type="hidden" value="base" name="admin_auth">
                            <button type="submit" class="btn btn-primary btn_custom">Update</button>
                        </div>
                    </div>

    </div>
    </div>
    <!--=============== page design end =====================-->

    </div>
</section>
</form>
    <?php
}else{
    redirect(base_url('students'));
}
?>