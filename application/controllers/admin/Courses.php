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
			$this->load->view('admin/add_class',$data);
		}
	}


	public function add_class()
	{
		if($_POST)
		{
			$course_id=$this->input->post('course_id');
			$new_class_name=$this->input->post('new_class_name');
			$description=$this->input->post('new_class_description');
			

           // echo "<pre>"; print_r($_FILES['user_file']) ;

            	//echo count($_FILES['user_file']['name']);

            // exit;

                $data['course_id']=$course_id;
		        $data['cl_name']=$new_class_name;
		        $data['description']=$description;
		        $data['status']=0;

		        $insert=$this->Common_model->insert('class',$data);

		        if($insert)
		        {
            


$number_of_files = sizeof($_FILES['user_file']['tmp_name']);
    // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
$insert_material=0;
if($number_of_files>0){
$files = $_FILES['user_file'];
$this->load->library('upload');
$time=time();
      // next we pass the upload path for the images
			$config['upload_path'] = './tutorial/image/';
			$config['file_name']=$time;
			$config['overwrite']='TRUE';
			$config['allowed_types']='jpg|jpeg|gif|png|PNG';
			$config['max_size']='2000';
			 for($i=0;$i<$number_of_files;$i++)
				{ 
		$_FILES['user_file']['name'] = $files['name'][$i];
        $_FILES['user_file']['type'] = $files['type'][$i];
        $_FILES['user_file']['tmp_name'] = $files['tmp_name'][$i];
        $_FILES['user_file']['error'] = $files['error'][$i];
        $_FILES['user_file']['size'] = $files['size'][$i];
        //now we initialize the upload library
        $this->upload->initialize($config);
        // we retrieve the number of files that were uploaded
        if ($this->upload->do_upload('user_file'))
        {
          $data['uploads'][$i] = $this->upload->data();

		  $f_resize=$data['uploads'][$i]['file_name'];
        }
        else
        {
          $data['upload_errors'][$i] = $this->upload->display_errors();
        }

        		$data1['class_id']=$insert;
		        $data1['media']=$f_resize;
		        $data1['type']=1;
		        $data1['status']=0;

		        $insert_material=$this->Common_model->insert('training_material',$data1);
				
		        	
				}

          }

          if($insert_material>0)
		        	{
		        		$this->session->set_userdata('succ_msg','class added successfully!!!');
		        		redirect(base_url().'admin/courses/add_class_and_course');
		        	}
		        	else
		        	{
		        		redirect(base_url().'admin/courses/add_class_and_course');
		        	}


      }


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

    public function view_course($co_id)
    {		
			 $con=array('co_id'=>$co_id);
			 $con1=array('course_id'=>$co_id);
			 $data['header']=$this->load->view('admin/includes/header','',true);
			 $data['footer']=$this->load->view('admin/includes/footer','',true);
			 $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
			 $data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
			 $data['course_details']=$this->Common_model->fetchinfo('courses',$con,'row');
              
             
			 $data['class_details']=$this->Common_model->fetchinfo('class',$con1,'result');
			 $this->load->view('admin/details_course',$data);
    }

    public function view_class($cl_id)
    {		
			 $con=array('cl_id'=>$cl_id);
			 $data['class_details']=$this->Common_model->fetchinfo('class',$con,'row');
			 $data['header']=$this->load->view('admin/includes/header','',true);
			 $data['footer']=$this->load->view('admin/includes/footer','',true);
			 $data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
			 $data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
			 
             $this->load->view('admin/details_class',$data);	 
    }


    public function edit_course($co_id)
    {

	    	$con=array('co_id'=>$co_id);
	    	//print_r($con);
	    	if($_POST)
	    	{
	    		//print_r($_POST);exit;
	    		$data1['courses_name']=$this->input->post('course_name');
	    		$data1['description']=$this->input->post('course_description');
	    		$this->Common_model->update('courses',$con,$data1);
	    	  }
	    	$data['course_details']=$this->Common_model->fetchinfo('courses',$con,'row');
	    	$data['header']=$this->load->view('admin/includes/header','',true);
			$data['footer']=$this->load->view('admin/includes/footer','',true);
			$data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
			$data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
			 
            $this->load->view('admin/edit_course',$data);
	    
      
    }

    public function edit_class($cl_id)
    {
    	$con=array('cl_id'=>$cl_id);
         
        $con1=array('class_id'=>$cl_id, 'type'=>1);
        $con2=array('class_id'=>$cl_id, 'type'=>2); 
        $con3=array('class_id'=>$cl_id, 'type'=>3); 
        $data['training_image']=$this->Common_model->fetchinfo('training_material',$con1,'result');	
        $data['training_audio_video']=$this->Common_model->fetchinfo('training_material',$con2,'result');
        $data['training_file']=$this->Common_model->fetchinfo('training_material',$con3,'result');	
    	$data['class_details']=$this->Common_model->fetchinfo('class',$con,'row');
	    $data['header']=$this->load->view('admin/includes/header','',true);
		$data['footer']=$this->load->view('admin/includes/footer','',true);
		$data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
		$data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
			 
        $this->load->view('admin/edit_class',$data);
    	
    }


	
}





?>
