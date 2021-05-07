<?php

    
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Show_Schedule extends CI_Controller {

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
    public function index(){
        $this->load->model('schedule/Schedule_fetch');
        $tag['data'] = $this->Schedule_fetch->display_tag();
        //$sched['data'] = $this->Schedule_fetch->display_schedule($tag[0]->tag);
        for($x = 0; $x < count($tag['data']); $x++){
        $tag['count_email'.$tag['data'][$x]->tag] =  $this->Schedule_fetch->count('tag', $tag['data'][$x]->tag,'','')['COUNT(*)'];
        $tag['count_fail'.$tag['data'][$x]->tag] =  $this->Schedule_fetch->count('cron', '', 'tag', $tag['data'][$x]->tag)['COUNT(*)'];
        $tag['count_done'.$tag['data'][$x]->tag] =  $this->Schedule_fetch->count_diff('cron', '', 'tag', $tag['data'][$x]->tag)['COUNT(*)'];
        $tag['name'.$tag['data'][$x]->tag] = $this->Schedule_fetch->display_schedule($tag['data'][$x]->tag)[0]->name;
        $tag['content'.$tag['data'][$x]->tag] = $this->Schedule_fetch->display_schedule($tag['data'][$x]->tag)[0]->content;
        $tag['time'.$tag['data'][$x]->tag] = $this->Schedule_fetch->display_schedule($tag['data'][$x]->tag)[0]->time;
        $tag['emailSend'.$tag['data'][$x]->tag] = $this->Schedule_fetch->display_schedule($tag['data'][$x]->tag)[0]->emailSend;


        }

        $this->loadHead('Show-Schedule');
        $this->load->view('users/show_schedule',  $tag);
    }    

    }



?>