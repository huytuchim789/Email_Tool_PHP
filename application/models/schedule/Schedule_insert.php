<?php

    /******************************************
    *      Codeigniter 3 Simple Login         *
    *   Developer  :  rudiliucs1@gmail.com    *
    *        Copyright © 2017 Rudi Liu        *
    *******************************************/

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Schedule_insert extends CI_Model {
    
        function saverecords($data)
        {       
            
                $this->db->insert('schedule',$data);
            
                if($this->db->insert_id()){
                    return array('status' => 'done', 'message' => '<div class="alert alert-success">
                    <strong>Success!</strong> 
                    </div>');
            
            }else {
                return array('status' => 'exist', 'message' => '<div class="alert alert-danger">
                <strong>Exist!</strong> 
                </div>');
            }
        }
        
        
    
}

/* End of file */
