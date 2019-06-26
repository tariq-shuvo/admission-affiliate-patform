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
    public function register()
    {

        $student_data = array(
            'student_id'=> '',
            'name'=> '',
            'email'=> '',
            'phone_no'=> '',
            'fathers_name'=> '',
            'mothers_name'=> '',
            'gender'=> '',
            'profile_pic'=> '',
            'date_of_birth'=> '',
            'address'=> '',
            'city'=> '',
            'country'=> '',
            'batch_name'=> '',
            'course_name'=> '',
            'course_fee'=> '',
            'paid'=> '',
            'due'=> '',
            'invoice'=> '',
            'course_duration'=> '',
            'mentor_name'=> '',
            'course_status'=> '',
            'certification'=>''
        );

        $social_media_link=array(
            'id'=>'',
            'social_media_name'=>'',
            'profile_link'=> '',
            'student_id'=> ''
        );

        $portfolio_link = array(
            'id'=> '',
            'name'=> '',
            'portfolio_link'=> '',
            'student_id'=> ''
        );

        $market_place_link=array(
            'id'=> '',
            'markeplace_name'=> '',
            'profile_link'=> '',
            'earn_amount'=> '',
            'student_id'=> ''
        );


        $this->db->insert('students', $student_data);
        $this->db->insert('social_media_link', $social_media_link);
        $this->db->insert('portfolio_link', $portfolio_link);
        $this->db->insert('market_place_link', $market_place_link);
    }


    public function index()
    {
        $query = $this->db->get('students');

        foreach ($query->result() as $row)
        {
            echo $row->title;
        }
    }

    public function student($id)
    {

    }

    public function update()
    {
        $student_data = array(
            'name'=> '',
            'email'=> '',
            'phone_no'=> '',
            'fathers_name'=> '',
            'mothers_name'=> '',
            'gender'=> '',
            'profile_pic'=> '',
            'date_of_birth'=> '',
            'address'=> '',
            'city'=> '',
            'country'=> '',
            'batch_name'=> '',
            'course_name'=> '',
            'course_fee'=> '',
            'paid'=> '',
            'due'=> '',
            'invoice'=> '',
            'course_duration'=> '',
            'mentor_name'=> '',
            'course_status'=> '',
            'certification'=>''
        );

        $social_media_link=array(
            'social_media_name'=>'',
            'profile_link'=> '',
            'student_id'=> ''
        );

        $portfolio_link = array(
            'name'=> '',
            'portfolio_link'=> '',
            'student_id'=> ''
        );

        $market_place_link=array(
            'markeplace_name'=> '',
            'profile_link'=> '',
            'earn_amount'=> '',
            'student_id'=> ''
        );

        $where_student = "student_id = ";
        $where_media = "id = ";
        $where_portfolio = "id = ";
        $where_place = "id = ";

        $student_table = $this->db->update_string('students', $student_data, $where_student);
        $social_link_table = $this->db->update_string('social_media_link', $social_media_link, $where_media);
        $portfolio_link_table = $this->db->update_string('portfolio_link', $portfolio_link, $where_portfolio);
        $market_place_table = $this->db->update_string('market_place_link', $market_place_link, $where_place);
    }

}
