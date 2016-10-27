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
        $CI->db->where('status',1);
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
        $CI->db->where('status',1);
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
               return $count."% Completed";
            }
            else
            {
                return "Not Yet Strated Training";
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


   function FngetOptions($q_id)
  {

        $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('*');
        $CI->db->where('question_id',$q_id);
        $res = $CI->db->get('answer_quize');
        return $return = $res->result_array();     
  }

  /*function affiliate_count($uid)
  {
    //return $uid;
      $CI=& get_instance();
      $CI->load->database(); 
      $CI->db->select('*');
      $CI->db->where('parent_id',$uid);
      $CI->db->where('status',1);
      $q = $CI->db->get('users');
      $allchild = $q->result_array();  
      $count=$q->num_rows();
      foreach ($allchild as $child )
      {
        
      }

  }*/


 function affiliate_count($parent = 0)
 {
    $count=0;

    $CI=& get_instance();
    $CI->load->database(); 
    $CI->db->select('*');
    $CI->db->where('parent_id',$parent);
    $CI->db->where('status',1);
    $res = $CI->db->get('users');
    $info=$res->result_array();
  
    if ($res->num_rows() > 0)
    {
      $count=$res->num_rows();
      if ($res->result_array())
      {
        foreach($info as $ins)
        {
          $count_recur=affiliate_count1($ins['uid'],$count);
          $count=$count+$count_recur;
        }
      }
    }
    return $count;
  }

  function affiliate_count1($parent = 0,$count1)
  {
    $CI=& get_instance();
    $CI->load->database(); 
    if ($count1)
    $count=0;
    $CI->db->select('*');
    $CI->db->where('parent_id',$parent);
    $CI->db->where('status',1);
    $res = $CI->db->get('users');
    $info=$res->result_array();
  
    if ($res->num_rows() > 0)
    {
      $count=$res->num_rows();
      if ($res->result_array()) {
      foreach($info as $ins)
      {
          $count_recur=affiliate_count1($ins['uid'],$count);
          $count=$count+$count_recur;
      }
    }
    //$user_tree_array[] = "</ul>";
  }
  return $count;
}



function fetchchildaffiliate($parent = 0, $user_tree_array = '') {
 $CI=& get_instance();
        $CI->load->database(); 
    if (!is_array($user_tree_array))
    $user_tree_array = array();

        $CI->db->select('*');
        $CI->db->where('parent_id',$parent);
        $CI->db->where('status',1);
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

            $user_tree_array[] = "<li> <div class='tree_elem'><div class='container-fluid'><div class='row' >". $ins['fname'].' '.$ins['lname']."<p>". $total_affiliate=affiliate_count($ins['uid'])."</p>
            <a onclick='description(".$ins['uid'].")' class='info' title='View Info'><i class='fa fa-info-circle' aria-hidden='true'></i></a><a href='#' class='downstream bounce' title='View Downstream'><i class='fa fa-level-down' aria-hidden='true'></i></a> 

            </div></div></div>";
            $user_tree_array = fetchchildaffiliate($ins['uid'], $user_tree_array);
            $user_tree_array[]="</li>";
        }
        else
        {

             $user_tree_array[] = "<li> <div class='tree_elem'><div class='container-fluid'><div class='row' >". $ins['fname'].' '.$ins['lname']."<p>". $total_affiliate=affiliate_count($ins['uid'])."</p>
             <a onclick='description(".$ins['uid'].")' class='info' title='View Info'><i class='fa fa-info-circle' aria-hidden='true'></i></a>

             </div></div></div></li>";
        }
      
        }
    }
    $user_tree_array[] = "</ul>";
  }
  return $user_tree_array;
}


function fetchaffiliatestree($parent = 0, $user_tree_array = '') {
 $CI=& get_instance();
        $CI->load->database(); 
    if (!is_array($user_tree_array))
    $user_tree_array = array();

        $CI->db->select('*');
        $CI->db->where('parent_id',$parent);
        $CI->db->where('status',1);
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

      $user_tree_array[] = "<li> <div class='tree_elem'><div class='container-fluid'><div class='row' >". $ins['fname'].' '.$ins['lname']."<p>". $total_affiliate=affiliate_count($ins['uid'])."</p><a onclick='description(".$ins['uid'].")' class='info' title='View Info'><i class='fa fa-info-circle' aria-hidden='true'></i></a><a href='#' class='downstream bounce' title='View Downstream'><i class='fa fa-level-down' aria-hidden='true'></i></a> 


      </div></div></div>";
      $user_tree_array = fetchchildaffiliate($ins['uid'], $user_tree_array);
      $user_tree_array[]="</li>";
        }
        else
        {
            $user_tree_array[] = "<li> <div class='tree_elem'><div class='container-fluid'><div class='row' onclick='description(".$ins['uid'].")'>". $ins['fname'].' '.$ins['lname']."<p>". $total_affiliate=affiliate_count($ins['uid'])."</p>

              <a onclick='description(".$ins['uid'].")' class='info' title='View Info'><i class='fa fa-info-circle' aria-hidden='true'></i></a>

            </div></div></div></li>";
        }
      
        }
    }
    $user_tree_array[] = "</ul>";
  }
  return $user_tree_array;
}
/* new child tree */


function get_downstream($parent = 0, $user_tree_array = '')
{
    $CI=& get_instance();
    $CI->load->database(); 
    if (!is_array($user_tree_array))
    $user_tree_array = array();

    $CI->db->select('*');
    $CI->db->where('parent_id',$parent);
    $CI->db->where('status',1);
    $res = $CI->db->get('users');
    $info=$res->result_array();
  
    if ($res->num_rows() > 0)
    {
     
      if ($res->result_array())
      {
        foreach($info as $ins)
        {
          $child=children_info($ins['uid']);
          if(!empty($child))
          {
            $user_tree_array[] = $ins['uid'];
            $user_tree_array = get_downstreams($ins['uid'], $user_tree_array);
          }
          else
          {
              $user_tree_array[] = $ins['uid'];
          }
        
        }
      }
    
  }
  return $user_tree_array;
}


function get_downstreams($parent = 0, $user_tree_array = '')
{
  $CI=& get_instance();
  $CI->load->database(); 
  if (!is_array($user_tree_array))
  $user_tree_array = array();

  $CI->db->select('*');
  $CI->db->where('parent_id',$parent);

  $CI->db->where('status',1);

  $res = $CI->db->get('users');
  $info=$res->result_array();
  
  if ($res->num_rows() > 0)
  {
    
    if ($res->result_array()) {
        foreach($info as $ins)
        {
         $child=children_info($ins['uid']);
         if(!empty($child))
          {
            $user_tree_array[] = $ins['uid'];
            $user_tree_array = get_downstreams($ins['uid'], $user_tree_array);
          }
          else
          {
              $user_tree_array[] = $ins['uid'];
          }
        
      
        }
    }
    
  }
  return $user_tree_array;
}



   function get_upstream($uid)
   {
        $up_tree= array();
        $CI=& get_instance();
        $CI->load->database(); 
        $CI->db->select('*');
        $CI->db->where('uid',$uid);
        $CI->db->where('status',1);
        $res = $CI->db->get('users');

        $info=$res->row_array();
        if($info['parent_id'])
        { 
           $up_tree[]=$info['parent_id'];
           $up_tree =get_upstreams($info['parent_id'], $up_tree);
        }
        return $up_tree;
        
   }

   function get_upstreams($pid,$up_tree)
   {

        $CI=& get_instance();
        $CI->load->database(); 
        $CI->db->select('*');
        $CI->db->where('uid',$pid);
        $CI->db->where('status',1);
        $res = $CI->db->get('users');
        $info=$res->row_array();
        if($info['parent_id'])
        { 
           $up_tree[]=$info['parent_id'];
           $up_tree =get_upstreams($info['parent_id'], $up_tree);
        }
        return $up_tree;
   }

   function get_upstreams_details($uid)
   {
        $up_tree= array();
        $CI=& get_instance();
        $CI->load->database(); 
        $CI->db->select('*');
        $CI->db->where('uid',$uid);
        $CI->db->where('status',1);
        $res = $CI->db->get('users');

        $info=$res->row_array();
        if($info['parent_id'])
        { 
              $up_tree =get_upstreams_details1($info['parent_id'], $up_tree);

              $up_tree[]='<li class="hasparent">
              <p>'. $info['fname'].' '.$info['lname'].'</p>
              <a  onclick="description('.$info['uid'].')" class="info" title="View Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
              <a  class="upstream" title="View Upstream"><i class="fa fa-level-up" aria-hidden="true"></i></a> 
            </li>';
        }
        else
        {
          $up_tree[]='<li class="hasparent">
              <p>'. $info['fname'].' '.$info['lname'].'</p>
              <a onclick="description('.$info['uid'].')"  class="info" title="View Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
              <a  class="upstream" title="View Upstream"><i class="fa fa-level-up" aria-hidden="true"></i></a> 
            </li>';

        }
        return $up_tree;
   }


   function get_upstreams_details1($pid,$up_tree)
   {

        $CI=& get_instance();
        $CI->load->database(); 
        $CI->db->select('*');
        $CI->db->where('uid',$pid);
        $CI->db->where('status',1);
        $res = $CI->db->get('users');
        $info=$res->row_array();
        if($info['parent_id'])
        { 
           $up_tree =get_upstreams_details1($info['parent_id'], $up_tree);

              $up_tree[]='<li class="hasparent">
              <p>'. $info['fname'].' '.$info['lname'].'</p>
              <a  onclick="description('.$info['uid'].')" class="info" title="View Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
              <a  class="upstream" title="View Upstream"><i class="fa fa-level-up" aria-hidden="true"></i></a> 
            </li>';
        }
        else
        {
          $up_tree[]='<li class="hasparent">
              <p>'. $info['fname'].' '.$info['lname'].'</p>
              <a  onclick="description('.$info['uid'].')" class="info" title="View Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
              <a  class="upstream" title="View Upstream"><i class="fa fa-level-up" aria-hidden="true"></i></a> 
            </li>';

        }
        return $up_tree;
   }

   function previous_ranking_position($last_week_start,$last_week_end,$userid)
   {  

    $days_ago = date('Y-m-d', strtotime('-7 days', strtotime($last_week_start)));
     $date=$days_ago;
    $ts = strtotime($date);
    $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
    $previous_last_week_start = date('Y-m-d', $start);
    $previous_last_week_end = date('Y-m-d', strtotime('next saturday', $start));
  

      /*$previous_last_week = strtotime("-2 week +1 day");
      $start_last_week = strtotime("last sunday midnight",$previous_last_week);
      $end_last_week = strtotime("next saturday",$start_last_week);
      $previous_last_week_start = date("Y-m-d",$start_last_week);
      $previous_last_week_end = date("Y-m-d",$end_last_week);*/

      //$previous_week_rank=$
      //$this_week_rank=$
        $CI=& get_instance();
        $CI->load->database(); 
        $CI->db->select('rank');
        $CI->db->where('userid',$userid);
        $CI->db->where('week_start_date',$previous_last_week_start);
        $CI->db->where('week_end_date',$previous_last_week_end);
        $res = $CI->db->get('weekly_rank');
        $info=$res->row_array();
         
        if($info['rank'])
        {/*
            $CI=& get_instance();
            $CI->load->database(); 
            $CI->db->select('rank');
            $CI->db->where('userid',$userid);
            $CI->db->where('week_start_date',$last_week_start);
            $CI->db->where('week_end_date',$last_week_end);
            $res = $CI->db->get('weekly_rank');
            $info1=$res->row_array();

            if($info1['rank'])
            {
               $position=$info['rank']-$info1['rank'];
               return $position;
            }*/
            return $info['rank'];
        }
        else
        {
          return "New Entry";
        }
   
   }


   function ranking_position($last_week_start,$last_week_end,$userid)
   {
            $CI=& get_instance();
            $CI->load->database(); 
            $CI->db->select('rank');
            $CI->db->where('userid',$userid);
            $CI->db->where('week_start_date',$last_week_start);
            $CI->db->where('week_end_date',$last_week_end);
            $res = $CI->db->get('weekly_rank');
            $info1=$res->row_array();

            return $info1['rank'];
            
            
          
   
   }



?>