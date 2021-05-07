<?php
class Gmail_fetch extends CI_Model 
{
   /*View*/
	function display_records()
	{
    $user = $this->session->userdata('user_id');
	$query=$this->db->query("select * from emailuser where who = $user");
	return $query->result();
	}
	
} 