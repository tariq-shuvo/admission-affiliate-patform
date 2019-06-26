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
                        </div>
                        <!-- course -->
                        <div class="col-lg-8 offset-lg-1">
                            <!-- course_info -->
                            <div class="course_info">
                                <div class="course_header">
                                    <h1>Payment Info</h1>
                                </div>
                                <p class="custom_para2">Bank Name : <?php echo $affiliate->bank_name; ?></p>
                                <p class="custom_para2">Account Name : <?php echo $affiliate->acc_name; ?></p>
                                <p class="custom_para2">Account No. : <?php echo $affiliate->acc_no; ?></p>
                                <p class="custom_para2">Total Earned Amount : <?php echo $affiliate->earning_amount; ?> tk.</p>
                                <p class="custom_para2">Total Withdrawal Amount : <?php echo $affiliate->widthdrawl_amount; ?> tk.</p>
                            </div>
                            <?php } ?>
                            <!-- market info -->
                            <div class="market_info">
                                <div class="course_header">
                                    <h1>Affiliate Students List</h1>
                                </div>
                                <?php

                                $affiliate_students=$view_data['affiliate_students'];

                                ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                            <tr>
                                                <th style="" scope="col">Serial</th>
                                                <th style="" scope="col">Name</th>
                                                <th style="" scope="col">Course</th>
                                                <th style="" scope="col">Batch</th>
                                                <th style="" scope="col">Course Fee</th>
                                                <th style="" scope="col">Commission(tk.)</th>
                                                <th style="" scope="col">Join Date</th>
<!--                                                <th style="" scope="col">Action</th>-->
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if(count($affiliate_students)>0){
                                                $i=1;
                                                foreach ($affiliate_students as $affiliate_student) {
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $i; ?></th>
                                                        <td><?php echo $affiliate_student->referal_students_name; ?></td>
                                                        <td><?php echo $affiliate_student->course_name; ?></td>
                                                        <td><?php echo $affiliate_student->batch_name; ?></td>
                                                        <td><?php echo $affiliate_student->course_fee; ?></td>
                                                        <td><?php echo (($affiliate_student->comission_percentage/100)*$affiliate_student->course_fee); ?></td>
                                                        <td><?php echo date('d-m-Y',strtotime($affiliate_student->create_date)); ?></td>

                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                            }else {
                                                ?>
                                                <tr>
                                                    <td colspan="8">No affiliates found.</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
        </div>
    </section>
    <?php
}else{
    redirect(base_url('administrator/affiliates'));
}
?>