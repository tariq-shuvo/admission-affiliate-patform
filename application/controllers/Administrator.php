<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 5/2/2018
 * Time: 2:16 PM
 */
class Administrator extends CI_Controller
{
    public function mentors($id=1)
    {
        $offset=($id*per_page)-per_page;
        $data['serial']=$offset+1;
        $this->load->model('administratorModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['title']="All Mentors";
                $data['result']=$this->administratorModel->all_mentors($offset);
                $data['navigation']='mentors';
                $data['pagination']=$this->administratorModel->pagination_html($this->administratorModel->count_all_rows('mentors'),'administrator/mentors/',$id);


                $this->load->view('dashboard/header.php',$data);
                $this->load->view('dashboard/mentors.php',$data);
                $this->load->view('dashboard/footer.php');
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    $data['title']="All Mentors";
                    $data['result']=$this->administratorModel->all_mentors($offset);
                    $data['navigation']='mentors';
                    $data['pagination']=$this->administratorModel->pagination_html($this->administratorModel->count_all_rows('mentors'),'administrator/mentors/',$id);

                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/mentors.php',$data);
                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }
    }

    public function courses()
    {
        $id=1;
        $offset=($id*per_page)-per_page;
        $data['serial']=$offset+1;
        $this->load->model('administratorModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['title']="All Courses";
                $data['result']=$this->administratorModel->all_courses($offset);

                $data['mentors']=$this->administratorModel->load_all_mentors();
                $data['navigation']='courses';

                $data['pagination']=$this->administratorModel->pagination_html($this->administratorModel->count_all_rows('courses'),'administrator/course_page/',$id);
                $data['search_section']='courses';

                $this->load->view('dashboard/header.php',$data);
                $this->load->view('dashboard/courses.php',$data);
                $this->load->view('dashboard/footer.php');
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    $data['title']="All Courses";
                    $data['result']=$this->administratorModel->all_courses($offset);
                    $data['mentors']=$this->administratorModel->load_all_mentors();
                    $data['navigation']='courses';
                    $data['pagination']=$this->administratorModel->pagination_html($this->administratorModel->count_all_rows('courses'),'administrator/course_page/',$id);
                    $data['search_section']='courses';

                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/courses.php',$data);
                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }
    }


    public function course_page($id)
    {
        $offset=($id*per_page)-per_page;
        $data['serial']=$offset+1;
        $this->load->model('administratorModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['title']="All Courses";
                $data['result']=$this->administratorModel->all_courses($offset);

                $data['mentors']=$this->administratorModel->all_mentors();
                $data['navigation']='courses';

                $data['pagination']=$this->administratorModel->pagination_html($this->administratorModel->count_all_rows('courses'),'administrator/course_page/',$id);


//                $this->load->view('dashboard/header.php',$data);
                $this->load->view('dashboard/courses.php',$data);
//                $this->load->view('dashboard/footer.php');
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    $data['title']="All Courses";
                    $data['result']=$this->administratorModel->all_courses($offset);
                    $data['mentors']=$this->administratorModel->all_mentors();
                    $data['navigation']='courses';
                    $data['pagination']=$this->administratorModel->pagination_html($this->administratorModel->count_all_rows('courses'),'administrator/course_page/',$id);

//                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/courses.php',$data);
//                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }
    }

    public function search_course($search=null,$search_value=null,$id=1)
    {
        if($search_value==null || $search_value==null)
        {
            redirect('administrator/courses');
        }
        $offset=($id*per_page)-per_page;
        $data['serial']=$offset+1;
        $this->load->model('administratorModel');

        if($search=='mentor')
        {
            $column_name="mentor_name";
            $search_value=urldecode(trim($search_value));
        }else{
            $column_name="batch_name";
        }

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['title']="Search Courses";
                $data['result']=$this->administratorModel->search_all_courses($offset,$column_name,strtoupper($search_value));

                $data['mentors']=$this->administratorModel->all_mentors();

                $data['pagination']=$this->administratorModel->pagination_html($this->administratorModel->search_count_all_rows('courses',$column_name,strtoupper($search_value)),'administrator/search_course/'.$search.'/'.$search_value.'/',$id);

                $data['search_value']=$search_value;


//                $this->load->view('dashboard/header.php',$data);
                $this->load->view('dashboard/courses.php',$data);
//                $this->load->view('dashboard/footer.php');
            }else{
                redirect('administrator/courses');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    $data['title']="Search Courses";
                    $data['result']=$this->administratorModel->search_all_courses($offset,$column_name,strtoupper($search_value));

                    $data['mentors']=$this->administratorModel->all_mentors();

                    $data['pagination']=$this->administratorModel->pagination_html($this->administratorModel->search_count_all_rows('courses',$column_name,strtoupper($search_value)),'administrator/search_course/'.$search.'/'.$search_value.'/',$id);

                    $data['search_value']=$search_value;

//                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/courses.php',$data);
//                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('administrator/courses');
                }
            }else{
                redirect('administrator/courses');
            }
        }

    }



    public function add_mentor()
    {
        $this->load->model('administratorModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                if($this->input->post('admin_auth')=='base'){
                    $mentor_name=trim($this->input->post('mentorName'));

                    $mentor_data=array(
                        'mentor_name'=>$mentor_name
                    );
                    $result=$this->administratorModel->insert_mentor($mentor_data);

                    if($result==true){
                        $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> New mentor added successfully.</div>');
                        redirect('administrator/mentors');
                    }
                }

            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    if($this->input->post('admin_auth')=='base'){
                        $mentor_name=trim($this->input->post('mentorName'));

                        $mentor_data=array(
                            'mentor_name'=>$mentor_name
                        );
                        $result=$this->administratorModel->insert_mentor($mentor_data);

                        if($result==true){
                            $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> New mentor added successfully.</div>');
                            redirect('administrator/mentors');
                        }
                    }
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }


    }

    public function edit_mentor()
    {
        $this->load->model('administratorModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                if($this->input->post('admin_auth')=='base'){
                    $mentor_name=trim($this->input->post('mentorName'));

                    $mentor_data=array(
                        'mentor_name'=>$mentor_name
                    );
                    $result=$this->administratorModel->insert_mentor($mentor_data);

                    if($result==true){
                        $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> New mentor added successfully.</div>');
                        redirect('administrator/mentors');
                    }
                }

            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    if($this->input->post('admin_auth')=='base'){
                        $mentor_name=trim($this->input->post('mentorName'));

                        $mentor_data=array(
                            'mentor_name'=>$mentor_name
                        );
                        $result=$this->administratorModel->insert_mentor($mentor_data);

                        if($result==true){
                            $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> New mentor added successfully.</div>');
                            redirect('administrator/mentors');
                        }
                    }
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }


    }

    public function add_course()
    {
        $this->load->model('administratorModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                if($this->input->post('admin_auth')=='base'){
                    $batchName=trim($this->input->post('batchName'));
                    $batchTitle=trim($this->input->post('batchTitle'));
                    $courseType=trim($this->input->post('courseType'));
                    $courseDuration=trim($this->input->post('courseDuration'));
                    $summery=trim($this->input->post('summery'));
                    $mentorName=trim($this->input->post('mentorName'));


                    $course_data=array(
                        'batch_title'=>$batchTitle,
                        'batch_name'=>$batchName,
                        'course_type'=>$courseType,
                        'duration'=>$courseDuration,
                        'summery'=>$summery,
                        'mentor_name'=>$mentorName,
                    );
                    $result=$this->administratorModel->insert_course($course_data);

                    if($result==true){
                        $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> New course added successfully.</div>');
                        redirect('administrator/courses');
                    }
                }
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    if($this->input->post('admin_auth')=='base'){
                        $batchName=trim($this->input->post('batchName'));
                        $batchTitle=trim($this->input->post('batchTitle'));
                        $courseType=trim($this->input->post('courseType'));
                        $courseDuration=trim($this->input->post('courseDuration'));
                        $summery=trim($this->input->post('summery'));
                        $mentorName=trim($this->input->post('mentorName'));


                        $course_data=array(
                            'batch_title'=>$batchTitle,
                            'batch_name'=>$batchName,
                            'course_type'=>$courseType,
                            'duration'=>$courseDuration,
                            'summery'=>$summery,
                            'mentor_name'=>$mentorName,
                        );
                        $result=$this->administratorModel->insert_course($course_data);

                        if($result==true){
                            $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> New course added successfully.</div>');
                            redirect('administrator/courses');
                        }
                    }
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }

    }

    public function update_course()
    {
        $this->load->model('administratorModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                if($this->input->post('admin_auth')=='base'){
                    $editID=trim($this->input->post('editID'));
                    $batchID=trim($this->input->post('batchID'));
                    $batchName=trim($this->input->post('batchName'));
                    $batchTitle=trim($this->input->post('batchTitle'));
                    $courseType=trim($this->input->post('courseType'));
                    $courseDuration=trim($this->input->post('courseDuration'));
                    $summery=trim($this->input->post('summery'));
                    $mentorName=trim($this->input->post('mentorName'));


                    $course_data=array(
                        'batch_title'=>$batchTitle,
                        'batch_name'=>$batchName,
                        'course_type'=>$courseType,
                        'duration'=>$courseDuration,
                        'summery'=>$summery,
                        'mentor_name'=>$mentorName
                    );

                    $student_data=array(
                        'course_name'=>$batchTitle,
                        'batch_name'=>$batchName,
                        'course_type'=>$courseType,
                        'course_duration'=>$courseDuration,
                        'mentor_name'=>$mentorName
                    );

                    $result=$this->administratorModel->update_course($course_data,$student_data,$editID,$batchID);

                    if($result==true){
                        $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Course updated successfully.</div>');
                        redirect('administrator/courses');
                    }
                }
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    if($this->input->post('admin_auth')=='base'){

                    }
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }
    }

    public function edit_course()
    {
        $this->load->model('administratorModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                if($this->input->post('admin_auth')=='base'){
                    $edit_id=trim($this->input->post('edit_id'));
                    $data['course']=$this->administratorModel->course($edit_id);
                    $data['mentors']=$this->administratorModel->mentors();

                    $this->load->view('dashboard/edit_course.php',$data);
                }
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    if($this->input->post('admin_auth')=='base'){
                        $edit_id=trim($this->input->post('edit_id'));
                        $data['course']=$this->administratorModel->course($edit_id);
                        $this->load->view('dashboard/edit_course.php',$data);
                    }
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }

    }

    public function course_delete($id)
    {
        $this->load->model('administratorModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                if($id!=null){
                    $result=$this->administratorModel->delete_course($id);

                    if($result==true){
                        $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Course deleted successfully.</div>');
                        redirect('administrator/courses');
                    }
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    if($id!=null){
                        $result=$this->administratorModel->delete_course($id);

                        if($result==true){
                            $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Course deleted successfully.</div>');
                            redirect('administrator/courses');
                        }
                    }else{
                        redirect('dashboard');
                    }
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }

    }

    //Start Affiliate Functionality
    public function affiliates($id=1)
    {
        if($this->input->post('affiliate_phone_no'))
        {
            $searchItem=$this->input->post('affiliate_phone_no');

//            $offset=($id*per_page)-per_page;
//            $data['serial']=$offset+1;
            $data['serial']=1;
            $data['search_value']=$searchItem;
            $this->load->model('administratorModel');

            if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
                if($this->session->userdata('user_validation')==true)
                {
                    $data['title']="Search Affiliates";
                    $data['result']=$this->administratorModel->search_affiliates($searchItem);
                    $data['navigation']='affiliates';

                    $data['pagination']=false;
                    $data['search_section']='affiliates';

                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/affiliates.php',$data);
                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('dashboard');
                }

            }else{
                if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                    if(get_cookie('user_validation')==true){

                        $data['title']="Search Affiliates";
                        $data['result']=$this->administratorModel->search_affiliates($searchItem);
                        $data['navigation']='affiliates';
                        $data['pagination']=false;
                        $data['search_section']='affiliates';

                        $this->load->view('dashboard/header.php',$data);
                        $this->load->view('dashboard/affiliates.php',$data);
                        $this->load->view('dashboard/footer.php');
                    }else{
                        redirect('dashboard');
                    }
                }else{
                    redirect('dashboard');
                }
            }

        }else{
            $offset=($id*per_page)-per_page;
            $data['serial']=$offset+1;
            $this->load->model('administratorModel');

            if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
                if($this->session->userdata('user_validation')==true)
                {
                    $data['title']="All Affiliates";
                    $data['result']=$this->administratorModel->all_affiliates($offset);
                    $data['navigation']='affiliates';

                    $data['pagination']=$this->administratorModel->affiliate_pagination_html($this->administratorModel->count_all_rows('affileate_partners'),'administrator/affiliates_page/',$id);
                    $data['search_section']='affiliates';

                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/affiliates.php',$data);
                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('dashboard');
                }

            }else{
                if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                    if(get_cookie('user_validation')==true){

                        $data['title']="All Affiliates";
                        $data['result']=$this->administratorModel->all_affiliates($offset);
                        $data['navigation']='affiliates';
                        $data['pagination']=$this->administratorModel->pagination_html($this->administratorModel->count_all_rows('affileate_partners'),'administrator/affiliates_page/',$id);
                        $data['search_section']='affiliates';

                        $this->load->view('dashboard/header.php',$data);
                        $this->load->view('dashboard/affiliates.php',$data);
                        $this->load->view('dashboard/footer.php');
                    }else{
                        redirect('dashboard');
                    }
                }else{
                    redirect('dashboard');
                }
            }
        }

    }

    public function affiliates_page($id=1)
    {
        $offset=($id*per_page)-per_page;
        $data['serial']=$offset+1;
        $this->load->model('administratorModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['title']="All Affiliates";
                $data['result']=$this->administratorModel->all_affiliates($offset);
                $data['navigation']='affiliates';

                $data['pagination']=$this->administratorModel->affiliate_pagination_html($this->administratorModel->count_all_rows('affileate_partners'),'administrator/affiliates_page/',$id);
                $data['search_section']='affiliates';

//                $this->load->view('dashboard/header.php',$data);
                $this->load->view('dashboard/affiliates.php',$data);
//                $this->load->view('dashboard/footer.php');
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    $data['title']="All Affiliates";
                    $data['result']=$this->administratorModel->all_affiliates($offset);
                    $data['navigation']='affiliates';
                    $data['pagination']=$this->administratorModel->pagination_html($this->administratorModel->count_all_rows('affileate_partners'),'administrator/affiliates_page/',$id);
                    $data['search_section']='affiliates';

//                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/affiliates.php',$data);
//                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }



    }

    public function affiliate($id)
    {
        $this->load->model('administratorModel');
        $this->load->model('affilateModel');
        $data['affiliate_id']=$id;
        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $this->session->set_userdata('affiliate_id',$id);
                $data['view_data']=$this->administratorModel->affiliate($id);
                $data['total_earn']=$this->administratorModel->total_earn_amount($id);
                $data['total_withdrawal']=$this->administratorModel->total_withdrawal_amount($id);
                $data['title']="View Student Details";
                $data['navigation']='affiliates';
                $this->load->view('dashboard/header.php',$data);
                $this->load->view('dashboard/view_affiliate.php',$data);
                $this->load->view('dashboard/footer.php');
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){
                    $this->session->set_userdata('affiliate_id',$id);
                    $data['view_data']=$this->administratorModel->affiliate($id);
                    $data['total_earn']=$this->administratorModel->total_earn_amount($id);
                    $data['total_withdrawal']=$this->administratorModel->total_withdrawal_amount($id);
                    $data['title']="View Profile Details";
                    $data['navigation']='affiliates';
                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('dashboard/view_affiliate.php ',$data);
                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }
    }

    public function referrals($id=1)
    {
        $id=1;
        $offset=($id*per_page)-per_page;
        $data['serial']=$offset+1;
        $this->load->model('affilateModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['affilate_id']=$this->session->userdata('affiliate_id');

                $data['title']="All Referral Student List";
                $data['result']=$this->affilateModel->affiliate_students($data['affilate_id'],$offset);

                $data['navigation']='affiliates';
                $data['pagination']=$this->affilateModel->pagination_html($this->affilateModel->count_all_rows('refered_users',$data['affilate_id']),'administrator/referrals_page/',$id);
                $data['search_section']='students';



                $this->load->view('dashboard/header.php',$data);
                $this->load->view('affiliate_dashboard/referal_list_admin.php',$data);
                $this->load->view('dashboard/footer.php');
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    $data['affilate_id']=$this->session->userdata('affiliate_id');

                    $data['title']="All Referral Student List";
                    $data['result']=$this->affilateModel->affiliate_students($data['affilate_id'],$offset);

                    $data['navigation']='affiliates';
                    $data['pagination']=$this->affilateModel->pagination_html($this->affilateModel->count_all_rows('refered_users',$data['affilate_id']),'administrator/referrals_page/',$id);
                    $data['search_section']='students';

                    $this->load->view('dashboard/header.php',$data);
                    $this->load->view('affiliate_dashboard/referal_list_admin.php',$data);
                    $this->load->view('dashboard/footer.php');
                }else{
                    redirect('affiliate/dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }

    }

    public function monthly_payment()
    {
        $this->load->model('affilateModel');
        $affiliate_id = $this->input->post('affiliate_id');
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $result_payment_status = $this->affilateModel->update_affiliates_payments($affiliate_id,$month,$year);

                $monthly_income=$result_payment_status[0]->total_earning;

                $transaction_data = array(
                    'affiliate_id'=>$affiliate_id,
                    'payment_amount'=>$monthly_income,
                    'paid_month'=>$month,
                    'paid_year'=>$year,
                    'create_date'=>date('Y-m-d H:i:s')
                );

                $result_row = $this->affilateModel->checkMonthYear($month,$year,$affiliate_id);
                if($result_row==0) {
                    $result = $this->affilateModel->insert_transaction($transaction_data);
                    if($result==true)
                    {
                        $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Affiliate monthly payment is updated successfully.</div>');
                    }
                    redirect('administrator/affiliate/'.$affiliate_id);
                }else{
                    $this->session->set_flashdata('notification', '<div class="alert alert-info"><strong>Woops!</strong> Affiliate monthly payment is already updated.</div>');
                    redirect('administrator/affiliate/'.$affiliate_id);
                }

            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    $result_payment_status = $this->affilateModel->update_affiliates_payments($affiliate_id,$month,$year);
                    $monthly_income=$result_payment_status[0]->total_earning;
                    $transaction_data = array(
                        'affiliate_id'=>$affiliate_id,
                        'payment_amount'=>$monthly_income,
                        'paid_month'=>$month,
                        'paid_year'=>$year,
                        'create_date'=>date('Y-m-d H:i:s')
                    );

                    $result_row = $this->affilateModel->checkMonthYear($month,$year);
                    if($result_row==0) {
                        $result = $this->affilateModel->insert_transaction($transaction_data);
                        redirect('administrator/affiliate/'.$affiliate_id);
                    }else{
                        redirect('administrator/affiliate/'.$affiliate_id);
                    }
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }
    }

    public function referrals_page($id)
    {
        $offset=($id*per_page)-per_page;
        $data['serial']=$offset+1;
        $this->load->model('affilateModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                $data['affilate_id']=$this->session->userdata('affiliate_id');

                $data['title']="All Referral Student List";
                $data['result']=$this->affilateModel->affiliate_students($data['affilate_id'],$offset);

                $data['navigation']='affiliates';
                $data['pagination']=$this->affilateModel->pagination_html($this->affilateModel->count_all_rows('refered_users',$data['affilate_id']),'administrator/referrals_page/',$id);
                $data['search_section']='students';



//                $this->load->view('affiliate_dashboard/header.php',$data);
                $this->load->view('affiliate_dashboard/referal_list.php',$data);
//                $this->load->view('affiliate_dashboard/footer.php');
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    $data['affilate_id']=$this->session->userdata('affiliate_id');
                    $data['title']="All Referral Student List";
                    $data['result']=$this->affilateModel->affiliate_students($data['affilate_id'],$offset);

                    $data['navigation']='affiliates';
                    $data['pagination']=$this->affilateModel->pagination_html($this->affilateModel->count_all_rows('refered_users',$data['affilate_id']),'administrator/referrals_page/',$id);
                    $data['search_section']='students';

//                    $this->load->view('affiliate_dashboard/header.php',$data);
                    $this->load->view('affiliate_dashboard/referal_list.php',$data);
//                    $this->load->view('affiliate_dashboard/footer.php');
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }

    }

    public function affiliate_delete($id)
    {
        $this->load->model('administratorModel');

        if($this->session->has_userdata('user_data_info') && $this->session->has_userdata('user_validation')){
            if($this->session->userdata('user_validation')==true)
            {
                if($id!=null){
                    $result=$this->administratorModel->delete_affiliate($id);

                    if($result==true){
                        $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Affiliate deleted successfully.</div>');
                        redirect('administrator/affiliates');
                    }
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }

        }else{
            if(isset($_COOKIE['user_data_info'])==true && isset($_COOKIE['user_validation'])==true){
                if(get_cookie('user_validation')==true){

                    if($id!=null){
                        $result=$this->administratorModel->delete_course($id);

                        if($result==true){
                            $this->session->set_flashdata('notification', '<div class="alert alert-success"><strong>Success!</strong> Affiliate deleted successfully.</div>');
                            redirect('administrator/affiliates');
                        }
                    }else{
                        redirect('dashboard');
                    }
                }else{
                    redirect('dashboard');
                }
            }else{
                redirect('dashboard');
            }
        }

    }
}