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
                    <h1>{Dashboard}</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?php echo base_url();?>">Home</a> /</li>
                        <li class="active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->  
    

    <section id="about-us" class="container main">
        <!-- <div class="row-fluid">
            <div class="span6">
                <h2>Personal Information</h2>
                <p>Name: <?php echo $fetch_allinfo['fname'].' '.$fetch_allinfo['lname'];?>
                
                <p>Email: <?php echo $fetch_allinfo['email']?></p>
                <p>Description: <?php echo $fetch_allinfo['description'];?></p> 
                 
                <p>Refferal Code: <?php echo $fetch_allinfo['refferalcode'];?></p>
                <a href="<?php echo base_url();?>Welcome/editprofile">Edit Profile</a>
                <br>
                In Order To Affiliate People, Please forword the below link.
                
                <br>
                <?php echo base_url();?>?aid=<?php echo $fetch_allinfo['refferalcode'];?>
            </div>
            <div class="span6">

                
                <div>
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
        </div>

        <hr>
      </div> -->
        <!-- Meet the team -->
       

              
 
        <div class="row">
          
             <h1 class="center">Meet the Team</h1>
<div class="comment_div text-center">
   ('Click' On <strong>Name</strong> To View The Details Of Affiliates)
</div>


                        



    <div class="chart_tree">
   
    <div id="chart" class="orgChart"></div>
<?php $res = fetchCategoryTreeList5($this->session->userdata('user_id'));  if(!empty($res))
 {
?>
        <ul id="org" style="display:none">  
     <li><?php echo $fetch_allinfo['fname'].' '.$fetch_allinfo['lname'];?> 
   <?php
  

  foreach ($res as $r) {
    echo  $r;
  }

?>
</li>
</ul>
<?php }?>
    </div>


</section>







<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Basic Informations</h4>
      </div>
      <div class="modal-body" id="chkline">
        ...
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>



<!--Footer-->
  <?php echo $footer;?>
<!--/Footer-->
    
     <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
