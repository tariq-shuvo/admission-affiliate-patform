<?php

/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 5/2/2018
 * Time: 2:18 PM
 */
class AffilateModel extends CI_Model
{

    public function count_all_rows($table_name,$referral_id)
    {
        $this->db->select("*");
        $this->db->from($table_name);
        $this->db->where('affileate_partners_id',$referral_id);
        $query = $this->db->get();

        return $query->num_rows();
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

    public function checkValidation($table_name,$column_name,$value)
    {
        $this->db->select("*");
        $this->db->from($table_name);
        $this->db->where($column_name,$value);
        $query = $this->db->get();

        return $query->num_rows();
    }


    public function all_transaction($id)
    {

        $this->db->select("*");
        $this->db->from("transaction");
        $this->db->where('affiliate_id',$id);
        $this->db->order_by("id","desc");
        $transactions_data['all_transactions'] = $this->db->get()->result();

        return $transactions_data['all_transactions'];
    }

    public function affiliate_students($id,$offset=0)
    {

        $this->db->select("*");
        $this->db->from("refered_users");
        $this->db->where('affileate_partners_id',$id);
        $this->db->order_by("id","desc");
        $this->db->limit(per_page,$offset);
        $affiliate_data['affiliate_students'] = $this->db->get()->result();

        return $affiliate_data['affiliate_students'];
    }

    public function get_affiliate_id($id)
    {

        $this->db->select("id,affileate_partners_id,comission_amount");
        $this->db->from("refered_users");
        $this->db->where('student_id_fk',$id);

        return $this->db->get()->result();
    }

    public function print_affiliate_data($id)
    {

        $this->db->select("name,phone_no");
        $this->db->from("affileate_partners");
        $this->db->where('id',$id);

        return $this->db->get()->result();
    }

    public function insert_affiliate($affiliate_data)
    {
        $this->db->insert('affileate_partners', $affiliate_data);
        return true;
    }

    public function insert_referral_data($referral_data)
    {
        $this->db->insert('refered_users', $referral_data);
        return true;
    }

    public function update_affiliate($affiliate_data,$edit_id)
    {
        $this->db->update('affileate_partners', $affiliate_data, array('id' => $edit_id));
        return true;
    }


    public function checkAdmin($username, $password, $keep)
    {
        $this->db->select("id, name, email, phone_no, profile_picture");
        $this->db->from("affileate_partners");
        $this->db->where("(affileate_partners.email = '$username' OR affileate_partners.phone_no = '$username')");
        $this->db->where("password",$password);
        $query = $this->db->get();

        $login_auth=array();

        if($query->num_rows()>0)
        {
            array_push($login_auth, array('affiliate_validation'=>true));
            if($keep==1)
            {
                $this->session->set_userdata('affiliate_data_info', $query->result_array());
                $this->session->set_userdata('affiliate_validation', true);

                $cookie_user_info=array(
                    'name'=>'affiliate_data_info',
                    'value'=>serialize($query->result_array()),
                    'expire'=>60*60*24*7,
                    'path'=>'/'
                );

                $cookie_user_validation=array(
                    'name'=>'affiliate_validation',
                    'value'=>true,
                    'expire'=>60*60*24*7,
                    'path'=>'/'
                );

                set_cookie($cookie_user_info);
                set_cookie($cookie_user_validation);
            }else{
                $this->session->set_userdata('affiliate_data_info', $query->result_array());
                $this->session->set_userdata('affiliate_validation', true);
            }
        }else{
            array_push($login_auth, array('affiliate_validation'=>false));
        }

        return $login_auth[0]['affiliate_validation'];

    }


    function password_reset_mail($key)
    {
        $this->db->where('email',$key);
        $query = $this->db->get('ss_admin');
        if ($query->num_rows() > 0){
            $password_reset_id=md5(uniqid()."HelloSS10043Admin");
            $data = array(
                'password_reset_id' => $password_reset_id
            );
            $this->db->update('ss_admin', $data, array('email' => $key));
            return true;
        }
        else{
            return false;
        }
    }

    public function reset_new_password($reset_id, $new_password)
    {
        $data = array(
            'password' => $new_password,
            'password_reset_id'=>null
        );
        $this->db->update('ss_admin', $data, array('password_reset_id' => $reset_id));
        return true;
    }

    function password_reset_id_validation($reset_id)
    {
        $this->db->where('password_reset_id',$reset_id);
        $query = $this->db->get('ss_admin');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function affiliate_phone()
    {
        $this->db->select("phone_no");
        $this->db->from("affileate_partners");
        $query = $this->db->get();
        return $query->result();

    }

    public function affiliate_id_get($phone_no)
    {
        $this->db->select("id");
        $this->db->from("affileate_partners");
        $this->db->where("phone_no",$phone_no);
        $query = $this->db->get();
        return $query->result();

    }


    public function update_affiliates_payments($affiliate_id,$month,$year)
    {
        $data = array(
            'referral_payment' => true
        );
        $this->db->update('refered_users', $data,
            array(
                'affileate_partners_id' => $affiliate_id,
                'month(create_date)' => $month,
                'year(create_date)' => $year
            )
        );

        $earning = $this->total_earnings_ajax($affiliate_id,$month,$year);
        return $earning;
    }

    public function checkMonthYear($month,$year,$affiliate_id)
    {
        $this->db->select("*");
        $this->db->from('transaction');
        $this->db->where('paid_month',$month);
        $this->db->where('paid_year',$year);
        $this->db->where('affiliate_id',$affiliate_id);
        $query = $this->db->get();

        return $query->num_rows();
    }
    
    public function insert_transaction($transaction_data)
    {
        $this->db->insert('transaction', $transaction_data);
        return true;
    }


    public function total_referrals_ajax($referral_id,$month,$year)
    {
        $this->db->select('COUNT(*) as referral_students');
        $this->db->from('refered_users');
        $this->db->where('affileate_partners_id',$referral_id);
        $this->db->where('month(create_date)', $month);
        $this->db->where('year(create_date)', $year);
        $query = $this->db->get();
        return $query->result();
    }

    public function total_referrals($referral_id)
    {
        $this->db->select('COUNT(*) as referral_students');
        $this->db->from('refered_users');
        $this->db->where('affileate_partners_id',$referral_id);
        $this->db->where('month(create_date)', date('m'));
        $query = $this->db->get();
        return $query->result();
    }

    public function total_rewards($referral_id)
    {
        $this->db->select('COUNT(*) as total_rewards');
        $this->db->from('refered_users');
        $this->db->where('affileate_partners_id',$referral_id);
        $this->db->where('comission_percentage',20);
        $this->db->where('month(create_date)', date('m'));
        $query = $this->db->get();
        return $query->result();
    }

    public function total_rewards_ajax($referral_id,$month,$year)
    {
        $this->db->select('COUNT(*) as total_rewards');
        $this->db->from('refered_users');
        $this->db->where('affileate_partners_id',$referral_id);
        $this->db->where('comission_percentage',20);
        $this->db->where('month(create_date)', $month);
        $this->db->where('year(create_date)', $year);
        $query = $this->db->get();
        return $query->result();
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

    public function total_earnings($referral_id)
    {
        $this->db->select('SUM(comission_amount) as total_earning');
        $this->db->from('refered_users');
        $this->db->where('affileate_partners_id',$referral_id);
        $this->db->where('month(create_date)', date('m'));
        $query = $this->db->get();
        return $query->result();
    }

    public function total_earnings_ajax($referral_id,$month,$year)
    {
        $this->db->select('SUM(comission_amount) as total_earning');
        $this->db->from('refered_users');
        $this->db->where('affileate_partners_id',$referral_id);
        $this->db->where('month(create_date)', $month);
        $this->db->where('year(create_date)', $year);
        $query = $this->db->get();
        return $query->result();
    }

    public function commission_percentage($referral_id)
    {
        $this->db->select('COUNT(*) as total_students, create_date');
        $this->db->from('refered_users');
        $this->db->where('affileate_partners_id',$referral_id);
        $this->db->where('YEAR(create_date) = YEAR(NOW())');
        $this->db->group_by('MONTH(create_date)');
        $query = $this->db->get();
        return $query->result();
    }

}