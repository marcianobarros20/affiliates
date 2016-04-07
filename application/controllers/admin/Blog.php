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
			redirect(base_url()."admin/welcome/login");
			
		}

		else
		{	
			$data['header']=$this->load->view('admin/includes/header','',true);
			$data['footer']=$this->load->view('admin/includes/footer','',true);
			$data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
			$data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
			$con=array('status'=>0);
		$page = $this->uri->segment(4)?$this->uri->segment(4):0;
		$this->load->library('pagination');			
		$config['base_url'] = base_url('admin/blog/index');
		
		$data['RecordTotal']=$this->Common_model->fetchinfoBlog('count');
		//$data['RecordTotal']=$this->home_model->casino_total();
		$config['total_rows'] = $data['RecordTotal'];
		$config['per_page'] = $limit = 2;
		$start = $page;//start page			
		$config["uri_segment"] =4;
		$this->pagination->initialize($config);			
		$data['PaginationLink']= $this->pagination->create_links();
		//$data['casino_list']=$this->home_model->casino($limit,$start);
		
		$data['all_blog']=$this->Common_model->fetchinfoBlog('result','',$limit,$start);
			
// $this->db->last_query();
			

			$this->load->view('admin/manage_blog',$data);
		}
	}

	
		public function add_category()
		{
			if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."admin/welcome/login");
			
		}
		else
		{
		   $data=array();
		  	if($_POST)
		  	{
		  		$ins['title']=$this->input->post('cat_title');
		  		$insert=$this->Common_model->insert('category',$ins);
		  		if($insert)
		  		{	$this->session->set_userdata('succ_msg','category added successfully');
		  			redirect(base_url().'admin/blog/add_category');
		  		}
		  	}

		   $data['header']=$this->load->view('admin/includes/header','',true);
		   $data['footer']=$this->load->view('admin/includes/footer','',true);
		   $data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
		   $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		   $this->load->view('admin/add_category',$data);
		 }  
		}

	public function add()
	{
		if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."admin/welcome/login");
			
		}
		else
		{
		   $data=array();
		   $data['category']=$this->Common_model->fetchinfo('category','','result');
		   $data['header']=$this->load->view('admin/includes/header','',true);
		   $data['footer']=$this->load->view('admin/includes/footer','',true);
		   $data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
		   $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		   
		   if($_POST)
		   {
		   	if($this->input->post('media_type')==1)
		   	{
		   	/* image upload start */
		   	 if($_FILES['file_media']['size']!=0){
			    $this->load->library('image_lib');
				$time=time();
			    $config['upload_path'] ='./blog_file/original/';
				$config['file_name']=$time;
				$config['overwrite']='TRUE';
				$config['allowed_types']='jpg|jpeg|gif|png|PNG';
				$config['max_size']='2000';
								
				$this->load->library('upload', $config);
				if( ! $this->upload->do_upload('file_media'))//initialize
				{
				
					$this->session->set_userdata('err_msg',$this->upload->display_errors());
					echo $this->upload->display_errors();
					die();
				}
				else
				{
				
				$updata=array();//get the uploaded data details
				$updata = $this->upload->data();				
				$f_resize=$updata['file_name'];
					
				$config['image_library'] = 'gd2';
				$config['thumb_marker']='';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['height']=250;
				$config['width']=250;
				$config['new_image'] = './blog_file/thumb/'.$f_resize;
				$config['source_image']="./blog_file/original/".$f_resize;
				
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				
				
	
				}
			}
		   	/* image upload end */
		   }
		   else
		   {
		   	/* video upload start */

		   	if($_FILES['file_media']['size']!=0){
			    $this->load->library('image_lib');
				$time=time();
			    $config['upload_path'] ='./blog_file/video/';
				$config['file_name']=$time;
				$config['overwrite']='TRUE';
				$config['allowed_types']='avi|flv|wmv|mp3|mp4|AVI|FLV|WMV|MP3|MP4';
				$config['max_size']='2000';
								
				$this->load->library('upload', $config);
				if( ! $this->upload->do_upload('file_media'))//initialize
				{
				
					$this->session->set_userdata('err_msg',$this->upload->display_errors());
					echo $this->upload->display_errors();
					die();
				}
				else
				{
				
				$updata=array();//get the uploaded data details
				$updata = $this->upload->data();				
				//echo '<pre>';print_r($updata);
				$f_resize=$updata['file_name'];

				}
			}
		   	/* video upload end */

		   }


		   //echo '<pre>';print_r($_POST);exit;
		   $ins['title']=$this->input->post('b_title');
		   $ins['cat_id']=$this->input->post('category_type');
		   $ins['description']=$this->input->post('b_des');
		   $ins['media_type']=$this->input->post('media_type');
		   $ins['add_date']=date('Y-m-d');
		   $ins['media']=$f_resize;
		  
		   $insert=$this->Common_model->insert('blog',$ins);
		   if($insert)
		   {
		   	$this->session->set_userdata('succ_msg','Blog added successfully');
		   	redirect(base_url().'admin/blog/add');
		   }
		   }


		   $this->load->view('admin/add_blog',$data);
		}

	}

	public function edit_blog($blog_id)
	{

		if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."admin/welcome/login");
			
		}
		else
		{
		   $data=array();
		   $con1=array('blog_id'=>$blog_id);
		   $data['category']=$this->Common_model->fetchinfo('category','','result');
		   $data['header']=$this->load->view('admin/includes/header','',true);
		   $data['footer']=$this->load->view('admin/includes/footer','',true);
		   $data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
		   $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		   $data['edit_blog']=$this->Common_model->fetchinfo('blog',$con1,'row');
		   $file='';
		   if($_POST)
		   {
		   	if($this->input->post('media_type')==1)
		   	{
		   	/* image upload start */
		   	 if($_FILES['file_media']['size']!=0){
			    $this->load->library('image_lib');
				$time=time();
			    $config['upload_path'] ='./blog_file/original/';
				$config['file_name']=$time;
				$config['overwrite']='TRUE';
				$config['allowed_types']='jpg|jpeg|gif|png|PNG';
				$config['max_size']='2000';
								
				$this->load->library('upload', $config);
				if( ! $this->upload->do_upload('file_media'))//initialize
				{
				
					$this->session->set_userdata('err_msg',$this->upload->display_errors());
					echo $this->upload->display_errors();
					die();
				}
				else
				{
				
				$updata=array();//get the uploaded data details
				$updata = $this->upload->data();				
				$f_resize=$updata['file_name'];
					
				$config['image_library'] = 'gd2';
				$config['thumb_marker']='';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['height']=250;
				$config['width']=250;
				$config['new_image'] = './blog_file/thumb/'.$f_resize;
				$config['source_image']="./blog_file/original/".$f_resize;
				
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				
				
	
				}
				$file=$f_resize;
			}
		   	/* image upload end */
		   	else
		   	{

		   		if($data['edit_blog']['media_type']==1)
		   		{
		   		$file=$data['edit_blog']['media'];
		   		}
		   		else
		   		{	$this->session->set_userdata('err_msg','You have changed media type but did not upload any please upload one.');
		   			redirect(base_url().'admin/blog/edit_blog/'.$blog_id);
		   		}
		   	}
		   }
		   else
		   {

		   	/* video upload start */

		   	if($_FILES['file_media']['size']!=0){
			    $this->load->library('image_lib');
				$time=time();
			    $config['upload_path'] ='./blog_file/video/';
				$config['file_name']=$time;
				$config['overwrite']='TRUE';
				$config['allowed_types']='avi|flv|wmv|mp3|mp4|AVI|FLV|WMV|MP3|MP4';
				$config['max_size']='2000';
								
				$this->load->library('upload', $config);
				if( ! $this->upload->do_upload('file_media'))//initialize
				{
				
					$this->session->set_userdata('err_msg',$this->upload->display_errors());
					echo $this->upload->display_errors();
					die();
				}
				else
				{
				
				$updata=array();//get the uploaded data details
				$updata = $this->upload->data();				
				//echo '<pre>';print_r($updata);
				$f_resize=$updata['file_name'];

				}

				$file=$f_resize;
			}
		   	/* video upload end */
		   	else
		   	{
		   		if($data['edit_blog']['media_type']==2)
		   		{
		   		$file=$data['edit_blog']['media'];
		   		}
		   		else
		   		{	$this->session->set_userdata('err_msg','You have changed media type but did not upload any please upload one.');
		   			redirect(base_url().'admin/blog/edit_blog/'.$blog_id);
		   		}
		   	}

		   }


		   //echo '<pre>';print_r($_POST);exit;
		   $ins['title']=$this->input->post('b_title');
		   $ins['cat_id']=$this->input->post('category_type');
		   $ins['description']=$this->input->post('b_des');
		   $ins['media_type']=$this->input->post('media_type');
		   //$ins['add_date']=date('Y-m-d');
		   $ins['media']=$file;
		  
		   $update=$this->Common_model->update('blog',$con1,$ins);
		   if($update)
		   {
		   	$this->session->set_userdata('succ_msg','Blog updated successfully');
		   	redirect(base_url().'admin/blog/edit_blog/'.$blog_id);
		   }
		   }


		   $this->load->view('admin/edit_blog',$data);
		}

	}

	public function view_details($blog_id)
	{
		
		if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."admin/welcome/login");
			
		}
		else
		{
		   $data=array();
		   $con=array('blog_id'=>$blog_id);
		   $data['single_blog']=$this->Common_model->fetchinfo('blog',$con,'row');
		   $data['header']=$this->load->view('admin/includes/header','',true);
		   $data['footer']=$this->load->view('admin/includes/footer','',true);
		   $data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
		   $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		   $this->load->view('admin/view_blog',$data);
		 }  
	}


	public function edit($cat_id)
	{
		if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."admin/welcome/login");
			
		}
		else
		{
		   $con=array('cat_id'=>$cat_id);
		   $data['edit_category']=$this->Common_model->fetchinfo('category',$con,'row');
		   if($_POST)
		   {
		   	$update['title']=$this->input->post('cat_title');
		   	$update['status']=$this->input->post('status');
		   	$up=$this->Common_model->update('category',$con,$update);
		   	if($up)
		   	{
		   		$this->session->set_userdata('succ_msg','Category Updated Successfully');
		   		redirect(base_url().'admin/blog/edit/'.$cat_id);
		   	}
		   }
		   $data['header']=$this->load->view('admin/includes/header','',true);
		   $data['footer']=$this->load->view('admin/includes/footer','',true);
		   $data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
		   $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		   $this->load->view('admin/edit_category',$data);
		 }  
	}



	public function manage()
		{
			if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."admin/welcome/login");
			
		}
		else
		{
		   $data=array();


		$page = $this->uri->segment(5)?$this->uri->segment(5):0;
		$this->load->library('pagination');			
		$config['base_url'] = base_url('admin/blog/manage/index');

		$data['RecordTotal']=$this->Common_model->fetchinfoCategory('count');
		//$data['RecordTotal']=$this->home_model->casino_total();
		$config['total_rows'] = $data['RecordTotal'];
		$config['per_page'] = $limit = 2;
		$start = $page;//start page			
		$config["uri_segment"] =5;
		$this->pagination->initialize($config);			
		$data['PaginationLink']= $this->pagination->create_links();
		//$data['casino_list']=$this->home_model->casino($limit,$start);

		$data['manage_category']=$this->Common_model->fetchinfoCategory('result','',$limit,$start);																	


		  	
		   $data['header']=$this->load->view('admin/includes/header','',true);
		   $data['footer']=$this->load->view('admin/includes/footer','',true);
		   $data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
		   $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		   $this->load->view('admin/manage_category',$data);
		 }  
		}


	public function delete($cat_id)
	{
		$con=array('cat_id'=>$cat_id);
		$info=$this->Common_model->fetchinfo('blog',$con,'count');
		if($info >0)
		{
			$this->session->set_userdata('err_msg','Sorry blog already exists under this category. so you can not delete this.');
			redirect(base_url().'admin/blog/manage');
		}
		else
		{
			$del=$this->Common_model->delete($con,'category');
			if($del)
			{
			$this->session->set_userdata('succ_msg','Category deleted Successfully.');
			redirect(base_url().'admin/blog/manage');
			}
		}
	}
}
?>
