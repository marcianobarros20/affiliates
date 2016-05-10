<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Tier5 Affiliates</title>
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

<script src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/menu.js"></script>

    <script src='js/video.js'></script>

   <!-- test -->


        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="video_file/lightgallery.css" rel="stylesheet">
   <!-- test -->


</head>

<body>

    <!--Header-->
   <?php echo $header;?>
    <!-- /header -->
<input type='hidden' id="video_open" value='0'>
    <!--Slider-->
    <section id="slide-show">
     <div id="slider" class="sl-slider-wrapper">

        <!--Slider Items-->    
        <div class="sl-slider">
            <!--Slider Item1-->
            <div class="sl-slide item1" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="container">
                        <img class="pull-right" src="images/sample/slider/img1.png" alt="" />

                        <h2>Start Your Career</h2>
                        <h3 class="gap">Sign Up Now To Get Started</h3>
                        <a href="welcome/contact" style="cursor:pointer;"><h4 class="gap">Learn More<h3></a>
                       
                    </div>
                </div>
            </div>
            <!--/Slider Item1-->

            <!--Slider Item2-->
            <div class="sl-slide item2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="sl-slide-inner">
                    <div class="container">
                        <img class="pull-right" src="images/sample/slider/img2.png" alt="" />
                        <h2>Training &amp; Support</h2>
                        <h3 class="gap">Access to Success Training and Support</h3>
                        <a href="welcome/contact" style="cursor:pointer;"><h4 class="gap">Learn More<h3></a>
                        
                    </div>
                </div>
            </div>
            <!--Slider Item2-->

            <!--Slider Item3-->
            <div class="sl-slide item3" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                   <div class="container">
                    <img class="pull-right" src="images/sample/slider/img3.png" alt="" />
                    <h2>Get Paid</h2>
                    <h3 class="gap">Get paid for your hard work and the work of your network.</h3>
                    <a href="welcome/contact" style="cursor:pointer;"><h4 class="gap">Learn More<h3></a>
                </div>
            </div>
        </div>
        <!--Slider Item3-->

    </div>
    <!--/Slider Items-->

    <!--Slider Next Prev button-->
    <nav id="nav-arrows" class="nav-arrows">
        <span class="nav-arrow-prev"><i class="icon-angle-left"></i></span>
        <span class="nav-arrow-next"><i class="icon-angle-right"></i></span> 
    </nav>
    <!--/Slider Next Prev button-->

</div>
<!-- /slider-wrapper -->           
</section>
<!--/Slider-->
 <div class='text-center'><h4><?php if($this->session->userdata('err_msg')!=''){ echo '<span class="error">'.$this->session->userdata('err_msg').'</span>'; $this->session->set_userdata('err_msg','');} 
if($this->session->userdata('succ_msg')!=''){ echo $this->session->userdata('succ_msg');$this->session->set_userdata('succ_msg','');}?>
</h4></div>
<!-- <a id="various1" href="#inline1" class="fancybox" title="Watch This Video" style="display:none;">Inline - auto detect width / height</a> -->
<section class="main-info">
    <div class="container">
        <div class="row-fluid">
            <div class="span9">
                <h4>Tier5 introduces the <strong>Tier5 Affiliate Program</strong></h4>
                <p class="no-margin">With the Tier5 Affiliate Program we provide all the training and materials you need to make a more than successful living working mostly in the Technical Industry.</p>
            </div>

            <div class="span3">
                <a class="btn btn-success btn-large pull-right" href="<?php echo base_url();?>Tier5.docx" download="Tier5.docx">Get The Packet</a>
            </div>
        </div>
    </div>
</section>




<!-- testing -->
<div id="Video_place">
                
                <div style="display:none;" id="video1">
                   <!--  <video class="lg-video-object lg-html5" controls="controls" id="homepageVideo" autoplay>
                        <source src="video_file/video1.mp4" type="video/mp4">
                         Your browser does not support HTML5 video.
                    </video> -->
                </div>
               
                <div class="demo-gallery dark mrb35" style="display:none;">
                    <ul id="html5-videos" class="list-unstyled row">
                         <li class="col-xs-6 col-sm-4 col-md-3 video" data-poster="video_file/thumb-v-y-2.jpg" data-sub-html="&lt;h4&gt;CGI Animated Short HD: Student Academy Award Winning 'PeckPocketed' by Kevin Herron&lt;/h4&gt;" data-html="#video1">
                            <a href="" id="new_my_video">
                                <img class="img-responsive" src="video_file/thumb-v-y-2.jpg">
                                <div class="demo-gallery-poster">
                                    <img src="video_file/play-button.png">
                                </div>
                            </a>
                        </li>
                         </ul>
                </div>

</div>           

<!-- testing -->





<!--Services-->
<section id="services" >
    <div class="container">
        <div class="center gap">
            <h3>What We Offer</h3>
            <p class="lead">There are so many benefits of being a Tier5 Affiliate</p>
        </div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-usd icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Great Pay</h4>
                        <p>As a Tier5 Affiliate you enjoy 50% - 100% of the payout. You also get paid on 5 Tiers of your down stream. You can make $2,000 a week being a Tier5 Affiliate.</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class=" icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Remote Work</h4>
                        <p>There is no need to come to an office. You can work anywhere that you have a computer and internet connection. </p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-thumbs-up-alt icon-medium icon-rounded"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Success Training</h4>
                        <p>We want all of our Affiliates to be successfull as your success directly contributes to the success of Tier5. We offer success training in the form of blogs, forums, online classes, videos, 1 on 1 calls, and group conference calls. You have access to all this in your Affiliate Portal.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="gap"></div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-suitcase icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Industry Experience</h4>
                        <p>Get hands on real world experience in the technology industry. You can get real world experience in design, development, digital marketing, quality auditing, project management, sales, marketing, and client retention.</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-leaf icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Light Work</h4>
                        <p>There's no need to work 8 or 10 hours a day. Although you can work that much or more to generate even more revenue, 2 to 3 hours a day is enough time for a Tier5 Affiliate.</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-trophy icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Proven Track Record</h4>
                        <p>We have been doing design, development, and digital marketing for 7+ years. We have a massive portfolio and a long list of client references when needed.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--/Services-->

<section id="recent-works" class="text-center">
    <div class="container">
        <div class="center">
            <h3>WHO BUYS OUR SERVICES?</h3>
            <p class="lead">These are just a few design and development firms who regularly purchase our services.</p>
        </div>  
        <div class="gap"></div>
        <ul class="gallery col-4">
            <!--Item 1-->
            <li>
                <div class="preview">
                    <img alt=" " src="images/item-strategies-logo11.png">
                    <div class="overlay">
                    </div>
                    <div class="links">
                       <a href="http://itemstrategies.com/"><i class="icon-link"></i></a>                          
                    </div>
                </div>
                <div class="desc">
                    <h5>Item Strategies	</h5>
                </div>
                <div id="modal-1" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/item-strategies-logo11.png" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>                 
            </li>
            <!--/Item 1--> 

            <!--Item 2-->
            <li>
                <div class="preview">
                    <img alt=" " src="images/iscalogo1.png">
                    <div class="overlay">
                    </div>
                    <div class="links">
                       <a href="http://www.iscadesignstudio.com/"><i class="icon-link"></i></a>                                
                    </div>
                </div>
                <div class="desc">
                    <h5>ISCA Design Studio</h5>
                </div>
                <div id="modal-1" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/iscalogo1.png" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>                 
            </li>
            <!--/Item 2-->

            <!--Item 3-->
            <li>
                <div class="preview">
                    <img alt=" " src="images/happehippos.png">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a href="http://www.happehippos.com/"><i class="icon-link"></i></a>                                
                    </div>
                </div>
                <div class="desc">
                    <h5>Happe Hippos</h5>
                </div>
                <div id="modal-3" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/happehippos.png" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>                 
            </li>
            <!--/Item 3--> 

            <!--Item 4-->
            <li>
                <div class="preview">
                    <img alt=" " src="images/blackstone.png">
                    <div class="overlay">
                    </div>
                    <div class="links">
                      <a href="http://www.blackstonemedia.com/"><i class="icon-link"></i></a>                                
                    </div>
                </div>
                <div class="desc">
                    <h5>Black Stone Media</h5>
                </div>
                <div id="modal-4" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/blackstone.png" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>                 
            </li>
            <!--/Item 4-->               

        </ul>
    </div>

</section>



<!--Footer-->
<?php echo $footer;?>
<!--/Footer-->
<!-- test -->
<script src="video_file/jquery.js"></script>
<script src="video_file/lightgallery.js"></script>
<script src="video_file/lg-video.js"></script>
<script src="video_file/demos.js"></script>
<!-- test -->


<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- Required javascript files for Slider -->
<script src="js/jquery.ba-cond.min.js"></script>
<script src="js/jquery.slitslider.js"></script>
<!-- /Required javascript files for Slider -->

<!-- SL Slider -->
<script type="text/javascript"> 
$(function() {
    var Page = (function() {

        var $navArrows = $( '#nav-arrows' ),
        slitslider = $( '#slider' ).slitslider( {
            autoplay : true
        } ),

        init = function() {
            initEvents();
        },
        initEvents = function() {
            $navArrows.children( ':last' ).on( 'click', function() {
                slitslider.next();
                return false;
            });

            $navArrows.children( ':first' ).on( 'click', function() {
                slitslider.previous();
                return false;
            });
        };

        return { init : init };

    })();

    Page.init();
});
</script>
<!-- /SL Slider -->
</body>
</html>