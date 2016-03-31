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
                        <li><a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span></li>
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
                <p>Name: <?php echo $fetch_allinfo['fname'].' '.$fetch_allinfo['lname'];?></p>
                <p>Email: <?php echo $fetch_allinfo['email']?></p>
                <p><?php echo $fetch_allinfo['description'];?></p>
            </div>
            <div class="span6">
                <h2>Our Skills</h2>
                <div>
                    <div class="progress"><div class="bar" style="width: 80%; text-align:left; padding-left:10px;">Wordpress</div></div>
                    <div class="progress progress-warning"><div class="bar" style="width: 70%; text-align:left; padding-left:10px;">Joomla</div></div>
                    <div class="progress progress-info"><div class="bar" style="width: 60%; text-align:left; padding-left:10px;">Drupal</div></div>
                    <div class="progress progress-danger"><div class="bar" style="width: 90%; text-align:left; padding-left:10px;">Magento</div></div>
                </div>
            </div>
        </div>

        <hr>

        <!-- Meet the team -->
        <h1 class="center">Meet the Team</h1>

        <hr>

        <div class="row-fluid">
            <div class="span3">
                <div class="box">
                    <p><img src="images/sample/team1.jpg" alt="" ></p>
                    <h5>Leonard M. Spurlock</h5>
                    <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat.</p>
                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                </div>
            </div>

            <div class="span3">
                <div class="box">
                    <p><img src="images/sample/team2.jpg" alt="" ></p>
                    <h5>David J. Robbins</h5>
                    <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat.</p>
                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                </div>
            </div>

            <div class="span3">
                <div class="box">
                    <p><img src="images/sample/team4.jpg" alt="" ></p>
                    <h5>Thomas M. Morgan</h5>
                    <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat.</p>
                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                </div>
            </div>

            <div class="span3">
                <div class="box">
                    <p><img src="images/sample/team3.jpg" alt="" ></p>
                    <h5>Agustin E. Hightower</h5>
                    <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat.</p>
                    <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
        <p></p>
        <hr>

        <div class="row-fluid">
            <div class="span6">
                <h3>Why Choose Us?</h3>
                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
            </div>
            <div class="span6">
                <h3>Our Services</h3>
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                      <div class="accordion-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                          Professional Web Design
                      </a>
                  </div>
                  <div id="collapseOne" class="accordion-body collapse">
                    <div class="accordion-inner">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua.
                  </div>
              </div>
          </div>
          <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                  Premium Wordpress Themes
              </a>
          </div>
          <div id="collapseTwo" class="accordion-body collapse">
            <div class="accordion-inner">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
          </div>
      </div>
  </div>
  <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
          PSD2XHTML Conversion
      </a>
  </div>
  <div id="collapseThree" class="accordion-body collapse">
    <div class="accordion-inner">
      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
  </div>
</div>
</div>
</div>
</div>
</div>
</section>

<!--Bottom-->
  <?php echo $middle;?>
<!--/Bottom-->


<!--Footer-->
  <?php echo $footer;?>
<!--/Footer-->



<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
