<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Dashboard | Tier5</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <base href="<?php echo base_url();?>">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <!-- tree css and js -->
    <link rel="stylesheet" href="css/jquery.jOrgChart.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <link href="css/prettify.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="js/prettify.js"></script>
    <!-- jQuery includes -->
    <script src="js/jquery.jOrgChart.js"></script>
    <!-- tree css and js -->
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/frame.js"></script>
    <style type="text/css">
      .board
      {
        text-align: center;
        background: #12dffd none repeat scroll 0 0;
        color: #fff;
        font-size: 20px;
      }

      .board :hover
      {
       color: #12dffd ;
       background: #fff;
      }
      
      .board-header
      {
        padding: 20px 20px 20px 20px;
      }
    </style>
  </head>

  <body onload="prettyPrint();">
    <!--Header-->
    <?php echo $header;?>
    <!-- /header -->

    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>{Dashboard}</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?php echo base_url();?>">Home</a> /</li>
                        <li class="active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->  
    
    <section id="about-us" class="container main" >
      <div class="row">
        <div class="span12" >
          <div class="row">
            <div class="span4 board">
              <div class="board-header" >
                <b>Rank This Week</b><br><br>
                <b><?php echo $fetch_rank['rank']; ?></b>
              </div>
            </div>
            <div class="span4 board">
              <div class="board-header" >
               <b>Total Affiliate</b><br><br>
              <b><?php echo $fetch_child; ?></b>
              </div>
            </div>
            <div class="span4 board" >
              <div class="board-header" >
                <b> Total Down Stream</b><br><br>
                <b><?php echo $total_affiliate=affiliate_count($fetch_allinfo['uid']);  ?></b>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Footer-->
    <?php echo $footer;?>
    <!--/Footer-->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
