<form class="form-group" action="<?php echo base_url('administrator/affiliates'); ?>" method="post">
<section class="full_database">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                    <input class="form-control custom_search" value="<?php echo isset($search_value)==true?$search_value:""; ?>" id="" type="text" placeholder="Search affiliate by phone no"
                         name="affiliate_phone_no"  aria-label="Search" data-id="" autocomplete="off">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-3 dorp text-right">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown_custom btn-block" type="submit">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
<section class="">
    <div class="container">

        <div class="row">
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
        <?php if($pagination!=false){ ?>
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="Page navigation example">
                    <?php echo $pagination; ?>
                </nav>
            </div>
        </div>
        <?php } ?>
    </div>
</section>


