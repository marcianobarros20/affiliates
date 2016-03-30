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

	public function register($ref_id=NULL)
	{
		$data=array();
		if($ref_id!='')
		{
		$this->session->set_userdata('reffrence_id',$ref_id);
	    }

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
			  
			  if($ref_id!='')
			  {

			  	
			  	
			  	$get_explode=explode('-',$ref_id);
			  	$ins['parent_id']=$get_explode[2];
			  	$ins['refferalcode']=$ref_id;
			  	$ins['status']=1;
			  	
			  }
			  else
			  {
			  	
			  if($this->session->userdata('reffrence_id')!='')
			  {
			  	$ref_id1=$this->session->userdata('reffrence_id');
			  	$get_explode=explode('-',$ref_id1);
			  	$ins['parent_id']=$get_explode[2];
			  	$ins['refferalcode']=$ref_id1;
			  	$ins['status']=1;
			  }
			  else
			  {
			  	$ins['status']=0;

			  }
			 }
			  $ins['date_register']=date('Y-m-d');
			  $insert=$this->Common_model->insert('users',$ins);
			  if($insert)
			  {
			  		$this->session->set_userdata('reffrence_id','');
			  		$this->session->set_userdata('succ_msg','You Have successfully registered with us.please log in now.');
			  		//redirect(base_url().'index.php/welcome/register');
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
				//redirect(base_url().'index.php/welcome/register');
			 }
			  
			}
			else
			{
				
				$this->session->set_userdata('err_msg','Please fill All required fields Properly.');
				//redirect(base_url().'index.php/welcome/register');
			}
		}

		$data['header']=$this->load->view('includes/header','',true);
		$data['footer']=$this->load->view('includes/footer','',true);
		$data['middle']=$this->load->view('includes/middle.php','',true);
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
						$cookie1= array(
						'name'   => 'email',
						'value'  => $email,
						'expire' => '86500',
						);
						
						$cookie2= array(
						'name'   => 'password',
						'value'  => $pass,
						'expire' => '86500',
						);
						$cookie= array(
						'name'   => 'rem',
						'value'  => 1,
						'expire' => '86500',
						);
						$this->input->set_cookie($cookie1);
                                                $this->input->set_cookie($cookie2);
                                                $this->input->set_cookie($cookie);
					}
                                             else
                                             {
                                               $cookie1= array(
						'name'   => 'email',
						'value'  => '',
						'expire' => '86500',
						);
						
						$cookie2= array(
						'name'   => 'password',
						'value'  => '',
						'expire' => '86500',
						);
						$cookie= array(
						'name'   => 'rem',
						'value'  => '',
						'expire' => '86500',
						);
						$this->input->set_cookie($cookie1);
                                                $this->input->set_cookie($cookie2);
                                                $this->input->set_cookie($cookie);
                                             }
					$this->session->set_userdata('user_id',$log['uid']);
					$this->session->set_userdata('username',$log['username']);
                    redirect();exit();
				}
				else
				{
					$this->session->set_userdata('err_msg','You are not yet activated');
					redirect(base_url());
				}
			}
			else
			{
				$this->session->set_userdata('err_msg','You are not yet registered with us.please register');
				redirect(base_url());
			}
		}
	}


	
	
	public function logout()
	{
		$this->session->set_userdata('user_id','');
		$this->session->set_userdata('username','');
		$this->session->set_userdata('succ_msg','You have successfully Logout.');
		redirect();
                exit();
	}


	public function forget()
	{
		$data=array();
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if($_POST)
        {
               
	        if ($this->form_validation->run() == TRUE)
	        {
	            $email=$this->input->post('email');
	            $chk_email_exists=$this->Common_model->checkemailexists($email);
	            if($chk_email_exists==0)
	            {
	               //echo "Not rEGISTERED WITH US";
	               $this->session->set_userdata('err_msg','This Email Id Is Not Registered With Us.');
	            }	
	            else
	            {
                    $get_userid=$this->Common_model->getuserid($email);
                    $con=array('uid'=>$get_userid);
	            	$info=$this->Common_model->fetchinfo('users',$con,'row');
	            	$name=$info['fname']." ".$info['lname'];
	            	$token= md5($email);
	            	$token.="-".$get_userid;
	            	
	            	$msg='Hi '. $name .'!! <br> You Want To Reset Your Password<br> ';
	            	
	            	$msg.="<a href='".base_url()."index.php/welcome/resetpassword/".$token."'>Click Here To Reset</a>";
	            	$msg.="<br><br>Thanks Tier5 Team";
	            	//echo $msg; 
               
	                $this->email->from('hello@tier5.us'); 
			        $this->email->to($email); 
			        
			        $this->email->subject('Reset Password For Tier5 Affiliation Program');
					$this->email->message($msg);
			
					$mail=$this->email->send();
					
		           
					if ($mail)
					{
						$this->session->set_userdata('succ_msg','Check Your Email Id To Reset Password');
						redirect(base_url().'index.php/welcome');
					}
					else
					{
						$this->session->set_userdata('err_msg','Sorry! ');
						redirect(base_url().'index.php/welcome/forget');
					}
	             	
	             	exit;
	            }

	        }
	        else
	        {
	            //echo "off";
	            $this->session->set_userdata('err_msg','Please Enter A Proper Email Id.');
	        }
        }
        

		$data['header']=$this->load->view('includes/header','',true);
		$data['footer']=$this->load->view('includes/footer','',true);
		$data['middle']=$this->load->view('includes/middle','',true);
		$this->load->view('forget',$data);
        
       
        
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
            
            $email=$this->input->post('email');
            $name=$this->input->post('firstname');
            $name.=" ".$this->input->post('lastname');
            $msg=$name."<br>".$this->input->post('message');
            
            $this->email->from($email);
	        $this->email->to('hello@tier5.us');
	        $this->email->cc('sudiptamit1@gmail.com');  
	        
	        $this->email->subject('Customer Query');
			$this->email->message($msg);
	
			$mail=$this->email->send();
           
			if ($mail) {
				$this->session->set_userdata('succ_msg','Thank You for contacting us.your queries will be answered soon.');
				//redirect(base_url().'index.php/welcome/contact');
			}
			else
			{
				$this->session->set_userdata('err_msg','Sorry! unable to send your queries');
				//redirect(base_url().'index.php/welcome/contact');
			}
        }
        else
        {
            
          $this->session->set_userdata('err1_msg','Please fill the form Properly.');
         // redirect(base_url().'index.php/welcome/contact');
        }
    	}
		
		$data['header']=$this->load->view('includes/header','',true);
		$data['footer']=$this->load->view('includes/footer','',true);
		$data['middle']=$this->load->view('includes/middle','',true);
		$this->load->view('contact_us',$data);
	}

	public function resetpassword($token)
	{
        //$token="5300882c1f3ffbcc90e7eafe6ef2dd89-3";
        $get_explode=explode('-',$token);
        $email=$get_explode[0];
        $uid=$get_explode[1];
        $get_emailid=md5($this->Common_model->getemailid($uid));
        $data['s_email']='';
        if($get_emailid==$email)
        {
		    $data=array();
		    $this->form_validation->set_rules('new_pass', 'newpass', 'required');
		    $this->form_validation->set_rules('conf_pass', 'confpass', 'required');
		    $data['s_email']=$this->Common_model->getemailid($uid);  
		    if($_POST)
		    {  
		        if ($this->form_validation->run() == TRUE)
			    {  
			        $newpass=$this->input->post('new_pass');
			        $confpass=$this->input->post('conf_pass');
			        	
			        	if($newpass==$confpass)
			        	{
   							$con=array('uid'=>$uid);
   							$update['password']=md5($newpass);
			        		$update_password=$this->Common_model->update('users',$con,$update);
			        		if($update_password)
			        		{
			        			echo "done";
			        		}
			        		else
			        		{
			        			echo "Not Done";
			        		}
			        	}
			        	else
			        	{
			        		//echo "New Password and Confirm Password Are Not Same";
			        		$this->session->set_userdata('err_msg','New Password and Confirm Password Are Not Same.');
			        	}
		                
		                
			        }
		            else
		            {
		            	$this->session->set_userdata('err_msg','Please Enter New Password and Confirm Password.');
		                //echo "Please Enter New Password && Confirm Password";
		            }
		    }

			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$this->load->view('resetpassword',$data);      
        }
        else
        {
            echo "Page Not Found";
        }     
	}

}
