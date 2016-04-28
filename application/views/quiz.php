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

 

 
</head>

<body>

    <!--Header-->
    <?php echo $header;?>
    <!-- /header -->

    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>{Quiz}</h1>
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
       

   <div class="row">
  
<div class="container">
  <h2>Quiz of <?php echo $CourseName['courses_name'];?></h2>
  
  <div class="panel-group">

  <div class="w3-padding-jumbo w3-light-grey">
  <?php if(empty($test_result_final)){

      if(!empty($info_ques)):
   ?>
  <p style="margin-bottom:30px;" class="w3-large"> <?php echo $serial_no.'. '.$info_ques['question'];?></p>
  <form method="post" action="contents/quiz/21" name="quizform" role="form">
 
  <input type="hidden" value="<?php echo $serial_no;?>" id="serl_no" name="serl_no">
  <input type="hidden" size="25" value="<?php echo $info_ques['correct_answer'];?>" name="answers">
  <input type='hidden' name='time' id='time' valtue='<?php echo $time;?>'>
  <input type="hidden" size="25" value="<?php echo $info_ques['qid'];?>" name="qnumber">
  <input type="hidden" size="25" value="<?php echo $to_currect_ans;?>" name="to_currect_ans">
  <?php if(!empty($info_options)){  foreach($info_options as $option): ?>
  <div class="radio"><label>
  <input type="radio" value="<?php echo $option['option'];?>" id="1" name="quiz"><?php echo $option['option'];?></label>
  </div>
  <br>
  <?php endforeach;}else {?>

 <div class="radio"><label>
  <input type="radio" value="true" id="1" name="quiz">True</label>
  </div><br>
   <div class="radio"><label>
  <input type="radio" value="false" id="1" name="quiz">False</label>
  </div>
  <?php } ?>
  
  <input type="submit" value=" Next " class="w3-btn w3-orange w3-large w3-text-white">  
  </form>
  
<?php endif;} else {

$percentage=round(($test_result_final['curr_ans']/$test_result_final['tot_ques'])*100);
 ?>
<center><h2>Result:</h2><?php echo $test_result_final['curr_ans'];?> of <?php echo $test_result_final['tot_ques'];?><p><b><?php echo $percentage; ?> %</b></p><p><?php if($percentage <70){ ?> Well, you have to study alot to Pass this course! (Minimum Pass Marks 70%)<?php } elseif($percentage>=70 && $percentage<90){?>Welldone! you have done pretty good.<?php } else { ?>Congratulation! Excellent performance you have given!<?php }?></p><p><b>Time Spent</b><br><?php echo gmdate("H:i:s", $time);?></p></center>

<table width="100%"><tbody><tr>
<td><a href="<?php echo base_url();?>contents/Allcourses" class="w3-btn w3-orange w3-text-white w3-large">Go Back To Course</a></td>
<td align="right"><a href="<?php echo base_url();?>contents/quiz/<?php echo $this->uri->segment(3);?>" class="w3-btn w3-orange w3-text-white w3-large">Try again</a></td>
</tr></tbody></table>
<?php }?>
</div>
  
  </div> 

  <div class="w3-container w3-padding-hor-16">
  <div class="w3-row">
    <div class="w3-col s6">Total <?php echo $tot_ques;?> questions</div>
    <div style="text-align:right;" class="w3-col s6">Time spent <?php echo gmdate("H:i:s", $time);?></div>
  </div>
</div>



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
