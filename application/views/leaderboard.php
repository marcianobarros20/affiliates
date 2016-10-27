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
      .position .fa{
        display: block;
      }

     </style>
     <style type="text/css">
      

      .move-r
      {
        position: fixed;
        top :400px;
        right: 50px;
        opacity: 0.5;
        background: #fff;
        min-height: 30px;
        padding-top: 10px;
        font-size: 250%;
      }

      .move-l
      {
         position: fixed;
        top :400px;
        left: 50px;
        opacity: 0.5;
        background: #fff;
        min-height: 30px;
         padding-top: 10px;
         font-size: 250%;
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
                <div class="span6 " >
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
       

        <table class="table table-hover">
                   <!--  <span class="btn btn-default glyphicon glyphicon-chevron-left move-l" > </span> -->
                   <?php 
                            $days_ago = date('Y-m-d', strtotime('+14 days', strtotime($last_week_start)));
                        $date=$days_ago;
                        $ts = strtotime($date);
                        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
                         $next_week_start = date('Y-m-d', $start);

                         

                        


                   ?>
                  
                    <a href="<?php echo base_url();?>welcome/leader_board/<?php echo $next_week_start; ?>"  title="Next" class="btn btn-default fa fa-chevron-left move-l" ></a>
                    <a href="<?php echo base_url();?>welcome/leader_board/<?php echo $last_week_start; ?>"  title="Previous" class="btn btn-default fa fa-chevron-right pull-right move-r" ></a>
                      
                       Duration: <?php  echo $start_date=date("d,M Y", strtotime($last_week_start));?> - <?php echo $start_date=date("d,M Y", strtotime($last_week_end));?>
                      <tbody>
                        
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
      </div>
    </div>
    </section>




<!--Footer-->
  <?php echo $footer;?>
<!--/Footer-->
    
     <script src="js/bootstrap.min.js"></script>
  
</body>
</html>
