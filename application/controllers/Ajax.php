<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model('Common_model');
	}

	public function EmailExists()
	{
		if($_POST)
		{
			 $email=$this->input->post('email');
			 $is_exists=$this->Common_model->Fnemailexists($email);
			 if($is_exists>0)
			 {
			 	echo 1;
			 }	
			 else
			 {
			 	echo 2;
			 }
		}
	}

	public function UserExists()
	{
		if($_POST)
		{
			 $username=$this->input->post('username');
			 $is_exists=$this->Common_model->Fnuserxists($username);
			 if($is_exists>0)
			 {
			 	echo 1;
			 }	
			 else
			 {
			 	echo 2;
			 }
		}
	}



			public function change_status()
			{
			if($_POST)
			{

			$uid=$this->input->post('uid');
			$con=array('uid'=>$uid);
			$data['status']=$this->input->post('status');
			$update=$this->Common_model->update('users',$con,$data);
			return $update;

			}
			}


			public function check_refferalcode()
			{
				if($_POST)
				{
					$refferalcode=$this->input->post('refferalcode');
					$con=array('refferalcode'=>$refferalcode);
					$check_reff=$this->Common_model->fetchinfo('users',$con,'count');
                    if($check_reff>0)
                    {
                    	$get_parent_uid=$this->Common_model->fetchinfo('users',$con,'row');
                        $parent_id=$get_parent_uid['uid'];

                        $user_id=$this->input->post('uid');
                        $userid=array('uid'=>$user_id);
                        $data['refferalparent']=$refferalcode;
                        $data['parent_id']=$parent_id;
                        $data['status']=$this->input->post('status');
                        $data['refferalcode']='Ref-'.time().'-'.$user_id;


                        $update=$this->Common_model->update('users',$userid,$data);

                        if($update)
                        {
                            echo "Assigned Successful";
                        }
                        else
                        {
                            echo "Assigned Rejected";
                        }


                    }
                    else
                    {
                    	echo "No Such refferal Code";
                    }
				}
			}


			public function show_child_tier3()
			{


				//echo "child";
				if($_POST)
				{
					$user_id=$this->input->post('uid');
	                $parent_id=array('parent_id'=>$user_id);
	                $get_child=$this->Common_model->fetchinfo('users',$parent_id,'result');
	                $result="";
	                
	                if($get_child)
	                {
	                  $result.="<div> <h2> Tier 3</h2><br>";

	                	foreach ($get_child as $value)
	                	{
                           
                        $result.="Id:".$value['uid']."<br>Name:".$value['fname']." ".$value['lname']."<br>Email:".$value['email']."<br>Refferal Code:".$value['refferalcode']."<br><input type='button' Value='Show Tier2 Affiliates' onclick='show_child_tier2(".$value['uid'].")'><br>";
                        $result.="<div id='child_show_tier2".$value['uid']."'></div>";
	                	}
	                	$result.="</div>";
	                	echo $result;
	                }
	                else
                    {
                    	echo "No Child";
                    }

	             }
	             else
	             {
	             	echo "No ";
	             }



			}

            public function show_child_tier2()
			{


				//echo "child";
				if($_POST)
				{
					$user_id=$this->input->post('uid');
	                $parent_id=array('parent_id'=>$user_id);
	                $get_child=$this->Common_model->fetchinfo('users',$parent_id,'result');
	                $result="";
	                
	                if($get_child)
	                {
	                  $result.="<div style='background:#FF9999;padding-left: 100px;'> <h3> Tier 2</h3><br>";

	                	foreach ($get_child as $value)
	                	{
                           
                        $result.="Id:".$value['uid']."<br>Name:".$value['fname']." ".$value['lname']."<br>Email:".$value['email']."<br>Refferal Code:".$value['refferalcode']."<br><input type='button' Value='Show Tier1 Affiliates' onclick='show_child_tier1(".$value['uid'].")'><br>";
                        $result.="<div id='child_show_tier1".$value['uid']."'></div>";
	                	}
	                	$result.="</div>";
	                	echo $result;
	                }
	                else
                    {
                    	echo "No Child";
                    }

	             }
	             else
	             {
	             	echo "No ";
	             }

			}
            
            public function show_child_tier1()
			{


				//echo "child";
				if($_POST)
				{
					$user_id=$this->input->post('uid');
	                $parent_id=array('parent_id'=>$user_id);
	                $get_child=$this->Common_model->fetchinfo('users',$parent_id,'result');
	                $result="";
	                
	                if($get_child)
	                {
	                  $result.="<div style='background:#FF6699;padding-left:150px;'> <h4> Tier 1</h4><br>";

	                	foreach ($get_child as $value)
	                	{
                           
                        $result.="Id:".$value['uid']."<br>Name:".$value['fname']." ".$value['lname']."<br>Email:".$value['email']."<br>Refferal Code:".$value['refferalcode']."<br><input type='button' Value='Show Tier0 Affiliates' onclick='show_child_tier0(".$value['uid'].")'><br>";
                        $result.="<div id='child_show_tier0".$value['uid']."'></div>";
	                	}
	                	$result.="</div>";
	                	echo $result;
	                }
	                else
                    {
                    	echo "No Child";
                    }

	             }
	             else
	             {
	             	echo "No ";
	             }

			}

			public function show_child_tier0()
			{


				//echo "child";
				if($_POST)
				{
					$user_id=$this->input->post('uid');
	                $parent_id=array('parent_id'=>$user_id);
	                $get_child=$this->Common_model->fetchinfo('users',$parent_id,'result');
	                $result="";
	                
	                if($get_child)
	                {
	                  $result.="<div style='background:#FF6633;padding-left:200px;'> <h5> Tier 0</h5><br>";

	                	foreach ($get_child as $value)
	                	{
                           
                        $result.="Id:".$value['uid']."<br>Name:".$value['fname']." ".$value['lname']."<br>Email:".$value['email']."<br>Refferal Code:".$value['refferalcode']."<br>";

	                	}
	                	$result.="</div>";
	                	echo $result;
	                }
	                else
                    {
                    	echo "No Child";
                    }

	             }
	             else
	             {
	             	echo "No ";
	             }

			}





	
}
?>