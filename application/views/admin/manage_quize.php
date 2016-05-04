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
    <script type="text/javascript" src="js/affiliate.js"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

     <?php echo $header;?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php echo $leftsidebar;?>




      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <?php 
                    if($this->session->userdata('succ_msg')!=''){?>
                    <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Success!</h4>
                    <?php echo $this->session->userdata('succ_msg');$this->session->set_userdata('succ_msg','');?>
                    </div>

                    <?php } if($this->session->userdata('err_msg')!=''){ ?>

                    <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-ban"></i> Sorry!</h4>
                    <?php echo  $this->session->userdata('err_msg');$this->session->set_userdata('err_msg','');?>
                    </div>
                    <?php }?>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Manage Quiz</h3>
                  <div class="box-tools">
                    <div style="width: 150px;" class="input-group">
                   <div class="paginationD">
                      <?php echo $PaginationLink;?>

                    </div>
                  </div>
                </div><!-- /.box-header -->
                
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Course Name</th>
                      <th>Question</th>
                      <th>Type</th>
                      <th>Currect Answer</th>
                      <th>Action</th>
                      
                      
                    </tr>
                    <?php if(!empty($AllQuiz)):
                      foreach($AllQuiz as $quiz):
                    ?>
                    <tr>
                      <td><?php echo $quiz['courses_name'];?></td>
                      <td><?php echo $quiz['question'];?></td>
                      <td><?php if($quiz['type']==2){echo 'True/False';}else{ echo 'MCQ';}?></td>
                      <td><?php echo $quiz['correct_answer'];?></td>
                              
                        <td> 
                            <a href="admin/courses/edit_question/<?php echo $quiz['qid'];?>">
                            <button class="btn btn-primary btn-xs" title="Edit" type="button">
                            <span class="glyphicon glyphicon-edit"></span>
                            </button>
                            </a>
                            <a href="admin/courses/delete_question/<?php echo $quiz['qid'];?>" onclick="return confirm('Are you sure you want to delete this quiz?')">
                            <button class="btn btn-danger btn-xs" title="Delete" type="button">
                            <span class="glyphicon glyphicon-trash"></span>
                            </button>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; endif;?>
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
          </section>
      </div>
     <!-- footer -->
     <?php echo $footer;?>
     <!-- footer -->



      <!-- Control Sidebar -->

      <?php echo $rightsidebar;?>
      <!-- /.control-sidebar -->



      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
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
