<?php
class Schedule_fetch extends CI_Model 
{
   /*View*/
	function display_records()
	{
    $time = time();
    // $query=$this->db->query("SELECT MAX(cron) AS cron FROM schedule  ");
    
    // $cron = $query->result();
    // $cron_time = 
	$query2 =$this->db->query("select * from schedule WHERE time < '$time' and cron = '' LIMIT 1  ");
	return $query2->result();
    }
    function display_tag(){
        $user = $this->session->userdata('user_id');

        $query =$this->db->query("SELECT DISTINCT tag FROM schedule WHERE who = '$user' ");
	    return $query->result();
    }
    function display_schedule($tag){
        $query =$this->db->query("SELECT * FROM schedule WHERE tag = '$tag' ");
	    return $query->result();

    }
    
    function count($param, $value,$param2, $value2){
        if($param2 != null){
        $query =$this->db->query("SELECT COUNT(*) FROM schedule WHERE $param = '$value' and $param2 = '$value2'  ");
        }else {
        $query =$this->db->query("SELECT COUNT(*) FROM schedule WHERE $param = '$value' ");

        }
        return $query->row_array();
    }
    function count_diff($param, $value,$param2, $value2){
        $query =$this->db->query("SELECT COUNT(*) FROM schedule WHERE $param != '$value' and $param2 = '$value2' ");

        return $query->row_array();
    }
    
	
} 