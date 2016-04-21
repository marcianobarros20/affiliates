<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <base href="<?php echo base_url();?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="admin_support/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin_support/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="admin_support/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="admin_support/dist/css/style.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="admin_support/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="admin_support/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="admin_support/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="admin_support/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="admin_support/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="admin_support/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


    <script type="text/javascript" src="js/affiliate.js"></script>
  </head>


<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <?php echo $header;?>
    <?php echo $leftsidebar;?>
    <?php echo $rightsidebar;?>
     
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <section class="content">
                <div class="row">

<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Class Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Name</strong>
                  <p class="text-muted">
                     <?php echo $class_details['cl_name']; ?>
                  </p>

                  <hr>
  <strong><i class="fa fa-file-text-o margin-r-5"></i> Description</strong>
                  <p>  <?php echo $class_details['description']; ?></p>
                


                  <?php if(!empty($image)){ ?>
                   <hr>
                   <strong><i class="fa fa-file-text-o margin-r-5"></i> Image</strong>
                   <?php  foreach($image as $img):?>
                   <img src='tutorial/image/<?php echo $img['media'];?>' alt='' height='100' width='100'>
                   <?php endforeach;} ?>

                   <?php if(!empty($audio)){ ?>
                   <hr>
                   <strong><i class="fa fa-file-text-o margin-r-5"></i> Video/audio</strong>
                   <?php  foreach($audio as $ad):

                   $extract_get=explode('.',$ad['media']);
                   if($extract_get[1]=='mp3' ||  $extract_get[1]=='ogg' ||  $extract_get[1]="wav"){
                   ?>
                  
   
  <audio width='320' height='240' controls="controls" >
  
  <source src="<?php echo base_url();?>tutorial/video_audio/<?php echo $ad['media'];?>" type="audio/<?php echo $extract_get[1];?>">
</audio>

<?php } else {?>
<object class="embed-responsive-item">
     <video width='320' height='240' controls>
       <source src="<?php echo base_url();?>tutorial/video_audio/<?php echo $ad['media'];?>" width="100" height="100"/>
     </video>
   </object>

                   <?php  } endforeach;} ?>


                         <?php if(!empty($file)){ ?>
                   <hr>
                   <strong><i class="fa fa-file-text-o margin-r-5"></i> Text file</strong>
                   <?php  foreach($file as $fl):?>
                   <a href="<?php echo base_url();?>tutorial/text_file/<?php echo $fl['media'];?>" download> 
                    <?php echo $fl['media'];?>
                   </a>
                   <?php   endforeach;} ?>
                </div><!-- /.box-body -->
              </div>
              </div></section></div>
 <?php echo $footer;?>

      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->






















































    <!-- jQuery 2.1.4 -->
        <script src="admin_support/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="admin_support/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
   
    <!-- Sparkline -->
    <script src="admin_support/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="admin_support/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="admin_support/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="admin_support/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="admin_support/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="admin_support/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="admin_support/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="admin_support/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="admin_support/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin_support/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
    <!-- AdminLTE for demo purposes -->
    <script src="admin_support/dist/js/demo.js"></script>
  </body>
</html>
