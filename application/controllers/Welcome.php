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


$this->email->from('iamgargi92@gmail.com', 'Your Name');
$this->email->to('iamgargi92@gmail.com'); 
 	

$this->email->subject('Email Test');
$this->email->message('Testing the email class.');	

$mail=$this->email->send();


		$data['header']=$this->load->view('includes/header','',true);
		$data['footer']=$this->load->view('includes/footer','',true);
		$this->load->view('index',$data);

if ($mail)
{
	echo 'mail sent';
}
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
			  $$username=$this->input->post('username');

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
           //print_r($this->input->post('message'));
           $status=mail("roysubho687@gmail.com","Customer Query",$msg);
           if ($status) {
           	echo "Mail sent successfully";
           }
           else
           {
           	echo "Error! in sending email";
           }
        }
        else
        {
            
          echo "bye";
        }
    	}
		$data['header']=$this->load->view('includes/header','',true);
		$data['footer']=$this->load->view('includes/footer','',true);
		$this->load->view('contact_us',$data);
	}
}
