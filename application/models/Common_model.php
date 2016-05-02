<?php
 
   Class Common_model extends CI_Model 
   { 
  
      Public function __construct() 
      { 
         parent::__construct(); 
         //$this->load->database();
      } 


    


      public function Fnemailexists($email)
      {
        $this->db->select('*');
        $this->db->where('email',$email);
        $res=$this->db->get('users');
        return  $result=$res->num_rows();
        
      }
      public function Fnuserxists($username)
      {
        $this->db->select('*');
        $this->db->where('username',$username);
        $res=$this->db->get('users');
        return  $result=$res->num_rows();
      }
      public function insert($tbl,$data)
      {
        $this->db->insert($tbl,$data);
        return $this->db->insert_id();
      }


      public function FnchLogin($email,$pass)
      {
        $this->db->select('*');
        $this->db->where('email',$email);
        $this->db->where('password',md5($pass));
        $res=$this->db->get('users');
        return  $result=$res->row_array();
      }

      public function chkAdminlogin($email,$pass)
      {
         $this->db->select('*');
        $this->db->where('email',$email);
        $this->db->where('password',md5($pass));
        $res=$this->db->get('Admin');
        $result=$res->row_array();
        if(count($result) > 0)
        {
          $this->session->set_userdata('adminid',1);
          $this->session->set_userdata('admin_username',$result['name']);
          return count($result);
        }
        else
        {
           return count($result);
        }
      }

      public function checkemailexists($email)
      {
        $this->db->select('*');
        $this->db->where('email',$email);
        $res=$this->db->get('users');
        return  $result=$res->num_rows();
        
      }

      public function getuserid($email)
      {
        $this->db->select('*');
        $this->db->where('email',$email);
        $res=$this->db->get('users');
        return  $result=$res->row_array()['uid'];;
      }

      public function getemailid($uid)
      {
        $this->db->select('*');
        $this->db->where('uid',$uid);
        $res=$this->db->get('users');
        return  $result=$res->row_array()['email'];;
      }

      public function update($tbl,$con,$data)
      {
        
        $this->db->where($con);
        $res=$this->db->update($tbl,$data);
        return $this->db->affected_rows();
      }

       public function fetchinfo($tbl,$con,$type)
      {
        $this->db->select('*');
        if($con)
        {
        $this->db->where($con);
        }
        $res=$this->db->get($tbl);
        if($type=="row")
        {
        return  $result=$res->row_array();
        }
         if($type=="count")
        {
        return  $result=$res->num_rows();
        }
         if($type=="result")
        {
        return  $result=$res->result_array();
        }

      }
      public function delete($con,$tbl)
      {
        $this->db->where($con);
        $this->db->delete($tbl);
        return $this->db->affected_rows(); 
      }

      public function conditionchk($cl_id,$co_id)
      {
        $this->db->select('*');
        $this->db->where('cl_id <',$cl_id);
        $this->db->where('course_id',$co_id);
        $this->db->where('status',0);
        $res=$this->db->get('class');
       // echo $this->db->last_query();
        return $result=$res->result_array();
      }

      public function fetchinfoBlog($type,$con=null,$limit=null,$start=null)
      {
       // echo $start;       
        $this->db->select('*');
        if($con)
        {
          $this->db->where($con);
        }
        
        if($type=='count')
        {
          $this->db->order_by('blog_id','desc');
          $res=$this->db->get('blog');
          
          return $res->num_rows();
        }
        else
        {
          $this->db->order_by('blog_id','desc');
          $this->db->limit($limit,$start);
//$this->db->order_by('blog_id','desc');
          $res=$this->db->get('blog');
          return $res->result_array();
        }
       
       
      }


      public function fetchinfoCategory($type,$con=null,$limit=null,$start=null)
      {
         $this->db->select('*');
        if($con)
        {
          $this->db->where($con);
        }
        
        if($type=='count')
        {
          $this->db->order_by('cat_id','desc');
          $res=$this->db->get('category');
          
          return $res->num_rows();
        }
        else
        {
          $this->db->order_by('cat_id','desc');
          $this->db->limit($limit,$start);
//$this->db->order_by('blog_id','desc');
          $res=$this->db->get('category');
          return $res->result_array();
        }
      }

      public function fetchrejectandpending()
      {

        $this->db->select('*');
        $this->db->where('status',0);
        $this->db->or_where('status',3);
        $res=$this->db->get('users');
        return $res->result_array();

      }

      public function fetchallcources()
      {

        $this->db->select('*');
        
        $res=$this->db->get('courses');
        return $res->result_array();

      }

      public function fetchallpopvideo()
      {

        $this->db->select('*');
        
        $res=$this->db->get('popup');
        return $res->result_array();

      }

      public function fetchinfocourse($con)
      {
        $this->db->distinct();
        $this->db->select('courses.*');
        $this->db->where($con);
        $this->db->join('class','class.course_id=courses.co_id');
        $res=$this->db->get('courses');
       return $result=$res->result_array();
       
      }

      public function Fntotaltrainingmaterial($co_id)
      {
        $this->db->select('*');
        
        $this->db->where('course_id',$co_id);
        $this->db->where('status',0);
        $res=$this->db->get('class');
        $result=$res->result_array();
        $tot_count=0;
        foreach($result as $rest)
        {
          $this->db->select('*');
        
        $this->db->where('class_id',$rest['cl_id']);
        $this->db->where('status',0);
        $res1=$this->db->get('training_material');
        $result1=$res1->num_rows();
        $tot_count=$tot_count+$result1;
        }
        return $tot_count;
      }

      public function fetchinfocourses($tbl,$con)
      {
        $this->db->select('*');
        $this->db->join('class','class.course_id=courses.co_id');
        $this->db->join('training_material','training_material.class_id=class.cl_id');
        if($con)
        {
          $this->db->where($con);
          $this->db->order_by('class.cl_id','asc');
          $this->db->limit(0,1);
        }
        

        $res=$this->db->get($tbl);
        $result=$res->result_array();
        echo '<pre>';print_r($result);exit;
      }

      public function fnchktrainingcompleted($co_id)
      {
        $this->db->select('*');
        $this->db->where('course_id',$co_id);
        $this->db->where('status',0);
        $res=$this->db->get('class');
        $result=$res->result_array();
        $val=0;
        foreach($result as $r)
        {
          $this->db->select('*');
        $this->db->where('class_id',$r['cl_id']);
        $this->db->where('status',0);
        $res1=$this->db->get('training_material');
        $result1=$res1->num_rows();

        $this->db->select('*');
        $this->db->where('cl_id',$r['cl_id']);
        $this->db->where('u_id',$this->session->userdata('user_id'));
        $this->db->where('co_id',$co_id);
        $this->db->where('status',1);
        $res2=$this->db->get('training_details');
        $result2=$res2->num_rows();
        if($result1==$result2)
        {
          $val=0;
         
        }
        else
        {
          $val=1;

        }

        }
         return $val;
      }


  }
?>
