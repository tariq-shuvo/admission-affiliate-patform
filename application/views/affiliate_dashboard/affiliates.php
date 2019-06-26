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
                <p>All Affiliates</p>
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
<!--            <div class="col-12">-->
<!--                <button class="btn btn-secondary dropdown_custom float-right" type="button"  data-toggle="modal" data-target="#addCourses">-->
<!--                    Add Affiliates-->
<!--                </button>-->
<!--            </div>-->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th style="" scope="col">Serial</th>
                        <th style="" scope="col">Affiliate Partner Name</th>
                        <th style="" scope="col">Email</th>
                        <th style="" scope="col">Phone No</th>
                        <th style="" scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($result)>0){
                        $i=$serial;
                        foreach ($result as $affiliate) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $affiliate->name; ?></td>
                                <td><?php echo $affiliate->email; ?></td>
                                <td><?php echo $affiliate->phone_no; ?></td>
                                <td class="text-center"><a href="<?php echo base_url('administrator/affiliate/'.$affiliate->id); ?>" class="view_btn" target="_blank"><i class="fas fa-eye custom_icon"></i></a><a href="<?php echo base_url('administrator/affiliate_delete').'/'.$affiliate->id; ?>" class="delete_affiliate_btn"><i
                                            class="fas fa-times custom_icon"></i></a></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }else {
                        ?>
                        <tr>
                            <td colspan="5">No affiliates found.</td>
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