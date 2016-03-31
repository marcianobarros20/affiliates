<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

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
		 $this->load->library('image_lib');
		

	}

	public function index()
	{
		if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."index.php/admin/welcome/login");
			
		}

		else
		{	
			$data['header']=$this->load->view('admin/includes/header','',true);
			$data['footer']=$this->load->view('admin/includes/footer','',true);
			$data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
			$data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
			$con=array('status'=>1);

			$data['list_users']=$this->Common_model->fetchinfo('users',$con,'result');

			$this->load->view('admin/affiliates',$data);
		}

	}

	public function add()
	{
		if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."index.php/admin/welcome/login");
			
		}
		else
		{
		   $data=array();

		   $data['header']=$this->load->view('admin/includes/header','',true);
		   $data['footer']=$this->load->view('admin/includes/footer','',true);
		   $data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
		   $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		   
		   if($_POST)
		   {
		   //echo '<pre>';print_r($_POST);exit;
		   $ins['title']=$this->input->post('b_title');
		   $ins['description']=$this->input->post('b_des');
		   $ins['media_type']=$this->input->post('media_type');
		   $ins['media']=$this->input->post('file_media');
		   $ins['media']=$this->input->post('file_media');
		   $this->db->insert('blog',$ins);
		   }


		   $this->load->view('admin/add_blog',$data);
		}

	}


	
}
?>
