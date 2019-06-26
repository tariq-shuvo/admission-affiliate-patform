<section class="">
    <div class="container">

        <div class="row">
<!--            <div class="col-lg-12">-->
<!--                <div class="breadc">-->
<!--                    <nav aria-label="breadcrumb">-->
<!--                        <ol class="breadcrumb">-->
<!--                            <li class="breadcrumb-item"><a href="--><?php //echo base_url('administrator/courses'); ?><!--">All Courses</a></li>-->
<!--                            <li class="breadcrumb-item active" aria-current="page">Searched Courses</li>-->
<!--                        </ol>-->
<!--                    </nav>-->
<!--                </div>-->
<!--            </div>-->
            <div class="col-lg-12 database">
                <p>All Courses</p>
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
            <div class="col-12">
                <button class="btn btn-secondary dropdown_custom float-right" type="button"  data-toggle="modal" data-target="#addCourses">
                    Add Course
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th style="" scope="col">Serial</th>
                        <th style="" scope="col">Batch Name</th>
                        <th style="" scope="col">Course Type</th>
                        <th style="" scope="col">Mentor Name</th>
                        <th style="" scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($result)>0){
                        $i=$serial;
                        foreach ($result as $course) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $course->batch_name; ?></td>
                                <td><?php echo $course->course_type==1?"online":"offline"; ?></td>
                                <td><?php echo $course->mentor_name; ?></td>
                                <td class="text-center"><a href="" class="view_btn" data-id="<?php echo $course->id; ?>"><i class="fas fa-eye custom_icon"></i></a><a href="" class="edit_course_btn" data-id="<?php echo $course->id; ?>" data-toggle="modal" data-target="#updateCourses"><i
                                            class="fas fa-edit custom_icon"></i></a><a href="" data-toggle="modal" data-target="#deleteCourse" class="delete_course_btn" data-id="<?php echo $course->id; ?>"><i
                                            class="fas fa-times custom_icon"></i></a></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }else {
                        ?>
                        <tr>
                            <td colspan="5">No courses found.</td>
                        </tr>
                        <?php
                    }
                    ?>
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


