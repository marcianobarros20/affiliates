<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registration | Tier5</title>
  <base href="<?php echo base_url();?>">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/sl-slide.css">
<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  

  <!-- Le fav and touch icons -->
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/jquery.validate.js"></script>
  <script type="text/javascript">
  $(document ).ready(function() {
   
   $( "#reg_form" ).validate({
  rules: {
    password: "required",
    password_confirm: {
      equalTo: "#password"
    }
  }
});

   $( "#form-login" ).validate();
});

   function validate()
   {
    var err=0;
    var email=$('#email').val();
    var username=$('#username').val();

    
    if(email!='')
    {
      var res= $.ajax({
    type : 'post',
    url : '<?php echo base_url();?>Ajax/EmailExists',
    data : 'email='+email,
    async : false,
    success : function(msg){ 
    if(msg==1)
           {

            err=1;
            $('#err_em').html('Email already exists');
            return false;
           }
           else
           {
            err=0;
           }
        }
    }); 
  
    
    }

    if(username!='')
    {
      var res= $.ajax({
    type : 'post',
    url : '<?php echo base_url();?>Ajax/UserExists',
    data : 'username='+username,
    async : false,
    success : function(msg){ 
    if(msg==1)
           {
            err=1;
            $('#err_us').html('Username already exists');
            return false;
           }
           else
           {
            err=0;
           }
        }
    }); 
  
    
    }
if(err==1)
    {
      return false;
    }
else
{
  $('#err_em').html('');
  $('#err_us').html('');
}
   

   }
    </script>
</head>

<body>

  <!--Header-->
  <?php echo $header;?>
  <!-- /header -->


  <section class="title">
    <div class="container">
      <div class="row-fluid">
        <div class="span6">
          <h1>Registration</h1>
        </div>
        <div class="span6">
          <ul class="breadcrumb pull-right">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li><a href="#">Pages</a> <span class="divider">/</span></li>
            <li class="active">Registration</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- / .title -->       

 <div class='text-center'><h4><?php if($this->session->userdata('err_msg')!=''){ echo '<span class="error">'.$this->session->userdata('err_msg').'</span>'; $this->session->set_userdata('err_msg','');} 
if($this->session->userdata('succ_msg')!=''){ echo $this->session->userdata('succ_msg');$this->session->set_userdata('succ_msg','');}?>
</h4></div>
    <div class='text-center'><span id='err_em' class='error text-center'></span>
    <span id='err_us' class='error text-center'></span></div>
 </h4>
  <section id="registration-page" class="container">
 
    
       
    <form class="center"  method="POST" id='reg_form' onsubmit="return validate();">
      <fieldset class="registration-form">
       <div class="control-group">
          <!-- Username -->
          <div class="controls">
            <input type="text" id="fname" name="fname" placeholder="First Name" class="input-xlarge required">
          </div>
        </div>
         <div class="control-group">
          <!-- Username -->
          <div class="controls">
            <input type="text" id="lname" name="lname" placeholder="Last Name" class="input-xlarge required">
          </div>
        </div>
        <div class="control-group">
          <!-- Username -->
          <div class="controls">
            <input type="text" id="username" name="username" placeholder="Username" class="input-xlarge required">
          </div>
        </div>

        <div class="control-group">
          <!-- E-mail -->
          <div class="controls">
            <input type="text" id="email" name="email" placeholder="E-mail" class="input-xlarge required email">
          </div>
        </div>

        <div class="control-group">
          <!-- Password-->
          <div class="controls">
            <input type="password" id="password" name="password" placeholder="Password" class="input-xlarge required">
          </div>
        </div>

        <div class="control-group">
          <!-- Password -->
          <div class="controls">
            <input type="password" id="password_confirm" name="password_confirm" placeholder="Password (Confirm)" class="input-xlarge required equalTo">
          </div>
        </div>

        <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <input type="submit" class="btn btn-success btn-large btn-block" value="Register" name="Register">
          </div>
        </div>
      </fieldset>
    </form>
  </section>
  <!-- /#registration-page -->

<!--Bottom-->
<?php echo $middle;?>

<!--/bottom-->

<!--Footer-->
<?php echo $footer;?>
<!--/Footer-->



</body>
</html>
