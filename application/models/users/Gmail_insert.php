<?php

    /******************************************
    *      Codeigniter 3 Simple Login         *
    *   Developer  :  rudiliucs1@gmail.com    *
    *        Copyright © 2017 Rudi Liu        *
    *******************************************/

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Gmail_insert extends CI_Model {
    
        function saverecords($data)
        {   
            $validate = $this->validate_email($data['emailUsr']);
            if($validate){
                $this->db->insert('emailuser',$data);
                if($this->db->insert_id()){
                    return array('status' => 'done', 'message' => '<div class="alert alert-success">
                    <strong>Success!</strong> 
                    </div>');
                }
            }else {
                return array('status' => 'exist', 'message' => '<div class="alert alert-danger">
                <strong>Exist!</strong> 
                </div>');
            }
        }
        function validate_email($data)
        {
            $this->db->where('emailUsr', $data);
            $this->db->from('emailuser');
            $query=$this->db->get();
    
            if ($query->num_rows() == 0)
                return true;
            else
                return false;
            
        }
        
    
}

/* End of file */
