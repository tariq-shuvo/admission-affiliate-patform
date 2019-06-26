<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="login_form text-center">
                <div class="for_image">
                    <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo" class="img-fluid">
                </div>
                <h1>Forgot Password</h1>
                <div class="for_form">
                    <form action="" method="post" id="forgot_password">
                        <div class="col-md-10 offset-md-1">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend custom_group">
                                    <div class="input-group-text custom_bg"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="email" name="password_reset_email" id="password_reset_email" class="form-control custom_input" placeholder="Your email">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">PASSWORD RESET LINK</button>
                    </form>
                    <div class="notification">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
