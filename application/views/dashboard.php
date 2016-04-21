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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
 <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
     <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
     <script type="text/javascript" src="js/frame.js"></script>
 <style>
     .parent{
        text-align: center;
        line-height: 100px;
     }

     #menu{
    width:900px;
    height: 50px;
    clear:both;
    background-color: #f7951e;
    font-family: 'Exo 2', sans-serif;
    text-align: center;

}
#menu ul{
    font-family: 'Exo 2', sans-serif;
    list-style:none;
    margin-top: 5px;
    margin-bottom: 5px;
    display:block;
    float: left;
    width: auto;
}
#menu ul li{
    font-family: 'Exo 2', sans-serif;
    list-style:none;
    display:inline;
    width:auto;
    height:50px;
    line-height:42px;
    font-size:18px;
}
#menu ul li a{
    font-family: 'Exo 2', sans-serif;
    font-size: 18px;
    height: auto;
    width: auto;
    float:next;
    text-decoration: none;
    color:#fff;
    padding-left: 40px;
    padding-right: 10px;
}
#menu ul li a:hover{
    height:auto;
    width: auto;
    text-decoration:none;
    color: #fff;
}
#menu ul li a.current{
    height:auto;
    width: auto;
    text-decoration:none;
    color: #fff;
}

#menu ul li:nth-of-type(1){

    background:url(./images/iconza/house_32x32.png) no-repeat;
    float: start;
    padding-top: 5px;
    padding-bottom: 10px;
}

#menu ul li:nth-of-type(2){

    background:url(./images/iconza/Car.png) no-repeat;
    float: start;
    padding-top: 5px;
    padding-bottom: 10px;

}

#menu ul li:nth-of-type(3){

    background:url(./images/iconza/house.png) no-repeat;
    float: start;
    padding-top: 5px;
    padding-bottom: 10px;
}

#menu ul li:nth-of-type(4){

    background:url(./images/iconza/offer.png) no-repeat;
    float: start;
    padding-top: 5px;
    padding-bottom: 10px;
}
#menu ul li:nth-of-type(5){

    background:url(./images/iconza/mail_32x32.png) no-repeat;
    float: start;
    padding-top: 5px;
    padding-bottom: 10px;
}












     </style>
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
                        <li><a href="<?php echo base_url();?>">Home</a> /</li>
                        <li class="active">Dashboard</li>
                        <a href="<?php echo base_url()?>welcome/dashboard">HI !! <?php echo $this->session->userdata('username');?></a>
                    </ul>
                </div>
            </div>
        </div>
    </section> 
    <!-- / .title -->   
    <section>


              <div id="menu">
                <ul>                                        
                     <li><a class="current" href="home.html" title="">HOME</a></li>
                     <li><a href="services.html" title="">TRANSPORT</a></li>
                      <li><a href="#" title="">ACCOMODATION</a></li>
                      <li><a href="#" title="">DEALS</a></li>
                      <li><a href="contact.html" title="">CONTACT</a></li>
                </ul>
              </div>











    </section>  
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
                <?php echo base_url();?>?aid=<?php echo $fetch_allinfo['refferalcode'];?>
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

        
            
<div class="comment_div text-center">
   (Click On the '+' To view the child affiliates &amp; Click on name to view description)
</div>


                        
<hr>
 

    <div class="container">
       
   <?php
  $res = fetchCategoryTreeList2($this->session->userdata('user_id'));
  foreach ($res as $r) {
    echo  $r;
  }
?>





    </div>


</section>





 <?php if(!empty($fetch_child)){ foreach ($fetch_child as $value) {

    $parent_info=Parentstatus($value['parent_id']);
                if($value['profile_image']!='')
                {
                    $img='profile_img/thumb/'.$value['profile_image'];
                }
                else
                {
                    $img='images/sample/no_photo.png';
                }

                            ?>
<div id="inline1_<?php echo $value['uid'];?>" style="width:400px;display: none;">
        <div class="col-md-12 col-lg-12"><div class="col-md-6 col-lg-6"><h3>Name: <?php echo $value['fname'].' '.$value['lname'];?></h3></div><div class="col-md-6 col-lg-6"><img src="<?php echo $img;?>" alt=""></div></div>
        <p><h4>Upper Tier:</h4> <?php echo $parent_info['fname'].' '.$parent_info['lname'];?></p>
        <p><h4>Description: </h4><?php echo $value['description'];?></p>
        
    </div>
<?php }}?>


<div id="chkline" style="width:400px;">
           
</div>



<!--Footer-->
  <?php echo $footer;?>
<!--/Footer-->
    
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js1/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    
</body>
</html>
