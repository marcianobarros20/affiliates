<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Forgot Password | Tier5</title>
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
   
   $( "#forget_form" ).validate();
});

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
          <h1>Forgot Password</h1>
        </div>
        <div class="span6">
          <ul class="breadcrumb pull-right">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li><a href="#">LOGIN FORM</a> <span class="divider">/</span></li>
            <li class="active">Forgot your password?</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- / .title -->       

  <section id="forget-password" class="container">
 
         
       
    <form class="center"  method="POST" id='forget_form'>
      <fieldset class="registration-form">
          <div><?php if($this->session->userdata('err_msg')!=" "){echo $this->session->userdata('err_msg'); $this->session->set_userdata('err_msg'," ");} ?></div>
        <div class="control-group">
          <!-- E-mail -->
          <div class="controls">
            <input type="text" id="email" name="email" placeholder="Enter Your Registered E-mail" class="input-xlarge required email">
          </div>
        </div>

        

        <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <input type="submit" class="btn btn-success btn-large btn-block" value="Send" name="Send">
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
