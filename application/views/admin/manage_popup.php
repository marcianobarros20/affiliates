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
                            <div class="box-header with-border"> 
                                    <h3 class="box-title">List Of Pop Up Video</h3> 
                            </div>
                            <div class="box-body">
                              <table class="table table-hover">
                                 <tbody>
                                    <tr>
                                        <td>Video</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                    <?php if(!empty($video)):
                                     foreach($video as $video_show):
                                     ?>
                                    <tr>
                                        <td><?php echo $video_show['media']?></td>
                                        <td>
                                            
                                            <?php if ($video_show['status']==0)
                                            {
                                                   echo '<span class="glyphicon glyphicon-ok"></span>';
                                            }
                                            else
                                            {
                                                  echo  '<span class="glyphicon glyphicon-ban-circle"></span>';
                                            }

                                            ?></td>
                                        <td>

                                          <button type="button" title='Delete' class="btn btn-danger btn-xs" onclick="delete_popup(<?php echo $video_show['vid'];?>)"><span class="glyphicon glyphicon-trash"></span></button>
                                          <?php if($video_show['status']==0)
                                             {
                                             ?>
                                             <button class="btn btn-success btn-xs" title='Make It Inactive' onclick="change_status_popup('Inactive','<?php echo $video_show['vid'];?>')">Inactive</button>
                                             <?php
                                             }
                                            else
                                            {
                                            ?>
                                             <button class="btn btn-success btn-xs" title='Make It Active' onclick="change_status_popup('Active','<?php echo $video_show['vid'];?>')">Active</button>
                                            <?php
                                            } ?>


                                        </td>
                                    </tr>
                                    <?php endforeach; endif;?>
                                 </tbody>
                               </table>
                            </div>
                    </div>

                    <div class="box"> 
                            <div class="box-header with-border"> 
                                    <h3 class="box-title">Upload Pop Up Video</h3> 
                            </div>
                            
                            <div class="box-body">
                        <form role="form" method="post" action="admin/courses/add_popup" name="add_popup" id="add_popup" enctype="multipart/form-data" >
                                <div class="form-group">
                                      <label >Upload Video</label>
                                      <div id="formdiv" class="form-group">
                                         <div id="filediv">
                                         <input type="file" class="required" id="popup_video" name="popup_video" title="Select Video">
                                         </div>
                                      </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button class="btn btn-primary" type="submit">Upload</button>
                            </div>
                         </form>
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
