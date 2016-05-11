<?php 
$db=require_once('./connection.php');

//print_r($_SESSION);
if($_SESSION['username']=='')
{
   $base= $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));

  header("Location: ".$base);
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Chat Room</title>
  <base href="<?php echo  $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));?>">
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="index.css">
   <script src="//media.twiliocdn.com/sdk/rtc/js/ip-messaging/v0.9/twilio-ip-messaging.min.js"></script>
  <script src="//media.twiliocdn.com/sdk/js/common/v0.1/twilio-common.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="index.js"></script>
</head>
<body>
  <header>
 
  </header>

  <section>
<div class="logout-btn"><a href="logout.php">logout</a>
  

</div>
<div class="actv_user">
<span>Online Users:</span><br>
<?php

  $query = "SELECT * FROM `users` WHERE `login` ='1' and `uid`!='".$_SESSION['user_log_id']."'";
  $results = mysql_query($query);
  $rowCount = mysql_num_rows($results);
  if($rowCount>0){
while($row = mysql_fetch_object($results)){
    echo "<a href=''>".$row->fname." ".$row->lname."</a><BR>";
}
}
  ?>

</div>

    <div id="messages"></div>
    <input id="chat-input" type="text" placeholder="say anything" autofocus/>
  </section>


 
</body>
</html>