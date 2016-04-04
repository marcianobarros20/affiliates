<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    function Parentstatus($parent_id)
    {
        $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('status,fname,lname');
        $CI->db->where('uid',$parent_id);
        $res = $CI->db->get('users');
        return $return = $res->row_array();     
    }

    function children_info($uid)
    {
		$CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('uid,fname,lname,refferalcode,username,email,date_register,profile_image');
        $CI->db->where('parent_id',$uid);
        $res = $CI->db->get('users');
        return $return = $res->result_array();

    }
   

?>