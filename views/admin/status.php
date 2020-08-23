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
                    
             
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Student Applications</h3>

            </div>

            <div class="box-body" style="overflow-x: scroll;">


              <table id="example1" class="table table-bordered ">
                <thead>
                <tr style="background-color:  #424949 ; color: white;">
                    <th>Sr No.</th>
                    <th>Student Name</th>                    
                    <th>University</th>
                    <th>Course</th>
                    <th>Term</th>
                    <th>Application Status</th>
                    <th>Decision</th>
                    <th>Submitted on</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                   
                  <?php $i = 0;
                  foreach ($result as $key => $value) { 
                   $i++;

                    ?>

                <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['stud_fname']." ".$value['stud_lname'];?></td>
                      
                      <td><?php echo $value['university_name'];?></td>
                      <td>
                        <ul>
                            <li>Course1:
                                <?php echo $value['course_1'];?>
                            </li>
                            <li>Specialization:
                                <?php echo $value['specialization_1'];?>
                            </li>
                            <li>Course2:
                                <?php echo $value['course_2'];?>
                            </li>
                            <li>Specialization:
                                <?php echo $value['specialization_2'];?>
                            </li>
                        </ul>
                    </td>
                    <td>
                        <?php echo $value['term'];?>
                    </td>
                    <td>
                         <?php echo $value['app_status'];?>
                    </td>
                    <td>
                        <?php echo $value['decision'];?>
                    </td>                                                                      
                      <td><?php echo date('d-M-Y H:i:s',strtotime($value['submitted_on'])); ?></td>
                      <td>  
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalu<?php echo $value['app_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></button>
                      </td>

                     <td>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $value['app_id']; ?>"><span class="glyphicon glyphicon-trash"></span></button>  
                          
                      </td>
                </tr>

              <div class="modal fade" id="myModal<?php echo $value['app_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete University</h4>
                    </div>
                    <form action="<?php echo base_url('delete_student_status')?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="app_id" value="<?php echo $value['app_id']; ?>">
                        <?php echo form_error('uniname',"<div style='color:red'>","</div>");?>
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

               <div class="modal fade" id="myModalu<?php echo $value['app_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update Course Details</h4>
                    </div>
                    <div class="modal-body">
                       <form action="<?php echo site_url('update_student_status')?>" method="post">
                    <div class="row">
                      <input type="hidden" name="app_id" value="<?php echo $value['app_id']; ?>">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Student Name: <span style="color:red;">*</span></label>

                        <select name="stud_name" class="form-control">
                            <option value="<?php echo $value['stud_id']; ?>"><?php echo $value['stud_fname']." ".$value['stud_lname'];?></option>
                        </select>
                                                
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>University: <span style="color:red;">*</span></label>

                        <select name="university_name" class="form-control">
                            <option value="<?php echo $value['university_name']; ?>"><?php echo $value['university_name']?></option>
                        </select>
                                                
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Course 1: <span style="color:red;">*</span></label>
                            <input type="text" name="course1" class="form-control" value="<?php echo $value['course_1']?>">
                                                                        
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Specialization 1: <span style="color:red;">*</span></label>
                            <input type="text" name="specialization_1" class="form-control" value="<?php echo $value['specialization_1']?>">
                                                                        
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Course 2: <span style="color:red;">*</span></label>
                            <input type="text" name="course2" class="form-control" value="<?php echo $value['course_1']?>">
                                                                        
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Specialization 2: <span style="color:red;">*</span></label>
                            <input type="text" name="specialization_2" class="form-control" value="<?php echo $value['specialization_2']?>">
                                                                        
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Term: <span style="color:red;">*</span></label>

                        <input type="text" name="term" class="form-control" value="<?php echo $value['term']?>">
                                                
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Application Status: <span style="color:red;">*</span></label>

                        <select class="form-control" name="application_status">
                            <option selected="selected" value="<?php echo $value['app_status'];?>"><?php echo $value['app_status'];?></option>
                             <option value="submitted to university">Submitted to University</option>
                             <option value="pending">Document Pending</option>
                             <option value="admit">Admit</option>
                             <option value="reject">Reject</option>
                             <option value="under review">Under Review</option>
             
                        </select>
                                                
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Decision: <span style="color:red;">*</span></label>

                        <select name="decision" class="form-control">
                            <option value="<?php echo $value['decision']?>"><?php echo $value['decision']?></option>
                            <option value="admit">Admit</option>
                            <option value="reject">Reject</option>
                            <option value="on hold">On Hold</option>
                            <option value="conditional admit">Conditional Admit</option>
                        </select>
                                                
                        </div>
                      </div>
                                      
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-success" name="submit"> Update</button>
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