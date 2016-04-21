<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		
		$this->load->model('Common_model');
		$this->load->helper('custom');

	}

	public function index()
	{
		if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."admin/welcome/login");
			
		}

         

		$data['header']=$this->load->view('admin/includes/header','',true);
		$data['footer']=$this->load->view('admin/includes/footer','',true);
		$data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		$data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
		
		$con1=array('status'=>1);
		$data['active_users']=$this->Common_model->fetchinfo('users',$con1,'count');
		 
		$con2=array('status'=>0);
		$data['pending_approval']=$this->Common_model->fetchinfo('users',$con2,'count');

		$con3=array('status'=>3);
		$data['rejected_approval']=$this->Common_model->fetchinfo('users',$con3,'count');
        
        $con4=array('status'=>2);
		$data['deleted_users']=$this->Common_model->fetchinfo('users',$con4,'count');

		$data['active_blog']=$this->Common_model->fetchinfo('blog',$con2,'count');

		$data['inactive_blog']=$this->Common_model->fetchinfo('blog',$con1,'count');

		$data['users_info']=$this->Common_model->fetchinfo('users',$con1,'result');

		$this->load->view('admin/index',$data);

	}

	public function login()
	{
		if($_POST)
		{
			$email=$this->input->post('email');
			$pass=$this->input->post('pass');
			$log_details=$this->Common_model->chkAdminlogin($email,$pass);
			if($log_details>0)
			{
				redirect(base_url().'admin/welcome');
			}
			else
			{
				$this->session->set_userdata('err_log_msg','Sorry! Invalid Email or Password');
				redirect(base_url().'admin/welcome/login');
			}
		}
		$this->load->view('admin/login');
	}

	public function logout()
	{
		$this->session->set_userdata('adminid','');
		$this->session->set_userdata('username','');
		redirect(base_url().'admin/welcome');
	}
}
?>
