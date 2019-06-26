<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                redirect('dashboard');
            }else{
                $data['title']="Admin Login";
                $this->load->view('admin/header.php',$data);
                $this->load->view('admin/login.php');
                $this->load->view('admin/footer.php');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    redirect('dashboard');
                }else{
                    $data['title']="Admin Login";
                    $this->load->view('admin/header.php',$data);
                    $this->load->view('admin/login.php');
                    $this->load->view('admin/footer.php');
                }
            }else{
                $data['title']="Admin Login";
                $this->load->view('admin/header.php',$data);
                $this->load->view('admin/login.php');
                $this->load->view('admin/footer.php');
            }
        }

    }
    

    public function authentication()
    {
        if($this->input->post('admin_auth')=='base'){
            $username_email= trim($this->input->post('username_email'));
            $password= md5(trim($this->input->post('password')).password_encryption);
            $keep= trim($this->input->post('keep'));

            $this->load->model('login');

            $result_auth=$this->login->checkAdmin($username_email,$password,$keep);

            echo json_encode($result_auth);

        }


    }



    public function forgot()
    {
        if($this->input->post('admin_auth')=='base'){
            $user_email=trim($this->input->post('password_reset_email'));
            $this->load->model('login');

            $result_reset=$this->login->password_reset_mail($user_email);

            echo json_encode($result_reset);
        }else{
            $data['title'] = "Forgot Password";
            $this->load->view('admin/header.php', $data);
            $this->load->view('admin/forgotpassword.php');
            $this->load->view('admin/footer.php');
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
                    $this->login->reset_new_password($reset_id,$new_password);
                    echo 1;
                }

            }else{
                redirect(base_url('admin'));
            }
        }else{

            $this->load->model('login');

            $result_reset_validation=$this->login->password_reset_id_validation($id);

            if($result_reset_validation==true){
                $data['title']="Set New Password";
                $data['reset_id']=$id;
                $this->load->view('admin/header.php',$data);
                $this->load->view('admin/passwordreset.php',$data);
                $this->load->view('admin/footer.php');
            }else{
                redirect(base_url('admin'));
            }

        }

    }

    public function logout()
    {
        if((isset($_COOKIE['user_data_info']) && isset($_COOKIE['user_validation'])) || ($this->session->userdata('user_data_info') && $this->session->userdata('user_validation')))
        {
            $this->session->unset_userdata('user_data_info');
            $this->session->unset_userdata('user_validation');

            $delete_user_info=array(
                'name'=>'user_data_info',
                'value'=>'',
                'path'=>'/'
            );

            $delete_user_validation=array(
                'name'=>'user_validation',
                'value'=>'',
                'path'=>'/'
            );

            delete_cookie($delete_user_info);
            delete_cookie($delete_user_validation);
            redirect(base_url('admin'));
        }else{
            redirect('dashboard');
        }
    }

}
