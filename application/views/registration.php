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
 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
  <script type="text/javascript" src='js/registration.js'></script>
 
</head>

<body>

  <!--Header-->
  <?php echo $header;?>
  <!-- /header -->


  <section class="title">
    <div class="container">
      <div class="row-fluid">
        <div class="span6">
          <h1>{Registration}</h1>
        </div>
        <div class="span6">
          <ul class="breadcrumb pull-right">
            <li><a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span></li>
            
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
 <?php if($this->input->cookie('reffrence_id')!='')
    {?>
   <div class="Information_div">
  
     <?php
      $ref_id=$this->input->cookie('reffrence_id');
      $get_explode=explode('-',$ref_id);
      $parent_id=$get_explode[2];
      $user_info=Parentstatus($parent_id);?>


 Referent User Information:
    <br>
    <?php if($user_info['profile_image']!=''){ ?>
    <img src='profile_img/thumb/<?php echo $user_info['profile_image'];?>' alt=''>
   <?php }
    else
    {
      ?>
       <img src='images/sample/no_photo.png' alt=''>
      <?php
    }
    ?>
    <br>
    Name: <?php echo ucfirst($user_info['fname']).' '.ucfirst($user_info['lname']);?>
    <br>
    Email: <?php echo $user_info['email'];?>
    <br>
    Referal code: <?php echo $user_info['refferalcode'];?>
     </div>
      <?php
    }?>

   
   
   
    <form class="center"  method="POST" id='reg_form' onsubmit="return validate();">
      <fieldset class="registration-form">
       <div class="control-group">
          <!-- Username -->
          <div class="controls">
            <input type="text" id="fname" name="fname" placeholder="First Name" class="input-xlarge required">
            <input type="text" id="lname" name="lname" placeholder="Last Name" class="input-xlarge required">
          </div>
        </div>
         

      

         <div class="control-group">
          <!-- state -->
          <div class="controls">
          
           <select name='state' class="input-xlarge required" id='state'>
           <option value=''>Select State</option>
           <?php foreach($states as $sts):?>
            <option value='<?php echo $sts['id'];?>'><?php echo $sts['name'];?></option>
           <?php endforeach;?>
           </select>
           <!-- end state -->
           <select name='city' class="input-xlarge required" id='city'>
           <option value=''>Select City</option>
           
           </select>
           <!--city-->
           </div>
           <div class="controls">
           <input id="address" type="text" size="50" name="address" class="addr_class input-xlarge">
          </div>
        </div>




        <div class="control-group">
          <!-- Username -->
          <div class="controls">
         
            <input type="text" id="username" name="username" placeholder="Username" class="input-xlarge required">
             <input type="text" id="email" name="email" placeholder="E-mail" class="input-xlarge required email">
          </div>
        </div>
        <input type='hidden' id='lat' value='' name='lattitude'>
        <input type='hidden' id='long' value='' name='longitude'>


        <div class="control-group">
          <!-- E-mail -->
          <div class="controls">
           
             <input type="password" id="password" name="password" placeholder="Password" class="input-xlarge required">
               <input type="password" id="password_confirm" name="password_confirm" placeholder="Password (Confirm)" class="input-xlarge required equalTo">
          </div>
        </div>

        

        <div class="control-group">
          <!-- Password -->
          <div class="controls">
           
             <input type="submit" class="btn btn-success btn-large btn-block" value="Register" name="Register">
          </div>
        </div>

      </fieldset>
    </form>
  </section>
  <!-- /#registration-page -->
 

<!--/bottom-->

<!--Footer-->
<?php echo $footer;?>
<!--/Footer-->



</body>
</html>
