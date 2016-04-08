<?php
class Utility
{
 	protected $CI;
	public function __construct($rules = array())
	{
		$this->CI =& get_instance();
	}
	function showMsg()
	{
	     if($this->CI->session->userdata('msg'))
	     {
		     echo '<div style="clear:both;"></div><div class="'.$this->CI->session->userdata('class').'">'.$this->CI->session->userdata('msg').'</div><div style="height:10px;">&nbsp;</div>';
		     $this->CI->session->unset_userdata('msg');
			 $this->CI->session->unset_userdata('class');
	     }
	}
	function setMsg($str,$type)
	{
		$this->CI->session->set_userdata('msg',$str);
		if($type=='SUCCESS')
		{
		$this->CI->session->set_userdata('class','succ_msg');
		}
		if($type=='ERROR')
		{
			$this->CI->session->set_userdata('class','err_msg');
		}
		
	}
	
	function showMsglogin()
	{
	     if($this->CI->session->userdata('msg_log'))
	     {
		     echo '<div style="clear:both;"></div><div class="'.$this->CI->session->userdata('class').'">'.$this->CI->session->userdata('msg_log').'</div><div style="height:10px;">&nbsp;</div>';
		     $this->CI->session->unset_userdata('msg_log');
			 $this->CI->session->unset_userdata('class');
	     }
	}
	
	function setMsglogin($str,$type)
	{
		$this->CI->session->set_userdata('msg_log',$str);
		$this->CI->session->set_userdata('class','succ_msg_log');
		if($type=='ERROR')
			$this->CI->session->set_userdata('class','err_msg_log');
	}
	function sendMail($to,$sub,$body)
	{
		
	      $CI =& get_instance();
	  
	   
	  
		$this->CI->load->library('email');
		$this->CI->email->set_mailtype("html");
		$this->CI->email->from('noreply@tier5.us', 'tier5');
		$this->CI->email->to($to); 
		$this->CI->email->subject($sub);
		$cont='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" />
			<title>Untitled Document</title>
		</head>
		<body>
			<div style="width:500px; float:left; background:#fff; border:1px dashed #669932;">
			<div style="text-align:center;padding:10px;background-color: white;"><a href="'.base_url().'">
			<img src="'.base_url().'images/logo_trans_small.png" border="0" align="middle"/></a></div>
			<div style="font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:15px; color:#000000; width:480px; padding:10px; margin: 0; border-top:1px dashed #669932;">
			<div style="color:#000000;">'.$body.'</div>
			</div>
			</div>
		</body>
		</html>';
		$this->CI->email->message($cont);
		return $this->CI->email->send();
	}


	

	
	
	function sendMailtoAdmin($from,$from_name,$to,$sub,$body)
	{
	  $this->CI->load->library('email');
	  $this->CI->email->set_mailtype("html");
	  $this->CI->email->from($from,$from_name);
	  $this->CI->email->to($to); 
	  $this->CI->email->subject($sub);
	  $cont='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	  <html xmlns="http://www.w3.org/1999/xhtml">
	  <head>
	   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <title>Untitled Document</title>
	  </head>
	
	  <body>
		<div style="width:500px; float:left; background:#fff; border:1px dashed #669932;">
		 <div style="text-align:center;padding:10px;"><a href="'.base_url().'">
		 <img src="'.base_url().'images/logo_trans_small.png" border="0" align="middle"/></a></div>
		 <div style="font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:15px; color:#f5673b; width:480px; padding:10px; margin: 0; border-top:1px dashed #669932;">
		   <div style="color:#f5673b;">'.$body.'</div>
	     </div>
	    </div>
	  </body>
	 </html>';
	 $this->CI->email->message($cont);
	 return $this->CI->email->send();
	}
	function pagination($target,$total_rows,$per_page,$uri=3,$search=null)
    {
	//echo $total_rows;
		$this->CI->load->library('pagination');
        $config['base_url'] = $target;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page; 
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['uri_segment'] = $uri;
        $this->CI->pagination->initialize($config); 
        return $this->CI->pagination->create_links($search);
    }
	
	/*function facebookLogout()
	{
		$config =array(
			'appId'  => '1581006222149465',
			'secret' => 'c9a0c71d10b344d2c68ce2075b0cc07b',
			);
		$this->CI->load->library('Facebook',$config);
		$this->CI->facebook->destroySession();
		$this->CI->facebook->getLogoutUrl(array( 'next' => base_url().'registration/logout'));
    }*/
}
?>