<?php
class Update_Sent extends CI_Model 
{
   /*View*/
	function update($email)
	{
        $time = time();
	$query=$this->db->query("update schedule set cron = '$time' WHERE email_to = '$email' ");
	}
	
} 