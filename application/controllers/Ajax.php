<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

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
	}

	public function EmailExists()
	{
		if($_POST)
		{
			 $email=$this->input->post('email');
			 $is_exists=$this->Common_model->Fnemailexists($email);
			 if($is_exists>0)
			 {
			 	echo 1;
			 }	
			 else
			 {
			 	echo 2;
			 }
		}
	}



	public function UserExists()
	{
		if($_POST)
		{
			 $username=$this->input->post('username');
			 $is_exists=$this->Common_model->Fnuserxists($username);
			 if($is_exists>0)
			 {
			 	echo 1;
			 }	
			 else
			 {
			 	echo 2;
			 }
		}
	}


	public function blog_status()
	{
		if($_POST)
		{
			$id=$this->input->post('b_id');
			$status=$this->input->post('status');
			$update['status']=$status;
			$con=array('blog_id'=>$id);
			$up=$this->Common_model->update('blog',$con,$update);
			if($up)
			{
				echo 2;
			}
			

		}
	}



			public function change_status()
			{
			if($_POST)
			{

			$uid=$this->input->post('uid');
			$con=array('uid'=>$uid);
			$data['status']=$this->input->post('status');
			$update=$this->Common_model->update('users',$con,$data);
			return $update;

			}
			}

		public function delete_users()
		{
			if($_POST)
			{

			$uid=$this->input->post('uid');
			$con=array('uid'=>$uid);
			$data['status']=$this->input->post('status');
			$update=$this->Common_model->update('users',$con,$data);
            if($update)
            {
                $con1=array('parent_id'=>$uid);
                $data1['parent_id']=null;
                $data1['refferalparent']=null;
            	$update1=$this->Common_model->update('users',$con1,$data1);

            	if($update1)
            	{
            		return $update1;
            	}

            }

			//return $update;

			}
		}


			public function check_refferalcode()
			{
				if($_POST)
				{
					$refferalcode=$this->input->post('refferalcode');
					$con=array('refferalcode'=>$refferalcode,'status'=>1);
					$check_reff=$this->Common_model->fetchinfo('users',$con,'count');
                    if($check_reff>0)
                    {
                    	$get_parent_uid=$this->Common_model->fetchinfo('users',$con,'row');
                        $parent_id=$get_parent_uid['uid'];

                        $user_id=$this->input->post('uid');
                        $userid=array('uid'=>$user_id);
                        $data['refferalparent']=$refferalcode;
                        $data['parent_id']=$parent_id;
                        $data['status']=$this->input->post('status');
                        $data['refferalcode']='Ref-'.time().'-'.$user_id;


                        $update=$this->Common_model->update('users',$userid,$data);

                        if($update)
                        {
                            echo "Assigned Successful";
                        }
                        else
                        {
                            echo "Assigned Rejected";
                        }


                    }
                    else
                    {
                    	echo "No Such refferal Code";
                    }
				}
			}


			public function show_child_tier3()
			{


				//echo "child";
				if($_POST)
				{
					$user_id=$this->input->post('uid');
	                $parent_id=array('parent_id'=>$user_id);
	                $get_child=$this->Common_model->fetchinfo('users',$parent_id,'result');
	                $result="";
	                
	                if($get_child)
	                {
	                  $result.="<div> <h2> Tier 3</h2><br>";

	                	foreach ($get_child as $value)
	                	{
                           
                        $result.="Id:".$value['uid']."<br>Name:".$value['fname']." ".$value['lname']."<br>Email:".$value['email']."<br>Refferal Code:".$value['refferalcode']."<br><input type='button' Value='Show Tier2 Affiliates' onclick='show_child_tier2(".$value['uid'].")'><br><br>";
                        $result.="<div id='child_show_tier2".$value['uid']."'></div>";
	                	}
	                	$result.="</div>";
	                	echo $result;
	                }
	                else
                    {
                    	echo "No Affiliate Till Now";
                    }

	             }
	             else
	             {
	             	echo "No ";
	             }



			}

            public function show_child_tier2()
			{


				//echo "child";
				if($_POST)
				{
					$user_id=$this->input->post('uid');
	                $parent_id=array('parent_id'=>$user_id);
	                $get_child=$this->Common_model->fetchinfo('users',$parent_id,'result');
	                $result="";
	                
	                if($get_child)
	                {
	                  $result.="<div style='border: 10px solid #003366;padding-left: 50px; padding-right: 10px;'> <h3> Tier 2</h3><br>";

	                	foreach ($get_child as $value)
	                	{
                           
                        $result.="Id:".$value['uid']."<br>Name:".$value['fname']." ".$value['lname']."<br>Email:".$value['email']."<br>Refferal Code:".$value['refferalcode']."<br><input type='button' Value='Show Tier1 Affiliates' onclick='show_child_tier1(".$value['uid'].")'><br><br>";
                        $result.="<div id='child_show_tier1".$value['uid']."'></div>";
	                	}
	                	$result.="</div>";
	                	echo $result;
	                }
	                else
                    {
                    	echo "No Affiliate Till Now";
                    }

	             }
	             else
	             {
	             	echo "No ";
	             }

			}
            
            public function show_child_tier1()
			{


				//echo "child";
				if($_POST)
				{
					$user_id=$this->input->post('uid');
	                $parent_id=array('parent_id'=>$user_id);
	                $get_child=$this->Common_model->fetchinfo('users',$parent_id,'result');
	                $result="";
	                
	                if($get_child)
	                {
	                  $result.="<div style='border: 10px solid #003366; padding-left:50px; padding-right:10px;'> <h4> Tier 1</h4><br>";

	                	foreach ($get_child as $value)
	                	{
                           
                        $result.="Id:".$value['uid']."<br>Name:".$value['fname']." ".$value['lname']."<br>Email:".$value['email']."<br>Refferal Code:".$value['refferalcode']."<br><input type='button' Value='Show Tier0 Affiliates' onclick='show_child_tier0(".$value['uid'].")'><br><br>";
                        $result.="<div id='child_show_tier0".$value['uid']."'></div>";
	                	}
	                	$result.="</div>";
	                	echo $result;
	                }
	                else
                    {
                    	echo "No Affiliate Till Now";
                    }

	             }
	             else
	             {
	             	echo "No ";
	             }

			}

			public function show_child_tier0()
			{


				//echo "child";
				if($_POST)
				{
					$user_id=$this->input->post('uid');
	                $parent_id=array('parent_id'=>$user_id);
	                $get_child=$this->Common_model->fetchinfo('users',$parent_id,'result');
	                $result="";
	                
	                if($get_child)
	                {
	                  $result.="<div style='border: 10px solid #003366; padding-left:40px; padding-right:10px;'> <h5> Tier 0</h5><br>";

	                	foreach ($get_child as $value)
	                	{
                           
                        $result.="Id:".$value['uid']."<br>Name:".$value['fname']." ".$value['lname']."<br>Email:".$value['email']."<br>Refferal Code:".$value['refferalcode']."<br><br>";

	                	}
	                	$result.="</div>";
	                	echo $result;
	                }
	                else
                    {
                    	echo "No Affiliate Till Now";
                    }

	             }
	             else
	             {
	             	echo "No ";
	             }

			}

			public function approve()
			{

				if($_POST)
					{

						$user_id=$this->input->post('uid');
                        $userid=array('uid'=>$user_id);
						$data['status']=$this->input->post('status');
                     


                        $update=$this->Common_model->update('users',$userid,$data);

                        if($update)
                        {
                            echo "Assigned Successful";
                        }
                        else
                        {
                            echo "Assigned Rejected";
                        }
							
					}

			}

public function Fnoldpasswordchk()
{
	if($_POST)
	{
		$o_pass=$this->input->post('o_pass');
		$u_id=$this->session->userdata('user_id');
		$con=array('uid'=>$u_id,'password'=>md5($o_pass));
		$get_info=$this->Common_model->fetchinfo('users',$con,'count');
		if($get_info>0)
		{
			echo 2;
		}
		else
		{
			echo 1;
		}

			
	}
}


    public function assign_parent()
			{
				if($_POST)
				{
					$refferalcode=$this->input->post('refferalcode');
					$con=array('refferalcode'=>$refferalcode,'status'=>1);
					$check_reff=$this->Common_model->fetchinfo('users',$con,'count');
                    if($check_reff>0)
                    {
                    	$get_parent_uid=$this->Common_model->fetchinfo('users',$con,'row');
                        $parent_id=$get_parent_uid['uid'];

                        $user_id=$this->input->post('uid');
                        $userid=array('uid'=>$user_id);
                        $data['refferalparent']=$refferalcode;
                        $data['parent_id']=$parent_id;
                        


                        $update=$this->Common_model->update('users',$userid,$data);

                        if($update)
                        {
                            echo "Assigned Successful";
                        }
                        else
                        {
                            echo "Assigned Rejected";
                        }


                    }
                    else
                    {
                    	echo "No Such refferal Code";
                    }
				}
			}



			public function user_show_tier3()
			{ 

				if($_POST)
				{
					$parent_id=$this->input->post('uid');
					return $parent_id;
					/*$con=array('parent_id'=>$parent_id);

					$user_fetch_child=$this->Common_model->fetchinfo('users',$con,'result');
                    return $user_fetch_child;
                    foreach ($user_fetch_child as $value)
	                	{
 							echo $value['fname'];
	                	}*/

			    }

			}



	public function delete_to_active()
			{

				if($_POST)
					{

						$user_id=$this->input->post('uid');
                        $userid=array('uid'=>$user_id);
						$data['status']=$this->input->post('status');
                     


                        $update=$this->Common_model->update('users',$userid,$data);

                        if($update)
                        {
                            echo "Successfully Moved To Affiliate List";
                        }
                        else
                        {
                            echo "Unable To Move Affiliate List";
                        }
							
					}

			}



		public function Fngetdetails()
		{
			if($_POST)
			{
				$uid=$this->input->post('uid');
				$con=array('uid'=>$uid);
				$info=$this->Common_model->fetchinfo('users',$con,'row');
				$con1=array('uid'=>$info['parent_id']);
				$parent_info=$this->Common_model->fetchinfo('users',$con1,'row');
				if($info)
				{
					if($info['profile_image']!='')
                {
                    $img='profile_img/thumb/'.$info['profile_image'];
                }
                else
                {
                    $img='images/sample/no_photo.png';
                }

				 echo "<div class='col-md-12 col-lg-12'><div class='col-md-6 col-lg-6'><h3>Name: ".$info['fname'].' '.$info['lname']."</h3>
       			  </div><div class='col-md-6 col-lg-6'><img src='".$img."' alt=''></div></div><p><h4>Sponsor Name:</h4> ".$parent_info['fname']." ".$parent_info['lname']."</p><p><h4>Description:</h4> ".$info['description']."</p>";
       			}
        
			}
		}



		public function change_course_status()
		{
			if($_POST)
			{
               $course_id=$this->input->post('co_id');
               $course_status=$this->input->post('status');
			   $con=array('co_id'=>$course_id);
			   $data['status']=$course_status;
			   $update=$this->Common_model->update('courses',$con,$data);
               if($update)
				{
					echo 2;
				}
				else
				{
					 echo "";
				}
			}

		}


		
		public function change_class_status()
		{
			if($_POST)
			{
               $class_id=$this->input->post('cl_id');
               $class_status=$this->input->post('status');
			   $con=array('cl_id'=>$class_id);
			   $data['status']=$class_status;
			   $update=$this->Common_model->update('class',$con,$data);
               if($update)
				{
					echo 2;
				}
				else
				{
					 echo "";
				}
			}

		}

	public function delete_course($course_id)
	{
		
	    	$con=array('co_id'=>$course_id);
	    	$con1=array('course_id'=>$course_id);
	    	$count=$this->Common_model->fetchinfo('class',$con1,'count');
            if($count==0){
            $delete=$this->Common_model->delete($con,'courses');
        	if($delete)
           {
           	$this->session->set_userdata('del_succ_msg','course deleted successfully.');
           	redirect('admin/courses/edit_class_and_course');
           }
        	}
        	else
        	{
        		$this->session->set_userdata('del_err_msg','This course cannot be deleted as it already have class inside it.');
           	redirect('admin/courses/edit_class_and_course');
        	}
      }
		public function Fngetstates()
		{
			if($_POST)
			{
				$country_id=$this->input->post('country_id');
				$con=array('country_id'=>$country_id);
				$info_states=$this->Common_model->fetchinfo('states',$con,'result');
				$result='<option value="">Select State</option>';
				if(!empty($info_states))
				{
					foreach($info_states as $states){

						$result.='<option value="'.$states['id'].'">'.$states['name'].'</option>';
					}
					echo $result;
				}
			}
		}

		public function Fngetcity()
		{
			if($_POST)
			{
				$state_id=$this->input->post('state_id');
				$con=array('state_id'=>$state_id);
				$info_cities=$this->Common_model->fetchinfo('cities',$con,'result');
				$result='<option value="">Select City</option>';
				if(!empty($info_cities))
				{
					foreach($info_cities as $cities){

						$result.='<option value="'.$cities['id'].'">'.$cities['name'].'</option>';
					}
					echo $result;
				}
			}
		}

		function Fngetvideo()
		{
			$con=array('status'=>0);
			$info_video=$this->Common_model->fetchinfo('popup',$con,'row');
			$result='';
			if(!empty($info_video))
			{
				$result.="<object class='embed-responsive-item'>
     <video width='600px' height='500px' controls autoplay>
       <source src='".base_url()."popup_video/".$info_video['media']."'/>
     </video>
   </object>";
			}
			echo $result;
		}

		public function delete_class()
	    {
		if($_POST)
	    {
	    	$class_id=$this->input->post('co_id');
	    	$con=array('cl_id'=>$class_id);
            $delete=$this->Common_model->delete($con,'class');

            if($delete)
				{
					echo 1;
				}
				else
				{
					 echo "";
				}
	    }

    }


    public function findchild()
        {
        	if($_POST)
			{
        	
				$parent_id=$this->input->post('parent_id');
				//echo $parent_id;
				$con=array('parent_id'=>$parent_id,'status'=>1);
				$info_child=$this->Common_model->fetchinfo('users',$con,'result');
                //print_r($info_child) ;
                $result='';
                foreach ($info_child as $value) 
                {
                	//echo $value['fname'];
               $result.="<div class='btn btn-primary child_".$value['uid']."' data-toggle='collapse' onclick='show_child_1(".$value['uid'].",".$value['parent_id'].")'><i class='fa fa-plus-circle' aria-hidden='true'></i></div><span class='fancybox fancy-class' href='#chkline' title='Referal Code: ".$value['refferalcode']."' onclick='description(".$value['uid'].")'>".$value['fname']."</span>&nbsp;&nbsp;";
                   
                }
                echo $result;
            }
        }


        public function delete_image()
        {
        	if($_POST)
			{
				$training_id=$this->input->post('tr_id');
				$con=array('tr_id'=>$training_id);
				$info_image=$this->Common_model->fetchinfo('training_material',$con,'row');
				unlink('./tutorial/image/'.$info_image['media']);
				$del=$this->Common_model->delete($con,'training_material');
				if($del)
				{
					echo 1;
				}
				else
				{
					echo 2;
				}
        	}
        }



        public function delete_file()
        {
        	if($_POST)
			{
				$training_id=$this->input->post('tr_id');
				$con=array('tr_id'=>$training_id);
				$info_file=$this->Common_model->fetchinfo('training_material',$con,'row');
				unlink('./tutorial/text_file/'.$info_file['media']);
				$del=$this->Common_model->delete($con,'training_material');
				if($del)
				{
					echo 1;
				}
				else
				{
					echo 2;
				}
        	}
        }


       

        public function delete_media()
        {
        	if($_POST)
			{
				$training_id=$this->input->post('tr_id');
				$con=array('tr_id'=>$training_id);
				$info_file=$this->Common_model->fetchinfo('training_material',$con,'row');
				unlink('./tutorial/video_audio/'.$info_file['media']);
				$del=$this->Common_model->delete($con,'training_material');
				if($del)
				{
					echo 1;
				}
				else
				{
					echo 2;
				}
        	}
        }

}
?>