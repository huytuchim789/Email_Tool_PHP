<?php

   

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Cron_task extends CI_Controller {

   
    public function index(){
        $this->load->model('email/Send');
        $this->load->model('schedule/PassMail_fetch');
        $this->load->model('schedule/Update_Sent');

        $this->load->model('schedule/Schedule_fetch');

        $data = $this->Schedule_fetch->display_records();
        foreach($data as $row){
            $passs = $this->PassMail_fetch->display_records($row->emailSend);
            $pass = $passs[0]->passEMailUsr;
            $this->Send->run($row->emailSend,$pass,$row->content,$row->name,$row->email_To );
            $this->Update_Sent->update($row->email_To);
        }

        
    }
}