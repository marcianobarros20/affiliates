<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
		$this->load->helper('custom');
		$this->load->model('Common_model');
		$this->load->library('utility');
	}

	public function index()
	{
		$data=array();
		$referlcode=$this->input->get_post('aid');
		if($referlcode)
		{
						$cookie_ref= array(
						'name'   => 'reffrence_id',
						'value'  => $referlcode,
						'expire' => '604800',
						);
		$this->input->set_cookie($cookie_ref);			
		}
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
		$ref_id='';
		if($this->input->cookie('reffrence_id')!='')
		{
			$ref_id=$this->input->cookie('reffrence_id');
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
					$ins['country_id']=231;
					$ins['state_id']=$this->input->post('state');
					$ins['city_id']=$this->input->post('city');
					$ins['address']=$this->input->post('address');
					$ins['latitude']=$this->input->post('lattitude');
					$ins['longitude']=$this->input->post('longitude');
			  
					if($ref_id!='')
			  		{
			  			$get_explode=explode('-',$ref_id);
			  			$ins['parent_id']=$get_explode[2];
			  			$ins['refferalparent']=$ref_id;
			  			$ins['status']=1;
			  		}
			  		else
			  		{
			  			$ins['status']=0;
			 		}
			 		$ins['date_register']=date('Y-m-d');
			 		$insert=$this->Common_model->insert('users',$ins);
			  		if($insert)
			 	    {
			  	//echo $insert;exit;
			  			if($ref_id!='')
			        	{
				        	$con2=array('uid'=>$insert);
				        	$update['refferalcode']='Ref-'.time().'-'.$insert;
				        	$this->Common_model->update('users',$con2,$update);
			        	}
			  			$cookie_ref= array(
						'name'   => 'reffrence_id',
						'value'  => '',
						'expire' => '604800',
						);
						$this->input->set_cookie($cookie_ref);			
			  			$this->session->set_userdata('succ_msg','You Have successfully registered with us.please log in now.');
			  			//redirect(base_url().'index.php/welcome/register');
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
				
				$this->session->set_userdata('err_msg','Please fill All required fields Properly.');
				redirect(base_url().'welcome/register');
			}
		}
		$data['country']=$this->Common_model->fetchinfo('countries','','result');
		$data['states']=$this->Common_model->fetchinfo('states',array('country_id'=>231),'result');
		
		$data['header']=$this->load->view('includes/header','',true);
		$data['footer']=$this->load->view('includes/footer','',true);
		//$data['middle']=$this->load->view('includes/middle','',true);
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
                    redirect(base_url().'welcome/dashboard');
                    exit();
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


	public function dashboard()
	{
		if($this->session->userdata('user_id')!='')
		{
			$data=array();
			
			$u_id=$this->session->userdata('user_id');
			$con=array('uid'=>$u_id);
			$con1=array('parent_id'=>$u_id);
			$data['fetch_child']=$this->Common_model->fetchinfo('users',$con1,'result');
			$data['fetch_allinfo']=$this->Common_model->fetchinfo('users',$con,'row');
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$data['middle']=$this->load->view('includes/middle','',true);

			$this->load->view('dashboard',$data);
		}
		else
		{
			$this->session->set_userdata('err_msg','You are Not Yet Logged In.');
			redirect();exit();
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

    public function editprofile()
	{
		if($this->session->userdata('user_id'))
		{
			$u_id=$this->session->userdata('user_id');
			$con=array('uid'=>$u_id);
			$data['states']=$this->Common_model->fetchinfo('states',array('country_id'=>231),'result');
			$data['fetch_allinfo']=$this->Common_model->fetchinfo('users',$con,'row');
			$data['header']=$this->load->view('includes/header','',true);
			$data['footer']=$this->load->view('includes/footer','',true);
			$data['middle']=$this->load->view('includes/middle','',true);
			$this->load->view('edit_profile',$data);
		}
		else
		{
			redirect();exit();
		}
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
	            	
	            	$msg='Hi '. $name .'!! <br>To Reset Your Password Please Click on The below Link.<br> ';
	            	
	            	$msg.="<a href='".base_url()."welcome/resetpassword/".$token."'>Click Here To Reset</a>";
	            	$msg.="<br><br>Thanks Tier5 Team";
	            	$sub="Reset Password";
					
		           $mail=$this->utility->sendMail($email,$sub,$msg);
					if ($mail)
					{
						$this->session->set_userdata('succ_msg','Check Your Email Id To Reset Password');
						redirect(base_url().'welcome/forget');
					}
					else
					{
						$this->session->set_userdata('err_msg','Sorry! Mail Sending failed ');
						redirect(base_url().'welcome/forget');
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


	public function update_profile()
	{
		$u_id=$this->session->userdata('user_id');
		$con=array('uid'=>$u_id);
		if($_POST)
		{
			//echo '<pre>';print_r($_POST);exit;
			/* image upload start */
             $image1="";
			 $image=$this->Common_model->fetchinfo('users',$con,'row');
			 $profile_img=$image['profile_image'];
			 $f_resize='';
			 if($_FILES['fileToUpload']['size']!=0)
			 {
			 	
                $img_size=getimagesize($_FILES['fileToUpload']['tmp_name']);
                
                if($img_size[0] >=220 && $img_size[1] >=150)
                {
				    $this->load->library('image_lib');
					$time=time();
				    $config['upload_path'] ='./profile_img/';
					$config['file_name']=$time;
					$config['overwrite']='TRUE';
					$config['allowed_types']='jpg|jpeg|gif|png|PNG';
					$config['max_size']='2000';
									
					$this->load->library('upload', $config);
					if( ! $this->upload->do_upload('fileToUpload'))//initialize
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
						$config['maintain_ratio'] = False;
						$config['height']=150;
						$config['width']=220;
						$config['new_image'] = './profile_img/thumb/'.$f_resize;
						$config['source_image']="./profile_img/".$f_resize;
						
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
					
			           
					}

				}
				else
				{
					$this->session->set_userdata('err_msg','Profile updation failed due to violation of maintain of recomended image size');
			    	redirect(base_url().'welcome/editprofile');
				}
			}
/* image upload end */


			 if($f_resize)
			            {
				            	if($profile_img)
				            	{
				            		unlink('./profile_img/thumb/'.$profile_img);
				            		unlink('./profile_img/'.$profile_img);
				            		$image1=$f_resize;
				            	}
				                else
				                {
				                   $image1=$f_resize;
				                }
			            }
			            else
			            {

				            	if($profile_img)
				            	{
				            		$image1=$profile_img;
				            	}
				               
			            }
            $data['fname']=$this->input->post('edit_first_name');
			$data['lname']=$this->input->post('edit_last_name');
		    $data['description']=$this->input->post('edit_description');
			$data['country_id']=231;
			$data['state_id']=$this->input->post('state');
			$data['city_id']=$this->input->post('city');
			$data['address']=$this->input->post('address');
			$data['latitude']=$this->input->post('lattitude');
			$data['longitude']=$this->input->post('longitude');
					

		    $edit_profile=$this->Common_model->update('users',$con,$data);
		    if($edit_profile)
		    {
		    	$this->session->set_userdata('succ_msg','Successfully updated your profile');
		    	redirect(base_url().'welcome/editprofile');
		    }
		    else
		    {
		    	redirect(base_url().'welcome/editprofile');
		    }
  
		}
	}

	public function change_password()
	{
            $u_id=$this->session->userdata('user_id');
		
		if($_POST)
		{
			$oldpassword=md5($this->input->post('old_password'));
			$con=array('uid'=>$u_id,'password'=>$oldpassword);
			
			$newpassword=md5($this->input->post('new_password'));
			$confpassword=md5($this->input->post('conf_password'));

			$data['password']=$newpassword;
			
			if($newpassword==$confpassword)
			{
			    $edit_password=$this->Common_model->update('users',$con,$data);
			    if($edit_password)
			    {
			    $this->session->set_userdata('succ_msg','password updated successfully');
		    	redirect(base_url().'welcome/editprofile');
			    }
			    else
			    {
			    	$this->session->set_userdata('err_msg','password updation failed');
		    	redirect(base_url().'welcome/editprofile');
			    }
		    }
		}
	}




    public function contact($ref_id='')
	{
		/*if($ref_id!='')
		{
		$this->session->set_userdata('reffrence_id',$ref_id);
	    }*/
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
            $msg=$this->input->post('message');

            $to="hello@tier5.us";
            $sub='Affiliate Lead';
            
			//mail('sudiptatier5@gmail.com','hello','hi');
            $mail=$this->utility->sendMailtoAdmin($email,$name,$to,$sub,$msg);
			
			$mail1=$this->utility->sendMailtoAdmin($email,$name,'sudiptatier5@gmail.com',$sub,$msg);
			$mail2=$this->utility->sendMailtoAdmin($email,$name,'iamgargi92@gmail.com',$sub,$msg);
			$mail4=$this->utility->sendMailtoAdmin($email,$name,'work@tier5.us',$sub,$msg);
           
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
			        			$this->session->set_userdata('succ_msg','Reset Password Done Successfully.');
			        		}
			        		else
			        		{
			        			
			        			$this->session->set_userdata('err_msg','Error occured while changing password.');
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

	public function add_course()
	{
		if($_POST)
		{
          
            $new_course=$this->input->post('new_course_name');
            $new_course_description=$this->input->post('new_course_description');
            if(trim($new_course) &&  trim($new_course_description))
            {
            $data['courses_name']=$new_course;
            $data['description']=$new_course_description;
            $data['status']=0;
            $insert=$this->Common_model->insert('courses',$data);
            	if($insert)
		        {
		            $this->session->set_userdata('succ_msg',"Course Added Successfully");
		            redirect(base_url().'admin/courses/add_class_and_course');
		        }
          		else
         		{
            	    $this->session->set_userdata('err_msg',"Try Again");
                    redirect(base_url().'admin/courses/add_class_and_course');
                }
            }
		}

	}

	public function add_class()
	{
		if($_POST)
		{
			$course_id=$this->input->post('course_id');
			$new_class_name=$this->input->post('new_class_name');
			$description=$this->input->post('new_class_description');
			$media_type=$this->input->post('course_media');
			    
			if(trim($course_id) &&  trim($new_class_name) && trim($description) && trim($media_type)=='')
		    {
		            $data['course_id']=$course_id;
		            $data['cl_name']=$new_class_name;
		            $data['description']=$description;
		            $data['status']=0;
		            $insert=$this->Common_model->insert('class',$data);
		            	if($insert)
				        {
				            $this->session->set_userdata('succ_msg',"Class Added Successfully");
				            redirect(base_url().'admin/courses/add_class_and_course');
				        }
		          		else
		         		{
		            	    $this->session->set_userdata('err_msg',"Try Again");
		                    redirect(base_url().'admin/courses/add_class_and_course');
		                }
		    }	
			else
			{
				redirect(base_url().'admin/courses/add_class_and_course');
			}	
	    }
    }
}