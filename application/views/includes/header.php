

<div>
 <header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <div class="header-width">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a id="logo" class="pull-left" href="<?php echo base_url();?>"></a>
                <div class="nav-collapse pull-right">
                    <ul class="nav">

                      
                        <li <?php if($this->uri->segment(2)==''){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>"><?php if($this->uri->segment(2)==''){ ?>{Home}<?php } else {?>Home<?php }?></a></li>
                      <?php if($this->session->userdata('user_id')==''){ ?>
                       <!--  <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='about_us'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>index.php/Contents/about_us">About Us</a></li> -->
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='how'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>Contents/how"> <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='how'){?> {How it Works} <?php } else { ?>How It Works <?php }?></a></li>
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='payout'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>Contents/payout"><?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='payout'){?> {Payouts} <?php } else { ?> Payouts <?php }?></a></li>
                        <!-- <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='services'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>index.php/Contents/services">Services</a></li>
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='portfolio'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>index.php/Contents/portfolio">Portfolio</a></li>
                         <li class="dropdown <?php if($this->uri->segment(2)!='' && ($this->uri->segment(2)=='career' || $this->uri->segment(2)=='blog_item' || $this->uri->segment(2)=='faq'|| $this->uri->segment(2)=='pricing' || $this->uri->segment(2)=='error' || $this->uri->segment(2)=='typography' || $this->uri->segment(2)=='register' || $this->uri->segment(2)=='privacy' || $this->uri->segment(2)=='terms')){ ?> active <?php } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url();?>index.php/Contents/career">Career</a></li>
                                <li><a href="<?php echo base_url();?>index.php/Contents/blog_item">Blog Single</a></li>
                                <li><a href="<?php echo base_url();?>index.php/Contents/faq">FAQ</a></li>
                                <li><a href="<?php echo base_url();?>index.php/Contents/pricing">Pricing</a></li>
                                <li><a href="<?php echo base_url();?>index.php/Contents/error">404</a></li>
                                <li><a href="<?php echo base_url();?>index.php/Contents/typography">Typography</a></li>
                                <li><a href="<?php echo base_url();?>index.php/welcome/register">Registration</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url();?>index.php/Contents/privacy">Privacy Policy</a></li>
                                <li><a href="<?php echo base_url();?>index.php/Contents/terms">Terms of Use</a></li>
                            </ul>
                        </li>  -->
                   <!--    <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='blog'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>Contents/blog"><?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='blog'){?> {Blog} <?php } else { ?> Blog <?php }?></a></li> -->
                        <?php } else { ?>
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='dashboard'){ echo 'class="active"';} ?>><a href="<?php echo base_url()?>welcome/dashboard" > <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='dashboard'){?> {Dashboard} <?php } else { ?> Dashboard <?php }?> </a></li>
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='profile'){ echo 'class="active"';} ?>><a href="<?php echo base_url()?>welcome/profile" > <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='profile'){?> {Profile} <?php } else { ?> Profile <?php }?> </a></li>




                        <li id="menu1" data-toggle="dropdown"  <?php if($this->uri->segment(2)!='' && ($this->uri->segment(2)=='Allcourses' || $this->uri->segment(2)=='affiliate_training' || $this->uri->segment(2)=="classinfo")){ echo 'class="active"';} ?>><a style="cursor:pointer;"><?php if($this->uri->segment(2)!='' && ($this->uri->segment(2)=='Allcourses' || $this->uri->segment(2)=='affiliate_training' || $this->uri->segment(2)=="classinfo")){ ?> {Tutorials} <?php } else { ?>Tutorials<?php }?> <span class="caret"></span></a> </li>
                        <ul class="dropdown-menu1 dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="contents/Allcourses">All Course</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="contents/affiliate_training">Affiliates training Details</a></li>
                        
                        </ul>

                        <?php } ?>

                
                        <li class="login">
                      
                    <?php if( ($this->input->cookie('reffrence_id')!='' || $set_code!='') && $this->session->userdata('user_id')=='')
                            { ?>
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='register'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>welcome/register"><?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='register'){?>{Sign Up}<?php } else { ?> Sign Up <?php }?></a></li>
                            <?php }?>  
                             <?php if($this->session->userdata('user_id')==''){ ?>
                               <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='contact'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>welcome/contact"><?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='contact'){?>{Get Started}<?php } else { ?> Get Started <?php }?></a></li>
                            <li><a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a></li>
                        <?php } else { ?>
                        <a href="<?php echo base_url();?>welcome/logout">Logout</a>
                        <?php }?>
                        </li>
                    </ul>        
                </div><!--/.nav-collapse -->


                

                <div class="clearfix"></div>
            </div>
            </div>
        </div>
    </header>

</div> 