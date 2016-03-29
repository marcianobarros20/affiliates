<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Contact Us | Tier5</title>
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

    <section class="no-margin">
        <iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49799.26337019521!2d-85.69035624773345!3d38.73034377843344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886bd20ec02fdea7%3A0x1c16995e39978d1!2sTier5!5e0!3m2!1sen!2s!4v1458908236414"></iframe>
    </section>

    <section id="contact-page" class="container">
        <div class="row-fluid">

            <div class="span8">
                <h4>Contact Form</h4>
                <div class="status alert alert-success" <?php if(!$this->session->userdata('succ_msg')){ echo 'style=display:none;';}?>>
                    <?php if($this->session->userdata('succ_msg')){echo $this->session->userdata('succ_msg');$this->session->set_userdata('succ_msg',''); }?>
                </div>
                <div class="status alert alert-error" <?php if(!$this->session->userdata('err_msg')){ echo 'style=display:none;';}?>>
                <?php if($this->session->userdata('err_msg')){echo $this->session->userdata('err_msg');$this->session->set_userdata('err_msg',''); }?>
                </div>
                <div class="status alert alert-warning" <?php if(!$this->session->userdata('err1_msg')){ echo 'style=display:none;';}?>>
                <?php if($this->session->userdata('err1_msg')){echo $this->session->userdata('err1_msg');$this->session->set_userdata('err1_msg',''); }?>
                </div>
                <form  method="post">
                  <div class="row-fluid">
                    <div class="span5">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="input-block-level" required="required" placeholder="Your First Name">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="input-block-level" required="required" placeholder="Your Last Name">
                        <label>Email Address</label>
                        <input type="email" name="email" class="input-block-level" required="required" placeholder="Your email address">
                    </div>
                    <div class="span7">
                        <label>Message</label>
                        <textarea name="message" id="message" required="required" class="input-block-level" rows="8"></textarea>
                    </div>

                </div>
               <!--  <button type="submit" class="btn btn-primary btn-large pull-right">Send Message</button> -->
                <input type='submit' name='submit' value='send message' class="btn btn-primary btn-large pull-right">

            </form>
        </div>

        <div class="span3">
            <h4>Our Address</h4>
            
            <p>
                <i class="icon-map-marker pull-left"></i> 2789 N Newman Rd, Lexington IN, 47138<br>
                
            </p>
            <p>
                <i class="icon-envelope"></i> &nbsp;hello@tier5.us
            </p>
            <p>
                <i class="icon-phone"></i> &nbsp;+812 722 4722
            </p>
            <p>
                <i class="icon-globe"></i> &nbsp;http://www.tier5.us
            </p>
        </div>

    </div>

</section>

<!--Footer-->
 <?php echo $middle;?>
<!--/Footer-->

<!--Footer-->
 <?php echo $footer;?>
<!--/Footer-->



<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>   

</body>
</html>
