<?php
class Get_emailcheck extends CI_Model 
{
   /*View*/
	function getPass($email)
	{
    $user = $this->session->userdata('user_id');
	$query=$this->db->query("select passEmailUsr from emailuser where who = $user and emailUsr = '$email'");
    $results =  $query->result();
    foreach ($results as $row)
    {
        return  $row->passEmailUsr;
    }
	}
	
} 