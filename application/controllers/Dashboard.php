<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $this->load->model('dashboardModel');
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['calculation']=$this->dashboardModel->gender_calculation();
                $data['course_type']=$this->dashboardModel->batch_type();
                $data['marketplace_freelancers']=$this->dashboardModel->marketplace();
                $data['marketplace_earnings']=$this->dashboardModel->marketplace_earnings();
                $data['navigation']='dashboard';
                $data['title']="Dashboard Summery";
                $this->load->view('dashboard/header.php',$data);
                $this->load->view('dashboard/dashboard.php',$data);
                $this->load->view('dashboard/footer.php',$data);
            }else{
                redirect(base_url('admin'));
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    $data['calculation']=$this->dashboardModel->gender_calculation();
                    $data['course_type']=$this->dashboardModel->batch_type();
                    $data['marketplace_freelancers']=$this->dashboardModel->marketplace();
                    $data['marketplace_earnings']=$this->dashboardModel->marketplace_earnings();
                    $data['navigation']='dashboard';
                    $data['title']="Dashboard Summery";
                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/dashboard.php',$data);
                    $this->load->view('dashboard/footer.php',$data);
                }else{
                    redirect(base_url('admin'));
                }
            }else{
                redirect(base_url('admin'));
            }
        }

    }

    public function course_info()
    {
        if($this->input->post('admin_auth')=='base')
        {
            $course_id=$this->input->post('course_id');
            $this->load->model('admission');
            echo json_encode($this->admission->batch_info($course_id));
        }

    }

    public function createuser()
    {
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['title']="Student Admission";
                $this->load->view('dashboard/header.php',$data);
                $this->load->view('dashboard/create_user.php',$data);
                $this->load->view('dashboard/footer.php',$data);
            }else{
                redirect(base_url('admin'));
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    $data['title']="Dashboard Summery";
                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/create_user.php',$data);
                    $this->load->view('dashboard/footer.php',$data);
                }else{
                    redirect(base_url('admin'));
                }
            }else{
                redirect(base_url('admin'));
            }
        }
    }
    

}
