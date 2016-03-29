<?php
 
   Class Common_model extends CI_Model 
   { 
  
      Public function __construct() 
      { 
         parent::__construct(); 
         //$this->load->database();
      } 

      public function update($tbl,$con,$data)
      {  
          $d=$this->db->where($con);
          $res=$this->db->update($tbl,$data);

          if($res)
          {
            return $this->db->affected_rows();
          }
               
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
        return $this->db->affected_rows();
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
          $this->session->set_userdata('username',$result['name']);
          return count($result);
        }
        else
        {
           return count($result);
        }
      }
  }
?>