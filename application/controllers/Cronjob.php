<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjob extends CI_Controller
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
		$this->load->model('Cronjob_model');
		$this->load->library('utility');
	}

    public function new_leaderboard()
	{
	 	$con['status']=1;
	 	$all_active_affiliate=$this->Cronjob_model->fetchinfo('users',$con,'result');
	    foreach ($all_active_affiliate as $key)
	    {
	    	$previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
		    $end_week = strtotime("next saturday",$start_week);
            $last_week_start = date("Y-m-d",$start_week);
		    $last_week_end = date("Y-m-d",$end_week);

		    $previous_last_week = strtotime("-2 week +1 day");
            $start_last_week = strtotime("last sunday midnight",$previous_last_week);
		    $end_last_week = strtotime("next saturday",$start_last_week);
            $previous_last_week_start = date("Y-m-d",$start_last_week);
		    $previous_last_week_end = date("Y-m-d",$end_last_week);
       

 
	    	$data['userid']=$key['uid'];
	    	$data['week_start_date']=$last_week_start;
	    	$data['week_end_date']=$last_week_end;
	    	//$data['rank']=

	    	$data['existing_affiliate']=$this->Cronjob_model->get_all_exsisting_affiliate($previous_last_week_end,$key['uid']);
	    	$data['new_affiliate']=$this->Cronjob_model->get_last_weeks_affiliate($last_week_start,$last_week_end ,$key['uid']);
	    	$data['existing_downstream']=$this->Cronjob_model->downstream_count($key['uid'],$previous_last_week_end);
	    	$data['new_downstream']=$this->Cronjob_model->new_downstream_count($last_week_start,$last_week_end,$key['uid']);
	  
	    	$data['z-value']=.75;
	    	//$data['point']=(($data['existing_affiliate']/))

	    	$data1=$this->Cronjob_model->insert('weekly_rank',$data);
	    }
	}

	public function update_points()
	{   

		$previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
	    $end_week = strtotime("next saturday",$start_week);
        $last_week_start = date("Y-m-d",$start_week);
	    $last_week_end = date("Y-m-d",$end_week);
		$con['week_start_date']=$last_week_start;
		$con['week_end_date']=$last_week_end;
		$all_result=$this->Cronjob_model->fetchinfo('weekly_rank',$con,'result');
	    foreach ($all_result as $key)
	    {
	       $con2=array('lb_id'=>$key['lb_id']);
				        	

	       $update['point']=((1/2)*$key['z-value'])+((4/5)*(1-$key['z-value']));

	       $data1=$this->Cronjob_model->update('weekly_rank',$con2,$update);
		}
	}


	public function update_rank()
	{   
        $rank=0;
		$previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
	    $end_week = strtotime("next saturday",$start_week);
        $last_week_start = date("Y-m-d",$start_week);
	    $last_week_end = date("Y-m-d",$end_week);
		$con['week_start_date']=$last_week_start;
		$con['week_end_date']=$last_week_end;
		$all_result=$this->Cronjob_model->get_according_points($last_week_start,$last_week_end);
	    foreach ($all_result as $key)
	    {
	       $con2=array('lb_id'=>$key['lb_id']);
				        	
           $rank=$rank+1;
	       $update['rank']=$rank;

	       $data1=$this->Cronjob_model->update('weekly_rank',$con2,$update);
		}
	}

	/*public function update_date()
	{

		$all_result=$this->Cronjob_model->fetchinfo('weekly_rank','','result');
        foreach ($all_result as $key)
	    {
        $con2=array('week_end_date'=>'2016-10-29');
				        	
           
	       $update['week_end_date']='2016-10-22';

	       $data1=$this->Cronjob_model->update('weekly_rank',$con2,$update);
	    }
	}*/

	
	




}?>