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
     
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<script src="js/jquery-1.10.1.min.js"></script>

    <script src='js/video.js'></script>

<!-- fancybox -->
 <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />



<!-- fancybox -->
 

 
</head>

<body>

    <!--Header-->
    <?php echo $header;?>
    <!-- /header -->

    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>{Class Information}</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li class="active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->   

    <section id="about-us" class="container main">
       
        <!-- Meet the team -->
       <?php if(!empty($all_class)):?>

   <div class="row">
  
<div class="container">
  <h2>Class Info</h2>
  
  <div class="panel-group">

    <?php
      $i=0;
     foreach($all_class as $class):
 $show_video=Fngetvideo($class['cl_id']);
 $condition=Fnchktrainingstatus($class['cl_id'],$class['course_id'],$this->session->userdata('user_id'));
      ?>
      <div style='color:red;' id="err_msg_<?php echo $class['cl_id'];?>" class="err"></div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a <?php if($i!=0){?>onclick="open_new_class(<?php echo $class['cl_id'];?>,<?php echo $class['course_id'];?>);"<?php }?> style='cursor:pointer;'><?php echo $class['cl_name'];?></a>
        </h4>
      </div>
      <div <?php if($i!=0){?>style='display:none;'<?php }?> id="class_<?php echo $class['cl_id'];?>">
        <div class="panel-body"><?php echo $class['description'];?></div>
         <br>
         <div><?php if($condition==0){ echo 'Completed full training';} else { echo 'Need To Complete This Training.';};?></div>
         <br>

        <div>
         
           <?php foreach($show_video as $result_video)
            {
             // echo $result_video['media'];
              ?>
              <a id="various2"  href="#inline2" class="fancybox btn btn-success btn-large" title="Lorem ipsum dolor sit amet" onclick="show_video(<?php echo $result_video['tr_id'];?>,<?php echo $class['cl_id'];?>,<?php echo $class['course_id'];?>)" style="cursor:pointer;">Preview</a>
           <?php }

           ?>

        </div>
      </div>
    </div>
    
    <?php $i++;endforeach;?>
  </div> 
</div>
</div>
<?php if($tr_status==0)
{?>
<h2>Start the Quiz</h2>
<p>Good luck!</p>
<a class="w3-btn w3-orange w3-text-white w3-large" href="contents/quiz/<?php echo $this->uri->segment(3);?>">Start the Quiz</a>
<?php } endif;?>


</section>



<div id="inline2" height="200px" width="400px">
   
</div>






<!--Footer-->
  <?php echo $footer;?>
<!--/Footer-->
    
     <script src="js1/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
