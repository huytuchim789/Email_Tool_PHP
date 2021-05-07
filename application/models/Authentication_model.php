<?php

    /******************************************
    *      Codeigniter 3 Simple Login         *
    *   Developer  :  rudiliucs1@gmail.com    *
    *        Copyright © 2017 Rudi Liu        *
    *******************************************/
error_reporting (0);

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Authentication_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function validate_login($postData){
        $this->db->select('*');
        $this->db->where('email', $postData['email']);
        $this->db->where('password', md5($postData['password']));
        $this->db->where('status', 1);
        $this->db->from('user');
        $query=$this->db->get();
        if ($query->num_rows() == 0)
            return false;
        else
            return $query->result();
    }
    function validate_email($postData){
        $this->db->where('email', $postData['email']);
        $this->db->where('status', 1);
        $this->db->from('user');
        $query=$this->db->get();

        if ($query->num_rows() == 0)
            return true;
        else
            return false;
    }

    function validate_reg($postData){
        $validate = $this->validate_email($postData);

        if($validate){
            $data = array(
                'email' => $postData['email'],
                'name' => $postData['name'],
                'role' => 'User One',
                'password' => md5($postData['password']),
                'created_at' => date('Y\-m\-d\ H:i:s A'),
            );
            $this->db->insert('user', $data);

            $message = "Here is your account details:<br><br>Email: ".$postData['email']."<br>Tempolary password: ".$password."<br>Please change your password after login.<br><br> you can login at ".base_url().".";
            $subject = "New Account Creation";

            $module = "User Management";
            $activity = "add new user ".$postData['email'];
            return array('status' => 'success', 'message' => $message);

        }else{
            return array('status' => 'exist', 'message' => $message);
        }
    }

    function change_password($postData){
        $this->load->model('admin_model');
        $validate = false;

        $oldData = $this->admin_model->get_user_by_id($this->session->userdata('user_id'));

        if($oldData[0]['password'] == md5($postData['currentPassword']))
            $validate = true;

        if($validate){
            $data = array(
                'password' => md5($postData['newPassword']),
            );
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->update('user', $data);

            $module = "Change Password";
            $activity = "change its own password";
            $this->admin_model->insert_log($activity, $module);
            return array('status' => 'success', 'message' => '');
        }else{
            return array('status' => 'invalid', 'message' => '');
        }

    }
}

/* End of file  */
