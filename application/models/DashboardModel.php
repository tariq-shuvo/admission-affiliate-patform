<?php

/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 5/6/2018
 * Time: 5:04 PM
 */
class DashboardModel extends CI_Model
{
    public function gender_calculation()
    {
        $data=array();
        $this->db->select("*");
        $this->db->from("students");
        $this->db->where("gender",1);
        $query_male = $this->db->get();
        array_push($data, $query_male->num_rows());
        $this->db->select("*");
        $this->db->from("students");
        $this->db->where("gender",2);
        $query_female = $this->db->get();
        array_push($data, $query_female->num_rows());

        return $data;
    }

    public function batch_type()
    {
        $data=array();
        $this->db->select("*");
        $this->db->from("students");
        $this->db->where("course_type",1);
        $query_male = $this->db->get();
        array_push($data, $query_male->num_rows());
        $this->db->select("*");
        $this->db->from("students");
        $this->db->where("course_type",2);
        $query_female = $this->db->get();
        array_push($data, $query_female->num_rows());

        return $data;
    }

    public function marketplace()
    {
        $data=array();
        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('market_place_link', 'students.id = market_place_link.student_id');
        $this->db->where('profile_link!=','');
        $query = $this->db->get();

        $total_freelancers = $query->num_rows();

        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('market_place_link', 'students.id = market_place_link.student_id');
        $this->db->where('profile_link!=','');
        $this->db->where('markeplace_name','fiverr');
        $fiverr_freelancers = (($this->db->get()->num_rows())/$total_freelancers)*100;

        array_push($data,$fiverr_freelancers);

        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('market_place_link', 'students.id = market_place_link.student_id');
        $this->db->where('profile_link!=','');
        $this->db->where('markeplace_name','upwork');
        $upwork_freelancers = (($this->db->get()->num_rows())/$total_freelancers)*100;

        array_push($data,$upwork_freelancers);

        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('market_place_link', 'students.id = market_place_link.student_id');
        $this->db->where('profile_link!=','');
        $this->db->where('markeplace_name','pph');
        $pph_freelancers = (($this->db->get()->num_rows())/$total_freelancers)*100;

        array_push($data,$pph_freelancers);

        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('market_place_link', 'students.id = market_place_link.student_id');
        $this->db->where('profile_link!=','');
        $this->db->where('markeplace_name','local');
        $local_jobs = (($this->db->get()->num_rows())/$total_freelancers)*100;

        array_push($data,$local_jobs);

        return $data;

    }

    public function marketplace_earnings()
    {
        $data=array();
        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('market_place_link', 'students.id = market_place_link.student_id');
        $this->db->where('profile_link!=','');
        $query = $this->db->get();

        $total_freelancers = $query->num_rows();

        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('market_place_link', 'students.id = market_place_link.student_id');
        $this->db->where('profile_link!=','');
        $this->db->where('earn_amount<=',500);
        $low_earnings = (($this->db->get()->num_rows())/$total_freelancers)*100;

        array_push($data,$low_earnings);

        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('market_place_link', 'students.id = market_place_link.student_id');
        $this->db->where('profile_link!=','');
        $this->db->where('earn_amount>=',501);
        $this->db->where('earn_amount<=',1000);
        $mid_earnings = (($this->db->get()->num_rows())/$total_freelancers)*100;

        array_push($data,$mid_earnings);

        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('market_place_link', 'students.id = market_place_link.student_id');
        $this->db->where('profile_link!=','');
        $this->db->where('earn_amount>=',1001);
        $this->db->where('earn_amount<=',2000);
        $high_earnings = (($this->db->get()->num_rows())/$total_freelancers)*100;

        array_push($data,$high_earnings);

        $this->db->select('*');
        $this->db->from('students');
        $this->db->join('market_place_link', 'students.id = market_place_link.student_id');
        $this->db->where('profile_link!=','');
        $this->db->where('earn_amount>',2000);
        $top_earnings = (($this->db->get()->num_rows())/$total_freelancers)*100;

        array_push($data,$top_earnings);

        return $data;
    }
}