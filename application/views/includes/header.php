

<div>
 <header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">

                              <!-- This part need to be dynamic -->

                    <div class="logo-part"> 
                        <a id="logo" class="pull-left" href="<?php echo base_url();?>"></a>
                    </div>    

                    <div class="menu-part">
                    

                                <div class="header_lt">
                                <div class="click btn btn-navbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>

                                </div>
                                </div>                
                                <div class="main_nav">
                                            <ul>
                                               <li <?php if($this->uri->segment(2)==''){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>"><?php if($this->uri->segment(2)==''){ ?>{Home}<?php } else {?>Home<?php }?></a></li>
                                               <?php if($this->session->userdata('user_id')==''){ ?>
                                                <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='how'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>Contents/how"> <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='how'){?> {How it Works} <?php } else { ?>How It Works <?php }?></a></li>
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='payout'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>Contents/payout"><?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='payout'){?> {Payouts} <?php } else { ?> Payouts <?php }?></a></li>

                                              

                                                <?php } else { ?>

                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='dashboard'){ echo 'class="active"';} ?>><a href="<?php echo base_url()?>welcome/dashboard" > <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='dashboard'){?> {Dashboard} <?php } else { ?> Dashboard <?php }?> </a></li>
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='profile'){ echo 'class="active"';} ?>><a href="<?php echo base_url()?>welcome/profile" > <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='profile'){?> {Profile} <?php } else { ?> Profile <?php }?> </a></li>

                        <li class ="dropdown"><a style="cursor:pointer;"><?php if($this->uri->segment(2)!='' && ($this->uri->segment(2)=='Allcourses' || $this->uri->segment(2)=='affiliate_training' || $this->uri->segment(2)=="classinfo")){ ?> {Tutorials} <?php } else { ?>Tutorials<?php }?> <span class="caret"></span></a>
                        <ul class="sub-menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="contents/Allcourses">All Course</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="contents/affiliate_training">Affiliates training Details</a></li>
                        <li><a href="<?php echo base_url();?>twilio">Chat Room</a></li>
                        </ul>
                        </li>                                
                                                <?php }?>

                        


                     

                
                      
                    <?php if( ($this->input->cookie('reffrence_id')!='' || $set_code!='') && $this->session->userdata('user_id')=='')
                            { ?>

                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='register'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>welcome/register"><?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='register'){?>{Sign Up}<?php } else { ?> Sign Up <?php }?></a></li>
                        <?php }?>  
                        <?php if($this->session->userdata('user_id')==''){ ?>
                        <li <?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='contact'){ echo 'class="active"';} ?>><a href="<?php echo base_url();?>welcome/contact"><?php if($this->uri->segment(2)!='' && $this->uri->segment(2)=='contact'){?>{Get Started}<?php } else { ?> Get Started <?php }?></a></li>
                        <li><a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a></li>
                        <?php } else { ?>
                        <li class='login'><a href="<?php echo base_url();?>welcome/logout">Logout</a></li>
                        <?php }?> </ul>        
                                                                                                        
                                </div>
                                <div class="clearfix"></div> 


                    </div>  
                      
                    <!-- This part need to be dynamic -->




                

                <div class="clearfix"></div>
            </div>

            </div>
        </div>

     



    </header>

</div> 