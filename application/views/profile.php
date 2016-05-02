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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
     <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>



 <!-- tree css and js -->
  
    <link rel="stylesheet" href="css/jquery.jOrgChart.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <link href="css/prettify.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="js/prettify.js"></script>
    
    <!-- jQuery includes -->
   
    
    <script src="js/jquery.jOrgChart.js"></script>

  
 <!-- tree css and js -->
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
 <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
     <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
     <script type="text/javascript" src="js/frame.js"></script>
 
</head>

<body onload="prettyPrint();">

    <!--Header-->
    <?php echo $header;?>
    <!-- /header -->

    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>{Profile}</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?php echo base_url();?>">Home</a> /</li>
                        <li class="active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->   

    <section id="about-us" class="container main">
         <div class="row-fluid">
          <div class="box"> 
            
              <div class="box-header with-border">
                   <h3 class="box-title">Personal Information</h3>
              </div>

              <div class="box-body">
                <div class="row-fluid">

                      <div class="span8">

                           <div class="row-fluid">
                               <div class="span4 profile-pic">
                                    <?php if( $fetch_allinfo['profile_image'])
                                    {
                                     ?>
                                    <p><img src="profile_img/thumb/<?php echo $fetch_allinfo['profile_image'];?>" alt="images/sample/no_photo.png" ></p>
                                     <?php
                                     }
                                    else
                                    {
                                     ?> 
                                               <img src="images/sample/no_photo.png" alt="images/sample/no_photo.png" >
                                     <?php
                                    }
                                     ?>
                                  
                               </div>

                               
                               <div class="span8 personal-info">

                               <h3><?php echo $fetch_allinfo['fname'].' '.$fetch_allinfo['lname'];?></h3>
                               
                               <!-- <table valign="bottom">
                                <tr><td valign="top">Description:</td><td><?php echo $fetch_allinfo['description'];?></td></tr>
                                <tr><td>Email:</td><td><?php echo $fetch_allinfo['email']?></td></tr>
                                <tr><td>Refferal Code:</td><td><?php echo $fetch_allinfo['refferalcode'];?></td></tr>
                                <tr><td colspan="2"><a href="<?php echo base_url();?>Welcome/editprofile">Edit Profile</a></td></tr>

                               </table>  -->


                               <div class="description-block">
                                <h5>Description:</h5>
                                  <p>
                                  <?php echo $fetch_allinfo['description'];?>

                                  </p>
                                </div>

                                 <div class="description-block">
                                  <h5>Email:</h5>
                                  <p>
                                    <?php echo $fetch_allinfo['email']?>
                                  </p>  
                                 </div> 

                                 <div class="description-block">  
                                  <h5>Refferal Code:</h5>
                                  <p>
                                    <?php echo $fetch_allinfo['refferalcode'];?>
                                  </p>  
                                 </div>

                                 <div class="description-block">
                                  <h5></h5>
                                  <p>
                                      <a class="edit-btn" href="<?php echo base_url();?>Welcome/editprofile">Edit Profile</a>
                                  </p>  
                                 </div> 



                              </div>



                          </div>
                      </div>

                       <div class="span4">
                        <div class="link-section">

                       <h5>To Affiliate People, Please forword the below link.
                        </h5>
                       <br>
                       <div class="border-area">
                       <?php echo base_url();?>?aid=<?php echo $fetch_allinfo['refferalcode'];?>
                      </div>
                        </div>
                       </div>


    
            
       </div>
      </div>
               
     </div>
     <br>
      <div class="box"> 
               <div class="box-header with-border">
                   <h3 class="box-title">Training Status</h3>
              </div>
              <div>
                <?php foreach ($course as $value)

                { ?>
                    <div class="training-status">
                         <?php echo $value['courses_name'];

                          $count =fetchcourseinfo($fetch_allinfo['uid'],$value['co_id']);

                         ?>

                    </div>
               <?php }?>
               
              </div>

      </div>   


</section>









<!--Footer-->
  <?php echo $footer;?>
<!--/Footer-->
    
     <script src="js1/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
