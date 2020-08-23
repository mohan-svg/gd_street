<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <style type="text/css">
    @media (min-width: 768px){
      .modal-dialog {
          width: 70%;
          margin: 30px auto;
      }
    }
  </style>
<div class="content-wrapper">
    <section class="content">
       <div class="row">            
           <div class="col-md-12">
              <div class="box box-primary"><br>
                  <?php if ($this->session->flashdata('success')) { ?>

                      <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('success'); ?>
                      </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('error')) { ?>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('error'); ?>
                      </div>

                    <?php } ?>
                      <div class="box-header with-border">
                        <h3 class="box-title">Add Admit Reject Data</h3>

                      </div>
            <?php echo form_open_multipart('admit_rejects_data_insert'); ?>
              <div class="box-body">
                  <div class="row" id="dynamic_field">
                    <div id="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Student name: <span style="color:red;">*</span></label>
                        <input type="text" name="student_name[]" class="form-control" placeholder="Enter Student Full Name" required="Student Name is required">
                        

                        </div>
                      </div>
                     
                     <div class="col-md-4">
                      <div class="form-group">
                        <label>University name: <span style="color:red;">*</span></label>
                        <input type="text" name="university_name[]" class="form-control" placeholder="Enter University Name" required="University name Required">
                        

                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Course name:</label>

                           <input type="text" name="course_name[]" class="form-control" placeholder="Enter Course Name ex. MS Computer Science" required>
                        
                        </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                        <label>Term:</label>
                        <input type="text" name="term[]" class="form-control" placeholder="Enter Term ex. Spring 2020" required>

                        </div>
                      </div>


                     <div class="col-md-4">
                      <div class="form-group">
                       <label for="uniname">GRE:</label>
                        <input type="text" name="gre[]" class="form-control" placeholder="GRE Score out of 340 ex. 320" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                           <label for="uniname">English Test name:</label>
                             <select name="eng_test_name[]" class="form-control" required>
                                   <option value="ielts">IELTS</option>
                                   <option value="toefl">TOEFL</option>
                            </select>
                         </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                           <label for="uniname">English Test Score:</label>
                               <input type="text" name="eng_test_score[]" class="form-control" placeholder="Enter English Test Score ex. 6.5 or 90" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                       <label for="uniname">Under Grad-CGPA:</label>
                         <input type="text" name="ug_cgpa[]" class="form-control" placeholder="Enter Under Graduate CGPA ex. 7.2" required>

                        </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                       <label for="uniname">Work Experience (in months):</label>
                         <input type="number" name="work_exp[]" class="form-control" placeholder="Enter Work Experience in months ex. 16">

                        </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                       <label for="uniname">Status:</label>
                         <select name="status[]" class="form-control" style="border: 1px solid #ccc;" required>
                            <option value="Applied">Applied</option>
                            <option value="Admit">Admit</option>
                            <option value="Reject">Reject</option>
                            <option value="Interested">Interested</option>
                        </select>


                        </div>
                      </div>
                      </div><!--id=row-->
                       <div class="col-md-12">
                        <button type="button" name="add" id="add" class="btn btn-success">+ Add More</button>
                      </div>
                    
                    
                  </div><!--row dynamic_field-->
            </div><!--box-body-->
                     
               <div class="box-footer" style="text-align: center;" >

                <button type="submit" class="btn btn-info btn-fill" name="stu_submit">Add Admit Reject Data</button>
                
              </div>
              <div class="clearfix"></div>
            </form>
          </div><!--box-->


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Admit Rejects List</h3>

            </div>

            <div class="box-body" style="overflow-x: scroll;">


              <table id="example1" class="table table-bordered ">
                <thead>
                <tr style="background-color:  #424949 ; color: white;">
                      <th>Id</th>
                        <th>University Name</th>
                        <th>Student Name</th>

                        <th>Course Name</th>
                        <th>term</th>
                        <th>GRE</th>
                        <th>English Test Name</th>
                        <th>English Test Score</th>
                        <th>UG CGPA</th>
                        <th>Work Exp (months)</th>
                        <th>Status</th>
                        <th>Updated</th>
                        <th>Edit</th>
                        <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                   
                  <?php foreach ($admit_rejects as $key => $value) { ?>

                 <tr>
                       <td><?php echo $value['admit_reject_id']; ?></td>
                        <td><?php echo $value['university_name']; ?></td>
                        <td><?php echo $value['student_name']; ?></td>
                        <td><?php echo $value['course_name']; ?></td>
                        <td><?php echo $value['term']; ?></td>
                        <td><?php echo $value['gre']; ?></td>
                        <td><?php echo $value['eng_test_name']; ?></td>
                        <td><?php echo $value['eng_test_score']; ?></td>
                        <td><?php echo $value['ug_cgpa']; ?></td>
                        <td><?php echo $value['work_exp']; ?></td>
                        <td><?php echo $value['ar_status']; ?></td>
                        <td><?php echo date('d-m-Y H:i:s',strtotime($value['admit_reject_updated'])); ?></td>
                      <td>  
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalu<?php echo $value['admit_reject_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></button>
                      </td>

                     <td>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $value['admit_reject_id']; ?>"><span class="glyphicon glyphicon-trash"></span></button>  
                          
                      </td>
                  </tr>

              <div class="modal fade" id="myModal<?php echo $value['admit_reject_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete University</h4>
                    </div>
                    <form action="<?php echo base_url('admit_rejects_data_delete')?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $value['admit_reject_id']; ?>">
                        
                      <p>Are you sure?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <input type="submit" class="btn btn-danger" name="delete" value="Yes..! Delete">

                    </div>
                  </form>
                  </div>

                </div>
              </div>

               <div class="modal fade" id="myModalu<?php echo $value['admit_reject_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update University Details</h4>
                    </div>
                    <div class="modal-body">
                       <form action="<?php echo site_url('admit_rejects_data_update')?>" method="post">
                            <div class="row">
                              <input type="hidden" name="id" value="<?php echo $value['admit_reject_id']; ?>">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Student name: </label>
                                <input type="text" name="student_name" class="form-control" placeholder="Enter Student Full Name" value="<?php echo $value['student_name']; ?>">
                             
                                </div>
                              </div>

                              <div class="col-md-4">
                              <div class="form-group">
                                <label>University name: </label>
                                <input type="text" name="university_name" class="form-control" placeholder="Enter University Name" value="<?php echo $value['university_name']; ?>">

                                </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group">
                                <label>Course name: </label>
                                <input type="text" name="course_name" class="form-control" placeholder="Enter Course Name ex. MS Computer Science" value="<?php echo $value['course_name']; ?>">
                              </div>
                              </div>
                              
                             <div class="col-md-4">
                              <div class="form-group">
                                <label>Term: </label>
                                <input type="text" name="term" class="form-control" placeholder="Enter Term ex. Spring 2020" value="<?php echo $value['term']; ?>">

                                </div>
                              </div>

                              <div class="col-md-4">
                              <div class="form-group">
                                <label>GRE: </label>
                                <input type="text" name="gre" class="form-control" placeholder="GRE Score out of 340 ex. 320" value="<?php echo $value['gre']; ?>">
                             
                                </div>
                              </div>

                              <div class="col-md-4">
                              <div class="form-group">
                                <label>Under Grad-CGPA:</label>
                                <input type="text" name="ug_cgpa" class="form-control" placeholder="Enter Under Graduate CGPA ex. 7.2" value="<?php echo $value['ug_cgpa']; ?>">

                                </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group">
                                <label>English Test name:</label>
                                <input type="text" name="eng_test_name" class="form-control" placeholder="Enter English Test Name ex. IELTS" value="<?php echo $value['eng_test_name']; ?>">
                              </div>
                              </div>
                              
                             <div class="col-md-4">
                              <div class="form-group">
                                <label>English Test Score: </label>
                                <input type="text" name="eng_test_score" class="form-control" placeholder="Enter English Test Score ex. 6.5 or 90" value="<?php echo $value['eng_test_score']; ?>">
                                </div>
                              </div>

                              <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Work Experience (in months):</label>
                                    <input type="number" name="work_exp" class="form-control" placeholder="Enter Work Experience in months ex. 16" value="<?php echo $value['work_exp']; ?>">
                                </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Status:</label>
                                    <select name="status" class="form-control" style="border: 1px solid #ccc;">
                                            <option value="Applied" <?php if($value['ar_status']=='Applied'){?> selected="selected" <?php } ?> >Applied</option>
                                            <option value="Admit" <?php if($value['ar_status']=='Admit'){?> selected="selected" <?php } ?>>Admit</option>
                                            <option value="Reject" <?php if($value['ar_status']=='Reject'){?> selected="selected" <?php } ?>>Reject</option>
                                            <option value="Interested" <?php if($value['ar_status']=='Interested'){?> selected="selected" <?php } ?>>Interested</option>
                                        </select>
                                </div>
                              </div>
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                             <button type="submit" class="btn btn-success" name="submit"> Submit</button>
                    </form>
                    </div>
                  </div>

                </div>
              </div>
                      <?php
                        }
                      ?>
                   </tbody>
              </table>
            </div><!--box-body-->
          </div><!--box-->

        </div><!--col-md-12-->
      </div><!--row-->
    </section>
 </div><!--content wrapper-->

<script>
  $(document).ready(function(){
    var i =1;

    $('#add').click(function(){
      i++;
      $('#dynamic_field').append('<div id="row'+i+'" class="col-md-12" style="background-color: #95a5a6;padding:10px;margin-top: 15px;"><div class="col-md-12"><button type="button" name="remove" id="'+i+'" class="btn btn_remove pull-right" style="border-radius:50%;color:red;">X</button></div><div class="col-md-4"><div class="form-group"><label>Student name: <span style="color:red;">*</span></label><input type="text" name="student_name[]" class="form-control" placeholder="Enter Student Full Name" required></div></div><div class="col-md-4"><div class="form-group"><label>University name: <span style="color:red;">*</span></label><input type="text" name="university_name[]" class="form-control" placeholder="Enter University Name" required></div></div><div class="col-md-4"><div class="form-group"><label>Course name:</label><input type="text" name="course_name[]" class="form-control" placeholder="Enter Course Name ex. MS Computer Science" required></div></div><div class="col-md-4"><div class="form-group"><label>Term:</label><input type="text" name="term[]" class="form-control" placeholder="Enter Term ex. Spring 2020" required></div></div><div class="col-md-4"><div class="form-group"><label for="uniname">GRE:</label><input type="text" name="gre[]" class="form-control" placeholder="GRE Score out of 340 ex. 320" required></div></div><div class="col-md-4"><div class="form-group"><label for="uniname">English Test name:</label><select name="eng_test_name[]" class="form-control" required><option value="ielts">IELTS</option><option value="toefl">TOEFL</option></select></div></div><div class="col-md-4"><div class="form-group"><label for="uniname">English Test Score:</label><input type="text" name="eng_test_score[]" class="form-control" placeholder="Enter English Test Score ex. 6.5 or 90" required></div></div><div class="col-md-4"><div class="form-group"><label for="uniname">Under Grad-CGPA:</label><input type="text" name="ug_cgpa[]" class="form-control" placeholder="Enter Under Graduate CGPA ex. 7.2" required></div></div><div class="col-md-4"><div class="form-group"><label for="uniname">Work Experience (in months):</label><input type="number" name="work_exp[]" class="form-control" placeholder="Enter Work Experience in months ex. 16" required></div></div><div class="col-md-4"><div class="form-group"><label for="uniname">Status:</label><select name="status[]" class="form-control" style="border: 1px solid #ccc;" required><option value="Applied">Applied</option><option value="Admit">Admit</option><option value="Reject">Reject</option><option value="Interested">Interested</option></select></div></div></div>');
    });

    $(document).on('click', '.btn_remove', function(){
      var button_id = $(this).attr("id");
      $('#row'+button_id+'').remove();
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Please fill this option");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
});

</script>