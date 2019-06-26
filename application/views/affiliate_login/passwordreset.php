<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="login_form text-center">
                <div class="for_image">
                    <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo" class="img-fluid">
                </div>
                <h1>Set New Password</h1>
                <div class="for_form">
                    <form action="" method="post" id="reset_password">
                        <div class="notification"></div>
                        <input type="hidden" value="<?php echo $reset_id; ?>" id="reset_id">
                        <div class="col-md-10 offset-md-1">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend custom_group">
                                    <div class="input-group-text custom_bg"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="password" class="form-control custom_input" id="new_password" placeholder="Enter your new password">
                            </div>
                        </div>
                        <div class="col-md-10 offset-md-1">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend custom_group">
                                    <div class="input-group-text custom_bg"><i class="fas fa-lock"></i></div>
                                </div>
                                <input type="password" class="form-control custom_input" id="conf_password" placeholder="Confirm new password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">SET NEW PASSWORD</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
