<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    function Parentstatus($parent_id)
    {
        $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('*');
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

    function category($cat_id)
    {
        $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('title');
        $CI->db->where('cat_id',$cat_id);
        $res = $CI->db->get('category');
        return $return = $res->row_array();
    }

    function Fnstateinfo($state_id)
    {
       $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('name');
        $CI->db->where('id',$state_id);
        $res = $CI->db->get('states');
        return $return = $res->row_array();
    }
    
    function Fncityinfo($city_id)
    {
       $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('name');
        $CI->db->where('id',$city_id);
        $res = $CI->db->get('cities');
        return $return = $res->row_array();
    }
   
function fetchCategoryTreeList($parent = 0, $user_tree_array = '') {
 $CI=& get_instance();
        $CI->load->database(); 
    if (!is_array($user_tree_array))
    $user_tree_array = array();

        $CI->db->select('*');
        $CI->db->where('parent_id',$parent);
        $res = $CI->db->get('users');
        $info=$res->result_array();
  
  if ($res->num_rows() > 0) {
     $user_tree_array[] = "<ul  class='par_".$parent." new_display2' id='list'>";
    if ($res->result_array()) {
        foreach($info as $ins)
        {
            $child=children_info($ins['uid']);
             if(!empty($child))
         {
      $user_tree_array[] = "<li style='list-style:none;'><a data-id='".$ins['uid']."' href='javascript:void(0);' class='param_".$ins['uid']."' > + </a><a class='fancybox' href='#chkline' title='Referal Code: ".$ins['refferalcode']."' onclick='description(".$ins['uid'].")'>". $ins['fname'].' '.$ins['lname']."</a></li>";
        }
        else
        {
         $user_tree_array[] = "<li style='list-style:none;'><a data-id='".$ins['uid']."' href='javascript:void(0);'></a><a class='fancybox' href='#chkline' title='Referal Code: ".$ins['refferalcode']."' onclick='description(".$ins['uid'].")'>". $ins['fname'].' '.$ins['lname']."</a></li>";   
        }
      $user_tree_array = fetchCategoryTreeList($ins['uid'], $user_tree_array);
        }
    }
    $user_tree_array[] = "</ul>";
  }
  return $user_tree_array;
}


function fetchCategoryTreeList1($parent = 0, $user_tree_array = '') {
 $CI=& get_instance();
        $CI->load->database(); 
    if (!is_array($user_tree_array))
    $user_tree_array = array();

        $CI->db->select('*');
        $CI->db->where('parent_id',$parent);
        $res = $CI->db->get('users');
        $info=$res->result_array();
  
  if ($res->num_rows() > 0) {
     $user_tree_array[] = "<ul id='list'>";
    if ($res->result_array()) {
        foreach($info as $ins)
        {
         $child=children_info($ins['uid']);
         if(!empty($child))
         {
      $user_tree_array[] = "<li style='list-style:none;'><a data-id='".$ins['uid']."' href='javascript:void(0);' class='param_".$ins['uid']."'> + </a><a class='fancybox' href='#inline1_".$ins['uid']."' title='Referal Code: ".$ins['refferalcode']."'>". $ins['fname'].' '.$ins['lname']."</a></li>";
        }
        else
        {
            $user_tree_array[] = "<li style='list-style:none;'><a data-id='".$ins['uid']."' href='javascript:void(0);'></a><a class='fancybox' href='#inline1_".$ins['uid']."' title='Referal Code: ".$ins['refferalcode']."'>". $ins['fname'].' '.$ins['lname']."</a></li>";
        }
      $user_tree_array = fetchCategoryTreeList($ins['uid'], $user_tree_array);
        }
    }
    $user_tree_array[] = "</ul>";
  }
  return $user_tree_array;
}


?>