<script>
    /**
     * Created by Shuvo on 4/26/2018.
     */
// Particle JS Start
    window.onload = function() {
        Particles.init({
            selector: '.background',
            color: '#75A5B7',
            maxParticles: 130,
            connectParticles: true,
            responsive: [{
                breakpoint: 768,
                options: {
                    maxParticles: 80
                }
            }, {
                breakpoint: 375,
                options: {
                    maxParticles: 50
                }
            }]
        });
    };

    // Particle JS End

    function loginAuthentication(requestLink, authData){
        $.ajax({

            url : requestLink,
            type : 'POST',
            data : authData,
            //dataType:'json',
            success : function(data) {
                if(data==='false'){
                    $('.notification').html('<div class="alert alert-danger"><strong>Woops!</strong> Invalid username and password. Please try again with correct info.</div>')
                }else{
                    $('.notification').html('');
                    location.href="dashboard";
                }
            },
            error : function(request,error)
            {
                alert("Request: "+JSON.stringify(request));
            }
        });
    }

    function password_reset_mail(requestLink, resetEmail){
        $.ajax({

            url : requestLink,
            type : 'POST',
            data : resetEmail,
            dataType:'json',
            success : function(data) {
                if(data===false){
                    $('.notification').html('<div class="alert alert-danger"><strong>Woops!</strong> You have entered wrong email.</div>');
                }else{
                    $('.notification').html('<div class="alert alert-success"><strong>Success!</strong> Please check your email and click on password reset link.</div>');
                }
            },
            error : function(request,error)
            {
                alert("Request: "+JSON.stringify(request));
            }
        });

    }


    function password_reset(requestLink, resetEmail){
        $.ajax({

            url : requestLink,
            type : 'POST',
            data : resetEmail,
            success : function(data) {
                 if(parseInt(data)===0){
                     $('.notification').html('<div class="alert alert-danger"><strong>Woops!</strong> Password and confirm password not matched.</div>')
                 }else{
                     $('.notification').html('<div class="alert alert-success"><strong>Success!</strong> Password reset completed successfully. Please <a href="<?php echo base_url(); ?>">login</a> with your new password.</div>');
                 }
            },
            error : function(request,error)
            {
                alert("Request: "+JSON.stringify(request));
            }
        });

    }


    $(document).ready(function () {
        $(document).on('submit','#user_login',function (e) {
            e.preventDefault();
            var admin_username_or_email=$("#admin_username_or_email").val();
            var admin_password=$("#admin_password").val();
            var keep_me_logged=0;

            if($("#keep_me_logged").is(':checked')){
                keep_me_logged=1;
            }

            var requestLink= '<?php echo base_url('admin/authentication'); ?>';
            var authData={
                'username_email': admin_username_or_email,
                'password': admin_password,
                'keep': keep_me_logged,
                'admin_auth': 'base'
            };

            loginAuthentication(requestLink, authData);

        });

        $(document).on('submit','#forgot_password',function (e) {
            e.preventDefault();

            var password_reset_email=$("#password_reset_email").val();


            var requestLink='<?php echo base_url('admin/forgot'); ?>';
            var resetEmail={
                'password_reset_email': password_reset_email,
                'admin_auth': 'base'
            };

            password_reset_mail(requestLink, resetEmail);

        });

        $(document).on('submit','#reset_password',function (e) {
            e.preventDefault();

            var reset_id=$("#reset_id").val();
            var new_password=$("#new_password").val();
            var conf_password=$("#conf_password").val();


            var requestLink='<?php echo base_url('admin/reset'); ?>';
            var resetPassword={
                'reset_id': reset_id,
                'new_password': new_password,
                'conf_password': conf_password,
                'admin_auth': 'base'
            };

            password_reset(requestLink, resetPassword);

        });
    });
</script>
