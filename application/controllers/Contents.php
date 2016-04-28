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

	public function affiliate_training()
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect(base_url().'welcome');
		}
		else
		{   $data['set_code']='';
		    $u_id=$this->session->userdata('user_id');
			$con=array('parent_id'=>$u_id);
			$data['fetch_child']=$this->Common_model->fetchinfo('users',$con,'result');
		    $con1=array('status'=>0);
		    $data['fetch_course']=$this->Common_model->fetchinfo('courses',$con1,'result');

		    
			$data['header']=$this->load->view('includes/header.php',$data,true);
			$data['footer']=$this->load->view('includes/footer.php','',true);
			
			$this->load->view('affiliate_training',$data);
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
		//$data['training_material']=$this->Common_model->fetchinfo('training_material',$con1,'result');
		$data['tr_status']=$this->Common_model->fnchktrainingcompleted($co_id);
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$this->load->view('class',$data);
		}
	}

	public function quiz($co_id)
	{

		if($this->session->userdata('user_id')=='')
		{
			redirect(base_url().'welcome');
		}
		else
		{
		$data['set_code']='';
		
		$tr_status=$this->Common_model->fnchktrainingcompleted($co_id);
		if($tr_status==1)
		{
			redirect(base_url().'contents/classinfo/'.$co_id);
		}else
		{

		$cur_ans=0;
		
		$data['test_result_final']='';
		$con=array('co_id'=>$co_id);
		$con1=array('course_id'=>$co_id);
		$data['CourseName']=$this->Common_model->fetchinfo('courses',$con,'row');
		$data['tot_ques']=$this->Common_model->fetchinfo('quize_ques',$con1,'count');
		
		

		if($_POST)
		{
			$con_time_info=array('co_id'=>$co_id,'u_id'=>$this->session->userdata('user_id'));
			$get_time_info=$this->Common_model->fetchinfo('time',$con_time_info,'row');
			$t_diff=(time()-$get_time_info['time']);
			/*if($t_diff>=3600)
			{
				$hr=($t_diff/3600);
				$min_test=($t_diff%3600);
				if($min_test!=0)
				{
					$min=$min_test;
				}
				else
				{
					$min=0;
				}
			}
			else
			{
				$min=
			}*/
			$final_time=$t_diff;
			$cur_ans=$this->input->post('to_currect_ans');

			if(strtoupper($this->input->post('answers'))==strtoupper($this->input->post('quiz')))
			{
				$data['to_currect_ans']=$this->input->post('to_currect_ans')+1;
				$cur_ans=$cur_ans+1;
			}
		$time1=time()-$this->input->post('time');
		$data['serial_no']=$this->input->post('serl_no')+1;
		$con2=array('course_id'=>$co_id,'qid >'=>$this->input->post('qnumber'));
		$data['info_ques']=$this->Common_model->fetchinfo('quize_ques',$con2,'row');	
		
		if(!empty($data['info_ques']))
		{
		if($data['info_ques']['type']==1)
		{
			$con_op=array('question_id'=>$data['info_ques']['qid']);
			$data['info_options']=$this->Common_model->fetchinfo('answer_quize',$con_op,'result');
		}
		else
		{
			$data['info_options']='';
		}
		}
		else
		{
			$con_test=array('co_id'=>$co_id,'u_id'=>$this->session->userdata('user_id'));
			$Fnalreadytakentest=$this->Common_model->fetchinfo('quiz_test_result',$con_test,'row');
			if(empty($Fnalreadytakentest))
			{
			$ins['co_id']=$co_id;
			$ins['u_id']=$this->session->userdata('user_id');
			$ins['tot_ques']=$data['tot_ques'];
			$ins['curr_ans']=$cur_ans;
			$insert_test=$this->Common_model->insert('quiz_test_result',$ins);
			}
			else
			{
				$up['curr_ans']=$cur_ans;
				$insert_test=$this->Common_model->update('quiz_test_result',$con_test,$up);
			}
			
			$get_test_result=$this->Common_model->fetchinfo('quiz_test_result',$con_test,'row');
			
			$data['test_result_final']=$get_test_result;
		}

	    }
	    else
	    {
	    $final_time=0;
		$ins_time['time']=time();
		$ins_time['u_id']=$this->session->userdata('user_id');
		$ins_time['co_id']=$co_id;
		$con_time_info=array('co_id'=>$co_id,'u_id'=>$this->session->userdata('user_id'));
		$this->Common_model->delete($con_time_info,'time');
		$time_ins_id=$this->Common_model->insert('time',$ins_time);
		$data['serial_no']=1;	
		$data['info_ques']=$this->Common_model->fetchinfo('quize_ques',$con1,'row');	
		if($data['info_ques']['type']==1)
		{
			$con_op=array('question_id'=>$data['info_ques']['qid']);
			$data['info_options']=$this->Common_model->fetchinfo('answer_quize',$con_op,'result');
		}
		else
		{
			$data['info_options']='';
		}

		}
		$data['time']=$final_time;
		$data['to_currect_ans']=$cur_ans;
		$data['header']=$this->load->view('includes/header.php',$data,true);
		$data['footer']=$this->load->view('includes/footer.php','',true);
		$this->load->view('quiz',$data);
		


		}
		}
	}


	public function fetchcourseinfo()
	{
		if($_POST)
		{
            $count="";
			$user_id=$this->input->post('u_id');
			$course_id=$this->input->post('co_id');
			$con=array('u_id'=>$user_id,'co_id'=>$course_id);
			$completion_status=$this->Common_model->fetchinfo('training_details',$con,'result');
            $con1=array('course_id'=>$course_id);
			$class_under_course=$this->Common_model->fetchinfo('class',$con1,'count');
			//print_r($completion_status);
			//print_r($class_under_course);
			$per_class=80/$class_under_course;
			//print_r($per_class);
			$class_under_course=$this->Common_model->fetchinfo('class',$con1,'result');
			foreach ($class_under_course as $value) 
			{
				//echo $value['cl_id'];
				
				//echo "<pre>";
				$con2=array('class_id'=>$value['cl_id']);
				$total_training_material=$this->Common_model->fetchinfo('training_material',$con2,'count');
				//print_r($total_training_material);
				$con3=array('u_id'=>$user_id,'cl_id'=>$value['cl_id']);
				$training_completed_user=$this->Common_model->fetchinfo('training_details',$con3,'count');
				//echo "<pre>";
				
				$left_course=($total_training_material-$training_completed_user);
				if($left_course>0)
				{

                   $count=$count+$per_class;

				}
				else
				{
                   $x=(($training_completed_user/$total_training_material)*$per_class);
                   $count=$count+$x;
				}
			    //print_r($a);
                // $count=$count+$a;
			   // print_r($count);

			}
			
             echo $count;
		}
	}

}
?>
