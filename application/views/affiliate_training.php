<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
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
   <script type="text/javascript" src="js/training.js"></script>
   <script type="text/javascript" src="js/registration.js"></script>

 

  
  

</head>

<body>
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>{Affiliates Training Details}</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li class="active">Affiliates Training Details</li>
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
        <div class="row-fluid">
           <?php foreach ($fetch_child as $value)
             {?>
               

                 <div class="panel panel-default">
                        <div class="panel-heading" >

                         <a>  <?php echo $value['fname']." ".$value['lname'];?> </a>
                        </div>
                        <div class="panel-body" id="details_<?php echo $value['uid']?>">
                         <table>
                          <?php foreach ($fetch_course as $course){?>
                            <tr>
                              <td><h4><?php echo $course['courses_name']?></h4> </td>
                              <td><button onclick="now(<?php echo $course['co_id']?>,<?php echo $value['uid']?>)">click Me</button></td>
                              <td></td>

                            </tr>  
                          <?php } ?>
                        </table>
                        </div>
                 </div>




             <?php }
           ?>
              
        </div>       
      </section>
    


<!--Bottom-->
<!--/Bottom-->


<!--Footer-->
  <?php echo $footer;?>
<!--/Footer-->

 



</body>
</html>
