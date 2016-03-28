<?php 
   Class Common_model extends CI_Model 
   { 
	
      Public function __construct() 
      { 
         parent::__construct(); 
         //$this->load->database();
      } 


      public function Fnemailexists($email,$u_name)
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
        return $this->db->affected_rows();
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
        $this->db->where($con);
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
  }
?> 