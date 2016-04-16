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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="admin_support/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="js/jquery.validate.js"></script>

    <script type="text/javascript" src="js/affiliate.js"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php echo $header;?>
        <?php echo $leftsidebar;?>
        <?php echo $rightsidebar;?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <section class="content">
                <div class="row">
                    <div class='text-center'><h4><?php if($this->session->userdata('err_msg')!=''){ echo '<span class="error">'.$this->session->userdata('err_msg').'</span>'; $this->session->set_userdata('err_msg','');} if($this->session->userdata('succ_msg')!=''){ echo $this->session->userdata('succ_msg');$this->session->set_userdata('succ_msg','');}?></h4></div>
                    <div class="box"> 
                        <div class="box-header with-border">
                            <div class="form-group">
                                <h3 class="box-title">Add Course</h3>
                            </div>
                        </div>
                         
                        <form role="form" method="post" action="welcome/add_course" name="add_course" id="add_course" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Course Name</label>
                                <input type="text" id="new_course_name" name='new_course_name' placeholder="Enter Course Name" class="form-control required">
                            </div>
                           
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control required" placeholder="Enter Course Description" id="new_course_description" name='new_course_description'></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        </form>                            
                    </div>

                    <br>
                    


                    <div class="box">
                        <div class="box-header with-border">
                              <div class="form-group">
                                  <h3 class="box-title">Add Class</h3>
                              </div>
                        </div>
                        
                        <div class="box-body">
                          <form role="form" method="post" action="welcome/add_class" name="add_class" id="add_class" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label>Select Course</label>
                                  <select id="course_id" name="course_id" class="form-control required">
                                      <option value="">--Select--</option>
                                      <?php foreach($couse_list as $value)
                                      { ?>
                                      <option value="<?php echo $value['co_id'];?>"><?php echo $value['courses_name'];?></option>
                                      <?php }
                                      ?>
                                  </select> 
                            </div>
                            <div class="form-group">
                                <label>Class Name</label>
                                <input type="text" id="new_class_name" name='new_class_name' placeholder="Enter Class Name" class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                
                                <textarea class="form-control required" placeholder="Enter Class Description" id="new_class_description" name='new_class_description'></textarea>
                            </div>

                            <div class="form-group" id="select_class_media" name="select_class_media">
                                <input type="file" id="class_image" name="class_image[]" class="media"><label>Upload Image</label>
                               
                                <input type="file" id="class_video" name="class_video" class="media"><label>Upload Video</label>
                               
                                <input type="file" id="class_audio" name="class_audio" class="media"> <label>Upload Audio</label> 
                                
                                <input type="file" id="class_text" name="class_text" class="media"><label>Upload Text File</label>
                            </div>
                            
                            

                            <div class="box-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form> 
                        </div>

                    </div>



                </div>
            </section>
        </div>
        <!-- footer -->
        <?php echo $footer;?>
        <!-- footer -->
        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    
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
