<?php 

require_once('./connection.php');
$base= $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
//exit;

if($_POST)
{
  	$email=$_POST['email'];
	$password=$_POST['pass'];
	if($email!='' && $password!='')
	{

	$query = "SELECT * FROM `users` WHERE `email` = '".$email."' and `password` = '".md5($password)."'";
	$results = mysql_query($query);
	$row = mysql_fetch_assoc($results);
	

	if($row)
	{
		$_SESSION['username'] = $row['fname']." ".$row['lname'];
		$_SESSION['log_in']=1;	
		header("Location: ".$base."chat.php");
	}
	
	else
	{
		header("Location: ".$base);
	}

	}		
}
?>