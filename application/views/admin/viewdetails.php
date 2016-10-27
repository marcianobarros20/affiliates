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

    <link rel="stylesheet" href="css/admin_style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/affiliate.js"></script>
    <script type="text/javascript">
       function description(uid)
        {
          $('#myModal').modal('show');
          var res= $.ajax({
                          type : 'post',
                          url : 'Ajax/Fngetdetails',
                          data : 'uid='+uid,
                          async : false,
                          success : function(msg)
                           {
                               //alert(msg);
                               $('#chkline').html(msg);

                           }
          });
        }
    </script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    <?php echo $header;?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php echo $leftsidebar;?>
    <!-- Control Sidebar -->

    <?php echo $rightsidebar;?>
    <!-- /.control-sidebar -->


          
    <div class="content-wrapper">

      <section class="content-header">
            <ol class="breadcrumb">
               <li><a><i class="fa fa-dashboard"></i> Manage User</a></li>
                <li class="active"><a href="<?php echo base_url();?>admin/users"> Affiliate</a></li>
                 <li class="active"><a> View Details</a></li>
            </ol>
            <br>
        </section>
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="charttree">
            <div class="tree">
            <?php $res = fetchaffiliatestree($user_info['uid']);  if(!empty($res)){?>
              <ul>  
                 <li><a href='#'><div class='container-fluid'><div class='row'><?php echo $user_info['fname'].' '.$user_info['lname'];?><p><?php echo $total_affiliate=affiliate_count($user_info['uid']); ?></p></div></div></a> 
                   <?php
                      foreach ($res as $r) {
                        echo  $r;
                      }?>
                  </li>
              </ul>
            <?php }?>
            </div>
          </div>
    </section>

     <!--  <div class="charttree">
        <div class="tree">
        <?php $res = fetchaffiliatestree($user_info['uid']);  if(!empty($res)){?>
          <ul>  
              <li>
              <div class='tree_elem'>
                <div class='container-fluid'>
                  <div class='row'>
                    <?php echo $user_info['fname'].' '.$user_info['lname'];?>
                    <p><?php echo $total_affiliate=affiliate_count($user_info['uid']); ?></p>
                  </div>
                </div>
              </div> 
               <?php
                  foreach ($res as $r) {
                    echo  $r;
                  }?>
              </li>
          </ul>
        <?php }?>
        </div>
      </div> -->

      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Basic Informations</h4>
      </div>
      <div class="modal-body" id="chkline">
        ...
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

    </div>

    <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js" type="text/javascript"></script>
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


      <!-- footer -->
     <?php echo $footer;?>
     <!-- footer -->
  </body>
<script type="text/javascript">
  $(document).ready(function(){
    $(".tree ul li a.downstream").click(function(e){
      $(this).parent().parent().parent().parent().find($("ul")).first().toggleClass("open");
      $(this).parent().parent().parent().parent().siblings().find($("ul")).removeClass("open");
      e.preventDefault();

      $(this).toggleClass("upstream");

    });
  });
</script>


</html>
