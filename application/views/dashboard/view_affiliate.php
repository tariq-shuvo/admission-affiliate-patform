<?php
if(count($view_data['affiliate'])>0) {
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
                                <p>View Affiliate Info</p>
                            </div>
                        </div>
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
                    <!-- view -->
                    <!-- breadcum start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadc">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url('students'); ?>">All Affiliates</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Affiliate Information</li>
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
                            </div>
                            <div class="all_student_list">
                                <a href="<?php echo base_url('administrator/referrals'); ?>" target="_blank" class="btn btn-secondary btn-block" type="button" id="dropdownMenuButton">
                                    Referred Student List
                                </a>
                            </div>
                        </div>
                        <!-- course -->
                        <div class="col-lg-8 offset-lg-1">
                            <!-- course_info -->
                            <div class="course_info">
                                <div class="course_header">
                                    <h1>Payment Info</h1>
                                </div>
                                <p class="custom_para2">Bank Name : <?php echo $affiliate->bank_name==""?"Not Given Yet.":$affiliate->bank_name; ?></p>
                                <p class="custom_para2">Account Name : <?php echo $affiliate->acc_name==""?"Not Given Yet.":$affiliate->acc_name; ?></p>
                                <p class="custom_para2">Account No. : <?php echo $affiliate->acc_no==""?"Not Given Yet.":$affiliate->acc_no; ?></p>
                                <p class="custom_para2">Total Earned Amount : <?php echo $total_earn[0]->total_earning==""?0:$total_earn[0]->total_earning; ?> tk.</p>
                                <p class="custom_para2">Total Withdrawal Amount : <?php echo $total_withdrawal[0]->total_payment==""?0:$total_withdrawal[0]->total_payment; ?> tk.</p>
                            </div>
                            <div class="payment_confirm_button">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#updatePayments">Confirm Monthly Payment</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <?php } ?>

                    </div>
                </div>
            </div>

    </section>
    <!-- Modal -->
    <div class="modal fade" id="updatePayments" tabindex="-1" role="dialog" aria-labelledby="updatePayments" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Payment Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-inline" action="<?php echo base_url('administrator/monthly_payment'); ?>" method="post" id="payment_update_form">
                    <input type="hidden" name="affiliate_id" value="<?php echo $affiliate_id; ?>">
                                <div class="form-group">
                                    <select class="form-control" id="month" name="month">
                                        <option value="0">Select Month</option>
                                        <option value="1" <?php echo (date('m')-1)==1?"selected":""; ?>>January</option>
                                        <option value="2" <?php echo (date('m')-1)==2?"selected":""; ?>>February</option>
                                        <option value="3" <?php echo (date('m')-1)==3?"selected":""; ?>>March</option>
                                        <option value="4" <?php echo (date('m')-1)==4?"selected":""; ?>>April</option>
                                        <option value="5" <?php echo (date('m')-1)==5?"selected":""; ?>>May</option>
                                        <option value="6" <?php echo (date('m')-1)==6?"selected":""; ?>>June</option>
                                        <option value="7" <?php echo (date('m')-1)==7?"selected":""; ?>>July</option>
                                        <option value="8" <?php echo (date('m')-1)==8?"selected":""; ?>>August</option>
                                        <option value="9" <?php echo (date('m')-1)==9?"selected":""; ?>>September</option>
                                        <option value="10" <?php echo (date('m')-1)==10?"selected":""; ?>>October</option>
                                        <option value="11" <?php echo (date('m')-1)==11?"selected":""; ?>>November</option>
                                        <option value="12" <?php echo (date('m')-1)==12?"selected":""; ?>>December</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="year" name="year">
                                        <option value="0">Select Year</option>
                                        <option value="2017" <?php echo date('Y')==2017?"selected":""; ?>>2017</option>
                                        <option value="2018" <?php echo date('Y')==2018?"selected":""; ?>>2018</option>
                                        <option value="2019" <?php echo date('Y')==2019?"selected":""; ?>>2019</option>
                                        <option value="2020" <?php echo date('Y')==2020?"selected":""; ?>>2020</option>
                                        <option value="2021" <?php echo date('Y')==2021?"selected":""; ?>>2021</option>
                                        <option value="2022" <?php echo date('Y')==2022?"selected":""; ?>>2022</option>
                                        <option value="2023" <?php echo date('Y')==2023?"selected":""; ?>>2023</option>
                                        <option value="2024" <?php echo date('Y')==2024?"selected":""; ?>>2024</option>
                                        <option value="2025" <?php echo date('Y')==2025?"selected":""; ?>>2025</option>
                                        <option value="2026" <?php echo date('Y')==2026?"selected":""; ?>>2026</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-secondary">Done</button>

                </form>
            </div>
        </div>
    </div>

    <?php
}else{
    redirect(base_url('administrator/affiliates'));
}
?>