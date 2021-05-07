<?php
class Send extends CI_Model 
{
   /*View*/
    function __construct() {
        parent::__construct();
        }
	function run($mail, $password, $content, $name, $mail_to)
	{
        $this->load->library('email');

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '30';
        $config['smtp_user']    = $mail;
        $config['smtp_pass']    = $password;
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      

        $this->email->initialize($config);

            $this->email->from($mail, $name);
            $this->email->to($mail_to); 
        
            $this->email->subject($name);
            $this->email->message($content);  
        
            if($this->email->send()){
                return true;
            }else {
                return array('status' => 'false', 'message' => '<div class="alert alert-danger">
                <strong>INCORRECT PASSWORD or You didnot enable "LESS SECURE APP" on <a href="https://myaccount.google.com/lesssecureapps"> Less secure app access</a> !</strong> 
                </div>');
            }	
                
            


        
	}
	
} 