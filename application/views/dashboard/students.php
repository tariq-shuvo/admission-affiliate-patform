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
                <p>Student Database</p>
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
                        <th style="width:25%;" scope="col">ID</th>
                        <th style="width:50%;" scope="col">Name</th>
                        <th style="width:25%;" scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($result)>0){
                        foreach ($result as $student) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $student->id; ?></th>
                                <td><?php echo $student->name; ?></td>
                                <td class="text-center"><a href="<?php echo base_url('students/view/'.$student->id); ?>" title="view student info" class="view_btn" data-id="<?php echo $student->id; ?>"><i class="fas fa-eye custom_icon"></i></a><a href="<?php echo base_url('students/invoice/'.$student->id); ?>" title="print invoice" target="_blank"><i class="fas fa-print custom_icon"></i></a><a href="<?php echo base_url('students/edit/'.$student->id); ?>" title="edit student info" class="edit_btn" data-id="<?php echo $student->id; ?>"><i
                                                class="fas fa-edit custom_icon"></i></a><a href="" data-toggle="modal" data-target="#deleteStudent" title="delete student info" class="delete_students_btn" data-id="<?php echo $student->id; ?>"><i
                                                class="fas fa-times custom_icon"></i></a></td>
                            </tr>
                            <?php
                        }
                    }else{
                    ?>
                        <tr>
                            <td colspan="3" class="text-center">No data found.</td>
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

       
