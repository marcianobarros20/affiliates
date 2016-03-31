<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Contact Us | Tier5</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
     <base href="<?php echo base_url();?>">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">

    

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



    <section class="no-margin">
        <iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49799.26337019521!2d-85.69035624773345!3d38.73034377843344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886bd20ec02fdea7%3A0x1c16995e39978d1!2sTier5!5e0!3m2!1sen!2s!4v1458908236414"></iframe>
    </section>

<section class="title">
    <div class="container">
      <div class="row-fluid">
        <div class="span6">
          <h1>{Get Started}</h1>
        </div>
        <div class="span6">
          <ul class="breadcrumb pull-right">
            <li><a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span></li>
           
            <li class="active">Get Started</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
 <div class='text-center'><h4><?php if($this->session->userdata('err_msg')!=''){ echo '<span class="error">'.$this->session->userdata('err_msg').'</span>'; $this->session->set_userdata('err_msg','');} 
if($this->session->userdata('succ_msg')!=''){ echo $this->session->userdata('succ_msg');$this->session->set_userdata('succ_msg','');}?>
</h4></div>
    <div class='text-center'><span id='err_em' class='error text-center'></span>
    <span id='err_us' class='error text-center'></span></div>
 </h4>
  <section id="registration-page" class="container">
 <div class="status alert alert-success" <?php if(!$this->session->userdata('succ_msg')){ echo 'style=display:none;';}?>>
                    <?php if($this->session->userdata('succ_msg')){echo $this->session->userdata('succ_msg');$this->session->set_userdata('succ_msg',''); }?>
                </div>
                <div class="status alert alert-error" <?php if(!$this->session->userdata('err_msg')){ echo 'style=display:none;';}?>>
                <?php if($this->session->userdata('err_msg')){echo $this->session->userdata('err_msg');$this->session->set_userdata('err_msg',''); }?>
                </div>
                <div class="status alert alert-warning" <?php if(!$this->session->userdata('err1_msg')){ echo 'style=display:none;';}?>>
                <?php if($this->session->userdata('err1_msg')){echo $this->session->userdata('err1_msg');$this->session->set_userdata('err1_msg',''); }?>
                </div>
    
       
    <form class="center"  method="POST" id='reg_form' onsubmit="return validate();" action="<?php echo base_url();?>Welcome/register">
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

    <section id="contact-page" class="container">
        <div class="row-fluid">

            <div class="span8">
                <h4>Getting Started</h4>
               
                <div class="status alert alert-success" <?php if(!$this->session->userdata('succ_msg')){ echo 'style=display:none;';}?>>
                    <?php if($this->session->userdata('succ_msg')){echo $this->session->userdata('succ_msg');$this->session->set_userdata('succ_msg',''); }?>
                </div>
                <div class="status alert alert-error" <?php if(!$this->session->userdata('err_msg')){ echo 'style=display:none;';}?>>
                <?php if($this->session->userdata('err_msg')){echo $this->session->userdata('err_msg');$this->session->set_userdata('err_msg',''); }?>
                </div>
                <div class="status alert alert-warning" <?php if(!$this->session->userdata('err1_msg')){ echo 'style=display:none;';}?>>
                <?php if($this->session->userdata('err1_msg')){echo $this->session->userdata('err1_msg');$this->session->set_userdata('err1_msg',''); }?>
                </div>
                <form  method="post">
                  <div class="row-fluid">
                    <div class="span5">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="input-block-level" required="required" placeholder="Your First Name">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="input-block-level" required="required" placeholder="Your Last Name">
                        <label>Email Address</label>
                        <input type="email" name="email" class="input-block-level" required="required" placeholder="Your email address">
                    </div>
                    <div class="span7">
                        <label>
Why do you want to be a Tier5 Affiliate?
</label>
                        <textarea name="message" id="message" required="required" class="input-block-level" rows="8"></textarea>
                    </div>

                </div>
               <!--  <button type="submit" class="btn btn-primary btn-large pull-right">Send Message</button> -->
                <input type='submit' name='submit' value='Become an Affiliate' class="btn btn-primary btn-large pull-right">

            </form>
        </div>

        <div class="span3">
            <h4>Our Address</h4>
            
            <p>
                <i class="icon-map-marker pull-left"></i> 2789 N Newman Rd, Lexington IN, 47138<br>
                
            </p>
            <p>
                <i class="icon-envelope"></i> &nbsp;hello@tier5.us
            </p>
            <p>
                <i class="icon-phone"></i> &nbsp;+812 722 4722
            </p>
            <p>
                <i class="icon-globe"></i> &nbsp;http://www.tier5.us
            </p>
        </div>

    </div>

</section>

<!--Footer-->
 <?php echo $middle;?>
<!--/Footer-->

<!--Footer-->
 <?php echo $footer;?>
<!--/Footer-->




<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>   

</body>
</html>
