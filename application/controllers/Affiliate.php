<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliate extends CI_Controller {
    public function index()
    {
        $data['title']="Shikhbe Shobai Affiliate Program";
        $this->load->view('affiliate/header.php',$data);
        $this->load->view('affiliate/index.php');
        $this->load->view('affiliate/footer.php');
    }

    public function register()
    {
        if($this->input->post('user_auth')=='@##$$##*****'){
            $username= trim($this->input->post('name'));
            $email= trim($this->input->post('email'));
            $phone= trim($this->input->post('phone'));
            $password= md5(trim($this->input->post('password')).password_encryption);
            $conf_password= md5(trim($this->input->post('conf_password')).password_encryption);


            $this->load->model('affilateModel');
            $check_email=$this->affilateModel->checkValidation('affileate_partners','email',$email);
            $check_phone=$this->affilateModel->checkValidation('affileate_partners','phone_no',$phone);

            if($check_email==0 && $check_phone==0 && $password==$conf_password)
            {
                $affiliate_data=array(
                  'name'=>$username,
                  'email'=>$email,
                  'phone_no'=>$phone,
                  'password'=>$password,
                  'earning_amount'=>0,
                  'widthdrawl_amount'=>0,
                  'create_date'=>date('Y-m-d H:i:s')
                );
                $result=$this->affilateModel->insert_affiliate($affiliate_data);

                if($result==true)
                {
                    $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Congrats!</strong> You have successfully registered as our affiliate partner.</div>');
                    redirect(base_url());
                }
            }else{
                $error='<div class="alert alert-danger"><strong>Woops! </strong>';
                if($check_email>0)
                {
                    $error.='Email is already exist.';
                }

                if($check_phone>0){
                    $error.='Phone no is already exist.';
                }

                if($password!=$conf_password){
                    $error.='Password and confirm password not matched.';
                }

                $error.='</div>';

                $this->session->set_flashdata('notification', $error);
                redirect(base_url());
            }


        }
    }

    public function dashboard()
    {
        $this->load->model('administratorModel');
        if($this->session->has_userdata('affiliate_data_info') && $this->session->has_userdata('affiliate_validation')){
            if($this->session->userdata('affiliate_validation')==true)
            {
                $data['navigation']='dashboard';

                $data['view_data']=$this->administratorModel->affiliate($this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id']);
                $data['total_earn']=$this->administratorModel->total_earn_amount($this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id']);
                $data['total_withdrawal']=$this->administratorModel->total_withdrawal_amount($this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id']);
                $data['title']="Affiliate Information";
                $data['affilate_name'] = $this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['name'];
                $data['affilate_id']=$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'];
                $this->load->view('affiliate_dashboard/header.php',$data);
                $this->load->view('affiliate_dashboard/dashboard.php',$data);
                $this->load->view('affiliate_dashboard/footer.php',$data);
            }else{
                redirect(base_url('affiliate/login'));
            }

        }else{
            if(isset($_COOKIE['affiliate_data_info'])==true && isset($_COOKIE['affiliate_validation'])==true){
                if(get_cookie('affiliate_validation')==true){
                    $data['navigation']='dashboard';
                    $data['affilate_id']=$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'];
                    $data['view_data']=$this->administratorModel->affiliate($this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id']);
                    $data['title']="Affiliate Information";
                    $data['affilate_name'] = $this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['name'];
                    $this->load->view('affiliate_dashboard/header.php',$data);
                    $this->load->view('affiliate_dashboard/dashboard.php',$data);
                    $this->load->view('affiliate_dashboard/footer.php',$data);
                }else{
                    redirect(base_url('affiliate/login'));
                }
            }else{
                redirect(base_url('affiliate/login'));
            }
        }

    }


    public function update_affiliate_bank()
    {
        $this->load->model('affilateModel');

        if($this->session->has_userdata('affiliate_data_info') && $this->session->has_userdata('affiliate_validation')){
            if($this->session->userdata('affiliate_validation')==true)
            {
                if($this->input->post('admin_auth')=='base'){
                    $edit_id=trim($this->input->post('affiliate_id'));
                    $bank_name=trim($this->input->post('bankName'));
                    $acc_no=trim($this->input->post('accountNo'));
                    $acc_name=trim($this->input->post('accountName'));
                    $affiliate_data=array(
                        'bank_name'=>$bank_name,
                        'acc_name'=>$acc_name,
                        'acc_no'=>$acc_no
                    );
                    $result=$this->affilateModel->update_affiliate($affiliate_data,$edit_id);
                    if($result==true){
                        $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Bank account information updated successfully.</div>');
                        redirect('affiliate/dashboard');
                    }

                }
            }else{
                redirect('affiliate/login');
            }

        }else{
            if(isset($_COOKIE['affiliate_data_info'])==true && isset($_COOKIE['affiliate_validation'])==true){
                if(get_cookie('affiliate_validation')==true){

                    if($this->input->post('admin_auth')=='base'){
                        $edit_id=trim($this->input->post('affiliate_id'));
                        $bank_name=trim($this->input->post('bankName'));
                        $acc_no=trim($this->input->post('accountNo'));
                        $acc_name=trim($this->input->post('accountName'));
                        $affiliate_data=array(
                            'bank_name'=>$bank_name,
                            'acc_name'=>$acc_name,
                            'acc_no'=>$acc_no
                        );
                        $result=$this->affilateModel->update_affiliate($affiliate_data,$edit_id);
                        if($result==true){
                            $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Bank account information updated successfully.</div>');
                            redirect('affiliate/dashboard');
                        }
                    }
                }else{
                    redirect('affiliate/login');
                }
            }else{
                redirect('affiliate/login');
            }
        }

    }

    public function update_profile()
    {
        $this->load->model('affilateModel');

        if ($this->session->has_userdata('affiliate_data_info') && $this->session->has_userdata('affiliate_validation')) {
            if ($this->session->userdata('affiliate_validation') == true) {

                if ($this->input->post('admin_auth') == 'base') {
                    $edit_id = trim($this->input->post('affiliate_id'));
                    $personName = trim($this->input->post('personName'));
                    $phoneNo = trim($this->input->post('phoneNo'));
                    $emailID = trim($this->input->post('emailID'));
                    $affiliate_data = array(
                        'name' => $personName,
                        'phone_no' => $phoneNo,
                        'email' => $emailID
                    );
                    $result = $this->affilateModel->update_affiliate($affiliate_data, $edit_id);
                    if ($result == true) {
                        $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Profile information updated successfully.</div>');
                        redirect('affiliate/dashboard');
                    }

                }
            } else {
                redirect('affiliate/login');
            }

        } else {
            if (isset($_COOKIE['affiliate_data_info']) == true && isset($_COOKIE['affiliate_validation']) == true) {
                if (get_cookie('affiliate_validation') == true) {

                    if ($this->input->post('admin_auth') == 'base') {
                        $edit_id = trim($this->input->post('affiliate_id'));
                        $personName = trim($this->input->post('personName'));
                        $phoneNo = trim($this->input->post('phoneNo'));
                        $emailID = trim($this->input->post('emailID'));
                        $affiliate_data = array(
                            'name' => $personName,
                            'phone_no' => $phoneNo,
                            'email' => $emailID
                        );
                        $result = $this->affilateModel->update_affiliate($affiliate_data, $edit_id);
                        if ($result == true) {
                            $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Profile information updated successfully.</div>');
                            redirect('affiliate/dashboard');
                        }

                    }
                } else {
                    redirect('affiliate/login');
                }
            } else {
                redirect('affiliate/login');
            }
        }
    }



    public function login()
    {

        if($this->session->has_userdata('affiliate_data_info') && $this->session->has_userdata('affiliate_validation')){
            if($this->session->userdata('affiliate_validation')==true)
            {
                redirect('affiliate/dashboard');
            }else{
                $data['title']="Affiliate Login";
                $this->load->view('affiliate_login/header.php',$data);
                $this->load->view('affiliate_login/login.php');
                $this->load->view('affiliate_login/footer.php');
            }

        }else{
            if(isset($_COOKIE['affiliate_data_info'])==true && isset($_COOKIE['affiliate_validation'])==true){
                if(get_cookie('affiliate_validation')==true){
                    redirect('affiliate/dashboard');
                }else{
                    $data['title']="Affiliate Login";
                    $this->load->view('affiliate_login/header.php',$data);
                    $this->load->view('affiliate_login/login.php');
                    $this->load->view('affiliate_login/footer.php');
                }
            }else{
                $data['title']="Affiliate Login";
                $this->load->view('affiliate_login/header.php',$data);
                $this->load->view('affiliate_login/login.php');
                $this->load->view('affiliate_login/footer.php');
            }
        }

    }

    public function authentication()
    {
        if($this->input->post('admin_auth')=='base'){
            $username_email= trim($this->input->post('username_email'));
            $password= md5(trim($this->input->post('password')).password_encryption);
            $keep= trim($this->input->post('keep'));

            $this->load->model('affilateModel');

            $result_auth=$this->affilateModel->checkAdmin($username_email,$password,$keep);

            echo json_encode($result_auth);

        }


    }



    public function forgot()
    {
        if($this->input->post('admin_auth')=='base'){
            $user_email=trim($this->input->post('password_reset_email'));
            $this->load->model('login');

            $result_reset=$this->login->password_reset_mail_affiliate($user_email);

            echo json_encode($result_reset);
        }else{
            $data['title'] = "Forgot Password";
            $this->load->view('affiliate_login/header.php', $data);
            $this->load->view('affiliate_login/forgotpassword.php');
            $this->load->view('affiliate_login/footer.php');
        }

    }

    public function reset($id=null)
    {

        if($id==null){
            if($this->input->post('admin_auth')=='base')
            {
                $reset_id = $this->input->post('reset_id');
                $new_password = md5(trim($this->input->post('new_password')).password_encryption);
                $conf_password = md5(trim($this->input->post('conf_password')).password_encryption);
                if($new_password!=$conf_password){
                    echo 0;
                }else{
                    $this->load->model('login');
                    $this->login->reset_new_password_affiliate($reset_id,$new_password);
                    echo 1;
                }

            }else{
                redirect(base_url('affiliate/login'));
            }
        }else{

            $this->load->model('login');

            $result_reset_validation=$this->login->password_reset_id_validation($id);

            if($result_reset_validation==true){
                $data['title']="Set New Password";
                $data['reset_id']=$id;
                $this->load->view('affiliate_login/header.php',$data);
                $this->load->view('affiliate_login/passwordreset.php',$data);
                $this->load->view('affiliate_login/footer.php');
            }else{
                redirect(base_url('affiliate/login'));
            }

        }

    }

    public function logout()
    {
        if((isset($_COOKIE['affiliate_data_info']) && isset($_COOKIE['affiliate_validation'])) || ($this->session->userdata('affiliate_data_info') && $this->session->userdata('affiliate_validation')))
        {
            $this->session->unset_userdata('affiliate_data_info');
            $this->session->unset_userdata('affiliate_validation');

            $delete_user_info=array(
                'name'=>'affiliate_data_info',
                'value'=>'',
                'path'=>'/'
            );

            $delete_user_validation=array(
                'name'=>'affiliate_validation',
                'value'=>'',
                'path'=>'/'
            );

            delete_cookie($delete_user_info);
            delete_cookie($delete_user_validation);
            redirect(base_url('affiliate/login'));
        }else{
            redirect('affiliate/dashboard');
        }
    }

    public function transactions()
    {
        $this->load->model('affilateModel');

        if($this->session->has_userdata('affiliate_data_info') && $this->session->has_userdata('affiliate_validation')){
            if($this->session->userdata('affiliate_validation')==true)
            {
                $data['affilate_name'] = $this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['name'];
                $data['affilate_id']=$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'];

                $data['title']="Transaction Report";

                $data['navigation']='transactions';

                $data['result']=$this->affilateModel->all_transaction($data['affilate_id']);


                $this->load->view('affiliate_dashboard/header.php',$data);
                $this->load->view('affiliate_dashboard/transactions.php',$data);
                $this->load->view('affiliate_dashboard/footer.php');
            }else{
                redirect('affiliate/dashboard');
            }

        }else{
            if(isset($_COOKIE['affiliate_data_info'])==true && isset($_COOKIE['affiliate_validation'])==true){
                if(get_cookie('affiliate_validation')==true){

                    $data['title']="Transaction Report";
                    $data['navigation']='transactions';


                    $data['affilate_name'] = $this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['name'];
                    $data['affilate_id']=$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'];

                    $data['result']=$this->affilateModel->all_transaction($data['affilate_id']);

                    $this->load->view('affiliate_dashboard/header.php',$data);
                    $this->load->view('affiliate_dashboard/transactions.php',$data);
                    $this->load->view('affiliate_dashboard/footer.php');
                }else{
                    redirect('affiliate/dashboard');
                }
            }else{
                redirect('affiliate/dashboard');
            }
        }

    }

    public function courses()
    {

        if($this->session->has_userdata('affiliate_data_info') && $this->session->has_userdata('affiliate_validation')){
            if($this->session->userdata('affiliate_validation')==true)
            {
                $data['affilate_name'] = $this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['name'];
                $data['affilate_id']=$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'];

                $data['title']="All available courses";

                $data['navigation']='courses';


                $this->load->view('affiliate_dashboard/header.php',$data);
                $this->load->view('affiliate_dashboard/courses.php',$data);
                $this->load->view('affiliate_dashboard/footer.php');
            }else{
                redirect('affiliate/dashboard');
            }

        }else{
            if(isset($_COOKIE['affiliate_data_info'])==true && isset($_COOKIE['affiliate_validation'])==true){
                if(get_cookie('affiliate_validation')==true){

                    $data['affilate_name'] = $this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['name'];
                    $data['affilate_id']=$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'];

                    $data['title']="All available courses";

                    $data['navigation']='courses';


                    $this->load->view('affiliate_dashboard/header.php',$data);
                    $this->load->view('affiliate_dashboard/courses.php',$data);
                    $this->load->view('affiliate_dashboard/footer.php');
                }else{
                    redirect('affiliate/dashboard');
                }
            }else{
                redirect('affiliate/dashboard');
            }
        }

    }

    public function earnings()
    {
        $this->load->model('affilateModel');

        $data['month']=date('m');
        $data['year']=date('Y');

        $data['result_affiliate'] = $this->affilateModel->total_referrals($this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id']);
        $data['result_rewards'] = $this->affilateModel->total_rewards($this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id']);
        $data['result_earnings'] = $this->affilateModel->total_earnings($this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id']);

        if($this->session->has_userdata('affiliate_data_info') && $this->session->has_userdata('affiliate_validation')){
            if($this->session->userdata('affiliate_validation')==true)
            {
                $data['affilate_name'] = $this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['name'];
                $data['affilate_id']=$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'];

                $data['title']="All Referral Student List";

                $data['navigation']='earnings';



                $this->load->view('affiliate_dashboard/header.php',$data);
                $this->load->view('affiliate_dashboard/earnings.php',$data);
                $this->load->view('affiliate_dashboard/footer.php');
            }else{
                redirect('affiliate/dashboard');
            }

        }else{
            if(isset($_COOKIE['affiliate_data_info'])==true && isset($_COOKIE['affiliate_validation'])==true){
                if(get_cookie('affiliate_validation')==true){

                    $data['affilate_name'] = $this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['name'];
                    $data['affilate_id']=$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'];

                    $data['title']="All Referral Student List";

                    $data['navigation']='earnings';

                    $this->load->view('affiliate_dashboard/header.php',$data);
                    $this->load->view('affiliate_dashboard/earnings.php',$data);
                    $this->load->view('affiliate_dashboard/footer.php');
                }else{
                    redirect('affiliate/dashboard');
                }
            }else{
                redirect('affiliate/dashboard');
            }
        }

    }


    public function earnings_details_ajax()
    {
        $this->load->model('affilateModel');

        $data['month']=$this->input->post('month');
        $data['year']=$this->input->post('year');

        $data['result_affiliate'] = $this->affilateModel->total_referrals_ajax($this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'],$data['month'],$data['year']);
        $data['result_rewards'] = $this->affilateModel->total_rewards_ajax($this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'],$data['month'],$data['year']);
        $data['result_earnings'] = $this->affilateModel->total_earnings_ajax($this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'],$data['month'],$data['year']);

        if($this->session->has_userdata('affiliate_data_info') && $this->session->has_userdata('affiliate_validation')){
            if($this->session->userdata('affiliate_validation')==true)
            {
                $this->load->view('affiliate_dashboard/earnings.php',$data);
            }else{
                redirect('affiliate/dashboard');
            }

        }else{
            if(isset($_COOKIE['affiliate_data_info'])==true && isset($_COOKIE['affiliate_validation'])==true){
                if(get_cookie('affiliate_validation')==true){
                    $this->load->view('affiliate_dashboard/earnings.php',$data);
                }else{
                    redirect('affiliate/dashboard');
                }
            }else{
                redirect('affiliate/dashboard');
            }
        }

    }

    public function referrals($id=1)
    {
        $id=1;
        $offset=($id*per_page)-per_page;
        $data['serial']=$offset+1;
        $this->load->model('affilateModel');

        if($this->session->has_userdata('affiliate_data_info') && $this->session->has_userdata('affiliate_validation')){
            if($this->session->userdata('affiliate_validation')==true)
            {
                $data['affilate_name'] = $this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['name'];
                $data['affilate_id']=$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'];

                $data['title']="All Referral Student List";
                $data['result']=$this->affilateModel->affiliate_students($data['affilate_id'],$offset);

                $data['navigation']='referrals';
                $data['pagination']=$this->affilateModel->pagination_html($this->affilateModel->count_all_rows('refered_users',$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id']),'affiliate/referrals_page/',$id);
                $data['search_section']='students';



                $this->load->view('affiliate_dashboard/header.php',$data);
                $this->load->view('affiliate_dashboard/referal_list.php',$data);
                $this->load->view('affiliate_dashboard/footer.php');
            }else{
                redirect('affiliate/dashboard');
            }

        }else{
            if(isset($_COOKIE['affiliate_data_info'])==true && isset($_COOKIE['affiliate_validation'])==true){
                if(get_cookie('affiliate_validation')==true){

                    $data['affilate_name'] = $this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['name'];
                    $data['affilate_id']=$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'];

                    $data['title']="All Referral Student List";
                    $data['result']=$this->affilateModel->affiliate_students($data['affilate_id'],$offset);

                    $data['navigation']='referrals';
                    $data['pagination']=$this->affilateModel->pagination_html($this->affilateModel->count_all_rows('refered_users',$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id']),'affiliate/referrals_page/',$id);
                    $data['search_section']='students';

                    $this->load->view('affiliate_dashboard/header.php',$data);
                    $this->load->view('affiliate_dashboard/referal_list.php',$data);
                    $this->load->view('affiliate_dashboard/footer.php');
                }else{
                    redirect('affiliate/dashboard');
                }
            }else{
                redirect('affiliate/dashboard');
            }
        }

    }

    public function referrals_page($id)
    {
        $offset=($id*per_page)-per_page;
        $data['serial']=$offset+1;
        $this->load->model('affilateModel');

        if($this->session->has_userdata('affiliate_data_info') && $this->session->has_userdata('affiliate_validation')){
            if($this->session->userdata('affiliate_validation')==true)
            {
                $data['affilate_name'] = $this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['name'];
                $data['affilate_id']=$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'];

                $data['title']="All Referral Student List";
                $data['result']=$this->affilateModel->affiliate_students($data['affilate_id'],$offset);

                $data['navigation']='referrals';
                $data['pagination']=$this->affilateModel->pagination_html($this->affilateModel->count_all_rows('refered_users',$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id']),'affiliate/referrals_page/',$id);
                $data['search_section']='students';



//                $this->load->view('affiliate_dashboard/header.php',$data);
                $this->load->view('affiliate_dashboard/referal_list.php',$data);
//                $this->load->view('affiliate_dashboard/footer.php');
            }else{
                redirect('affiliate/dashboard');
            }

        }else{
            if(isset($_COOKIE['affiliate_data_info'])==true && isset($_COOKIE['affiliate_validation'])==true){
                if(get_cookie('affiliate_validation')==true){

                    $data['affilate_name'] = $this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['name'];
                    $data['affilate_id']=$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id'];

                    $data['title']="All Referral Student List";
                    $data['result']=$this->affilateModel->affiliate_students($data['affilate_id'],$offset);

                    $data['navigation']='referrals';
                    $data['pagination']=$this->affilateModel->pagination_html($this->affilateModel->count_all_rows('refered_users',$this->session->get_userdata('affiliate_data_info')['affiliate_data_info'][0]['id']),'affiliate/referrals_page/',$id);
                    $data['search_section']='students';

//                    $this->load->view('affiliate_dashboard/header.php',$data);
                    $this->load->view('affiliate_dashboard/referal_list.php',$data);
//                    $this->load->view('affiliate_dashboard/footer.php');
                }else{
                    redirect('affiliate/dashboard');
                }
            }else{
                redirect('affiliate/dashboard');
            }
        }

    }

    public function auto_complete_affiliate()
    {
        $this->load->model('affilateModel');
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $all_ids=array();
                $result=$this->affilateModel->affiliate_phone();

                foreach ($result as $id){
                    array_push($all_ids,$id->phone_no);
                }

                echo json_encode($all_ids);
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    $all_ids=array();
                    $result=$this->affilateModel->affiliate_phone();

                    foreach ($result as $id){
                        array_push($all_ids,$id->phone_no);
                    }

                    echo json_encode($all_ids);

                }
            }
        }

    }

    public function affiliate_id()
    {
        $this->load->model('affilateModel');
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $result=$this->affilateModel->affiliate_id_get($this->input->post('affiliate_phone'));

                foreach ($result as $id){
                    $id_data=$id->id;
                }

                echo $id_data;
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    $result=$this->affilateModel->affiliate_id_get($this->input->post('affiliate_phone'));

                    foreach ($result as $id){
                        $id_data=$id->id;
                    }

                    echo $id_data;

                }
            }
        }

    }


    public function update_profile_picture()
    {
        $this->load->model('affilateModel');
        $date = new DateTime();
        $unique_number=$date->getTimestamp();


        if($_FILES['profilePicture']['name']!=""){
            $edit_id=$this->input->post('affiliate_id');

            $config['upload_path']          = './uploads/affiliates';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1024;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name']           = $unique_number;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('profilePicture'))
            {
                $this->session->set_flashdata('notification', '<div class="alert alert-danger"><strong>Woops!</strong> Please upload a image file width should be below 1024px and height should be below 768px. File size should be below 1MB.</div>');
                redirect('affiliate/dashboard');
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());

                $profile_pic_update= array(
                    'profile_picture'=>"uploads/affiliates/".$data['upload_data']['file_name']
                );

                $result=$this->affilateModel->update_affiliate($profile_pic_update, $edit_id);

                if($result==true)
                {
                    $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> New profile picture uploaded successfully.</div>');
                    redirect('affiliate/dashboard');
                }
            }

        }else{
            $this->session->set_flashdata('notification', '<div class="alert alert-danger"><strong>Woops!</strong> Please upload a image file width should be below 1024px and height should be below 768px. File size should be below 500 KB.</div>');
            redirect('affiliate/dashboard');
        }
    }
}