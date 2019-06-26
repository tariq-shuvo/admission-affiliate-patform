<!--Contact Banner Area-->
<section class="banner_contact" style="background: url(<?php echo base_url('assets/images/BGImage.png'); ?>); background-size: cover;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm text-center">
                <h1>Shikhbe Shobai <br> Affiliate Program</h1>
                <p>Get Paid & Earn Money By <br>Shikhbe Shobai Affiliate Program <br>with a 0% investment!!</p>
            </div>
            <div class="col-sm">
                <div class="notification">
                    <?php
                    if(isset($_SESSION['notification'])){
                        echo $this->session->flashdata('notification');
                    }
                    ?>
                </div>
                <form class="contact_form" action="<?php echo base_url('affiliate/register'); ?>" method="post">
                    <input type="hidden" name="user_auth" value="@##$$##*****">
                    <div class="form-group">
                        <input type="text" class="form-control contact_text_formation" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="type your full name (ex. Farhan Rahman)" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="enter your email address (ex. farhan@shikhbeshobai.com)" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="phone_no" class="form-control" name="phone" placeholder="your phone number (ex. 01813224634)" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="enter your password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="conf_password" placeholder="confirm your password" required>
                    </div>
                    <button type="submit" class="btn affiliate_btn">Register As Affiliate Partner</button>

                </form>
                <div class="contact_form">
                    <a href="<?php echo base_url('affiliate/login'); ?>" target="_blank"><button class="btn affiliate_btn">Login</button></a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--Contact Banner Area-->


<!--------- broker start ---------->
<section class="broker">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="broker_content text-center">
                    <h2>Shikhbe Shobai is the premier affiliate network specializing in creative education and making freelancers. So, use your voice to inspire people to learn from the leading freelancing training institute and make money. We have the best ever affiliate offers you have ever seen! What are you waiting for? Sign up now and start making money with Shikhbe Shobai Affiliate Program. </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- broker end -->

<!-------- services start ---------->
<section class="services">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="service_content text-center">
                    <h1>Benefits of becoming an affiliate</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="service_content2 text-center">
                    <img src="<?php echo base_url('assets/'); ?>images/Referral.png" alt="home" class="img-fluid">
                    <h4>10% referral program</h4>
                    <p class="">Refer any of your peers and get 10% paid on each successful sale. To maximise your earnings, each referral will be taken good care of.  </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service_content2 text-center">
                    <img src="<?php echo base_url('assets/'); ?>images/Reward.png" alt="man" class="img-fluid">
                    <h4>Reward</h4>
                    <p class="">After 10 student’s enrollment,  you’ll receive rewarding commissions of 20% for next 10 admissions where you are getting 10% extra earnings then regular referrals. </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service_content2 text-center">
                    <img src="<?php echo base_url('assets/'); ?>images/Dependable.png" alt="sit" class="img-fluid">
                    <h4>Dependable</h4>
                    <p class="">Get 24/7 affiliate partner supports from our expert team that can help you to grow your business and generate more revenue. </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="service_content2 text-center">
                    <img src="<?php echo base_url('assets/'); ?>images/ZeroInvestment.png" alt="order" class="img-fluid">
                    <h4>Zero investment</h4>
                    <p class="">Stop fearing about initial investment. Now Join our affiliate program with no investment and start your business to make money.  </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service_content2 text-center">
                    <img src="<?php echo base_url('assets/'); ?>images/FastPayment.png" alt="home" class="img-fluid">
                    <h4>Fast Payment</h4>
                    <p class="">Get paid instantly to your Shikhbe Shobai affiliate portal for each successful enrollment through your referral.  </p>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- services end -->


<section class="slider-section">
    <div class="heading text-center">
        <h1>how it works</h1>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner text-center">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="howit-works">
                                <img src="<?php echo base_url('assets/'); ?>images/Apply.png" alt="Apply" class="img-fluid">
                                <h4>Apply to the  Programs</h4>
                                <p>Apply to the Shikhbe Shobai affiliate program to get your personal affiliate portal and be our respected affiliate partner.  </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="howit-works">
                                <img src="<?php echo base_url('assets/'); ?>images/Share&Promote.png" alt="Share&Promote" class="img-fluid">
                                <h4>Share, Promote & Refer</h4>
                                <p>Promote our programs to your social media, blog, website or contacts. The more you promote, the more you can earn.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="howit-works">
                                <img src="<?php echo base_url('assets/'); ?>images/Shikhbe-Shobai-Affiliate-Page.png" alt="Shikhbe-Shobai-Affiliate" class="img-fluid">
                                <h4>Earn</h4>
                                <p>For every successful student enrollment through your reference, get paid 10% of all your payments with no limit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>



<section class="rules-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="heading text-center">
                    <h1>Shikhbe Shobai Affiliate Rules</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="rules">
                    <ul>
                        <li>
                            <span>1</span> The Affiliate must fill out and submit the Signup form.
                        </li>
                        <li>
                            <span>2</span> You have to add your bank details in your account to receive payments.
                        </li>
                        <li>
                            <span>3</span> The Company will pay the Affiliate 10% for each qualified enrollment that occurs during this agreement.
                        </li>
                        <li>
                            <span>4</span> The company will also offer a 10% discount on course fees to the students referred by affiliates.
                        </li>
                        <li>
                            <span>5</span> You will receive payment to your bank account by the last 10 days of every month.
                        </li>
                        <li>
                            <span>6</span> The Company is not responsible for any third-party fees charged by banks.
                        </li>
                        <li>
                            <span>7</span> The Affiliate is responsible for maintaining the confidentiality of the Affiliate’s password and account.
                        </li>
                        <li>
                            <span>8</span> The Affiliate will not use anyone else’s account at any time.
                        </li>
                        <li>
                            <span>9</span> The Company will not be liable for any loss that may incur as a result of someone else using the Affiliate’s account.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
