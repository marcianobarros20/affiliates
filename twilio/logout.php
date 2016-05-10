<?php 
		 $base= $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
		session_start();
		$_SESSION['username'] ='';
		$_SESSION['log_in']='';	
		header("Location: ".$base);
	
?>