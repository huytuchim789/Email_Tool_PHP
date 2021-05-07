<?php

   

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        

    }
    public function loadHead($title) {
        $data['title'] = $title;
        $this->load->view('frame/header_view', $data);
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('frame/footer_view'); //load 3 base view
    }

    public function index() {
        // $this->loadHead('Dashboard');
        // $this->load->view('dashboard');
        redirect('http://localhost/show_schedule');
    }
    public function Schedule() {
        $this->load->model('users/Gmail_fetch');//load module nha
        $result['data']=$this->Gmail_fetch->display_records();
        
        $this->loadHead('Schedule');
        $this->load->view('users/schedule',$result);
    } //load page Schedule
    public function insert() {
        $this->load->model('users/Gmail_fetch');//load module nha

        $this->loadHead('Insert');
        $result['data']=$this->Gmail_fetch->display_records();

        $this->load->view('users/insert' ,$result);
    }//load page Insert

//process
    public function insert_db_gmail() {
        $this->load->model('users/Gmail_insert');//load module nha
        $this->load->model('email/Pass_validate');
        if($this->input->post('emailUsr') && $this->input->post('passEmailUsr')){
            $email = $this->input->post('emailUsr').'@gmail.com';
            $pass = $this->input->post('passEmailUsr') ;
            $Pass_validate = $this->Pass_validate->validate($email,$pass);
            if($Pass_validate == 1){
                $data['emailUsr']= $this->input->post('emailUsr').'@gmail.com';
                $data['passEmailUsr']= $this->input->post('passEmailUsr') ;
                $data['who']= $this->session->userdata('user_id');
                $data['checked']= 1;
                $data['time']= time();


                $insert = $this->Gmail_insert->saverecords($data);
                if($insert['status'] == 'success'){
                    $this->session->set_flashdata('mess', $insert['message'] );
                }else {
                    $this->session->set_flashdata('mess', $insert['message'] );

                }
            }else { // sai pass
                $this->session->set_flashdata('mess', $Pass_validate['message'] );
            }
        }else {
            echo "Chỉ hỗ trợ phương thức POST";
        }
            
    } // end controller insert gmail 
    public function check_gmail() {
        $this->load->model('email/Pass_validate');
        $this->load->model('email/Update_check');
        $this->load->model('email/Get_emailcheck');

        if($this->input->post('emailUsr')){
            $email = $this->input->post('emailUsr');
            $pass = $this->Get_emailcheck->getPass($email);
            $Pass_validate = $this->Pass_validate->validate($email,$pass);

            if($Pass_validate == 1){
                $this->Update_check->updateCheck($email, 1);

            }else { // sai pass
                $this->Update_check->updateCheck($email, 0);

            }
        }else {
            echo "Chỉ hỗ trợ phương thức POST";
        }
            
    }// end controller check gmail 
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }// random tag 
    public function insert_schedule() {
        $this->load->model('schedule/Schedule_insert');
        if($this->input->post() ){
            $data['name'] = $this->input->post('usr');
            $data['emailSend'] = $this->input->post('emailSend');
            $data['content'] = $this->input->post('content');
            $data['nameSend'] = $this->input->post('sche_usr');

            $day = $this->input->post('datepicker');
            $hour = $this->input->post('hourpicker');

            $data['time'] = strtotime($day.'-'.$hour);
            $data['tag'] = $this->generateRandomString();
            $data['who']= $this->session->userdata('user_id');




            $emails = $this->input->post('emails');
            $explode_email = explode("\n",$emails);
            for($x = 0; $x < count($explode_email);$x ++ ){
                $data['email_To'] = $explode_email[$x];
                $this->Schedule_insert->saverecords($data);
            }
            redirect(base_url().'dashboard/schedule')   ;
        }else {
            echo 'chỉ hỗ trợ POST';
        }
            
    }
    
}

/* End of file */
