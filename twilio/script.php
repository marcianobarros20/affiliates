<?php 

require_once('./connection.php');
$base= $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
//exit;

if($_POST)
{
	$result=0;
  $id=$_POST['id'];
  $query = "SELECT * FROM `chat_channel` where `channel_id`='".$id."'";
	$results = mysql_query($query);
	$row = mysql_fetch_assoc($results);
	if($row)
	{
		echo $id;
	}
	else
	{
		$query="INSERT INTO `chat_channel` (`id`, `channel_id`) VALUES (NULL, '".$id."');";
		mysql_query($query);
		echo $result;
	}
}
?>