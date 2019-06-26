<?php

/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 4/26/2018
 * Time: 2:08 PM
 */
class Login extends CI_Model
{
    public function checkAdmin($username, $password, $keep)
    {
        $this->db->select("admin_id,full_name,username,email,gender");
        $this->db->from("ss_admin");
        $this->db->where("(ss_admin.email = '$username' OR ss_admin.username = '$username')");
        $this->db->where("password",$password);
        $query = $this->db->get();

        $login_auth=array();

        if($query->num_rows()>0)
        {
            array_push($login_auth, array('user_validation'=>true));
            if($keep==1)
            {
                $this->session->set_userdata('user_data_info', $query->result_array());
                $this->session->set_userdata('user_validation', true);

                $cookie_user_info=array(
                    'name'=>'user_data_info',
                    'value'=>serialize($query->result_array()),
                    'expire'=>60*60*24*7,
                    'path'=>'/'
                );

                $cookie_user_validation=array(
                    'name'=>'user_validation',
                    'value'=>true,
                    'expire'=>60*60*24*7,
                    'path'=>'/'
                );

                set_cookie($cookie_user_info);
                set_cookie($cookie_user_validation);
            }else{
                $this->session->set_userdata('user_data_info', $query->result_array());
                $this->session->set_userdata('user_validation', true);
            }
        }else{
            array_push($login_auth, array('user_validation'=>false));
        }

        return $login_auth[0]['user_validation'];

    }


    function password_reset_mail($key)
    {
        $this->db->where('email',$key);
        $query = $this->db->get('ss_admin');
        if ($query->num_rows() > 0){
            $password_reset_id=md5(uniqid()."HelloSS10043Admin");
            $this->load->library('email');
            $fromemail="support@shikhbeshobai.com";
            $toemail = $key;
            $subject = "Password Reset Link";
            $data['reset_link']=base_url('admin/reset/').$password_reset_id;

            $mesg = $this->load->view('email_template/password_reset',$data,true);


            $config=array(
                'charset'=>'utf-8',
                'wordwrap'=> TRUE,
                'mailtype' => 'html'
            );

            $this->email->initialize($config);

            $this->email->to($toemail);
            $this->email->from($fromemail, "Shikhbeshobai Support");
            $this->email->subject($subject);
            $this->email->message($mesg);
            $this->email->send();

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


    function password_reset_mail_affiliate($key)
    {
        $this->db->where('email',$key);
        $query = $this->db->get('affileate_partners');
        if ($query->num_rows() > 0){
            $password_reset_id=md5(uniqid()."HelloSS10043Admin");
            $this->load->library('email');
            $fromemail="support@shikhbeshobai.com";
            $toemail = $key;
            $subject = "Password Reset Link";
            $data['reset_link']=base_url('affiliate/reset/').$password_reset_id;

            $mesg = $this->load->view('email_template/password_reset',$data,true);


            $config=array(
                'charset'=>'utf-8',
                'wordwrap'=> TRUE,
                'mailtype' => 'html'
            );

            $this->email->initialize($config);

            $this->email->to($toemail);
            $this->email->from($fromemail, "Shikhbeshobai Support");
            $this->email->subject($subject);
            $this->email->message($mesg);
            $this->email->send();

            $data = array(
                'password_reset_id' => $password_reset_id
            );
            $this->db->update('affileate_partners', $data, array('email' => $key));
            return true;
        }
        else{
            return false;
        }
    }

    public function reset_new_password_affiliate($reset_id, $new_password)
    {
        $data = array(
            'password' => $new_password,
            'password_reset_id'=>null
        );
        $this->db->update('affileate_partners', $data, array('password_reset_id' => $reset_id));
        return true;
    }

    function password_reset_id_validation($reset_id)
    {
        $this->db->where('password_reset_id',$reset_id);
        $query = $this->db->get('affileate_partners');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}