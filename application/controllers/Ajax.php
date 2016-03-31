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
	
}
?>