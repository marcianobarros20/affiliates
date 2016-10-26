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
    <style type="text/css">
      .assign-upper {
        padding: 5px 5px 5px 5px;

       }

      .suggestion
      {
          position: absolute;
          z-index: 9;
          border-radius: 3px 3px 3px 3px;
          height: 500px; overflow-y: scroll;
      }

      .all-affiliate
      {
        padding: 10px 10px 10px 10px ;
        background: #3c8dbc;
        color: #fff;

      }

      .all-affiliate:hover
      {
        padding: 10px 10px 10px 10px ;
        background:#fff ;
        color: #3c8dbc;
      }

     
    </style>
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
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Of Affiliate Users </h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      
                      <th>User Name</th>
                      <th>Date(dd/mm/yy)</th>
                      <th>Referelcode</th>
                      <th>Status</th>
                      <th>Action</th>
                      <th>Details</th>
                      
                    </tr>
                    <?php if(!empty($list_users)):
                      foreach($list_users as $users):
                        ?>
                    <tr>
                      
                      <td><?php echo ucfirst($users['fname']).' '.ucfirst($users['lname']);?></td>
                      <td><?php echo date('d/m/Y',strtotime($users['date_register']));?></td>
                      <td><?php echo $users['refferalcode'];?></td>
                      <td>
                        <?php 
                          if($users['refferalparent'])
                          {
                              if($users['parent_id']==0)
                              {
                                 echo "Top Most Tier";
                              }
                              
                          } ?>
                          
                                  
                                  
                                  <div class="col-md-12 assign-upper" style="display:none" id="Assign_div_<?php echo $users['uid']; ?>">
                                    <input type="text" placeholder="Assign Refferal Code" id="assign_code_<?php echo $users['uid']; ?>" onfocus="show_sugg(<?php echo $users['uid']; ?>)">
                                    <input type="button" class="" value="Click To Assign" id="assign_code_button_<?php echo $users['uid']; ?>" onclick="assign_uppertier(<?php echo $users['uid']; ?>)">
                                    <div class="row suggestion" style="display:none" id="suggestion_div_<?php echo $users['uid']; ?>">
                                       <?php foreach($active_affiliate as $affiliate) {?>

                                         <a onclick="get_refferals('<?php echo $users['uid']; ?>','<?php echo $affiliate['refferalcode']; ?>')">
                                          <div class="row all-affiliate" >
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
                                  </div>
                        
                       

                      </td>
                     <td>

                      <?php 
                        
                              if($users['parent_id']=="0")
                              {
                                echo ""; 
                              }
                              
                             else
                          {
                            ?>
                             <span class="label label-danger" onclick="change_status('Delete','<?php echo $users['uid'];?>')" style="cursor:pointer;">Delete</span>

                            <?php
                          }
                        ?>

                        <?php 
                          if($users['refferalparent'])
                          {
                             
                          }
                          else
                          {
                            echo '<button id="Assign_upperdiv_button'.$users['uid'].'" onclick="show_assign_div('.$users['uid'].')" class="label label-warning" title="Assign Upper Tier">Assign</button>
                                  
                                 ';
                          }
                        ?>





                      
                    </td>
                     <td> 

                         <a href="<?php echo base_url();?>index.php/admin/users/view_details/<?php echo $users['uid']; ?>"><span class="label label-success" >View Details</span>

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