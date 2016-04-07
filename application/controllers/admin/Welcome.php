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
