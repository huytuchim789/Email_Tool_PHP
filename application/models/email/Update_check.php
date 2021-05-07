<?php
class Update_check extends CI_Model 
{
   /*View*/
	function updateCheck($email,$isValid)
	{
    $user = $this->session->userdata('user_id');
    $this->db->set('checked', $isValid, FALSE);
    $this->db->where('emailUsr', $email);

	$query=$this->db->update('emailuser'); 

	}
	
} 