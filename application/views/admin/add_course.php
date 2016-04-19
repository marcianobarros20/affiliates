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
      <!-- Left side column. contains the logo and sidebar -->
      <?php echo $leftsidebar;?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
        <div class="row">
            <div class="col-sm-6">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">List Of Courses </h3>
                    </div><!-- /.box-header -->

                    <?php 
if($this->session->userdata('del_succ_msg')!=''){?>
                      <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Success!</h4>
                    <?php echo $this->session->userdata('del_succ_msg');$this->session->set_userdata('del_succ_msg','');?>
                  </div>

<?php } if($this->session->userdata('del_err_msg')!=''){ ?>

<div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-ban"></i> Sorry!</h4>
                  <?php echo  $this->session->userdata('del_err_msg');$this->session->set_userdata('del_err_msg','');?>
                  </div>
<?php }?>
                    <table class="table table-hover">
                    <tbody><tr>
                      
                      <th>Course</th>
                      <th>Status</th>
                        <th>Action</th>

                        <?php 
                            foreach ($couse_list as $value)
                             { ?>
                 
                    <tr>
                      
                      <td>
                           <?php 
                            echo $value['courses_name'];
                             ?>
              
                      </td>
                      <td <?php if($value['status']==0){?>title='Active' <?php } else {?>title='Inactive'<?php }?>> <?php if($value['status']==0){ echo '<span class="glyphicon glyphicon-ok"></span>';} else {echo '<span class="glyphicon glyphicon-ban-circle"></span>';}?></td>
                      <td>
                         <a href='<?php echo base_url();?>admin/courses/edit_course/<?php echo  $value['co_id']; ?>'> <button type="button" title='Edit' class="btn btn-primary btn-xs">
                             <span class="glyphicon glyphicon-edit"></span>
                         </button></a>
                         
<a href="<?php echo base_url();?>Ajax/delete_course/<?php echo  $value['co_id']; ?>"><button type="button" title='Delete' class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash"></span>
                         </button></a>
                         
                            <a href="<?php echo base_url();?>admin/courses/view_course/<?php echo  $value['co_id']; ?>"> <button class="btn btn-primary btn-xs">View Details</button></a>
                          <?php if($value['status']==0)
                                             {
                                             ?>
                                             <button class="btn btn-primary btn-xs" onclick="change_course_status('Not Available',<?php echo $value['co_id'];?>)" title='Make Not Avilable'>Not Avilable</button>
                                             <?php
                                             }
                                            else
                                            {
                                            ?>
                                             <button class="btn btn-primary btn-xs" onclick="change_course_status('Available',<?php echo $value['co_id'];?>)" title='Make Avilable'>Avilable</button>
                                            <?php
                                            } ?>

                      </td>
                      
                    </tr>

                    <?php 
                        
                             } ?>
                  </tbody></table>

                  </div>
                </div> 

                <div class="col-sm-6">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">List Of Class </h3>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                      <lebel>Select Course Name <lebel>
                        <form role="form" method="post" action="admin/courses/show_class_according_course" name="show_class_div" id="show_class_div">
                            <select id="course_id" name="course_id" class="form-control required">
                                      <option value="">--Select--</option>
                                      <?php foreach($couse_list as $value)
                                      { ?>
                                      <option value="<?php echo $value['co_id'];?>" <?php if(!empty($this->input->post('course_id')) && $this->input->post('course_id')==$value['co_id']){ echo 'selected';}?>><?php echo $value['courses_name'];?></option>
                                      <?php }
                                      ?>
                            </select>
                        </form>
                      <div>
                  <?php if(!empty($class_info)):?>
                          <table class="table table-hover">
                    <tr>
                      
                      <th>Class Name</th>
                      <th>Status</th>
                        <th>Action</th>
                      </tr>
                      <tbody>

                          <?php foreach($class_info as $info):?>
                            <tr>
                            <td><?php echo $info['cl_name'];?></td>
                            <td <?php if($info['status']==0){?>title='Active' <?php } else {?>title='Inactive'<?php }?>><?php if( $info['status']==0)
                                 {
                                    echo '<span class="glyphicon glyphicon-ok"></span>';
                                 }
                                 else
                                 {
                                    echo  '<span class="glyphicon glyphicon-ban-circle"></span>';
                                 }
                               ?></td>
                            <td>
                              <a href='<?php echo base_url();?>admin/courses/edit_class/<?php echo $info['cl_id']; ?>'>
                                <button type="button" title='Edit' class="btn btn-default btn-sm">
                                  <span class="glyphicon glyphicon-edit"></span>
                                </button>
                              </a>
                              
                              <button type="button" title='Delete' class="btn btn-default btn-sm" onclick="delete_class(<?php 
                                echo $info['cl_id'];
                                ?>)">
                                <span class="glyphicon glyphicon-trash"></span>
                             </button>
                              <!-- <button type="button" title='Delete' class="btn btn-default btn-sm" >
                               Not Available
                              </button> -->
                              <a href="<?php echo base_url();?>admin/courses/view_class/<?php echo  $info['cl_id']; ?>">View Details</a>
                              <?php if( $info['status']==0)
                                 {
                                   ?> <button type="button" title="Make It Not Available" class="btn btn-default btn-sm" onclick="change_class_status('Not Available',<?php echo $info["cl_id"];?>)">Not Available</button>
                               <?php
                                 }
                                 else
                                 {
                                    ?> <button type="button" title="Make It Available" class="btn btn-default btn-sm" onclick="change_class_status('Available',<?php echo $info["cl_id"];?>)">Available</button>
                               <?php
                                 }
                               ?>

                            </td>
                            </tr>
                          <?php endforeach;?>
                  </tbody></table>


                <?php endif;?>



                      </div>
                    </div>



                  </div>
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
