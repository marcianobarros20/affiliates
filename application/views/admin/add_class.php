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

                    <div class="box"> 
                        <div class="box-header with-border">
                            <div class="form-group">
                                <h3 class="box-title">Add Course</h3>
                            </div>
                        </div>
                         
                        <form role="form" method="post" action="admin/courses/add_course" name="add_course" id="add_course" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Course Name</label>
                                <input type="text" id="new_course_name" name='new_course_name' placeholder="Enter Course Name" class="form-control required">
                            </div>
                           
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control required" placeholder="Enter Course Description" id="new_course_description" name='new_course_description'></textarea>
                            </div>
                             <div class="form-group">
                                <label>Upload introductory Video</label>
                                <input type="file" name="intro_video" id="intro_video" class="required">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        </form>                            
                    </div>

                    <br>
                    


                    <div class="box">
                        <div class="box-header with-border">
                              <div class="form-group">
                                  <h3 class="box-title">Add Class</h3>
                              </div>
                        </div>
                        
                        <div class="box-body">
                          <form role="form" method="post" action="admin/courses/add_class" name="add_class" id="add_class" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label>Select Course</label>
                                  <select id="course_id" name="course_id" class="form-control required">
                                      <option value="">--Select--</option>
                                      <?php foreach($couse_list as $value)
                                      { ?>
                                      <option value="<?php echo $value['co_id'];?>"><?php echo $value['courses_name'];?></option>
                                      <?php }
                                      ?>
                                  </select> 
                            </div>
                            <div class="form-group">
                                <label>Class Name</label>
                                <input type="text" id="new_class_name" name='new_class_name' placeholder="Enter Class Name" class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                
                                <textarea class="form-control required" placeholder="Enter Class Description" id="new_class_description" name='new_class_description'></textarea>
                            </div>

                           <!--  <div class="form-group" id="select_class_media" name="select_class_media">
                                <label>Select Media</label>
                                 <select id="course_media" name="course_media">
                                  <option value="">--Select--</option>
                                  <option value="1">Video</option>
                                  <option value="2">Audio</option>
                                  <option value="3">Image</option>
                                  <option value="4">Text</option>
                                 </select>A
                            </div>
                            
                            <div class="form-group">
                                <label>Browse file</label>
                                <input type="file" id="class_media" name="class_media" class="media">  
                            </div> -->





                      <!-- Upload Image: <div id="formdiv" class="form-group">
                      <div id="filediv">
                      <input type="file" id="file" name="user_file[]" multiple="multiple" accept="image/*" title="Select Images To Be Uploaded">
                      <br>

                      </div>
                      </div> -->
                      <label>Upload Video</label>
                       <div id="formdiv" class="form-group">
                      <div id="filediv">
                      <input type="file" id="video" name="user_video[]" multiple="multiple" accept="image/*" title="Select video/audio To Be Uploaded">
                      <br>

                      </div>
                      </div>

                     <!--  Upload File: <div id="formdiv" class="form-group">
                      <div id="filediv">
                      <input type="file" id="text_file" name="text_file[]" multiple="multiple" accept="image/*" title="Select file To Be Uploaded">
                      <br>

                      </div>
                      </div> -->

                            <div class="box-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form> 
                        </div>

                    </div>



                </div>
            </section>
        </div>
        <!-- footer -->
        <?php echo $footer;?>
        <!-- footer -->
        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

  
  <script type="text/javascript">
            $('#add_more').click(function() {
      "use strict";
      $(this).before($("<div/>", {
        id: 'filediv'
      }).fadeIn('slow').append(
        $("<input/>", {
          name: 'file[]',
          type: 'file',
          id: 'file',
          multiple: 'multiple',
          accept: 'image/*'
        })
      ));
    });

    $('#upload').click(function(e) {
      "use strict";
      e.preventDefault();

      if (window.filesToUpload.length === 0 || typeof window.filesToUpload === "undefined") {
        alert("No files are selected.");
        return false;
      }

      // Now, upload the files below...
      // https://developer.mozilla.org/en-US/docs/Using_files_from_web_applications#Handling_the_upload_process_for_a_file.2C_asynchronously
    });

    function deletePreview(ele, i) {
      "use strict";
      try {
        $(ele).parent().remove();
        window.filesToUpload.splice(i, 1);
         console.log(filesToUpload);
      } catch (e) {
        console.log(e.message);
      }
    }

    $("#file").on('change', function() {
      "use strict";

      // create an empty array for the files to reside.
      window.filesToUpload = [];

      if (this.files.length >= 1) {
        $("[id^=previewImg]").remove();
        $.each(this.files, function(i, img) {
          var reader = new FileReader(),
            newElement = $("<div id='previewImg" + i + "' class='abcd'><img /></div>"),
            deleteBtn = $("<span class='delete' onClick='deletePreview(this, " + i + ")'>delete</span>").prependTo(newElement),
            preview = newElement.find("img");

          reader.onloadend = function() {
            preview.attr("src", reader.result);
            preview.attr("alt", img.name);
          };

          try {
            window.filesToUpload.push(document.getElementById("file").files[i]);
          } catch (e) {
            console.log(e.message);
          }

          if (img) {
            reader.readAsDataURL(img);
          } else {
            preview.src = "";
          }

          newElement.appendTo("#filediv");
        });
      }
    });
    </script>
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
