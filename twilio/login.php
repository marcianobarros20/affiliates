<?php 

require_once('./connection.php');

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
		header("Location: http://localhost/affiliate_final/twilio/chat.php");
	}
	
print_r($_SESSION);
	}		
}
?>