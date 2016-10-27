<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaderboard extends CI_Controller {

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
		    $this->load->view('admin/viewleaderboard',$data);
		}
	}

	public function viewleaderboard($start_date='')
	{
		if (!$this->session->userdata('adminid'))
		{
			redirect(base_url()."admin/welcome/login");
		}
		else

		{

            if($start_date!='')
            {

				$days_ago = date('Y-m-d', strtotime('-7 days', strtotime($start_date)));
                $date=$days_ago;
                $ts = strtotime($date);
                $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
                $last_week_start = date('Y-m-d', $start);
                $last_week_end = date('Y-m-d', strtotime('next saturday', $start));
				
		    }
		    else
		    {

                $previous_week = strtotime("-1 week +1 day");
	            $start_week = strtotime("last sunday midnight",$previous_week);
			    $end_week = strtotime("next saturday",$start_week);
	            $last_week_start = date("Y-m-d",$start_week);
			    $last_week_end = date("Y-m-d",$end_week);
		    }

		    $data['get_leader_board']=$this->Common_model->get_leader_board($last_week_start,$last_week_end);
			$data['last_week_start']=$last_week_start;
			$data['last_week_end']=$last_week_end;


			$data['header']=$this->load->view('admin/includes/header','',true);
			$data['footer']=$this->load->view('admin/includes/footer','',true);
			$data['rightsidebar']=$this->load->view('admin/includes/rightsidebar','',true);
			$data['leftsidebar']=$this->load->view('admin/includes/leftsidebar','',true);
		    $this->load->view('admin/viewleaderboard',$data);
				
		}
	}

	public function manage_leader_board()
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
			$this->load->view('admin/manageleaderboard',$data);
		}
	}

	
		
}
?>
