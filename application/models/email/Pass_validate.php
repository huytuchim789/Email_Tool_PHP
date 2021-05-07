<?php
class Pass_validate extends CI_Model 
{
   /*View*/
	function validate($mail, $password)
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

            $this->email->from($mail, 'Send email automactly system V1.0');
            $this->email->to($mail); 
        
            $this->email->subject('Hello');
            $this->email->message('test');  
        
            if($this->email->send()){
                return true;
            }else {
                return array('status' => 'false', 'message' => '<div class="alert alert-danger">
                <strong>INCORRECT PASSWORD or You didnot enable "LESS SECURE APP" on <a href="https://myaccount.google.com/lesssecureapps"> Less secure app access</a> !</strong> 
                </div>');
            }	
                
                
                
        
	}
	
} 