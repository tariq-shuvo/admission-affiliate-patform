<section class="full_database">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <form class="form-group">
                    <input class="form-control custom_search" type="search" placeholder="Search Student info" aria-label="Search">
                </form>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 dorp text-right">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle dropdown_custom" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort By
                    </button>
                    <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Id</a>
                        <a class="dropdown-item" href="#">Batch</a>
                        <a class="dropdown-item" href="#">Student info</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 database">
                <p>All Mentors</p>
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
                <button class="btn btn-secondary dropdown_custom float-right" type="button" data-toggle="modal" data-target="#addMentors">
                    Add Mentor
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th style="width:25%;" scope="col">Serial</th>
                        <th style="width:50%;" scope="col">Mentor Name</th>
                        <th style="width:25%;" scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($result)>0){
                        $i=$serial;
                        foreach ($result as $mentor) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $mentor->mentor_name; ?></td>
                                <td class="text-center"><a href="" class="view_btn" data-id="<?php echo $mentor->id; ?>"><i class="fas fa-eye custom_icon"></i></a><a href="" class="edit_btn" data-id="<?php echo $mentor->id; ?>"><i
                                            class="fas fa-edit custom_icon"></i></a><a href="" class="delete_btn" data-id="<?php echo $mentor->id; ?>"><i
                                            class="fas fa-times custom_icon"></i></a></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }else{
                    ?>
                        <tr>
                            <td colspan="3">No mentors found.</td>
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

<!-- Modal -->
<div class="modal fade" id="addMentors" tabindex="-1" role="dialog" aria-labelledby="addMentors" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Mentor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('administrator/add_mentor'); ?>" name="" method="post">
                <input type="hidden" value="base" name="admin_auth">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <form action="" method="" enctype=""> -->
                            <div class="form-group">
                                <input class="form-control" id="mentorName" name="mentorName" aria-describedby="mentorName" placeholder="Mentor Name" type="text">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Mentor</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateMentors" tabindex="-1" role="dialog" aria-labelledby="updateMentors" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>