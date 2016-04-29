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


    function Fnchkquizundercourse($co_id)
    {
       $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('*');
        $CI->db->where('course_id',$co_id);
        $res = $CI->db->get('quize_ques');
        return $return = $res->num_rows();     
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
        $CI->db->limit(1);
        $res = $CI->db->get('class');
       // echo $CI->db->last_query();
        return $return = $res->row_array();
}


function Fngetvideo($cl_id)
{
   $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('*');
        $CI->db->where('class_id',$cl_id);
        
        $CI->db->where('type',2);
        $CI->db->where('status',0);
        $CI->db->order_by('tr_id','asc');
       
        $res = $CI->db->get('training_material');
       // echo $CI->db->last_query();
        return $return = $res->result_array();
}


function Fnchktrainingstatus($cl_id,$co_id,$u_id)
  {
    $CI=& get_instance();
    $CI->load->database(); 

    
    $val=0;
   

      $con=array('class_id'=>$cl_id,'type'=>2,'status'=>0);
      $get_count=$CI->Common_model->fetchinfo('training_material',$con,'count');
      $con1=array('co_id'=>$co_id,'cl_id'=>$cl_id,'u_id'=>$u_id,'status'=>1);
      $new_count=$CI->Common_model->fetchinfo('training_details',$con1,'count');
      if($get_count==$new_count)
      {
        $val=0;
      }
      else
      {
        $val=1;
      }
        return $val;
  }

  function fetchcourseinfo($user_id,$course_id)
  {
      $count=""; 
      $CI=& get_instance();
      $CI->load->database(); 
      $con=array('u_id'=>$user_id,'co_id'=>$course_id);
      //
      $completion_status=$CI->Common_model->fetchinfo('training_details',$con,'result');
            $con1=array('course_id'=>$course_id);
      //how many classes under a course
      $class_under_course=$CI->Common_model->fetchinfo('class',$con1,'count');
      $quize=$CI->Common_model->fetchinfo('quiz_test_result',$con,'row');
      if($quize)
      {
        $passmarks=$quize['tot_ques']-$quize['curr_ans'];
        if($passmarks>0)
        {
                 $marks=($quize['curr_ans']/$quize['tot_ques'])*100;
                 if($marks>70)
                 {
                    $count=20;
                 }
                 else
                 {
                   $count=0;
                 }
        }
        else
        {
          $count=20;
        }
      }
      else
      {
        $count=0;
      }
      $per_class=80/$class_under_course;
      
      $class_under_course=$CI->Common_model->fetchinfo('class',$con1,'result');
      foreach ($class_under_course as $value) 
      {
        
        $con2=array('class_id'=>$value['cl_id']);
        $total_training_material=$CI->Common_model->fetchinfo('training_material',$con2,'count');
        
        $con3=array('u_id'=>$user_id,'cl_id'=>$value['cl_id']);
        $training_completed_user=$CI->Common_model->fetchinfo('training_details',$con3,'count');
      
        
        $left_course=($total_training_material-$training_completed_user);
        if($left_course>0)
        {

                   $x=(($training_completed_user/$total_training_material)*$per_class);
                   $count=$count+$x;

        }
        else
        {
                   
          $count=$count+$per_class;
        }
          

      }
      
             //echo round($count);
            $count=round($count);
            if($count>0)
            {
               echo $count."% Completed";
            }
            else
            {
                echo "Need To Start The Training";
            }
    
  }


  function fetchcoursestatus($user_id,$course_id)
  {
      $count=""; 
      $CI=& get_instance();
      $CI->load->database(); 
      $con=array('u_id'=>$user_id,'co_id'=>$course_id);
      //
      $completion_status=$CI->Common_model->fetchinfo('training_details',$con,'result');
            $con1=array('course_id'=>$course_id);
      //how many classes under a course
      $class_under_course=$CI->Common_model->fetchinfo('class',$con1,'count');
      $quize=$CI->Common_model->fetchinfo('quiz_test_result',$con,'row');
      if($quize)
      {
        $passmarks=$quize['tot_ques']-$quize['curr_ans'];
        if($passmarks>0)
        {
                 $marks=($quize['curr_ans']/$quize['tot_ques'])*100;
                 if($marks>70)
                 {
                    $count=20;
                 }
                 else
                 {
                   $count=0;
                 }
        }
        else
        {
          $count=20;
        }
      }
      else
      {
        $count=0;
      }
      $per_class=80/$class_under_course;
      
      $class_under_course=$CI->Common_model->fetchinfo('class',$con1,'result');
      foreach ($class_under_course as $value) 
      {
        
        $con2=array('class_id'=>$value['cl_id']);
        $total_training_material=$CI->Common_model->fetchinfo('training_material',$con2,'count');
        
        $con3=array('u_id'=>$user_id,'cl_id'=>$value['cl_id']);
        $training_completed_user=$CI->Common_model->fetchinfo('training_details',$con3,'count');
      
        
        $left_course=($total_training_material-$training_completed_user);
        if($left_course>0)
        {

                   $x=(($training_completed_user/$total_training_material)*$per_class);
                   $count=$count+$x;

        }
        else
        {
                   
          $count=$count+$per_class;
        }
          

      }
      
             //echo round($count);
            $count=round($count);
            return $count;
    
  }



?>