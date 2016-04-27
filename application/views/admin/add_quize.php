<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <base href="<?php echo base_url();?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="admin_support/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin_support/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="admin_support/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="admin_support/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="admin_support/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="admin_support/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="admin_support/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="admin_support/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="admin_support/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="admin_support/dist/css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 
    <script src="js/jquery.validate.js"></script>
    

    <script type="text/javascript" src="js/affiliate.js"></script>
   
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php echo $header;?>
        <?php echo $leftsidebar;?>
        <?php echo $rightsidebar;?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <section class="content">
               <div class="row">

<?php 
if($this->session->userdata('succ_msg')!=''){?>
                      <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Success!</h4>
                    <?php echo $this->session->userdata('succ_msg');$this->session->set_userdata('succ_msg','');?>
                  </div>

<?php } if($this->session->userdata('err_msg')!=''){ ?>

<div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-ban"></i> Sorry!</h4>
                  <?php echo  $this->session->userdata('err_msg');$this->session->set_userdata('err_msg','');?>
                  </div>
<?php }?>














                    <div  class="box">
                          <div class="box-title">
                              <h3>Add Quize</h3>
                          </div>
                          <div class="box-body">
                      <form role="form" method="post" action="admin/courses/question_add" name="add_quize" id="add_quize" enctype="multipart/form-data">      
                            <div class="form-group">
                                <label>Select Course</label>
                                    <select id="quize_course_id" name="quize_course_id" class="form-control required">
                                        <option value="">--Select--</option>
                                        <?php foreach($allcoruse_list as $value)
                                        { ?>
                                        <option value="<?php echo $value['co_id'];?>"><?php echo $value['courses_name'];?></option>
                                        <?php }
                                        ?>
                                    </select> 
                            </div>
                         
                             <div class="form-group" id="ans_opt_div" style="display:none">
                                <label>Select Answer Type</label>
                                  <select  id="ans_opt" name="ans_opt" class="form-control required">
                                        <option value="">--Select--</option>
                                        <option value="1">MCQ</option>
                                        <option value="2">True/False</option>
                                        
                                    </select>  
                                
                            </div>

                   
                        
                             
                            <div class="form-group" id="question_div" style="display:none">
                                <label>Add Question</label>
                                <input type="text" id="quize_ques" name="quize_ques" class="form-control required">    
                            </div>
                            
                            <div class="form-group" id="statement_div" style="display:none">
                                <label>Add Statement</label>
                                <input type="text" id="quize_statement" name="quize_statement" class="form-control required">    
                            </div>
                           

                            <div class="form-group" id="true_false_div" style="display:none">
                                <label>Currect Answer</label><br>
                                     <input type="radio" name="true_false" value="True" class="required"> True<br>
                                     <input type="radio" name="true_false" value="False" class="required"> False<br>
                                       
       
                            </div>

                            <div class="form-group" id="select_option_div" style="display:none">
                                <label>Select Answer Option</label>
                                    <select id="answer_option" name="answer_option" class="form-control required">
                                        <option value="">--Select--</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>   
                            </div>

                            <div class="form-group" id="insert_answer_div" style="display:none">
                                <label>Insert Option</label>
                                
                                <div id="print"  class="form-control required"></div>
       
                                
                              
                                
                            </div>

                            <div  class="form-group" style="display:none" id="correct_answer_div">
                                <label>Currect Option</label>
                                    <div id="correct-ans"  class="form-control required"></div>
                                     <!-- <select id="currect_option" name="currect_option" class="form-control required">
                                        <option value="">--Select--</option>
                                       
                                    </select> -->
                            </div>
                            
                            <div class="box-footer" style="display:none" id="subit_div">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>


                          </div>
                        </form>



                    </div>
               </div>
            </section>
        </div>
        <!-- footer -->
        <?php echo $footer;?>
        <!-- footer -->
        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery UI 1.11.4 -->
   
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="admin_support/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
   
    <!-- Sparkline -->
    <script src="admin_support/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="admin_support/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="admin_support/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="admin_support/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="admin_support/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="admin_support/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="admin_support/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="admin_support/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    
    <!-- AdminLTE App -->
    <script src="admin_support/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
    <!-- AdminLTE for demo purposes -->
    <script src="admin_support/dist/js/demo.js"></script>
  </body>
</html>
