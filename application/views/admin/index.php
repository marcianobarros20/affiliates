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
     <link rel="stylesheet" href="admin_support/dist/css/admindashboard.css">
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

    
    <style type="text/css">
#map_canvas { width: 500px; height: 500px; }
</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <!--<script type="text/javascript" src='js/map.js'></script>-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript">
  

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
<?php

    $str='';
   $min_long='';
    $min_lat='';
    $tot_long=0;
    $tot_lang=0;
  
    foreach($users_info as $key=>$prop){
     $info='address:'.$prop['address'];
     $str.="['".addslashes($info)."',".$prop['latitude'].", ".$prop['longitude'].", ".($key+1)."],";
        $tot_long+=$prop['longitude'];
        $tot_lang+=$prop['latitude'];
        $min_long=$tot_long/count($users_info);
        $min_lat=$tot_lang/count($users_info);

       
    }
    $str=substr($str,0,-1);

?>
var locations = 
  [
    <?=$str?>
  ];

var infowindow = new google.maps.InfoWindow();

var marker, i;
function initialize() {
map = new google.maps.Map(document.getElementById('map_canvas'), {
     zoom: 5,
    scrollwheel: true,
   navigationControl: true,
    mapTypeControl: true,
    scaleControl: true,
    draggable: true,
   // zoomControl: true , 

  
    center: new google.maps.LatLng(37.090240,-95.712891),
    mapTypeId: google.maps.MapTypeId.ROADMAP
});

for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
    });

    google.maps.event.addListener(marker, 'click', (function (marker, i) {
        return function () {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
        }
    })(marker, i));
}
//map.setZoom();
}
directionsDisplay = new google.maps.DirectionsRenderer();

directionsDisplay.setMap(map);

/*var start = new google.maps.LatLng(-33.890542, 151.274856);
var end = new google.maps.LatLng(-34.028249, 151.157507);
var request = {
    origin: start,
    destination: end,
    travelMode: google.maps.DirectionsTravelMode.DRIVING
};
directionsService.route(request, function (response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
    }
});
}*/
google.maps.event.addDomListener(window, 'load', initialize);




</script>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">



<input type='hidden' name='arr_places' id='arr_places' value="<?php echo $str;?>">

<input type='hidden' name='min_long' id='min_long' value='<?php echo $min_long;?>'>
<input type='hidden' name='min_lat' id='min_lat' value='<?php echo $min_lat;?>'>

    <div class="wrapper">

     <?php echo $header;?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php echo $leftsidebar;?>

      <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 align="center">
               Welcome Admin
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <section class="content">
            <div class="col-lg-12">
                <h3>Dashboard</h3>
            </div>
            
            <div id="Dispaly_Div" class="col-sm-12 col-md-12 col-xs-12">
                  <div class="col-sm-4">
                      <div class="box">
                        Active Affiliate
                        <br>
                        
                        <?php echo $active_users;?>
                        <br>
                        <br><br>
                        <a id="link_index" href="<?php echo base_url();?>admin/users">Click</a>
                      </div>

                  </div>
                   
                  <div class="col-sm-4">
                      <div class="box">
                        Non-Affiliate User
                         &nbsp;&nbsp;&nbsp;
                        <?php
                         echo ($pending_approval+$rejected_approval);
                        ?>
                        <br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Pending Approval&nbsp;&nbsp;&nbsp;<?php echo $pending_approval?>
                         <br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         Rejected Approval &nbsp;&nbsp;&nbsp;<?php echo $rejected_approval ?>
                         <br>
                         <a id="link_index" href="<?php echo base_url();?>admin/users/non_aff">Click</a>
                      </div>
                  </div>

                  <div class="col-sm-4">
                      <div class="box">
                        Deleted User
                         <br>
                        <?php echo $deleted_users?>
                        <br>
                        <br><br>
                        <a id="link_index" href="<?php echo base_url();?>admin/users/delete_affiliate">Click</a>
                      </div>
                  </div>
                  
                 
                  <div class="col-sm-4">
                      <div class="box">
                        Blog Status
                        <br><br>
                        Active Bloge
                        &nbsp;&nbsp;&nbsp;
                        <?php echo $active_blog;?>
                        <br>
                        Inctive Bloge
                        &nbsp;&nbsp;&nbsp;
                        <?php echo $inactive_blog;?>
                        
                      </div>

                  </div>

            </div>
          <!-- map -->
        <div id="map_canvas"></div>
        <!-- end map -->
        
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
