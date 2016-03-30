<?php 
   Class AdminModel extends CI_Model 
   { 
	
      Public function __construct() 
      { 
         parent::__construct(); 
         //$this->load->database();
      } 

     
           public function fetchAffiliate()
           {
            //$sql="SELECT * FROM `users` WHERE `refferalcode` is not null or uid IN (SELECT distinct parent_id from users where parent_id != 0)";
            $this->db->select('*');
           
            $this->db->where('status',1);
            $res=$this->db->get('users');
            return $res->result_array();
           }
   } 
?> 