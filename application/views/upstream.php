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

  <link rel="stylesheet" href="css/front_style.css">
 <script type="text/javascript" src="js/menu.js"></script>
 <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
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
    
     <script type="text/javascript" src="js/frame.js"></script>
 
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
      <div class="span2">
        <a href="<?php echo base_url();?>welcome/dashboard">Dashboard</a>
        <br>
        <a>Leader Board</a>
        <br>
        <a href="<?php echo base_url();?>welcome/view_upstream">Upstream</a>
        <br>
        <a href="<?php echo base_url();?>welcome/view_downstrem">Down Stream</a>
      </div>
      <div class="span10" >
         <h1 class="center">Team</h1>
         <div class="treelist">
          <ul>
            <li>
              <p>Aparajita</p>
              <a href="#" class="info" title="View Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
              <a href="#" class="upstream" title="View Upstream"><i class="fa fa-level-up" aria-hidden="true"></i></a>
            </li>
            <li>
              <p>Tania Mistry</p>
              <a href="#" class="info" title="View Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
              <a href="#" class="upstream" title="View Upstream"><i class="fa fa-level-up" aria-hidden="true"></i></a>
            </li>
            <li>
              <p>Gargi Pal</p>
              <a href="#" class="info" title="View Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
              <a href="#" class="upstream" title="View Upstream"><i class="fa fa-level-up" aria-hidden="true"></i></a>
            </li>
            <li>
              <p>Sudipta Mitra</p>
              <a href="#" class="info" title="View Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
              <a href="#" class="upstream" title="View Upstream"><i class="fa fa-level-up" aria-hidden="true"></i></a>
            </li>
            <li class="hasparent">
              <p>Nandita Das</p>
              <a href="#" class="info" title="View Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
              <a href="#" class="upstream" title="View Upstream"><i class="fa fa-level-up" aria-hidden="true"></i></a> 
            </li>
          </ul>
         </div>
      </div>
    </div>
    </section>
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
<!--Footer-->
  <?php echo $footer;?>
<!--/Footer-->
    
     <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
  // $(document).ready(function(){
  //   $(".tree ul li a.upstream").click(function(e){
  //     e.preventDefault();
  //     $(this).parent().parent().parent().parent().parent().wrap("<ul><li></li></ul>");
  //     $(this).parent().parent().parent().parent().parent().before('<div class="tree_elem"><div class="container-fluid"><div class="row">hjh<a href="#" class="info" title="View Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a><a href="#" class="upstream downstream" title="View Upstream"><i class="fa fa-level-up" aria-hidden="true"></i></a></div></div></div>');

  //     console.log($(this).length);

  //   });
  // });
</script>
<script type="text/javascript">
   $(document).ready(function(e){
    $(".treelist ul li a.upstream").click(function(e){
      e.preventDefault();
      $(this).parent().prev().addClass("showprev");
      $(this).parent().prev().addClass("hasparent");
      $(this).parent().removeClass("hasparent");
      $(this).hide();
      $(".treelist ul li::before").show();
    });
  });
</script>
</body>
</html>
