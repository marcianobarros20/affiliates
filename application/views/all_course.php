<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>All Courses | Tier5</title>
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

   

</head>

<body>

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
                        <li class="active">Course List</li>
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
        $count =fetchcoursestatus($this->session->userdata('user_id'),$courses['co_id']);
      // echo $this->db->last_query();
        $get_exp=explode('.',$courses['video']);
   ?>
            <div class="col-lg-3  col-xs-6">
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
                      <!--   <object class="embed-responsive-item">
                           <video  controls class="image" id="video_<?php echo $show_video['tr_id'];?>">
                             <source src="<?php echo base_url();?>tutoroal/audio_video/<?php echo $show_video['media'];?>" width="100" height="100"/>
                           </video>
                         </object> -->
                        

                         <a href="<?php echo base_url();?>contents/classinfo/<?php echo $courses['co_id'];?>"><img class="img-thumbnail" src="tutorial/video/<?php echo $get_exp[0].'.jpeg'?>"/>
       <img class="OverlayIcon" src="images/play.png" alt="" />
      </a>
                             
                        </div>
                    

                        <div class="card__details">
                        <strong class="details__name">
                        <?php echo ucfirst($courses['courses_name']);?>
                        </strong>
                        <div class="details__instructor">
                        <?php echo substr($courses['description'],0,50);?>
                        </div>
                        
                            <div id="myProgress">
                              <div id="myBar" style="width:<?php echo $count;?>%"></div>
                            </div>
                            <?php if($count>0)
                              {
                                

                               ?>
                               <a href="<?php echo base_url();?>contents/classinfo/<?php echo $courses['co_id'];?>"><?php echo $count.'% Completed';?></a>
                               <?php
                              }
                              else
                              {
                               ?>
                                <a class="blue-btn1" href="<?php echo base_url();?>contents/classinfo/<?php echo $courses['co_id'];?>">Start Course</a>
                               <?php
                              }

                            ?>
                        </div>
                        </div>
              </div>
            </div><!-- ./col -->
            
            <?php endforeach;?>



           
          </div>

      

 
 


</section> 






<!--Footer-->
  <?php echo $footer;?>
<!--/Footer-->


    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
