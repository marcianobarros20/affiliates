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

      

      .move-r
      {
        position: fixed;
        top :400px;
        right: 20px;
        opacity: 0.5;
      }

      .move-l
      {
         position: fixed;
        top :400px;
        left: 250px;
        opacity: 0.5;
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
        <section class="content-header">
            <ol class="breadcrumb">
               <li><a><i class="fa fa-dashboard"></i> Leader Board</a></li>
                <li class="active"><a href="<?php echo base_url();?>admin/leaderboard/viewleaderboard"> View Leader Board</a></li>
            </ol>
            <br>
        </section>
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
         
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Leader Board</h3>
                  </div>
              
                   <table class="table table-hover">
                   <!--  <span class="btn btn-default glyphicon glyphicon-chevron-left move-l" > </span> -->
                   <?php 
                            $days_ago = date('Y-m-d', strtotime('+14 days', strtotime($last_week_start)));
                        $date=$days_ago;
                        $ts = strtotime($date);
                        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
                         $next_week_start = date('Y-m-d', $start);

                         

                        


                   ?>
                  
                    <a href="<?php echo base_url();?>admin/leaderboard/viewleaderboard/<?php echo $next_week_start; ?>"   class="btn btn-default glyphicon glyphicon-chevron-left move-l" ></a>
                    <a href="<?php echo base_url();?>admin/leaderboard/viewleaderboard/<?php echo $last_week_start; ?>"   class="btn btn-default glyphicon glyphicon-chevron-right pull-right move-r" ></a>
                      
      
                      <tbody>
                        <tr>
                          <th colspan="5">
                            Duration: <?php  echo $start_date=date("d,M Y", strtotime($last_week_start));?> - <?php echo $start_date=date("d,M Y", strtotime($last_week_end));?>
                          </th>
                        </tr>
                        <tr>
                          <th colspan="2" >
                            Affiliate
                          </th>
                          <th >
                            Rank In This Week
                          </th>
                           <th >
                            Moved
                          </th>
                          <th >
                            Achivment
                          </th>
                        </tr>

                        <?php foreach ($get_leader_board as $value) 
                        { ?>
                          <tr>
                            <td><?php if($value['profile_image']) {
                              ?>
                              <img src="profile_img/<?php echo $value['profile_image'];?>" alt=" " width="30%" style="max-height:50px">
                            <?php }else{?>
                                  <img src="images/profile-icon.png" alt=" " width="30%" style="max-height:50px">
                             <?php } ?>
                             </td>
                            <td><?php echo $value['fname']; ?> <?php echo $value['lname']; ?></td>
                              <td><?php echo $value['rank']; ?></td>
                             <td><?php  $previous_ranking=previous_ranking_position($last_week_start,$last_week_end,$value['userid']); $ranking=ranking_position($last_week_start,$last_week_end,$value['userid']); if($previous_ranking=='New Entry'){ echo $previous_ranking;}else{ 
                              if($previous_ranking>$ranking)
                                { 
                                  $move_up=$previous_ranking-$ranking; 
                                  echo $move_up;?>
                                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                <?php }

                              elseif($previous_ranking==$ranking){ echo "<i class='fa fa-ellipsis-h' aria-hidden='true'></i>";}

                              elseif($previous_ranking<$ranking){ 
                                 $move_down=$ranking-$previous_ranking; 
                                  echo $ranking; ?>
                                    
                                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    
                             <?php }else {
                              echo $previous_ranking;
                              echo $ranking;

                             }
                           }?></i></td>
                            <td>
                               <?php echo $value['new_affiliate'];?> New Affiliate  + <?php echo $value['existing_affiliate'];?> Existing affiliate<br>
                               && <br>
                               <?php echo $value['new_downstream'];?> New Down Stream  + <?php echo $value['existing_downstream'];?> Existing Down Stream 

                            </td>
                          </tr>
                         
                        <?php } ?>
                       
                      </tbody>
                  </table>
                  <div class="box-footer">
                    <!-- <button class="btn btn-primary" > Next</button>
                    <button class="btn btn-primary pull-right" >Previous</button> -->

                    
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