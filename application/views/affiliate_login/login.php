<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="login_form text-center">
                <div class="for_image">
                    <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo" class="img-fluid">
                </div>
                <h1>Affiliate Login</h1>
                <div class="for_form">
                    <div class="notification">

                    </div>
                    <form action="" method="post" id="user_login">
                        <div class="col-md-10 offset-md-1">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend custom_group">
                                    <div class="input-group-text custom_bg"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control custom_input" id="admin_username_or_email" placeholder="Phone or email">
                            </div>
                        </div>
                        <div class="col-md-10 offset-md-1">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend custom_group">
                                    <div class="input-group-text custom_bg"><i class="fas fa-lock"></i></div>
                                </div>
                                <input type="password" class="form-control custom_input" id="admin_password" placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">LOGIN</button>
                        <div class="col-md-10 offset-md-1">
                            <div class="form-group">
                                <div class="form-check">
                                    <div class="float-left">
                                        <input class="form-check-input" type="checkbox" id="keep_me_logged">
                                        <label class="form-check-label custom_font" for="gridCheck">
                                            Remember me
                                        </label>
                                    </div>
                                    <div class="float-right">
                                        <a class="custom_font" href="<?php echo base_url('affiliate/forgot'); ?>">Forget password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
