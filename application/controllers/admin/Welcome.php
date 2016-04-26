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
	public function manage_popup()
    {		
        $data['video']=$this->Common_model->fetchallpopvideo();

	    $data['header']=$this->load->view('admin/includes/header','',true);
	    $data['footer']=$this->load->view('admin/includes/footer','',true);
	    $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		$data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
			 
	    $this->load->view('admin/manage_popup',$data);
    }
    
    public function add_popup()
    {
    	if($_FILES['popup_video']['size']!=0)
        {
        	//echo "Hi";
        	    $this->load->library('image_lib');
				$time=time();
			    $config['upload_path'] ='./popup_video/';
				$config['file_name']=$time;
				$config['overwrite']='TRUE';
				$config['allowed_types']='avi|flv|wmv|mp3|mp4|AVI|FLV|WMV|MP3|MP4';
				$config['max_size']='200000';
								
				$this->load->library('upload', $config);
				if( ! $this->upload->do_upload('popup_video'))//initialize
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
				$ins['media']=$f_resize;
				$ins['status']=1;
		  
		        $insert=$this->Common_model->insert('popup',$ins);
		        if($insert)
		        {
                    $this->session->set_userdata('succ_msg','Video Uploaded Successfully!!!');
		        }
		        else
		        {
                   $this->session->set_userdata('err_msg',$this->upload->display_errors());
		        }
		        redirect(base_url().'admin/welcome/manage_popup');
        }
        else
        {
        	redirect(base_url().'admin/welcome/manage_popup');
        }
    }

    public function delete_popup()
    {
        if($_POST)
        {
        	$video=$this->input->post('vid');
           $con=array('vid'=>$video);
           //print_r($con);
           $delete=$this->Common_model->delete($con,'popup');
           if($delete)
           {
           	 echo "1";
           }
        }
    
    }

    public function change_status_popup()
    { 
    	if($_POST)
    	{

    		$video_id=$this->input->post('vid');
    		$status=$this->input->post('status');
    		$con=array('vid'=>$video_id);
            $data['status']=$status;
    		$update=$this->Common_model->update('popup',$con,$data);
    		if($update)
    		{
    			echo 1;
    		}

    	}

    }

    public function make_active()
    {
    	if($_POST)
    	{
    		$video_id=$this->input->post('vid');
    		$con['status']=0;

    		$info=$this->Common_model->fetchinfo('popup',$con,'row');
    		if(!empty($info))
    		{
    			$con1=array('vid'=>$info['vid']);
    			$data['status']=1;
                $update=$this->Common_model->update('popup',$con1,$data);

    		}
            $con2=array('vid'=>$video_id);
    			$up['status']=0;
                $update2=$this->Common_model->update('popup',$con2,$up);
                if($update2){
                	echo 1;
                }

    	}

    }
}
?>
