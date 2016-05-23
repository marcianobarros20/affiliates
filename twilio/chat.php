<?php 
$db=require_once('./connection.php');
require('./twilio-php/Services/Twilio.php'); 
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
  
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="index.css">
   <script src="https://media.twiliocdn.com/sdk/js/common/v0.1/twilio-common.min.js"></script>
<script src="https://media.twiliocdn.com/sdk/rtc/js/ip-messaging/v0.10/twilio-ip-messaging.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="index.js"></script>
</head>
<body>
  <header>
 
  </header>
<input type="hidden" name="add_log" id="add_log" value="<?php echo $_SESSION['admin_log_in'];?>">
<input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username'];?>">
<input type="hidden" name="userId" id="userId" value="<?php echo $_SESSION['user_log_id'];?>">

  <section>

<div class="logout-btn"><a href="logout.php">logout</a>
  
<button onclick="notifyMe()" id="notify" style="display:none;">Notify me!</button>
</div>
<div class="actv_user">
<span>Online Users:</span><br>

<?php

  $query = "SELECT * FROM `users` WHERE `login` ='1' and `uid`!='".$_SESSION['user_log_id']."'";
  $results = mysql_query($query);
  $rowCount = mysql_num_rows($results);
  if($rowCount>0){
while($row = mysql_fetch_object($results)){
    echo "<a class='userId' id='userId_".$row->uid."' data-id='".$row->uid."' data-title='".$row->fname." ".$row->lname."' target='_blank'>".$row->fname." ".$row->lname."</a><BR>";
}
}

if($_SESSION['admin_log_in']==''){
  $query1 = "SELECT * FROM `Admin` WHERE `login` ='1'";
 $results1 = mysql_query($query1);
 $rowCount1 = mysql_num_rows($results1);
 
  if($rowCount1>0){
$row1 = mysql_fetch_object($results1);
//echo "<a class='userId' id='userId_".$row1->id."' data-id='".$row1->id."' data-title='".$row1->name"' target='_blank'>".$row1->name."</a><BR>";
echo "<a class='userId' id='userId_".$row1->id."' data-id='".$row1->id."' data-title='".$row1->name."'>".$row1->name."</a>";
}

}
  ?>
<span id="typing1_<?php echo $_SESSION['user_log_id'];?>" style="color:cyan;"></span>
</div>
<?php if($_SESSION['admin_log_in']==1){?>
<div class="actv_user1">
 
</div>
<div class="loader"></div>
<?php } else { ?>
<div class="actv_user2">
 
</div>
<?php }?>
<span id="msg_body" style="display:none;">

    <div id="messages"><span id="typing" style="color:cyan;"></span></div>
    <input id="chat-input" type="text" placeholder="say anything" autofocus/>
    </span>
  </section>


 
</body>
</html>