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
		
		$this->load->library('form_validation');
		//$this->load->library('email');
		$this->load->model('Common_model');
	}

	
	public function index()
	{
		$data=array();


		$data['header']=$this->load->view('includes/header','',true);
		$data['footer']=$this->load->view('includes/footer','',true);
		$this->load->view('index',$data);
	}
	public function signup()
	{
		$data=array();
		$data['header']=$this->load->view('includes/header','',true);
		$data['footer']=$this->load->view('includes/footer','',true);
		$this->load->view('sign_up',$data);
	}

	public function register()
	{
		$data=array();

		if($_POST)
		{
			$this->form_validation->set_rules('fname', 'First name', 'required');
			$this->form_validation->set_rules('lname', 'Last Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			// Validation For Contact Field
			$this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
			// Validation For Address Field
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');
			if ($this->form_validation->run() == TRUE)
			{
			  $email=$this->input->post('email');
			  $username=$this->input->post('username');

			  $chk_email_exists=$this->Common_model->Fnemailexists($email);	
			  $chk_user_exists=$this->Common_model->Fnuserxists($username);	
			  if($chk_email_exists==0 && $chk_user_exists==0)
			  {
			  $ins['fname']=$this->input->post('fname');
			  $ins['lname']=$this->input->post('lname');
			  $ins['username']=$this->input->post('username');
			  $ins['email']=$this->input->post('email');
			  $ins['password']=md5($this->input->post('password'));
			  $ins['status']=1;
			  $ins['date_register']=date('Y-m-d');
			  $insert=$this->Common_model->insert('users',$ins);
			  if($insert)
			  {
			  		$this->session->set_userdata('succ_msg','You Have successfully registered with us.please log in now.');
			  		redirect(base_url().'welcome/register');
			  }
			 }
			 else
			 {
			 	if($chk_email_exists>0)
			 	{
			 	$this->session->set_userdata('err_msg','Email Address Already Exists.');
			    }
			    if($chk_user_exists>0)
			    {
			    	$this->session->set_userdata('err_msg','Username Already Exists.');
			    }
				redirect(base_url().'welcome/register');
			 }
			  
			}
			else
			{
				//echo 'kk';exit;
				$this->session->set_userdata('err_msg','Please fill All required fields Properly.');
				redirect(base_url().'welcome/register');
			}
		}

		$data['header']=$this->load->view('includes/header','',true);
		$data['footer']=$this->load->view('includes/footer','',true);
		$this->load->view('registration',$data);
	}


	public function login()
	{
		if($_POST)
		{
			$email=$this->input->post('email');
			$pass=$this->input->post('password');
			$log=$this->Common_model->FnchLogin($email,$pass);
			if(count($log)>0)
			{
				if($log['status']==1)
				{
					if($this->input->post('remember_me')==1)
					{
						$cookie= array(
						'name'   => 'email',
						'value'  => $email,
						'expire' => '86500',
						);
						

						$cookie= array(
						'name'   => 'password',
						'value'  => $pass,
						'expire' => '86500',
						);


						$cookie= array(
						'name'   => 'rem',
						'value'  => 1,
						'expire' => '86500',
						);
						$this->input->set_cookie($cookie);
					}
					$this->session->set_userdata('user_id',$log['uid']);
					$this->session->set_userdata('username',$log['username']);
                    redirect(base_url().'welcome');
				}
				else
				{
					$this->session->set_userdata('err_msg','You are not yet activated');
					redirect(base_url().'welcome');
				}
			}
			else
			{
				$this->session->set_userdata('err_msg','You are not yet registered with us.please register');
				redirect(base_url().'welcome/register');
			}
		}
	}

	public function contact()
	{
		$data=array();

		$this->form_validation->set_rules('firstname', 'FirstName', 'required');
    	$this->form_validation->set_rules('lastname', 'LastName', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if($_POST)
        {
        	
        if ($this->form_validation->run() == TRUE) 
        {
            $msg=$this->input->post('message');
            $this->email->from('iamgargi92@gmail.com', 'Your Name');
			$this->email->to('hello@tier5.us'); 
			$this->email->subject('Customer Query');
			$this->email->message($msg);	
			$mail=$this->email->send();
           
			if ($mail) {
				$this->session->set_userdata('succ_msg','Thank You for contacting us.your queries will be answered soon.');
				redirect(base_url().'welcome/contact');
			}
			else
			{
				$this->session->set_userdata('err_msg','Sorry! unable to send your queries');
				redirect(base_url().'welcome/contact');
			}
        }
        else
        {
            
          $this->session->set_userdata('err1_msg','Please fill the form Properly.');
          redirect(base_url().'welcome/contact');
        }
    	}
		

		$data['header']=$this->load->view('includes/header','',true);
		$data['footer']=$this->load->view('includes/footer','',true);
		$this->load->view('contact_us',$data);
	}
	public function logout()
	{
		$this->session->set_userdata('user_id','');
		$this->session->set_userdata('username','');
		$this->session->set_userdata('succ_msg','You have successfully Logout.');
		redirect(base_url().'welcome');
	}


}
