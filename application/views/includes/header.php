 <header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a id="logo" class="pull-left" href="<?php echo base_url();?>"></a>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">

                        <li <?php if($this->uri->segment(2)==''){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>">Home</a></li>
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='about_us'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>index.php/Contents/about_us">About Us</a></li>
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='how'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>index.php/Contents/how">How it Works</a></li>
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='payout'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>index.php/Contents/payout">Payouts</a></li>
                        <li  <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='services'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>index.php/Contents/services">Services</a></li>
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
                        </li> 
                       <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='blog'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>index.php/Contents/blog">Blog</a></li>

                        
                        <li class="login">
                        <?php if($this->session->userdata('user_id')==''){ ?>
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='contact'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>index.php/welcome/contact">{Get Started}</a></li>
                            <a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
                        <?php } else { ?>
                        <a href="<?php echo base_url()?>index.php/welcome/dashboard">HI !! <?php echo $this->session->userdata('username');?></a>
                        <a href="<?php echo base_url();?>index.php/welcome/logout">Logout</a>
                        <?php }?>
                        </li>
                    </ul>        
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </header>