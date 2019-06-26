<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 4/29/2018
 * Time: 3:59 PM
 */
class Admission extends CI_Model{

    public function all_batches()
    {
        $this->db->select("id, batch_name");
        $this->db->from("courses");
        $query = $this->db->get();
        return $query->result();

    }

    public function batch_info($course_id)
    {
        $this->db->select("course_type, duration, mentor_name, batch_title");
        $this->db->from("courses");
        $this->db->where('id',$course_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function register($student_data,$social_media,$marketplace_data)
    {
        $this->db->insert('students', $student_data);
        $this->db->insert_batch('social_media_link', $social_media);
        $this->db->insert_batch('market_place_link', $marketplace_data);

        return true;
    }

    public function update($student_data,$social_media,$marketplace_data,$student_id)
    {
        $this->db->update('students', $student_data, array('id' => $student_id));

        $this->update_array_social($social_media, $student_id);
        $this->update_array_marketplaces($marketplace_data, $student_id);
        return true;
    }

    public function update_array_social($arrayData, $student_id)
    {
        for($i=0;$i<count($arrayData);$i++){
            $this->db->where('student_id',$student_id);
            $this->db->where('social_media_name',$arrayData[$i]['social_media_name']);
            $this->db->update('social_media_link', $arrayData[$i]);
        }
    }

    public function update_array_marketplaces($arrayData, $student_id)
    {
        for($i=0;$i<count($arrayData);$i++){
            $this->db->where('student_id',$student_id);
            $this->db->where('markeplace_name',$arrayData[$i]['markeplace_name']);
            $this->db->update('market_place_link', $arrayData[$i]);
        }
    }

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

    public function count_all_rows($table_name)
    {
        $this->db->select("*");
        $this->db->from($table_name);
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function all_student($offset=0)
    {
        $this->db->select("id, name");
        $this->db->from("students");
        $this->db->order_by("createDate","desc");
        $this->db->limit(per_page,$offset);
        $query = $this->db->get();
        return $query->result();
    }


    public function search_student($offset=0,$column_name,$value)
    {
        $this->db->select("id, name");
        $this->db->from("students");
        $this->db->where($column_name,$value);
        $this->db->order_by("createDate","desc");
        $this->db->limit(per_page,$offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function search_all_rows($table_name,$column_name,$value)
    {
        $this->db->select("*");
        $this->db->from($table_name);
        $this->db->where($column_name,$value);
        $query = $this->db->get();

        return $query->num_rows();
    }




    public function student($student_id)
    {

        $this->db->select("*");
        $this->db->from("students");
        $this->db->where('id',$student_id);
        $student_data['student_info'] = $this->db->get()->result();

        $this->db->select("id,social_media_name,profile_link");
        $this->db->from("social_media_link");
        $this->db->where('student_id',$student_id);
        $student_data['social_media'] = $this->db->get()->result();

        $this->db->select("id,markeplace_name,profile_link,earn_amount");
        $this->db->from("market_place_link");
        $this->db->where('student_id',$student_id);
        $student_data['marketplaces'] = $this->db->get()->result();
        return $student_data;
    }

    public function print_invoice($student_id)
    {

        $this->db->select("*");
        $this->db->from("students");
        $this->db->where('id',$student_id);
        $student_data['print_info'] = $this->db->get()->result();

        return $student_data;
    }

    public function delete_student($id)
    {
        $this->db->delete('market_place_link', array('student_id' => $id));
        $this->db->delete('social_media_link', array('student_id' => $id));
        $this->db->delete('students', array('id' => $id));
        return true;
    }

    public function id_auto_complete()
    {
        $this->db->distinct();
        $this->db->select('id');
        $this->db->from("students");
        $query = $this->db->get();
        return $query->result();

    }

    public function batch_auto_complete()
    {
        $this->db->distinct();
        $this->db->select("batch_name");
        $this->db->from("students");
        $query = $this->db->get();
        return $query->result();

    }

    public function phone_auto_complete()
    {
        $this->db->distinct();
        $this->db->select("phone_no");
        $this->db->from("students");
        $query = $this->db->get();
        return $query->result();

    }

    public function course_auto_complete()
    {
        $this->db->distinct();
        $this->db->select("batch_name");
        $this->db->from("courses");
        $query = $this->db->get();
        return $query->result();

    }

    public function mentor_auto_complete()
    {
        $this->db->distinct();
        $this->db->select("mentor_name");
        $this->db->from("courses");
        $query = $this->db->get();
        return $query->result();

    }
}