<?php
 
   Class Cronjob_model extends CI_Model 
   { 
  
      Public function __construct() 
      { 
         parent::__construct(); 
         //$this->load->database();
      } 


    


     
      public function insert($tbl,$data)
      {
        $this->db->insert($tbl,$data);
        return $this->db->insert_id();
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

      public function get_all_exsisting_affiliate($lastweekenddate,$uid)
      {
        $this->db->select('*');
        $this->db->where('parent_id',$uid);
        $this->db->where('status',1);
        $this->db->where('date_register <=', $lastweekenddate);
        $res=$this->db->get('users');
        return  $result=$res->num_rows();
      }

      public function get_last_weeks_affiliate($last_week_start,$last_week_end,$uid)
      {
        $this->db->select('*');
        $this->db->where('uid',$uid);
        $this->db->where('date_register >=', $last_week_start);
        $this->db->where('date_register <=', $last_week_end);
        $this->db->where('status',1);
        $res=$this->db->get('users');
        return  $result=$res->num_rows();
      }

    

  public function downstream_count1($previous_last_week_end,$parent = 0,$count1)
  {
 
    if ($count1)
    $count=0;
    $this->db->select('*');
    $this->db->where('parent_id',$parent);
    $this->db->where('date_register <=', $previous_last_week_end);
    $res = $this->db->get('users');
    $info=$res->result_array();
  
    if ($res->num_rows() > 0)
    {
      $count=$res->num_rows();
      if ($res->result_array()) {
      foreach($info as $ins)
      {
          $count_recur=$this->downstream_count1($previous_last_week_end,$ins['uid'],$count);
          $count=$count+$count_recur;
      }
    }
    //$user_tree_array[] = "</ul>";
    }
   return $count;
  }


 public function downstream_count($parent,$previous_last_week_end)
 {
    $count=0;
    $this->db->select('*');
    $this->db->where('parent_id',$parent);
    $this->db->where('status',1);
    $this->db->where('date_register <=', $previous_last_week_end);
    $res = $this->db->get('users');
    $info=$res->result_array();
  
    if ($res->num_rows() > 0)
    {
      $count=$res->num_rows();
      if ($res->result_array())
      {
        foreach($info as $ins)
        {
          $count_recur=$this->downstream_count1($previous_last_week_end,$ins['uid'],$count);
          $count=$count+$count_recur;
        }
      }
    }
    return $count;
  }
  
  
  public function new_downstream_count($last_week_start,$last_week_end,$parent = 0)
  {
    $count=0;
    $this->db->select('*');
    $this->db->where('parent_id',$parent);
    $this->db->where('status',1);
    $this->db->where('date_register >=', $last_week_start);
    $this->db->where('date_register <=', $last_week_end);
    $res = $this->db->get('users');
    $info=$res->result_array();
  
    if ($res->num_rows() > 0)
    {
      $count=$res->num_rows();
      if ($res->result_array())
      {
        foreach($info as $ins)
        {
          $count_recur=$this->new_downstream_count1($last_week_start,$last_week_end,$ins['uid'],$count);
          $count=$count+$count_recur;
        }
      }
    }
    return $count;
  }

  function new_downstream_count1($last_week_start,$last_week_end,$parent = 0,$count1)
  {
 
    if ($count1)
    $count=0;
    $this->db->select('*');
    $this->db->where('parent_id',$parent);
    $this->db->where('date_register >=', $last_week_start);
    $this->db->where('date_register <=', $last_week_end);
    $res = $this->db->get('users');
    $info=$res->result_array();
  
    if ($res->num_rows() > 0)
    {
      $count=$res->num_rows();
      if ($res->result_array()) {
      foreach($info as $ins)
      {
          $count_recur=$this->new_downstream_count1($last_week_start,$last_week_end,$ins['uid'],$count);
          $count=$count+$count_recur;
      }
    }
    //$user_tree_array[] = "</ul>";
    }
   return $count;
  }

  public function get_according_points($last_week_start,$last_week_end)
  {
    $this->db->select('*');
    $this->db->where('week_start_date =', $last_week_start);
    $this->db->where('week_end_date =', $last_week_end);
    $this->db->order_by('point','desc');
    $res = $this->db->get('weekly_rank');
    $result=$res->result_array();

    return $result;
  }


  }
?>



