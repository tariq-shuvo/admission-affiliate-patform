<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 4/30/2018
 * Time: 5:51 PM
 */
class Students extends CI_Controller
{
    public function index($id=1)
    {
        $offset=($id*per_page)-per_page;
        $this->load->model('admission');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['title']="All Students";
                $data['result']=$this->admission->all_student($offset);

                $data['navigation']='students';
                $data['pagination']=$this->admission->pagination_html($this->admission->count_all_rows('students'),'students/data/',$id);
                $data['search_section']='students';

                $this->load->view('dashboard/header.php',$data);
                $this->load->view('dashboard/students.php',$data);
                $this->load->view('dashboard/footer.php');
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    $data['title']="All Students";
                    $data['result']=$this->admission->all_student();
                    $data['navigation']='students';

                    $data['pagination']=$this->admission->pagination_html($this->admission->count_all_rows('students'),'students/data/',$id);
                    $data['search_section']='students';

                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/students.php',$data);
                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }

    }

    public function data($id=1)
    {
        $offset=($id*per_page)-per_page;
        $this->load->model('admission');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['title']="All Students";
                $data['result']=$this->admission->all_student($offset);
                $data['navigation']='students';
                $data['pagination']=$this->admission->pagination_html($this->admission->count_all_rows('students'),'students/data/',$id);


//                $this->load->view('dashboard/header.php',$data);
                $this->load->view('dashboard/students.php',$data);
//                $this->load->view('dashboard/footer.php');
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    $data['title']="All Students";
                    $data['result']=$this->admission->all_student($offset);
                    $data['navigation']='students';
                    $data['pagination']=$this->admission->pagination_html($this->admission->count_all_rows('students'),'students/data/',$id);

//                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/students.php',$data);
//                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }

    }


    public function search($search=null,$search_value=null,$id=1)
    {
        if($search_value==null || $search_value==null)
        {
            redirect('students');
        }
        $offset=($id*per_page)-per_page;
        $this->load->model('admission');

        $data['search']=array(
            'btn_text'=>$this->input->post('buttonText'),
            'data_id'=>$this->input->post('dataID')
        );

        if($search=='id')
        {
            $column_name="id";
        }elseif ($search=='name'){
            $column_name="name";
        }elseif ($search=='phone'){
            $column_name="phone_no";
        }else{
            $column_name="batch_name";
        }
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['title']="All Students";
                $data['result']=$this->admission->search_student($offset,$column_name,$search_value);

                $data['pagination']=$this->admission->pagination_html($this->admission->search_all_rows('students',$column_name,$search_value),'students/search/'.$search.'/'.$search_value.'/',$id);

                $data['search_value']=$search_value;
                $data['navigation']='students';


//                $this->load->view('dashboard/header.php',$data);
                $this->load->view('dashboard/students.php',$data);
//                $this->load->view('dashboard/footer.php');
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    $data['title']="All Students";
                    $data['result']=$this->admission->search_student($offset,$column_name,$search_value);

                    $data['pagination']=$this->admission->pagination_html($this->admission->search_all_rows('students',$column_name,$search_value),'students/search/'.$search.'/'.$search_value.'/',$id);

                    $data['search_value']=$search_value;
                    $data['navigation']='students';

//                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/students.php',$data);
//                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }

    }


    public function admission()
    {

        if($this->input->post('admin_auth')=='base')
        {
            $referral_id=trim($this->input->post('affiliateID'));
            $fullName=trim($this->input->post('fullName'));
            $emailAddress=trim($this->input->post('emailAddress'));
            $contactNumber=trim($this->input->post('contactNumber'));
            $fathersName=trim($this->input->post('fathersName'));
            $mothersName=trim($this->input->post('mothersName'));
            $birthdayDate=date('Y-m-d',strtotime(trim($this->input->post('birthdayDate'))));
            $gender=trim($this->input->post('gender'));
            $nationalId=trim($this->input->post('nationalId'));
            $address=trim($this->input->post('address'));
            $stateName=trim($this->input->post('stateName'));
            $countryName=trim($this->input->post('countryName'));

            $joinDate=date('Y-m-d',strtotime(trim($this->input->post('joinDate'))));
            $courseFee=trim($this->input->post('courseFee'));
            $paidAmount=trim($this->input->post('paidAmount'));
            $dueAmount=trim($this->input->post('dueAmount'));
            $invoiceNumber=trim($this->input->post('invoiceNumber'));
            $batchName=trim($this->input->post('batchName'));
            $courseName=trim($this->input->post('courseName'));
            $courseType=trim($this->input->post('courseType'));
            $courseDuration=trim($this->input->post('courseDuration'));
            $mentorName=trim($this->input->post('mentorName'));
            $courseStatus=trim($this->input->post('courseStatus'));
            $certification=trim($this->input->post('certification'));

            $fiverrProfile=trim($this->input->post('fiverrProfile'));
            $upworkProfile=trim($this->input->post('upworkProfile'));
            $pphProfile=trim($this->input->post('pphProfile'));
            $jobCompany=trim($this->input->post('jobCompany'));
            $fiverrEarnings=trim($this->input->post('fiverrEarnings'));
            $upworkEarnings=trim($this->input->post('upworkEarnings'));
            $pphEarnings=trim($this->input->post('pphEarnings'));
            $jobEarnings=trim($this->input->post('jobEarnings'));


            $facebookLink=trim($this->input->post('facebookLink'));
            $linkedinLink=trim($this->input->post('linkedinLink'));
            $twitterLink=trim($this->input->post('twitterLink'));
            $youtubeLink=trim($this->input->post('youtubeLink'));
            $dribbleLink=trim($this->input->post('dribbleLink'));
            $behanceLink=trim($this->input->post('behanceLink'));
            $websiteLink=trim($this->input->post('websiteLink'));
            $affiliateAmount=trim($this->input->post('affiliateAmount'));
            $studentDiscount=trim($this->input->post('studentDiscount'));



            $date = new DateTime();

            $unique_number=$date->getTimestamp();


            $student_admission=array(
                'id'=>$unique_number,
                'referral_id'=>$referral_id,
                'name'=>$fullName,
                'email'=>$emailAddress,
                'phone_no'=>$contactNumber,
                'fathers_name'=>$fathersName,
                'mothers_name'=>$mothersName,
                'gender'=>$gender,
                'national_id'=>$nationalId,
                'date_of_birth'=>$birthdayDate,
                'join_date'=>$joinDate,
                'course_type'=>$courseType,
                'address'=>$address,
                'division'=>$stateName,
                'country'=>$countryName,
                'batch_name'=>$batchName,
                'course_name'=>$courseName,
                'course_fee'=>$courseFee,
                'student_discount'=>$studentDiscount,
                'affiliate_amount'=>$affiliateAmount,
                'paid'=>$paidAmount,
                'due'=>$dueAmount,
                'invoice'=>$invoiceNumber,
                'course_duration'=>$courseDuration,
                'mentor_name'=>$mentorName,
                'course_status'=>$courseStatus,
                'certification'=>$certification
            );

            $facebookData=array(
              'social_media_name'=>'facebook',
              'profile_link'=>$facebookLink,
              'student_id'=>$unique_number
            );

            $likedinData=array(
                'social_media_name'=>'linkedin',
                'profile_link'=>$linkedinLink,
                'student_id'=>$unique_number
            );

            $twitterData=array(
                'social_media_name'=>'twitter',
                'profile_link'=>$twitterLink,
                'student_id'=>$unique_number
            );

            $youtubeData=array(
                'social_media_name'=>'youtube',
                'profile_link'=>$youtubeLink,
                'student_id'=>$unique_number
            );

            $dribbleData=array(
                'social_media_name'=>'dribble',
                'profile_link'=>$dribbleLink,
                'student_id'=>$unique_number
            );

            $behanceData=array(
                'social_media_name'=>'behance',
                'profile_link'=>$behanceLink,
                'student_id'=>$unique_number
            );

            $websiteData=array(
                'social_media_name'=>'website',
                'profile_link'=>$websiteLink,
                'student_id'=>$unique_number
            );

            $student_socialmedia=array($facebookData,$likedinData,$twitterData,$youtubeData,$dribbleData,$behanceData,$websiteData);


            $fiverrData=array(
                'markeplace_name'=>'fiverr',
                'profile_link'=>$fiverrProfile,
                'earn_amount'=>$fiverrEarnings,
                'student_id'=>$unique_number
            );

            $upworkData=array(
                'markeplace_name'=>'upwork',
                'profile_link'=>$upworkProfile,
                'earn_amount'=>$upworkEarnings,
                'student_id'=>$unique_number
            );

            $pphData=array(
                'markeplace_name'=>'pph',
                'profile_link'=>$pphProfile,
                'earn_amount'=>$pphEarnings,
                'student_id'=>$unique_number
            );

            $localData=array(
                'markeplace_name'=>'local',
                'profile_link'=>$jobCompany,
                'earn_amount'=>$jobEarnings,
                'student_id'=>$unique_number
            );

            $student_jobs = array($fiverrData,$upworkData,$pphData,$localData);

//            if($customPercentage=="")
//            {
//                $this->load->model('affilateModel');
//                $results=$this->affilateModel->commission_percentage($referral_id);
//                if(count($results)>0)
//                {
//                    $student_numbers=$results[0]->total_students;
//                    $numbers_ratio=($student_numbers/10);
//                    if($numbers_ratio<=1)
//                    {
//                        $percentage=10;
//                    }else{
//                        $numbers_fractions= $numbers_ratio-(int)$numbers_ratio;
//                        if($numbers_fractions>0.5)
//                        {
//                            $percentage=10;
//                        }else{
//                            $percentage=20;
//                        }
//                    }
//
//
//                }else{
//                    $percentage=10;
//                }
//            }else{
//                $percentage=$customPercentage;
//            }


            $affiliate_information = array(
                'student_id_fk'=>$unique_number,
                'referal_students_name'=>$fullName,
                'course_name'=>$courseName,
                'batch_name'=>$batchName,
                'course_fee'=>$courseFee,
                'comission_amount'=>$affiliateAmount,
                'affileate_partners_id'=>$referral_id,
                'create_date'=>$joinDate
            );


            $this->load->model('admission');
            $this->load->model('affilateModel');

            if($_FILES['image']['name']!=""){

                $config['upload_path']          = './uploads/students';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 500;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['file_name']           = $unique_number;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image'))
                {
                    $this->session->set_flashdata('notification', '<div class="alert alert-danger"><strong>Woops!</strong> Please upload a image file width should be below 1024px and height should be below 768px. File size should be below 500 KB.</div>');
                    redirect('students/admission');
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());

                    $student_admission['profile_pic']="uploads/students/".$data['upload_data']['file_name'];

                    $result=$this->admission->register($student_admission,$student_socialmedia,$student_jobs);

                    if($referral_id!="" && $referral_id!=0) {
                        $this->affilateModel->insert_referral_data($affiliate_information);
                    }
                    if($result==true)
                    {
                        $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> New admission data added successfully.</div>');
                        redirect('students/admission');
                    }
                }

            }else{
                $result=$this->admission->register($student_admission,$student_socialmedia,$student_jobs);
                if($referral_id!="" && $referral_id!=0) {
                    $this->affilateModel->insert_referral_data($affiliate_information);
                }
                if($result==true)
                {
                    $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> New admission data added successfully.</div>');
                    redirect('students/admission');
                }
            }


        }else{
            $this->load->model('admission');
            $data['courses'] = $this->admission->all_batches();

            if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
                if($this->session->userdata('user_validation')==true)
                {
                    $data['title']="Student Admission";
                    $data['navigation']='admission';
                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/admission.php',$data);
                    $this->load->view('dashboard/footer.php',$data);
                }else{
                    redirect(base_url('admin'));
                }

            }else{
                if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                    if(get_cookie('user_validation')==true){
                        $data['title']="Student Admission";
                        $data['navigation']='admission';
                        $this->load->view('dashboard/header.php',$data);
                        $this->load->view('dashboard/admission.php',$data);
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


    public function edit($id)
    {

        if($this->input->post('admin_auth')=='base')
        {
            $fullName=trim($this->input->post('fullName'));
            $emailAddress=trim($this->input->post('emailAddress'));
            $contactNumber=trim($this->input->post('contactNumber'));
            $fathersName=trim($this->input->post('fathersName'));
            $mothersName=trim($this->input->post('mothersName'));
            $birthdayDate=date('Y-m-d',strtotime(trim($this->input->post('birthdayDate'))));
            $gender=trim($this->input->post('gender'));
            $nationalId=trim($this->input->post('nationalId'));
            $address=trim($this->input->post('address'));
            $stateName=trim($this->input->post('stateName'));
            $countryName=trim($this->input->post('countryName'));

            $joinDate=date('Y-m-d',strtotime(trim($this->input->post('joinDate'))));
            $courseFee=trim($this->input->post('courseFee'));
            $paidAmount=trim($this->input->post('paidAmount'));
            $dueAmount=trim($this->input->post('dueAmount'));
            $invoiceNumber=trim($this->input->post('invoiceNumber'));
            $batchName=trim($this->input->post('batchName'));
            $courseName=trim($this->input->post('courseName'));
            $courseType=trim($this->input->post('courseType'));
            $courseDuration=trim($this->input->post('courseDuration'));
            $mentorName=trim($this->input->post('mentorName'));
            $courseStatus=trim($this->input->post('courseStatus'));
            $certification=trim($this->input->post('certification'));

            $fiverrProfile=trim($this->input->post('fiverrProfile'));
            $upworkProfile=trim($this->input->post('upworkProfile'));
            $pphProfile=trim($this->input->post('pphProfile'));
            $jobCompany=trim($this->input->post('jobCompany'));
            $fiverrEarnings=trim($this->input->post('fiverrEarnings'));
            $upworkEarnings=trim($this->input->post('upworkEarnings'));
            $pphEarnings=trim($this->input->post('pphEarnings'));
            $jobEarnings=trim($this->input->post('jobEarnings'));


            $facebookLink=trim($this->input->post('facebookLink'));
            $linkedinLink=trim($this->input->post('linkedinLink'));
            $twitterLink=trim($this->input->post('twitterLink'));
            $youtubeLink=trim($this->input->post('youtubeLink'));
            $dribbleLink=trim($this->input->post('dribbleLink'));
            $behanceLink=trim($this->input->post('behanceLink'));
            $websiteLink=trim($this->input->post('websiteLink'));



            $date = new DateTime();

            $unique_number=$date->getTimestamp();

            $student_admission=array(
                'name'=>$fullName,
                'email'=>$emailAddress,
                'phone_no'=>$contactNumber,
                'fathers_name'=>$fathersName,
                'mothers_name'=>$mothersName,
                'gender'=>$gender,
                'national_id'=>$nationalId,
                'date_of_birth'=>$birthdayDate,
                'join_date'=>$joinDate,
                'course_type'=>$courseType,
                'address'=>$address,
                'division'=>$stateName,
                'country'=>$countryName,
                'batch_name'=>$batchName,
                'course_name'=>$courseName,
                'course_fee'=>$courseFee,
                'paid'=>$paidAmount,
                'due'=>$dueAmount,
                'invoice'=>$invoiceNumber,
                'course_duration'=>$courseDuration,
                'mentor_name'=>$mentorName,
                'course_status'=>$courseStatus,
                'certification'=>$certification
            );

            $facebookData=array(
                'social_media_name'=>'facebook',
                'profile_link'=>$facebookLink
            );

            $likedinData=array(
                'social_media_name'=>'linkedin',
                'profile_link'=>$linkedinLink
            );

            $twitterData=array(
                'social_media_name'=>'twitter',
                'profile_link'=>$twitterLink
            );

            $youtubeData=array(
                'social_media_name'=>'youtube',
                'profile_link'=>$youtubeLink
            );

            $dribbleData=array(
                'social_media_name'=>'dribble',
                'profile_link'=>$dribbleLink
            );

            $behanceData=array(
                'social_media_name'=>'behance',
                'profile_link'=>$behanceLink
            );

            $websiteData=array(
                'social_media_name'=>'website',
                'profile_link'=>$websiteLink
            );

            $student_socialmedia=array($facebookData,$likedinData,$twitterData,$youtubeData,$dribbleData,$behanceData,$websiteData);


            $fiverrData=array(
                'markeplace_name'=>'fiverr',
                'profile_link'=>$fiverrProfile,
                'earn_amount'=>$fiverrEarnings
            );

            $upworkData=array(
                'markeplace_name'=>'upwork',
                'profile_link'=>$upworkProfile,
                'earn_amount'=>$upworkEarnings
            );

            $pphData=array(
                'markeplace_name'=>'pph',
                'profile_link'=>$pphProfile,
                'earn_amount'=>$pphEarnings
            );

            $localData=array(
                'markeplace_name'=>'local',
                'profile_link'=>$jobCompany,
                'earn_amount'=>$jobEarnings
            );

            $student_jobs = array($fiverrData,$upworkData,$pphData,$localData);
            

//            $affiliate_information = array(
//                'referal_students_name'=>$fullName,
//                'course_name'=>$courseName,
//                'batch_name'=>$batchName,
//                'course_fee'=>$courseFee,
//                'comission_percentage'=>$percentage,
//                'comission_amount'=>($courseFee*$percentage)/100,
//                'create_date'=>date('Y-m-d H:i:s')
//            );

            $this->load->model('admission');

            if($_FILES['image']['name']!=""){

                $config['upload_path']          = './uploads/students';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 500;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['file_name']           = $unique_number;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image'))
                {
                    $this->session->set_flashdata('notification', '<div class="alert alert-danger"><strong>Woops!</strong> Please upload a image file width should be below 1024px and height should be below 768px. File size should be below 500 KB.</div>');
                    redirect('students/admission');
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());

                    $student_admission['profile_pic']="uploads/students/".$data['upload_data']['file_name'];

                    $result=$this->admission->update($student_admission,$student_socialmedia,$student_jobs,$id);

                    if($result==true)
                    {
                        $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Student information updated successfully.</div>');
                        redirect($this->agent->referrer());
                    }
                }

            }else{
                $result=$this->admission->update($student_admission,$student_socialmedia,$student_jobs,$id);

                if($result==true)
                {
                    $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Student information updated successfully.</div>');
                    redirect($this->agent->referrer());
                }
            }

        }else{
            $this->load->model('admission');
            $data['id']=$id;
            $data['courses'] = $this->admission->all_batches();

            if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
                if($this->session->userdata('user_validation')==true)
                {
                    $data['edit_data']=$this->admission->student($id);
                    $data['title']="Update Student Info";
                    $data['navigation']='students';
                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/update_student.php',$data);
                    $this->load->view('dashboard/footer.php',$data);
                }else{
                    redirect(base_url('admin'));
                }

            }else{
                if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                    if(get_cookie('user_validation')==true){
                        $data['id']=$id;
                        $data['edit_data']=$this->admission->student($id);
                        $data['title']="Update Student Info";
                        $data['navigation']='students';
                        $this->load->view('dashboard/header.php',$data);
                        $this->load->view('dashboard/update_student.php',$data);
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


    public function view($id)
    {
        $this->load->model('admission');
        $this->load->model('affilateModel');
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['view_data']=$this->admission->student($id);
                $data['affiliate_id']=$this->affilateModel->get_affiliate_id($id);

                if(count($data['affiliate_id'])>0) {
                    $data['view_affiliate_data'] = $this->affilateModel->print_affiliate_data($data['affiliate_id'][0]->affileate_partners_id);
                }
                $data['title']="View Student Details";
                $data['navigation']='students';
                $this->load->view('dashboard/header.php',$data);
                $this->load->view('dashboard/view_student.php',$data);
                $this->load->view('dashboard/footer.php');
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    $data['view_data']=$this->admission->student($id);
                    $data['affiliate_id']=$this->affilateModel->get_affiliate_id($id);

                    if(count($data['affiliate_id'])>0) {
                        $data['view_affiliate_data'] = $this->affilateModel->print_affiliate_data($data['affiliate_id'][0]->affileate_partners_id);
                    }
                    $data['title']="View Student Details";
                    $data['navigation']='students';
                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/view_student.php',$data);
                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }

    }

    public function invoice($id)
    {
        $this->load->model('admission');
        $this->load->model('affilateModel');
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['view_data']=$this->admission->print_invoice($id);
                $data['affiliate_id']=$this->affilateModel->get_affiliate_id($id);

                if(count($data['affiliate_id'])>0) {
                    $data['view_affiliate_data'] = $this->affilateModel->print_affiliate_data($data['affiliate_id'][0]->affileate_partners_id);
                }
                if(count($data['affiliate_id'])>0)
                {
                    $data['title']="Receipt No: ".$data['affiliate_id'][0]->id;
                }else{
                    $data['title']="Receipt No: Previous Student";
                }

                $this->load->view('invoice/invoice.php',$data);
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    $data['view_data']=$this->admission->print_invoice($id);
                    $data['affiliate_id']=$this->affilateModel->get_affiliate_id($id);

                    if(count($data['affiliate_id'])>0) {
                        $data['view_affiliate_data'] = $this->affilateModel->print_affiliate_data($data['affiliate_id'][0]->affileate_partners_id);
                    }
                    if(count($data['affiliate_id'])>0)
                    {
                        $data['title']="Receipt No: ".$data['affiliate_id'][0]->id;
                    }else{
                        $data['title']="Receipt No: Previous Student";
                    }
                    $this->load->view('invoice/invoice.php',$data);
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }

    }

    public function delete($id)
    {
        $this->load->model('admission');
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $delete_students=$this->admission->delete_student($id);

                if ($delete_students==true)
                {
                    $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Student information removed successfully.</div>');
                    redirect($this->agent->referrer());
                }

            }else{
                redirect('students');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    $delete_students=$this->admission->delete_student($id);

                    if ($delete_students==true)
                    {
                        $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Student information removed successfully.</div>');
                        redirect('students');
                    }
                }else{
                    redirect($this->agent->referrer());
                }
            }else{
                redirect('students');
            }
        }

    }

    public function auto_complete_id()
    {
        $this->load->model('admission');
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $all_ids=array();
                $result=$this->admission->id_auto_complete();

                foreach ($result as $id){
                    array_push($all_ids,$id->id);
                }

                echo json_encode($all_ids);
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    $all_ids=array();
                    $result=$this->admission->id_auto_complete();

                    foreach ($result as $id){
                        array_push($all_ids,$id->id);
                    }

                    echo json_encode($all_ids);

                }
            }
        }

    }

    public function auto_complete_batch()
    {
        $this->load->model('admission');
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $result=$this->admission->batch_auto_complete();
                $all_batches=array();

                foreach ($result as $batch){
                    array_push($all_batches,$batch->batch_name);
                }

                echo json_encode($all_batches);
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    $result=$this->admission->batch_auto_complete();
                    $all_batches=array();

                    foreach ($result as $batch){
                        array_push($all_batches,$batch->batch_name);
                    }

                    echo json_encode($all_batches);

                }
            }
        }

    }

    public function auto_complete_phone()
    {
        $this->load->model('admission');
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $result=$this->admission->phone_auto_complete();
                $all_phones=array();

                foreach ($result as $phone){
                    array_push($all_phones,$phone->phone_no);
                }

                echo json_encode($all_phones);
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    $result=$this->admission->phone_auto_complete();
                    $all_phones=array();

                    foreach ($result as $phone){
                        array_push($all_phones,$phone->phone_no);
                    }

                    echo json_encode($all_phones);

                }
            }
        }

    }

    public function auto_complete_course()
    {
        $this->load->model('admission');
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $result=$this->admission->course_auto_complete();
                $all_courses=array();

                foreach ($result as $course){
                    array_push($all_courses,$course->batch_name);
                }

                echo json_encode($all_courses);
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    $result=$this->admission->course_auto_complete();
                    $all_courses=array();

                    foreach ($result as $course){
                        array_push($all_courses,$course->batch_name);
                    }

                    echo json_encode($all_courses);

                }
            }
        }

    }

    public function auto_complete_mentor()
    {
        $this->load->model('admission');
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $result=$this->admission->mentor_auto_complete();
                $all_mentors=array();

                foreach ($result as $mentor){
                    array_push($all_mentors,$mentor->mentor_name);
                }

                echo json_encode($all_mentors);
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    $result=$this->admission->mentor_auto_complete();
                    $all_mentors=array();

                    foreach ($result as $mentor){
                        array_push($all_mentors,$mentor->mentor_name);
                    }

                    echo json_encode($all_mentors);

                }
            }
        }

    }
}