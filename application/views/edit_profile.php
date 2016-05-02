<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Dashboard | Tier5</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <base href="<?php echo base_url();?>">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/custom.css"/>
    <link rel="stylesheet" href="css/sl-slide.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="js/vendor/jquery-1.9.1.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
  <script src="js/jquery.validate.js"></script>
   <script type="text/javascript" src="js/edit_prof.js"></script>
   <script type="text/javascript" src="js/registration.js"></script>



</head>

<body >
<section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>{Edit Profile}</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li class="active">Edit Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->  

    <!--Header-->
    <?php echo $header;?>
    <!-- /header -->
  
      <section id="about-us" class="container main">
         <!-- <h2 align="center"> Edit Personal Information </h2> -->
         
        <div class="row-fluid">
                   <?php 
                    if($this->session->userdata('succ_msg')!=''){?>
                    <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Success!</h4>
                    <?php echo $this->session->userdata('succ_msg');$this->session->set_userdata('succ_msg','');?>
                    </div>

                    <?php } if($this->session->userdata('err_msg')!=''){ ?>

                    <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-ban"></i> Sorry!</h4>
                    <?php echo  $this->session->userdata('err_msg');$this->session->set_userdata('err_msg','');?>
                    </div>
                    <?php }?>


                    <div class="box-body">
                    <div class="row-fluid">
                      <form method="post" action="welcome/update_profile" enctype="multipart/form-data">
                      <div class="span4 profile-pic">
                        <?php if( $fetch_allinfo['profile_image']) { ?><img src="profile_img/thumb/<?php echo $fetch_allinfo['profile_image'];?>" alt="Image"><?php  } else{ ?><img src="images/sample/no_photo.png" alt="images/sample/no_photo.png"> <?php } ?>
                        <p>Select image to upload <br>( Minimum Size 220x150)</p>
                      <br><br>
                      <input type="file" name="fileToUpload" id="fileToUpload">

                      </div>  
                      <div class="span8 personal-info">
                        <div class="row">
                          <div class="width50">
                            <label>First Name:</label>
                            <input type="text" placeholder="First Name" id="edit_first_name" name="edit_first_name" value="<?php echo $fetch_allinfo['fname'];?>">
                          </div>
                          <div class="width50">
                            <label>Last Name:</label>
                            <input type="text" placeholder="Last Name" id="edit_last_name" name="edit_last_name" value="<?php echo $fetch_allinfo['lname'];?>">
                          </div>
                          <br>
                          <div class="span12">
                            <label>Description:</label>
                            <textarea rows="4"  placeholder="Enter Descriptions Here" class="form-control" id="edit_description" name="edit_description"><?php echo $fetch_allinfo['description'];?></textarea>
                          </div>
                          <br>
                          <div class="span12">
                            <div class="control-group">
                                  <br>
                                  <div class="controls">
                                    <label>Address</label>
                                  <input id="address" type="text" size="50" name="address" class="input-xlarge" value="<?php echo $fetch_allinfo['address'];?>">
                                  </div>
                            </div>

                          </div> 
                          <input type ="hidden" name="lattitude" id="lat" value="<?php echo $fetch_allinfo['latitude'];?>">
                          <input type ="hidden" name="longitude" id="long" value="<?php echo $fetch_allinfo['longitude'];?>">
                          <div class="span12">
                            <button type="submit" class="btn btn-primary" id="update_button" name="update_button" >Update</button>

                          </div>  

                        </div>

                       
                      </div> 
                       </form>

                    </div>
                    </div>  





           <div class="box">
            <div class="row">
            <div class="span8">
              <label>Change Password </label>
                 <br><br>
                   <div style="display:none;" id="edit_password_div" name="edit_password_div" class="change-password-section">
                            <form method="post" action="welcome/change_password" id="change_password">
                            <div><div ><input type="password" placeholder="Old Password" id="old_password" name="old_password" onblur="old_password_chk();"></div><div id="msg_pass"></div></div>
                            <br>
                            <input type="password" placeholder="New Password" id="new_password" name="new_password">
                            <br>
                            <input type="password" placeholder="Confirm Password" id="conf_password" name="conf_password">
                            <br>
                            <input type="submit" value="Change Password" class="btn btn-default btn-xm blue-btn" id="update_password_button" name="update_password_button" >
                            </form>
                         </div>





            </div><div class="span4">
                         <button type="button" class="btn btn-default btn-sm" id="edit_password_button" name="edit_password_button">
                             <span class="glyphicon glyphicon-edit"></span> Edit
                         </button>
                  
                        
                       </div>
                     </div>
          </div>
           
        </div>


        
</section>
    


<!--Bottom-->
<!--/Bottom-->


<!--Footer-->
  <?php echo $footer;?>
<!--/Footer-->

 <script src="js1/bootstrap.min.js"></script>
    <script src="js/main.js"></script>



</body>
</html>
