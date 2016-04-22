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

        $CI->db->select('id,name');
        $CI->db->where('id',$state_id);
        $res = $CI->db->get('states');
        return $return = $res->row_array();
    }
    
    function Fncityinfo($city_id)
    {
       $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('id,name');
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

function fetchCategoryTreeList2($parent = 0, $user_tree_array = '') {
 $CI=& get_instance();
        $CI->load->database(); 
    if (!is_array($user_tree_array))
    $user_tree_array = array();

        $CI->db->select('*');
        $CI->db->where('uid',$parent);
        $res1 = $CI->db->get('users');
        $info1=$res1->row_array();

        $CI->db->select('*');
        $CI->db->where('parent_id',$parent);
        $CI->db->where('status',1);
        $res = $CI->db->get('users');
        $info=$res->result_array();
  
  if ($res->num_rows() > 0) {
     $user_tree_array[] = "<div class='col-md-12 parent'>
          <a class='btn btn-primary'>
            ".$info1['fname']."
          </a>
        </div> <div class='col-md-12 parent' id='list1'>";
    if ($res->result_array()) {
        foreach($info as $ins)
        {
         //$child=children_info($ins['uid']);
      $user_tree_array[] = '<a class="btn btn-primary param_'.$ins['uid'].'" href="javascript:void(0)" aria-expanded="false" aria-controls="collapseExample" data-target="#demo'.$ins['uid'].'" data-id="'.$ins['uid'].'"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><span class="fancybox fancy-class" href="#inline1_'.$ins['uid'].'" title="Referal Code: '.$ins['refferalcode'].'">'.$ins['fname'].'</span>';
        
     // $user_tree_array = fetchCategoryTreeList3($ins['uid'], $user_tree_array);
        }
    }
    $user_tree_array[] = "</div>";
  }
  return $user_tree_array;
}


/* new child tree */


function fetchCategoryTreeList4($parent = 0, $user_tree_array = '') {
 $CI=& get_instance();
        $CI->load->database(); 
    if (!is_array($user_tree_array))
    $user_tree_array = array();

        $CI->db->select('*');
        $CI->db->where('parent_id',$parent);
        $res = $CI->db->get('users');
        $info=$res->result_array();
  
  if ($res->num_rows() > 0) {
     $user_tree_array[] = "<ul style='display:none;'>";
    if ($res->result_array()) {
        foreach($info as $ins)
        {
         $child=children_info($ins['uid']);
         if(!empty($child))
         {
      $user_tree_array[] = "<li><a title='Referal Code: ".$ins['refferalcode']."' onclick='description(".$ins['uid'].")' style='cursor:pointer;color:#fff;'>". $ins['fname'].' '.$ins['lname'].'</a>';
      $user_tree_array = fetchCategoryTreeList4($ins['uid'], $user_tree_array);
      $user_tree_array[]="</li>";
        }
        else
        {
            $user_tree_array[] = "<li><a title='Referal Code: ".$ins['refferalcode']."' onclick='description(".$ins['uid'].")' style='cursor:pointer;color:#fff;'>". $ins['fname'].' '.$ins['lname']."</a></li>";
        }
      
        }
    }
    $user_tree_array[] = "</ul>";
  }
  return $user_tree_array;
}


function fetchCategoryTreeList5($parent = 0, $user_tree_array = '') {
 $CI=& get_instance();
        $CI->load->database(); 
    if (!is_array($user_tree_array))
    $user_tree_array = array();

        $CI->db->select('*');
        $CI->db->where('parent_id',$parent);
        $res = $CI->db->get('users');
        $info=$res->result_array();
  
  if ($res->num_rows() > 0) {
     $user_tree_array[] = "<ul>";
    if ($res->result_array()) {
        foreach($info as $ins)
        {
         $child=children_info($ins['uid']);
         if(!empty($child))
         {
      $user_tree_array[] = "<li><a style='cursor:pointer; color:#fff;' title='Referal Code: ".$ins['refferalcode']."' onclick='description(".$ins['uid'].")'>". $ins['fname'].' '.$ins['lname'].'</a>';
      $user_tree_array = fetchCategoryTreeList4($ins['uid'], $user_tree_array);
      $user_tree_array[]="</li>";
        }
        else
        {
            $user_tree_array[] = "<li><a style='cursor:pointer;color:#fff;' title='Referal Code: ".$ins['refferalcode']."' onclick='description(".$ins['uid'].")'>". $ins['fname'].' '.$ins['lname']."</a></li>";
        }
      
        }
    }
    $user_tree_array[] = "</ul>";
  }
  return $user_tree_array;
}
/* new child tree */



function FngetvideoFirstclass($co_id)
{
        $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('*');
        $CI->db->where('course_id',$co_id);
        $CI->db->join('training_material','training_material.class_id=class.cl_id');
        $CI->db->where('training_material.type',2);
        $CI->db->where('training_material.status',0);
        $CI->db->order_by('class.cl_id','asc');
        $res = $CI->db->get('class');
        return $return = $res->row_array();
}


?>