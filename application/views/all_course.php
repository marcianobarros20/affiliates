<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>My Course | Tier5</title>
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


<!-- full scrren video -->
<style>
div#video_player_box{ width:550px; background:#000; margin:0px auto;}
div#video_controls_bar{ background: #333; padding:10px; color:#CCC;}
input#seekslider{ width:180px; }
input#volumeslider{ width: 80px;}
</style>

<!-- full scrren video --> 
</head>

<body onload="prettyPrint();">

    <!--Header-->
    <?php echo $header;?>
    <!-- /header -->

    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>{All Course}</h1>
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
       
        <!-- Meet the team -->
       

   <div class="row">
   <?php foreach($all_courses as $courses):

        $show_video=FngetvideoFirstclass($courses['co_id']);
   ?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <!-- <div class="inner">
                  <h3>150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a class="small-box-footer" href="#">More info <i class="fa fa-arrow-circle-right"></i></a> -->
             
                        <div class="card card--learning">
                       
                        <!-- ngIf: thumbnail_redirection --><div>
                       <!--  <img src="images/sample/team4.jpg" id="image"> -->
                        <object class="embed-responsive-item">
     <video  controls id="image">
       <source src="<?php echo base_url();?>tutoroal/audio_video/<?php echo $show_video['media'];?>" width="100" height="100"/>
     </video>
   </object>
                        <div class="play-button"></div>        
                        </div>
                    

                        <div class="card__details">
                        <strong class="details__name">
                        <?php echo $courses['courses_name'];?>
                        </strong>
                        <div class="details__instructor">
                       <?php echo $courses['description'];?>
                        </div>
                        <a href="">Take Classes</a>
                        </div>
                        </div>
              </div>
            </div><!-- ./col -->
            
            <?php endforeach;?>
           
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
    
     <script src="js1/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
