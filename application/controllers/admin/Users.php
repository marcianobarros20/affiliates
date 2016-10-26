<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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

	public function non_aff()
	{
		if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."admin/welcome/login");
			
		}
		else
		{
		   $data=array();
   		  
		  




		   $data['list']= $this->Common_model->fetchrejectandpending();
           $data['active_affiliate']=$this->Common_model->fetch_active();
		   $data['header']=$this->load->view('admin/includes/header','',true);
		   $data['footer']=$this->load->view('admin/includes/footer','',true);
		   $data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
		   $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		   $this->load->view('admin/nonaff',$data);
		}

	}

	public function view_details($uid)
	{
           //echo $uid;

		   $con=array('uid' => $uid);


           $data['user_info']= $this->Common_model->fetchinfo('users',$con, 'row');
           //print_r( $data['user_info']);
            //exit;
		   $data['header']=$this->load->view('admin/includes/header','',true);
		   $data['footer']=$this->load->view('admin/includes/footer','',true);
		   $data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
		   $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		   $this->load->view('admin/viewdetails',$data);
		
	}

	public function delete_affiliate()
	{


		   if (!$this->session->userdata('adminid'))
			{
				redirect(base_url()."admin/welcome/login");
				
			}
		  else
		{
		   $data=array();

           $con=array('status' => 2);
   		  
		  




		   $data['list']= $this->Common_model->fetchinfo('users',$con, 'result');
		  

         
           $data['header']=$this->load->view('admin/includes/header','',true);
		   $data['footer']=$this->load->view('admin/includes/footer','',true);
		   $data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
		   $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		   $this->load->view('admin/deletedaff',$data);
	    }
	}

	



	
}
?>
