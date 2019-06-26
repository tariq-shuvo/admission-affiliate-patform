<?php
if(count($view_data['student_info'])>0) {
    ?>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <!-- <h1 class="h3 display">Tables</h1> -->
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <!-- view start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="view">
                                <p>View Student Info</p>
                            </div>
                        </div>
                    </div>
                    <!-- view -->
                    <!-- breadcum start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadc">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url('students'); ?>">All Students</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Student Information</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- breadcum -->
                    <!-- person and course start -->
                    <div class="row">
                        <!-- person -->
                        <?php
                        foreach ($view_data['student_info'] as $student) {
                        ?>
                        <div class="col-lg-3">
                            <div class="person_info">
                                <img src="<?php if($student->profile_pic==""){
                                    echo base_url('uploads/students/no-image-available.jpg');
                                }else{
                                    echo base_url($student->profile_pic);
                                } ?>" class="img-fluid"
                                     alt="person" width="150" height="300">
                                <p class="custom_para">Name : <?php echo $student->name; ?></p>
                                <p class="custom_para">Gender : <?php echo $student->gender==1?"Male":"Female"; ?></p>
                                <p class="custom_para">Contact No : <?php echo $student->phone_no; ?></p>
                                <p class="custom_para">Email : <?php echo $student->email; ?></p>
                                <p class="custom_para">Birthday: <?php echo date('d-m-Y',strtotime($student->date_of_birth)); ?></p>
                                <p class="custom_para">National ID : <?php echo $student->national_id; ?></p>
                                <p class="custom_para">Fathers Name : <?php echo $student->fathers_name; ?></p>
                                <p class="custom_para">Fathers Name : <?php echo $student->mothers_name; ?></p>
                                <p class="custom_para">District : <?php echo $student->division; ?></p>
                                <p class="custom_para">Country : <?php echo $student->country; ?></p>
                                <p class="custom_para"><?php echo $student->address; ?></p>
                            </div>
                        </div>
                        <!-- course -->
                        <div class="col-lg-8 offset-lg-1">
                            <!-- course_info -->
                            <div class="course_info">
                                <div class="course_header">
                                    <h1>Course Info</h1>
                                </div>
                                <p class="custom_para2">Join Date : <?php echo date('d-m-Y',strtotime($student->join_date)); ?></p>
                                <p class="custom_para2">Course Fee : <?php echo $student->course_fee; ?></p>
                                <p class="custom_para2">Paid : <?php echo $student->paid; ?></p>
                                <p class="custom_para2">Due : <?php echo $student->due; ?></p>
                                <p class="custom_para2">Invoice No : <?php echo $student->invoice; ?></p>
                                <p class="custom_para2">Batch Name : <?php echo $student->batch_name; ?></p>
                                <p class="custom_para2">Course Title : <?php echo $student->course_name; ?></p>
                                <p class="custom_para2">Course Type : <?php echo $student->course_type==1?"online":"offline"; ?></p>
                                <p class="custom_para2">Course Duration : <?php echo $student->course_duration; ?> month</p>
                                <p class="custom_para2">Mentor Name : <?php echo $student->mentor_name; ?></p>
                                <p class="custom_para2">Course Status : <?php echo $student->course_status==1?"On Going":"Completed"; ?></p>
                                <p class="custom_para2">Certification : <?php echo $student->certification==1?"In completed":"Completed"; ?></p>
                            </div>
                            <?php } ?>
                            <!-- market info -->
                            <div class="market_info">
                                <div class="course_header">
                                    <h1>Marketplace Earning Information</h1>
                                </div>
                                <?php

                                $market_places=$view_data['marketplaces'];

                                ?>
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="market_content">
                                            <div class="marketplace_image">
                                                <a href="<?php echo $market_places[0]->profile_link; ?>" <?php
                                                if($market_places[0]->profile_link=="")
                                                {
                                                    echo "disabled";
                                                }
                                                ?> target="_blank"><img src="<?php
                                                    if($market_places[0]->profile_link=="")
                                                    {
                                                        echo base_url("assets/images/marketplaces/fiverr_g.png");
                                                    }else{
                                                        echo base_url("assets/images/marketplaces/fiverr.png");
                                                    }
                                                    ?>" class="img-fluid"></a>
                                            </div>
                                            <div class="custom_form text-center">$ <?php echo $market_places[0]->earn_amount; ?></div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="market_content">
                                            <div class="marketplace_image">
                                                <a href="<?php echo $market_places[1]->profile_link; ?>" <?php
                                                if($market_places[1]->profile_link=="")
                                                {
                                                    echo "disabled";
                                                }
                                                ?> target="_blank"><img src="<?php
                                                    if($market_places[1]->profile_link=="")
                                                    {
                                                        echo base_url("assets/images/marketplaces/upwork_g.png");
                                                    }else{
                                                        echo base_url("assets/images/marketplaces/upwork.png");
                                                    }
                                                    ?>" class="img-fluid"></a>
                                            </div>
                                            <div class="custom_form text-center">$ <?php echo $market_places[1]->earn_amount; ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="market_content">
                                            <div class="marketplace_image">
                                                <a href="<?php echo $market_places[2]->profile_link; ?>" <?php
                                                if($market_places[2]->profile_link=="")
                                                {
                                                    echo "disabled";
                                                }
                                                ?> target="_blank"><img src="<?php
                                                    if($market_places[2]->profile_link=="")
                                                    {
                                                        echo base_url("assets/images/marketplaces/pph_g.png");
                                                    }else{
                                                        echo base_url("assets/images/marketplaces/pph.png");
                                                    }
                                                    ?>" class="img-fluid"></a>
                                            </div>
                                            <div class="custom_form text-center">$ <?php echo $market_places[2]->earn_amount; ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="market_content">
                                            <div class="marketplace_image">
                                                <a href="<?php echo $market_places[3]->profile_link; ?>" <?php
                                                if($market_places[3]->profile_link=="")
                                                {
                                                    echo "disabled";
                                                }
                                                ?> target="_blank"><img src="<?php
                                                    if($market_places[0]->profile_link=="")
                                                    {
                                                        echo base_url("assets/images/marketplaces/local_g.png");
                                                    }else{
                                                        echo base_url("assets/images/marketplaces/local.png");
                                                    }
                                                    ?>" class="img-fluid"></a>
                                            </div>

                                            <div class="custom_form text-center">$ <?php echo $market_places[3]->earn_amount; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="social_info">
                                <div class="course_header">
                                    <h1>Social Account Information</h1>
                                </div>
                                <?php
                                $media = $view_data['social_media'];
                                if(count($media)>0)
                                {
                                    ?>
                                    <a href="<?php echo $media[0]->profile_link; ?>" target="_blank" <?php echo $media[0]->profile_link==""?"disabled":""; ?>><i class="custom_icon left_0 fab fa-facebook-square" style="<?php echo $media[0]->profile_link==""?"color:gray;":""; ?>"></i></a>
                                    <a href="<?php echo $media[1]->profile_link; ?>" target="_blank" <?php echo $media[1]->profile_link==""?"disabled":""; ?>><i class="custom_icon fab fa-linkedin" style="<?php echo $media[1]->profile_link==""?"color:gray;":""; ?>"></i></a>
                                    <a href="<?php echo $media[2]->profile_link; ?>" target="_blank" <?php echo $media[2]->profile_link==""?"disabled":""; ?>><i class="custom_icon fab fa-twitter-square" style="<?php echo $media[2]->profile_link==""?"color:gray;":""; ?>"></i></a>
                                    <a href="<?php echo $media[3]->profile_link; ?>" target="_blank" <?php echo $media[3]->profile_link==""?"disabled":""; ?>><i class="custom_icon fab fa-youtube-square" style="<?php echo $media[3]->profile_link==""?"color:gray;":""; ?>"></i></a>
                                    <a href="<?php echo $media[4]->profile_link; ?>" target="_blank" <?php echo $media[4]->profile_link==""?"disabled":""; ?>><i class="custom_icon fab fa-behance-square" style="<?php echo $media[4]->profile_link==""?"color:gray;":""; ?>"></i></a>
                                    <a href="<?php echo $media[5]->profile_link; ?>" target="_blank" <?php echo $media[5]->profile_link==""?"disabled":""; ?>><i class="custom_icon fab fa-dribbble-square" style="<?php echo $media[5]->profile_link==""?"color:gray;":""; ?>"></i></a>
                                    <a href="<?php echo $media[6]->profile_link; ?>" target="_blank" <?php echo $media[6]->profile_link==""?"disabled":""; ?>><i class="custom_icon right_0 fas fa-globe" style="<?php echo $media[6]->profile_link==""?"color:gray;":""; ?>"></i></a>
                                <?php }else{ ?>
                                    <i class="custom_icon left_0 fab fa-facebook-square" style="color: gray"></i>
                                    <i class="custom_icon fab fa-linkedin" style="color: gray"></i>
                                    <i class="custom_icon fab fa-twitter-square" style="color: gray"></i>
                                    <i class="custom_icon fab fa-youtube-square" style="color: gray"></i>
                                    <i class="custom_icon fab fa-behance-square" style="color: gray"></i>
                                    <i class="custom_icon fab fa-dribbble-square" style="color: gray"></i>
                                    <i class="custom_icon right_0 fas fa-globe" style="color: gray"></i>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}else{
    redirect(base_url('students'));
}
?>