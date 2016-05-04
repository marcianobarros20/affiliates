<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Affiliates Training Progress | Tier5</title>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->


    <script type="text/javascript" src="js/menu.js"></script>

   


</head>

<body>
  <!--Header-->
    <?php echo $header;?>
    <!-- /header -->
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>{Affiliates Training Details}</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li class="active"> / Affiliates Training Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->  

    
  
      <section id="about-us" class="container main">
        <div class="row-fluid">
           <?php foreach ($fetch_child as $value)

             {

              ?>
               

                 <div class="panel panel-default">
                        <div class="panel-heading" >

                         <a>  <?php echo $value['fname']." ".$value['lname'];?> </a>
                        </div>
                        <div class="panel-body" id="details_<?php echo $value['uid']?>">
                         
             
                         <div class="row">
                         


                               <?php foreach ($fetch_course as $course){ ?>
                            <div class="span3">
                           <div class="box training-box">
                                <div class="box-header with-border" align="Center">
                                  <h5> <?php echo ucfirst($course['courses_name']);?></h5>
                                </div>
                                <div class="box-body with-border" align="Center">
                                  <?php $count =fetchcourseinfo($value['uid'],$course['co_id']);

                                 echo '<br>'.$count;
                                   ?>
                                    
                                   
                                </div>
                           </div>
                           </div>
                         <?php }?>









                         
                         </div>
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


 <script src="js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>


</body>
</html>
