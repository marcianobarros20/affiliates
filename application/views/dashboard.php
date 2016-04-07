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

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script type="text/javascript" src="js/affiliate.js"></script>
<!-- jessore slider starts -->
<script type="text/javascript" src="js/jssor.slider.min.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jssor_1_slider_init = function() {
            
            var jssor_1_options = {
              $AutoPlay: false,
              $AutoPlaySteps: 4,
              $SlideDuration: 160,
              $SlideWidth: 200,
              $SlideSpacing: 3,
              $Cols: 4,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 4
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 1,
                $SpacingY: 1
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 809);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>

        
        /* jssor slider bullet navigator skin 03 css */
        /*
        .jssorb03 div           (normal)
        .jssorb03 div:hover     (normal mouseover)
        .jssorb03 .av           (active)
        .jssorb03 .av:hover     (active mouseover)
        .jssorb03 .dn           (mousedown)
        */
        .jssorb03 {
            position: absolute;
        }
        .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
            position: absolute;
            /* size of bullet elment */
            width: 21px;
            height: 21px;
            text-align: center;
            line-height: 21px;
            color: white;
            font-size: 12px;
            background: url('img/b03.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb03 div { background-position: -5px -4px; }
        .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
        .jssorb03 .av { background-position: -65px -4px; }
        .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }

        /* jssor slider arrow navigator skin 03 css */
        /*
        .jssora03l                  (normal)
        .jssora03r                  (normal)
        .jssora03l:hover            (normal mouseover)
        .jssora03r:hover            (normal mouseover)
        .jssora03l.jssora03ldn      (mousedown)
        .jssora03r.jssora03rdn      (mousedown)
        */
        .jssora03l, .jssora03r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 55px;
            cursor: pointer;
            background: url('img/a03.png') no-repeat;
            overflow: hidden;
        }
        .jssora03l { background-position: -3px -33px; }
        .jssora03r { background-position: -63px -33px; }
        .jssora03l:hover { background-position: -123px -33px; }
        .jssora03r:hover { background-position: -183px -33px; }
        .jssora03l.jssora03ldn { background-position: -243px -33px; }
        .jssora03r.jssora03rdn { background-position: -303px -33px; }


        .comment
        {
            width: 150px;
           
            
        }
    </style>

<!-- jessore slider ends -->

</head>

<body>

    <!--Header-->
    <?php echo $header;?>
    <!-- /header -->

    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Dashboard</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?php echo base_url();?>">Home</a> <span class="divider"></span></li>
                        <li class="active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->   

    <section id="about-us" class="container main">
        <div class="row-fluid">
            <div class="span6">
                <h2>Personal Information</h2>
                <p>Name: <?php echo $fetch_allinfo['fname'].' '.$fetch_allinfo['lname'];?>
                
                <p>Email: <?php echo $fetch_allinfo['email']?></p>
                <p>Description: <?php echo $fetch_allinfo['description'];?></p> 
                 
                <p>Refferal Code: <?php echo $fetch_allinfo['refferalcode'];?></p>
                <a href="<?php echo base_url();?>Welcome/editprofile">Edit Profile</a>
                <br>
                In Order To Affiliate People, Please forword the below link.
                <br>
                <?php echo base_url();?>welcome/contact/<?php echo $fetch_allinfo['refferalcode'];?>

            </div>
            <div class="span6">

                
                <div>
                     <?php if( $fetch_allinfo['profile_image'])
                      {
                     ?>
                    <p><img src="profile_img/thumb/<?php echo $fetch_allinfo['profile_image'];?>" alt="images/sample/no_photo.png" ></p>
                     <?php
                     }
                    else
                    {
                      

                     ?> 
                               <img src="images/sample/no_photo.png" alt="images/sample/no_photo.png" >


                     <?php

                    }
                      

                     ?>
            </div>
        </div>

        <hr>
      </div>
        <!-- Meet the team -->
       

              
 
        <div class="row-fluid">
            <hr>
             <h1 class="center">Meet the Team</h1>

        
              <h2 align="center"> Tier4 Affiliates</h2>
                        <br>
                <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 809px; height: 350px; overflow: hidden; visibility: hidden;">
                    <!-- Loading Screen -->
                     
                    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                        <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                    </div>
                    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: -14px; width: 809px; height: 350px; overflow: hidden;">

                        <?php if(!empty($fetch_child)){ foreach ($fetch_child as $value) {
                            ?>
                        
                           <div class="span3" style="display: none;">

                            <div class="box"  style="height: 350px;">
                               <?php if( $value['profile_image'])
                                {
                                 ?>
                                <p><img src="profile_img/thumb/<?php echo $value['profile_image'];?>" alt="images/sample/no_photo.png" ></p>
                                 <?php
                                 }
                                  else
                                 {?>
                                   <img src="images/sample/no_photo.png" alt="images/sample/no_photo.png" >


                     <?php

                    }
                      

                     ?>
  

                                

                           
                        

                            <h5> <?php echo $value['fname']." ".$value['lname']?></h5>
                            <br>
                            <?php echo $value['description']?><br><br>
                           
                            Referal Code:<br><?php echo $value['refferalcode']?>
                            
                            <input type="button" value="Show Tier3" onclick="show_tier3( <?php echo $value['uid']?>)">
                                
                            </div>
                        </div>
                        
                        <?php }}?>
                   
                       
                    </div>
                    <!-- Bullet Navigator -->
                    <div data-u="navigator" class="jssorb03" style="bottom:10px;right:10px;">
                        <!-- bullet navigator item prototype -->
                        <div data-u="prototype" style="width:21px;height:21px;">
                            <div data-u="numbertemplate"></div>
                        </div>
                    </div>
                    <!-- Arrow Navigator -->
                    <span data-u="arrowleft" class="jssora03l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
                    <span data-u="arrowright" class="jssora03r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
                </div>
                <br>
                <br>
                <div id="show_lower_affiliates" class="row-fluid" style="display:none">
                          <h2 align="center"> Tier3 Affiliates</h2>
                           
                        
                </div>
        </div>
       
        
</section>

<!--Bottom-->
  <?php echo $middle;?>
<!--/Bottom-->


<!--Footer-->
  <?php echo $footer;?>
<!--/Footer-->

 <script>
        jssor_1_slider_init();
    </script>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
