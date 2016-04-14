<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

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
			redirect(base_url()."admin/welcome/login");
			
		}

		else
		{	
			$data['header']=$this->load->view('admin/includes/header','',true);
			$data['footer']=$this->load->view('admin/includes/footer','',true);
			$data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
			$data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
			
         
 
			$data['course_list']=$this->Common_model->fetchallcources();
			$this->load->view('admin/view_course.php',$data);
		}
	}


	public function edit_class_and_course()
	{
		if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."admin/welcome/login");
			
		}

		else
		{	
			$data['header']=$this->load->view('admin/includes/header','',true);
			$data['footer']=$this->load->view('admin/includes/footer','',true);
			$data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
			$data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
			
         
 
			$data['couse_list']=$this->Common_model->fetchallcources();
			$this->load->view('admin/add_course.php',$data);
		}
	}

	public function add_class_and_course()
	{
		if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."admin/welcome/login");
			
		}

		else
		{	
			$data['header']=$this->load->view('admin/includes/header','',true);
			$data['footer']=$this->load->view('admin/includes/footer','',true);
			$data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
			$data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
			
         
 
			$data['couse_list']=$this->Common_model->fetchallcources();
			$this->load->view('admin/add_class.php',$data);
		}
	}

	public function show_class_according_course()
    {
    	


    	if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."admin/welcome/login");
			
		}

		else
		{	
			$class_info='';
			if($_POST)
			{
		
			if($this->input->post('course_id')!='')
			{
				$con=array('course_id'=>$this->input->post('course_id'));
				$class_info=$this->Common_model->fetchinfo('class',$con,'result');
			}
			}

			$data['header']=$this->load->view('admin/includes/header','',true);
			$data['footer']=$this->load->view('admin/includes/footer','',true);
			$data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
			$data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
			$data['class_info']=$class_info;	
         
 
			$data['couse_list']=$this->Common_model->fetchallcources();
			$this->load->view('admin/add_course',$data);
		}
    }

    
	
}

?>