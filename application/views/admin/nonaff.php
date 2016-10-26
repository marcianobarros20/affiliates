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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/affiliate.js"></script>
    <style type="text/css">
      .suggestion
      {
          border: 1px solid #ccc;
          position: absolute;
          
          background: #fff;
          z-index: 9;
          padding: 10px;
          width: 250px;
      }

      
      /*.assign{
        position: relative;
      }

      .scroll {

    
    height: 200px;
    overflow-y: scroll;
    
    overflow-x: hidden; 
     }*/
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

     <?php echo $header;?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php echo $leftsidebar;?>

      <?php echo $rightsidebar;?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
               <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">List Of Non Affiliate Users</h3>
                          
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tbody><tr>
                              
                              <th>User Name</th>
                              <th>Date(dd/mm/yy)</th>
                              <th>Status</th>
                              <th>Refferal Code</th>
                              <th>Action</th>
                             
                             
                            </tr>
                            <?php if(!empty($list)):
                              foreach($list as $users):?>
                            <tr>
                              
                              <td><?php echo ucfirst($users['fname']).' '.ucfirst($users['lname']);?></td>
                              <td><?php echo date('d/m/Y',strtotime($users['date_register']));?></td>
                              <td>
                                <?php 
                                //echo $users['status'];
                                  if($users['status']==0)
                                  {
                                    echo "Pending For Approval";
                                  }
                                  else
                                  {
                                    echo "Rejected";
                                  }
                                ?>
                              </td>
                              <td><span id="assign_reff_<?php echo $users['uid'];?>" style="display:none" class="assign">
                                    <input type="text" placeholder="Assign Refferal Code" id="refferal_code_<?php echo $users['uid'];?>"  onfocus="show_sugg(<?php echo $users['uid'];?>)" class="refferal"><input type="submit" value="Assign" class="reff_assign" id="assign_code_btn_<?php echo $users['uid'];?>">
                                    <br>
  
                                      <div class="suggestion  scroll" style="display:none;" id="suggestion_div_<?php echo $users['uid'];?>">
                                        <?php foreach($active_affiliate as $affiliate) {?>

                                         <a onclick="get_refferal('<?php echo $users['uid']; ?>','<?php echo $affiliate['refferalcode']; ?>')">
                                          <div class="row" >
                                            <div class="col-md-4" title="Affiliate Name" >
                                              <?php echo $affiliate['fname']." ".$affiliate['lname']; ?>
                                            </div>
                                            <div class="col-md-6" title="Refferal Code">
                                              <?php echo $affiliate['refferalcode']; ?>
                                            </div>
                                            <div class="col-md-2" title="Number Of Affiliates">
                                             <?php echo $total_affiliate=affiliate_count($affiliate['uid']); ?>
                                            </div>
                                            
                                          </div></a>
                                        <?php } ?>

                                      </div>
                                       
                                   </span></td>
                              <td>

                                   <?php 
                                //echo $users['status'];
                                  if($users['status']==0)
                                  {
                                    ?>

                                       <input type="button" class="btn btn-success btn-xs" onclick="change_status('Active','<?php echo $users['uid'];?>');" value="Active">
                                       <input type="button" class="btn btn-danger btn-xs" onclick="change_status('Reject','<?php echo $users['uid'];?>');" value="Reject" >

                                    <?php
                                  }
                                  else
                                  {
                                    ?>

                                       <input type="button" class="btn btn-success btn-xs" onclick="change_status('Approve','<?php echo $users['uid'];?>');" value="Approve">
                                       

                                    <?php
                                  }
                                ?>
                                
                                
                                
                                
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
    <script src="admin_support/plugins/morris/morris.min.js"></script>
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
    <script src="admin_support/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="admin_support/dist/js/demo.js"></script>

     





    

  </body>
</html>

