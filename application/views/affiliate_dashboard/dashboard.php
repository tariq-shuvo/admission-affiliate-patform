<section>
        <div class="container-fluid">
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
            <div class="row">
                <div class="col-lg-12">
                    <!-- person and course start -->
                    <div class="row">
                        <!-- person -->
                        <?php
                        foreach ($view_data['affiliate'] as $affiliate) {
                        ?>
                        <div class="col-lg-3">
                            <div class="person_info">
                                <img src="<?php if($affiliate->profile_picture==""){
                                    echo base_url('uploads/students/no-image-available.jpg');
                                }else{
                                    echo base_url($affiliate->profile_picture);
                                } ?>" class="img-fluid"
                                     alt="person" width="150" height="300">
                                <p class="custom_para">Name : <?php echo $affiliate->name; ?></p>
                                <p class="custom_para">Phone No : <?php echo $affiliate->phone_no; ?></p>
                                <p class="custom_para">Email : <?php echo $affiliate->email; ?></p>
                                <p class="custom_para">Join Date : <?php echo date('d-m-Y',strtotime($affiliate->create_date)); ?></p>
                                <button class="btn btn-secondary dropdown_custom" type="button" data-toggle="modal" data-target="#addProfileInfo">
                                    Edit Profile
                                </button>
                            </div>
                        </div>
                        <!-- course -->
                        <div class="col-lg-8 offset-lg-1">
                            <!-- course_info -->
                            <div class="course_info">
                                <div class="course_header">
                                    <h1>Payment Info</h1>
                                </div>
                                <p class="custom_para2">Bank Name : <?php echo $affiliate->bank_name==""?"Not given yet":$affiliate->bank_name; ?></p>
                                <p class="custom_para2">Account Name : <?php echo $affiliate->acc_name==""?"Not given yet":$affiliate->acc_name; ?></p>
                                <p class="custom_para2">Account No. : <?php echo $affiliate->acc_no==""?"Not given yet":$affiliate->acc_no; ?></p>
                                <p class="custom_para2">Total Earned Amount : <?php echo $total_earn[0]->total_earning==""?0:$total_earn[0]->total_earning; ?> tk.</p>
                                <p class="custom_para2">Total Withdrawal Amount : <?php echo $total_withdrawal[0]->total_payment==""?0:$total_withdrawal[0]->total_payment; ?> tk.</p>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="updateBankInfo" tabindex="-1" role="dialog" aria-labelledby="updateBankInfo" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Bank Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?php echo base_url('affiliate/update_affiliate_bank'); ?>" name="" method="post">
                                            <input type="hidden" value="base" name="admin_auth">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <!-- <form action="" method="" enctype=""> -->
                                                        <input type="hidden" name="affiliate_id" value="<?php echo $affilate_id; ?>">
                                                        <div class="form-group">
                                                            <input class="form-control" id="bankName" value="<?php echo $affiliate->bank_name; ?>" name="bankName" aria-describedby="bankName" placeholder="Bank Name" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" id="bankName" value="<?php echo $affiliate->acc_name; ?>" name="accountName" aria-describedby="accountName" placeholder="Bank Account Name" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" id="accountNo" value="<?php echo $affiliate->acc_no; ?>" name="accountNo" aria-describedby="bankName" placeholder="Bank Account No" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update Bank Details</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="addProfileInfo" tabindex="-1" role="dialog" aria-labelledby="addProfileInfo" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Profile Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?php echo base_url('affiliate/update_profile'); ?>" name="" method="post">
                                            <input type="hidden" value="base" name="admin_auth">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <!-- <form action="" method="" enctype=""> -->
                                                        <input type="hidden" name="affiliate_id" value="<?php echo $affilate_id; ?>">
                                                        <div class="form-group">
                                                            <input class="form-control" id="personName" value="<?php echo $affiliate->name; ?>" name="personName" aria-describedby="personName" placeholder="Full Name(Ex. Rifat M Huq)" type="text" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" id="phoneNo" value="<?php echo $affiliate->phone_no; ?>" name="phoneNo" aria-describedby="phoneNo" placeholder="Your Phone No.(Ex. 01667887656)" type="text" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" id="emailID" value="<?php echo $affiliate->email; ?>" name="emailID" aria-describedby="emailID" placeholder="Your Email(Ex. rifat@shikhbeshobai.com)" type="text" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update Profile Details</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>

                            <br>
                            <br>

                            <div class="row">
                                <div class="col-lg-5">

                                    <div class="bank_info_update">
                                        <?php if($affiliate->bank_name=="")
                                        {?>
                                            <button class="btn btn-secondary dropdown_custom" type="button" data-toggle="modal" data-target="#addBankInfo">
                                                Insert bank information
                                            </button>
                                        <?php
                                        }else{?>
                                            <button class="btn btn-secondary dropdown_custom" type="button" data-toggle="modal" data-target="#updateBankInfo">
                                                Update bank information
                                            </button>
                                        <?php } ?>

                                    </div>

                                </div>

                                <div class="col-lg-5">
                                    <div class="bank_info_update">
                                        <?php if($affiliate->profile_picture=="")
                                        {?>
                                            <button class="btn btn-secondary dropdown_custom" type="button" data-toggle="modal" data-target="#addProfilePic">
                                                Insert Your Profile Picture
                                            </button>
                                            <?php
                                        }else{?>
                                            <button class="btn btn-secondary dropdown_custom" type="button" data-toggle="modal" data-target="#addProfilePic">
                                                Update Your Profile Picture
                                            </button>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>


                            </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="addBankInfo" tabindex="-1" role="dialog" aria-labelledby="addBankInfo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert Bank Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('affiliate/update_affiliate_bank'); ?>" name="" method="post">
                <input type="hidden" value="base" name="admin_auth">
                <input type="hidden" name="affiliate_id" value="<?php echo $affilate_id; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <form action="" method="" enctype=""> -->
                            <div class="form-group">
                                <input class="form-control" id="bankName" name="bankName" aria-describedby="bankName" placeholder="Bank Name" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="bankName" name="accountName" aria-describedby="accountName" placeholder="Bank Account Name" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="accountNo" name="accountNo" aria-describedby="bankName" placeholder="Bank Account No" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Bank Details</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addProfilePic" tabindex="-1" role="dialog" aria-labelledby="addProfilePic" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert Your Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('affiliate/update_profile_picture'); ?>" name="" method="post" enctype="multipart/form-data">
                <input type="hidden" value="base" name="admin_auth">
                <input type="hidden" name="affiliate_id" value="<?php echo $affilate_id; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <form action="" method="" enctype=""> -->
                            <div class="form-group">
                                <input class="form-control" id="profilePicture" name="profilePicture" aria-describedby="profilePicture" type="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Your Profile Picture</button>
                </div>
            </form>
        </div>
    </div>
</div>

