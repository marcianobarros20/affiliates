<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function Parentstatus($parent_id){
        $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('status');
        $CI->db->where('uid',$parent_id);
        $res = $CI->db->get('users');
        return $return = $res->row_array();

        
   }

?>