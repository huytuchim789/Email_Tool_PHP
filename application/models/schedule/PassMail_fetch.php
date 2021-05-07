<?php
class PassMail_fetch extends CI_Model 
{
   /*View*/
	function display_records($email)
	{
	$query=$this->db->query("select passEMailUsr from emailuser where emailUsr = '$email'");
	return $query->result();
	}
	
} 