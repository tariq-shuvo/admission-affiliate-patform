<section class="">
    <div class="container">

        <div class="row">
<!--            <div class="col-lg-12">-->
<!--                <div class="breadc">-->
<!--                    <nav aria-label="breadcrumb">-->
<!--                        <ol class="breadcrumb">-->
<!--                            <li class="breadcrumb-item"><a href="--><?php //echo base_url('students'); ?><!--">All Students</a></li>-->
<!--                            <li class="breadcrumb-item active" aria-current="page">Student Information Edit</li>-->
<!--                        </ol>-->
<!--                    </nav>-->
<!--                </div>-->
<!--            </div>-->
            <div class="col-lg-12 database">
                <p>Referral Student List</p>
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
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Name</th>
                        <th scope="col">Join Date</th>
                        <th scope="col">Course</th>
                        <th scope="col">Batch</th>
                        <th scope="col">Course fee</th>
                        <th scope="col">Commission Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($result)>0){
                        $i=$serial;
                        foreach ($result as $referrals) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $referrals->referal_students_name; ?></td>
                                <td><?php echo date("d/m/Y",strtotime($referrals->create_date)); ?></td>
                                <td><?php echo $referrals->course_name; ?></td>
                                <td><?php echo $referrals->batch_name; ?></td>
                                <td><?php echo $referrals->course_fee; ?></td>
                                <td><?php echo $referrals->comission_amount; ?></td>

                            </tr>
                            <?php
                            $i++;
                        }
                    }else{
                    ?>
                        <tr>
                            <td colspan="7" class="text-center">No referral found.</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="Page navigation example">
                    <?php echo $pagination; ?>
                </nav>
            </div>
        </div>
        </div>
</section>

       
