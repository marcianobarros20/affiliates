<?php 

require_once('./connection.php');
echo $base= $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];

exit;
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
	

	}		
}
?>