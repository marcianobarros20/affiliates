<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents extends CI_Controller {

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
		$this->load->helper('custom');
	}

	public function about_us()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('about.php',$data);
	}
	public function career()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('career.php',$data);
	}
	public function blog_item()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('blog_item.php',$data);
	}

	public function services()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('services.php',$data);
	}
	
	public function portfolio()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('portfolio.php',$data);
	}
	public function blog()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$con=array('status'=>0);
		$page = $this->uri->segment(4)?$this->uri->segment(4):0;
		$this->load->library('pagination');			
		$config['base_url'] = base_url('Contents/blog/index');
		
		$data['RecordTotal']=$this->Common_model->fetchinfoBlog('count',$con);
		//$data['RecordTotal']=$this->home_model->casino_total();
		$config['total_rows'] = $data['RecordTotal'];
		//$config['use_page_numbers'] = TRUE;
		$config['per_page'] = $limit = 2;
		$start = $page;//start page			
		$config["uri_segment"] =4;
		$this->pagination->initialize($config);			
		$data['PaginationLink']= $this->pagination->create_links();
		//$data['casino_list']=$this->home_model->casino($limit,$start);
		
		$data['all_blog']=$this->Common_model->fetchinfoBlog('result',$con,$limit,$start);
		//echo $this->db->last_query();
        $data['blog_catagory_name']=$this->Common_model->fetchinfo('category',$con,'result');
         $data['blog_catagory']=$this->Common_model->fetchinfo('category',$con,'count');
		$this->load->view('blog.php',$data);
	}

public function faq()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('faq.php',$data);
	}
public function pricing()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('pricing.php',$data);
	}
	public function error()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('error.php',$data);
	}
	public function typography()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('typography.php',$data);
	}
	public function privacy()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('privacy.php',$data);
	}
	public function terms()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('terms.php',$data);
	}
	public function how()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('how_it_works.php',$data);
	}

	public function payout()
	{
		$data['set_code']='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
			$data['set_code']=$ref_id;
		}
		
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
		$this->load->view('payouts.php',$data);
	}


	public function Allcourses()
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect(base_url().'welcome');
		}
		else
		{
		$data['set_code']='';
		$con=array('status'=>0);
		$data['all_courses']=$this->Common_model->fetchinfo('courses',$con,'result');
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$this->load->view('all_course',$data);
		}
	}


	public function classinfo($co_id)
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect(base_url().'welcome');
		}
		else
		{
		$data['set_code']='';
		$con=array('status'=>0,'course_id'=>$co_id);
		$data['all_class']=$this->Common_model->fetchinfo('class',$con,'result');
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$this->load->view('class',$data);
		}
	}

}
?>
