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
        $this->db->where('status',0);
        $this->db->or_where('status',1);
        $res=$this->db->get('courses');
        return $res->result_array();

      }


      



  }
?>
