<?php

/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 5/2/2018
 * Time: 2:18 PM
 */
class AdministratorModel extends CI_Model
{

    public function pagination_html($total_pages,$urls,$page_id=null)
    {
        $active_page=($page_id==null)?1:$page_id;


        $total_rows = ceil($total_pages/per_page);

        if($total_rows<12)
        {
            $pagination ='<ul class="pagination justify-content-center" id="paginaion">';
            if($page_id==null || $page_id==1)
            {
                $pagination .='<li class="page-item disabled"><a class="page-link" href="'.base_url($urls).'" tabindex="-1"><i class="fas fa-caret-left"></i></a></li>';
            }else{
                $pagination .='<li class="page-item"><a class="page-link" href="'.base_url($urls.($active_page-1)).'"><i class="fas fa-caret-left"></i></a></li>';
            }
            for($i=1;$i<=$total_rows;$i++){

                if($i==$active_page){
                    $pagination .='<li class="page-item active"><a class="page-link" href="'.base_url($urls.$i).'">'.$i.'</a></li>';
                }else{
                    $pagination .='<li class="page-item"><a class="page-link" href="'.base_url($urls.$i).'">'.$i.'</a></li>';
                }

            }
            if($page_id==$total_rows)
            {
                $pagination .='<li class="page-item disabled"><a class="page-link" href="'.base_url($urls.$i).'"><i class="fas fa-caret-right"></i></a></li>';
            }else{
                $pagination .='<li class="page-item"><a class="page-link" href="'.base_url($urls.($active_page+1)).'"><i class="fas fa-caret-right"></i></a></li>';
            }
            $pagination .='</ul>';
        }else{
            $pagination ='<ul class="pagination justify-content-center" id="paginaion">';
            if($page_id==null || $page_id==1)
            {
                $pagination .='<li class="page-item disabled"><a class="page-link" href="'.base_url($urls).'" tabindex="-1"><i class="fas fa-caret-left"></i></a></li>';
            }else{
                $pagination .= '<li class="page-item"><a class="page-link" href="' . base_url($urls . ($active_page - 1)) . '"><i class="fas fa-caret-left"></i></a></li>';

                $pagination .='<li class="page-item"><a class="page-link">...</a></li>';

            }

            if($active_page>7)
            {
                for($i=$active_page-7;$i<=$active_page+7;$i++){

                    if($i==$active_page){
                        $pagination .='<li class="page-item active"><a class="page-link" href="'.base_url($urls.$i).'">'.$i.'</a></li>';
                    }else{
                        if($total_rows>=$i) {
                            $pagination .= '<li class="page-item"><a class="page-link" href="' . base_url($urls . $i) . '">' . $i . '</a></li>';
                        }
                    }

                }
            }else{
                for($i=$active_page;$i<=$active_page+14;$i++){

                    if($i==$active_page){
                        $pagination .='<li class="page-item active"><a class="page-link" href="'.base_url($urls.$i).'">'.$i.'</a></li>';
                    }else{
                        if($total_rows>=$i) {
                            $pagination .= '<li class="page-item"><a class="page-link" href="' . base_url($urls . $i) . '">' . $i . '</a></li>';
                        }
                    }

                }
            }

            if($page_id==$total_rows)
            {
                $pagination .='<li class="page-item disabled"><a class="page-link" href="'.base_url($urls.$i).'"><i class="fas fa-caret-right"></i></a></li>';
            }else{
                if($active_page+7<$total_rows)
                {
                    $pagination .='<li class="page-item"><a class="page-link">...</a></li>';
                }
                $pagination .='<li class="page-item"><a class="page-link" href="'.base_url($urls.($active_page+1)).'"><i class="fas fa-caret-right"></i></a></li>';
            }
            $pagination .='</ul>';
        }




        return $pagination;
    }


    public function affiliate_pagination_html($total_pages,$urls,$page_id=null)
    {
        $active_page=($page_id==null)?1:$page_id;


        $total_rows = ceil($total_pages/per_page);

        if($total_rows<12)
        {
            $pagination ='<ul class="pagination justify-content-center" id="paginaion">';
            if($page_id==null || $page_id==1)
            {
                $pagination .='<li class="page-item disabled"><a class="page-link" href="'.base_url($urls).'" tabindex="-1"><i class="fas fa-caret-left"></i></a></li>';
            }else{
                $pagination .='<li class="page-item"><a class="page-link" href="'.base_url($urls.($active_page-1)).'"><i class="fas fa-caret-left"></i></a></li>';
            }
            for($i=1;$i<=$total_rows;$i++){

                if($i==$active_page){
                    $pagination .='<li class="page-item active"><a class="page-link" href="'.base_url($urls.$i).'">'.$i.'</a></li>';
                }else{
                    $pagination .='<li class="page-item"><a class="page-link" href="'.base_url($urls.$i).'">'.$i.'</a></li>';
                }

            }
            if($page_id==$total_rows)
            {
                $pagination .='<li class="page-item disabled"><a class="page-link" href="'.base_url($urls.$i).'"><i class="fas fa-caret-right"></i></a></li>';
            }else{
                $pagination .='<li class="page-item"><a class="page-link" href="'.base_url($urls.($active_page+1)).'"><i class="fas fa-caret-right"></i></a></li>';
            }
            $pagination .='</ul>';
        }else{
            $pagination ='<ul class="pagination justify-content-center" id="paginaion">';
            if($page_id==null || $page_id==1)
            {
                $pagination .='<li class="page-item disabled"><a class="page-link" href="'.base_url($urls).'" tabindex="-1"><i class="fas fa-caret-left"></i></a></li>';
            }else{
                $pagination .= '<li class="page-item"><a class="page-link" href="' . base_url($urls . ($active_page - 1)) . '"><i class="fas fa-caret-left"></i></a></li>';

                $pagination .='<li class="page-item"><a class="page-link">...</a></li>';

            }

            if($active_page>7)
            {
                for($i=$active_page-7;$i<=$active_page+7;$i++){

                    if($i==$active_page){
                        $pagination .='<li class="page-item active"><a class="page-link" href="'.base_url($urls.$i).'">'.$i.'</a></li>';
                    }else{
                        if($total_rows>=$i) {
                            $pagination .= '<li class="page-item"><a class="page-link" href="' . base_url($urls . $i) . '">' . $i . '</a></li>';
                        }
                    }

                }
            }else{
                for($i=$active_page;$i<=$active_page+14;$i++){

                    if($i==$active_page){
                        $pagination .='<li class="page-item active"><a class="page-link" href="'.base_url($urls.$i).'">'.$i.'</a></li>';
                    }else{
                        if($total_rows>=$i) {
                            $pagination .= '<li class="page-item"><a class="page-link" href="' . base_url($urls . $i) . '">' . $i . '</a></li>';
                        }
                    }

                }
            }

            if($page_id==$total_rows)
            {
                $pagination .='<li class="page-item disabled"><a class="page-link" href="'.base_url($urls.$i).'"><i class="fas fa-caret-right"></i></a></li>';
            }else{
                if($active_page+7<$total_rows)
                {
                    $pagination .='<li class="page-item"><a class="page-link">...</a></li>';
                }
                $pagination .='<li class="page-item"><a class="page-link" href="'.base_url($urls.($active_page+1)).'"><i class="fas fa-caret-right"></i></a></li>';
            }
            $pagination .='</ul>';
        }




        return $pagination;
    }

    public function count_all_rows($table_name)
    {
        $this->db->select("*");
        $this->db->from($table_name);
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function all_mentors($offset=0)
    {
        $this->db->select("id, mentor_name");
        $this->db->from("mentors");
        $this->db->order_by("id","asc");
        $this->db->limit(per_page,$offset);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function load_all_mentors()
    {
        $this->db->select("id, mentor_name");
        $this->db->from("mentors");
        $this->db->order_by("id","asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function all_courses($offset=0)
    {
        $this->db->select("id, batch_name, course_type, mentor_name");
        $this->db->from("courses");
        $this->db->order_by("id","desc");
        $this->db->limit(per_page,$offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function all_affiliates($offset=0)
    {
        $this->db->select("id, name, email, phone_no");
        $this->db->from("affileate_partners");
        $this->db->order_by("id","desc");
        $this->db->limit(per_page,$offset);
        $query = $this->db->get();
        return $query->result();
    }


    
    public function search_affiliates($value)
    {
        $this->db->select("id, name, email, phone_no");
        $this->db->from("affileate_partners");
        $this->db->like('phone_no',$value);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_affiliate($affiliate_data)
    {
        $this->db->insert('affileate_partners', $affiliate_data);
        return true;
    }

    public function update_affiliate($affiliate_data,$edit_id)
    {
        $this->db->update('affileate_partners', $affiliate_data, array('id' => $edit_id));
        return true;
    }

    public function delete_affiliate($id)
    {
        $this->db->delete('affileate_partners', array('id' => $id));
        $this->db->delete('refered_users', array('affileate_partners_id' => $id));
        return true;
    }

    public function affiliate($id)
    {

        $this->db->select("*");
        $this->db->from("affileate_partners");
        $this->db->where('id',$id);
        $affiliate_data['affiliate'] = $this->db->get()->result();

        $this->db->select("*");
        $this->db->from("refered_users");
        $this->db->where('affileate_partners_id',$id);
        $affiliate_data['affiliate_students'] = $this->db->get()->result();

        return $affiliate_data;
    }

    public function search_all_courses($offset=0,$column_name,$value)
    {
        $this->db->select("id, batch_name, course_type, mentor_name");
        $this->db->from("courses");
        $this->db->where($column_name,$value);
        $this->db->order_by("id","desc");
        $this->db->limit(per_page,$offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function search_count_all_rows($table_name,$column_name,$value)
    {
        $this->db->select("*");
        $this->db->from($table_name);
        $this->db->where("UPPER(".$column_name.")",$value);
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function course($id)
    {
        $this->db->select("*");
        $this->db->from("courses");
        $this->db->order_by("id","desc");
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function mentor($id)
    {
        $this->db->select("*");
        $this->db->from("mentors");
        $this->db->order_by("id","desc");
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function mentors()
    {
        $this->db->select("id, mentor_name");
        $this->db->from("mentors");
        $query = $this->db->get();
        return $query->result();

    }


    public function insert_mentor($mentor_data)
    {
        $this->db->insert('mentors', $mentor_data);

        return true;
    }

    public function insert_course($course_data)
    {
        $this->db->insert('courses', $course_data);

        return true;
    }

    public function update_course($courseData,$studentData,$edit_id,$batch_id)
    {
        $this->db->update('courses', $courseData, array('id' => $edit_id));
        $this->db->update('students', $studentData, array('batch_name' => $batch_id));
        return true;
    }

    public function delete_course($id)
    {
        $this->db->delete('courses', array('id' => $id));
        return true;
    }

    public function total_earn_amount($referral_id)
    {
        $this->db->select('SUM(comission_amount) as total_earning');
        $this->db->from('refered_users');
        $this->db->where('affileate_partners_id',$referral_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function total_withdrawal_amount($referral_id)
    {
        $this->db->select('SUM(payment_amount) as total_payment');
        $this->db->from('transaction');
        $this->db->where('affiliate_id',$referral_id);
        $query = $this->db->get();
        return $query->result();
    }

}