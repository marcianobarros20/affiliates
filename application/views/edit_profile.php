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
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
  <script src="js/jquery.validate.js"></script>
   <script type="text/javascript" src="js/edit_prof.js"></script>
   <script type="text/javascript" src="js/registration.js"></script>


    <script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

</head>

<body>
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
         <h2 align="center"> Edit Personal Information </h2>
        <div class="row-fluid">
            <div class="span6" >
               <?php if( $fetch_allinfo['profile_image'])
                       { ?>
                        <img src="profile_img/thumb/<?php echo $fetch_allinfo['profile_image'];?>" alt="Image">
                         
                <?php  } 
                       else
                       { ?>
                          <img src="images/sample/no_photo.png" alt="images/sample/no_photo.png">

                <?php                 
                       }                 
                ?>
            </div>

            <div><?php if($this->session->userdata('err_msg')!=' '){ echo "<font color='red'>".$this->session->userdata('err_msg').'</font>';$this->session->set_userdata('err_msg',' ');} if($this->session->userdata('succ_msg')!=' '){ echo "<font color='green'>".$this->session->userdata('succ_msg').'</font>';$this->session->set_userdata('succ_msg',' ');}?></div>
            <div class="span6" >
               
              
                    <div class="box">
                         <form method="post" action="welcome/update_profile" enctype="multipart/form-data">
                        First Name: <input type="text" placeholder="First Name" id="edit_first_name" name="edit_first_name" value="<?php echo $fetch_allinfo['fname'];?>">
                        <br>
                        Last Name: <input type="text" placeholder="Last Name" id="edit_last_name" name="edit_last_name" value="<?php echo $fetch_allinfo['lname'];?>">
                        <br>
                        
                        Description:
                         <textarea   placeholder="Enter Descriptions Here" class="form-control" id="edit_description" name="edit_description"><?php echo $fetch_allinfo['description'];?></textarea>
                         
                               <br>

                               <div class="control-group">
          <!-- country -->
        <!--   <div class="controls">
         
           <select name='country' class="input-xlarge required" id='country'>
           <option value=''>Select Country</option>
           <?php foreach($country as $cnt):?>
            <option value='<?php echo $cnt['id'];?>' <?php if($fetch_allinfo['country_id']==$cnt['id']){ echo 'selected';}?>><?php echo $cnt['name'];?></option>

           <?php endforeach;?>
           </select>
          </div>
          <!-- end country -->
       <!-- </div>
 -->

         <div class="control-group">
          <!-- state -->
          <div class="controls">
          <?php $state_info=Fnstateinfo($fetch_allinfo['state_id']);?>
           <!-- <select name='state' class="input-xlarge required" id='state'>
           <?php foreach($states as $sts):?>
            <option value='<?php echo $sts['id'];?>' <?php if($sts['id']==$fetch_allinfo['state_id']){ echo 'selected';}?>><?php echo $sts['name'];?></option>

           <?php endforeach;?>
           </select> -->
          </div>
          <!-- end state -->
        </div>


            <div class="control-group">
          <!-- state -->
          <div class="controls">
             
           <?php $city_info=Fncityinfo($fetch_allinfo['city_id']);
             //echo '<pre>';print_r($city_info);
             ?>             <!-- <select name='city' class="input-xlarge required" id='city'>
           <?php if(!empty($city_info)):?>
            <option value='<?php echo $city_info['id'];?>'><?php echo $city_info['name'];?></option>
           <?php endif;?>
           </select> -->
          </div>
          <!-- end state -->
        </div>



        <div class="control-group">
          <!-- Username -->
          <div class="controls">
          <input id="address" type="text" size="50" name="address" class="input-xlarge" value="<?php echo $fetch_allinfo['address'];?>">
          </div>
        </div>
        <input type='hidden' id='lat' name='lattitude' value="<?php echo $fetch_allinfo['latitude'];?>">
        <input type='hidden' id='long' name='longitude' value="<?php echo $fetch_allinfo['longitude'];?>">
        <br>
                         Select image to upload ( Minimum Size 220x150)
                                <input type="file" name="fileToUpload" id="fileToUpload"><br>

                         <button type="submit" class="btn btn-default btn-xm" id="update_button" name="update_button" >Update</button>
                         </form>
                    </div>
                    <br>
                    <div class="box" > 
                         Change Password 
                         <button type="button" class="btn btn-default btn-sm" id="edit_password_button" name="edit_password_button">
                             <span class="glyphicon glyphicon-edit"></span> Edit
                         </button>
                         <br>
                         <div style="display:none;" id="edit_password_div" name="edit_password_div">
                            <form method="post" action="welcome/change_password" id="change_password">
                            <div><div><input type="password" placeholder="Old Password" id="old_password" name="old_password" onblur="old_password_chk();"></div><div id="msg_pass"></div></div>
                            <br>
                            <input type="password" placeholder="New Password" id="new_password" name="new_password">
                            <br>
                            <input type="password" placeholder="Confirm Password" id="conf_password" name="conf_password">
                            <br>
                            <input type="submit" value="Change Password" class="btn btn-default btn-xm" id="update_password_button" name="update_password_button" >
                            </form>
                         </div>
                    </div>
                    <br>
            
            </div>
        </div>


        
</section>
    


<!--Bottom-->
<!--/Bottom-->


<!--Footer-->
  <?php echo $footer;?>
<!--/Footer-->

 



</body>
</html>
