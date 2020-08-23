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
                        <h3 class="box-title">Complete University Details</h3>
                      </div>
            <?php echo form_open_multipart('insert_univ_details'); ?>
              <div class="box-body">
                  <div class="row" id="dynamic_field">
                  
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>University: <span style="color:red;">*</span></label>
                        <select name="university_name" class="form-control select2">
                          
                          <?php foreach($university_name as $key=>$value){ ?>
                            <option value="<?php echo $value['u_name_id'] ?>"><?php echo $value['university_name'] ?></option>
                          <?php } ?>
                          
                        </select>
                        
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Course Group: <span style="color:red;">*</span></label>
                          <select name="course_group" class="form-control select2">
                            
                            <?php 
                            foreach($course_group as $key=>$value){ ?>
                              <option value="<?php echo $value['course_group_id'] ?>"><?php echo $value['course_group_name'] ?></option>
                            <?php } ?>
                            
                          </select>
                          
                          </div>
                      </div>
                     
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Course Name: <span style="color:red;">*</span></label>
                              <input type="text" name="course_name" class="form-control" required placeholder="Course Name ex. MS Computer Science">
                          </div>
                      </div>

                     <div class="col-md-3">
                      <div class="form-group">
                        <label>Entry Terms: </label>
                        
                        <select class="form-control" name="entry_terms[]" multiple size=3>
                          <option value="Fall">Fall</option>
                          <option value="Spring">Spring</option>
                          <option value="Summer">Summer</option>
                        </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                      <div class="form-group">
                        <label>Deadlines: </label>
                        <input type="text" class="form-control" style="width: 100%;" name="deadline" placeholder="ex. Fall - Aug 01, Spring - Dec 30, Summer - Feb 12">
                        </div>
                      </div>
                    <div class="col-md-5" style="border: 1px solid gray; margin-bottom: 20px; margin-left: 50px;">
                      <h4 style="text-align: center; border-bottom: 1px solid gray;">  <span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Min. GRE Requirement</h4>

                       <div class="col-md-4">
                          <div class="form-group">
                            <label>Quants Score</label>
                              <input type="text" name="gre_quants" placeholder="ex. 162" class="form-control" id="gre_quants" oninput="greCalculate()" onchange="greCalculate()">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Verbal Score</label>
                              <input type="text" name="gre_verbal" placeholder="ex. 150" class="form-control" id="gre_verbal" oninput="greCalculate()" onchange="greCalculate()">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Total Score</label>
                              <input type="text" name="gre_total" placeholder="ex. 312" class="form-control" id ="gre_total" oninput="greCalculate1()" onchange="greCalculate1()">
                            </div>
                        </div>
                      </div>
                     
                      <div class="col-md-6" style="border: 1px solid gray; margin-bottom: 20px;  ">
                      <h4 style="text-align: center; border-bottom: 1px solid gray;">  <span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Min. TOEFL Requirement</h4>
                       
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Minimum Sub-Score</label>
                              <input type="text" name="toefl_min" placeholder="ex. 20" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Total Score</label>
                              <input type="text" name="toefl_total" placeholder="ex. 102" class="form-control">
                            </div>
                        </div>
                      </div>

                      <div class="col-md-5" style="border: 1px solid gray; margin-bottom: 20px; margin-left: 50px;">
                      <h4 style="text-align: center; border-bottom: 1px solid gray;">  <span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Min. IELTS Requirement</h4>
                       
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Minimum Sub-Score</label>
                              <input type="text" name="ielts_min" placeholder="ex. 6.5" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Total Score</label>
                              <input type="text" name="ielts_total" placeholder="ex. 6.5" class="form-control">
                            </div>
                        </div>
                      </div>
                      <div class="col-md-6" style="border:1px solid gray; ">
		                      <div class="col-md-6">
		                      	<div class="form-group">
		                      		<label>GPA:</label>
		                      		<input type="text" name="gpa" placeholder="ex. 8.0/10" class="form-control">
		                      	</div>
		                      </div>
		                      <div class="col-md-6">
		                      	<div class="form-group">
		                      		<label>Work Experience:(Compulsory / Optional)</label>
		                      		<input type="text" name="work-exp" placeholder="ex. Compulsory 2 years" class="form-control">
		                      	</div>
		                      </div>
		                 </div>


                      

               </div><!--row dynamic_field-->
            </div><!--box-body-->       
                     
               <div class="box-footer" style="text-align: center;" >

                <button type="submit" class="btn btn-info btn-fill" name="stu_submit">Add University Details</button>
                
              </div>
              <div class="clearfix"></div>


            </form>
          </div><!--box-->


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">University Details</h3>

            </div>

            <div class="box-body" style="overflow-x: scroll;">


              <table id="example1" class="table table-bordered ">
                <thead>
                <tr style="background-color:  #424949 ; color: white;">
                      <th>Sr No.</th>
                      <th>University Name</th>
                      <th>Course Group</th>   
                      <th>Course Name</th>                      
                      <th>Entry Terms</th>                      
                      <th>Deadline</th>
                      <th>Min. GRE Req</th>
                      <th>Min. TOEFL Req</th>
                      <th>Min. IELTS Req</th>
                      <th>Min. GPA Req</th>
                      <th>Work Exp. Req</th>
                      <th>Updated</th>
                      <th>Edit</th>
                      <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                   
                  <?php $i = 0;
                  foreach ($university_details as $key => $value) { 
                   $i++;

                    ?>

                 <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['university_name']; ?></td>
                      <td><?php echo $value['course_group_name']; ?></td>
                      <td><?php echo $value['course_name']; ?></td>
                      <td><?php echo $value['entry_terms']; ?></td>
                      <td><?php echo $value['deadline']; ?></td>
                      <td>Quants:<?php echo ' '.$value['gre_quants']; ?><br/>
                      	Verbal:<?php echo ' '.$value['gre_verbal']; ?>
                      	<br/>
                      	Total:<?php echo ' '.$value['gre_total']; ?>
                      </td>
                      <td>Subscore:<?php echo ' '.$value['toefl_subscore']; ?><br/>
                      	
                      	Total:<?php echo ' '.$value['toefl']; ?>
                      </td>
                      <td>Subscore:<?php echo ' '.$value['ielts_subscores']; ?><br/>
                      	
                      	Total:<?php echo ' '.$value['ielts']; ?>
                      </td>
                      
                      <td><?php echo $value['gpa']; ?></td>  
                      <td><?php echo $value['work_exp']; ?></td>                                                                      
                      <td><?php echo date('d-M-Y H:i:s',strtotime($value['university_details_updated'])); ?></td>
                      <td>  
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalu<?php echo $value['university_details_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></button>
                      </td>

                     <td>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $value['university_details_id']; ?>"><span class="glyphicon glyphicon-trash"></span></button>  
                          
                      </td>
                  </tr>

              <div class="modal fade" id="myModal<?php echo $value['university_details_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete University Detail</h4>
                    </div>
                    <form action="<?php echo base_url('delete_univ_details')?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="univ_detail_id" value="<?php echo $value['university_details_id']; ?>">
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

               <div class="modal fade" id="myModalu<?php echo $value['university_details_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update University Details</h4>
                    </div>
                    <div class="modal-body">
                       <form action="<?php echo site_url('update_univ_details')?>" method="post">
                    <div class="row">
                      <input type="hidden" name="univ_detail_id" value="<?php echo $value['university_details_id']; ?>">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>University: <span style="color:red;">*</span></label>
                        <select name="university_name" class="form-control select2">
                                                  
                            <option value="<?php echo $value['u_name_id'] ?>"><?php echo $value['university_name'] ?></option>
                                                   
                        </select>
                        
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Course Group: <span style="color:red;">*</span></label>
                        <select name="course_group" class="form-control select2">                         
                            <option value="<?php echo $value['course_group_id'] ?>"><?php echo $value['course_group_name'] ?></option>                     
                        </select>
                        
                        </div>
                      </div>

                     <div class="col-md-3">
                      <div class="form-group">
                        <label>Course Name: <span style="color:red;">*</span></label>                        
                        <input type="text" name="course_name" class="form-control" value="<?php echo $value['course_name'] ?>">
                        </div>
                      </div>

                     <div class="col-md-3">
                      <div class="form-group">
                        <label>Entry Terms: </label>
                        
                        <input type="text" name="entry_terms" class="form-control" value="<?php echo $value['entry_terms'] ?>">
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Deadlines: </label>
                        <input type="text" class="form-control" style="width: 100%;" name="deadline" placeholder="ex. Fall - Aug 01, Spring - Dec 30, Summer - Feb 12" value="<?php echo $value['deadline']; ?>">
                        </div>
                      </div>
                    <div class="col-md-5" style="border: 1px solid gray; margin-bottom: 10px;">
                      <h4 style="text-align: center; border-bottom: 1px solid gray;">  <span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Min. GRE Requirement</h4>

                       <div class="col-md-4">
                          <div class="form-group">
                            <label>Quants Score</label>
                              <input type="text" name="gre_quants" placeholder="ex. 162" class="form-control" id="gre_quants1"  value="<?php echo $value['gre_quants'] ?>" oninput="greCalculate2()" onchange="greCalculate2()">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Verbal Score</label>
                              <input type="text" name="gre_verbal" placeholder="ex. 150" class="form-control" id="gre_verbal1" oninput="greCalculate2()" onchange="greCalculate2()" value="<?php echo $value['gre_verbal'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Total Score</label>
                              <input type="text" name="gre_total" placeholder="ex. 312" class="form-control" id ="gre_total1" value="<?php echo $value['gre_total'] ?>" oninput="greCalculate3()" onchange="greCalculate3()">
                            </div>
                        </div>
                      </div>
                     
                      <div class="col-md-5" style="border: 1px solid gray; margin-bottom: 10px; margin-left:50px; ">
                      <h4 style="text-align: center; border-bottom: 1px solid gray;">  <span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Min. TOEFL Requirement</h4>
                       
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Minimum Sub-Score</label>
                              <input type="text" name="toefl_min" placeholder="ex. 20" class="form-control" value="<?php echo $value['toefl_subscore'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Total Score</label>
                              <input type="text" name="toefl_total" placeholder="ex. 102" class="form-control" value="<?php echo $value['toefl'] ?>">
                            </div>
                        </div>
                      </div>

                      <div class="col-md-5" style="border: 1px solid gray; margin-bottom: 10px;">
                      <h4 style="text-align: center; border-bottom: 1px solid gray;">  <span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Min. IELTS Requirement</h4>
                       
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Minimum Sub-Score</label>
                              <input type="text" name="ielts_min" placeholder="ex. 6.5" class="form-control" value="<?php echo $value['ielts_subscores'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Total Score</label>
                              <input type="text" name="ielts_total" placeholder="ex. 6.5" class="form-control" value="<?php echo $value['ielts'] ?>">
                            </div>
                        </div>
                      </div>
                      <div class="col-md-6" style="border:1px solid gray; margin-left: 50px;">
		                      <div class="col-md-6">
		                      	<div class="form-group">
		                      		<label>GPA:</label>
		                      		<input type="text" name="gpa" placeholder="ex. 8.0/10" class="form-control" value="<?php echo $value['gpa'] ?>">
		                      	</div>
		                      </div>
		                      <div class="col-md-6">
		                      	<div class="form-group">
		                      		<label>Work Experience:(Compulsory / Optional)</label>
		                      		<input type="text" name="work-exp" placeholder="ex. Compulsory 2 years" class="form-control" value="<?php echo $value['work_exp'] ?>">
		                      	</div>
		                      </div>
		                 </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-success" name="submit"> Submit</button>
                 	</div>
                    </form>
                    </div>
                  </div><!--Model content-->

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

<script type="text/javascript">
	 function greCalculate(){
	 	document.getElementById('gre_total').value = '';
	 	var verbal = document.getElementById('gre_verbal').value;
	 	var quants = document.getElementById('gre_quants').value;
	 	if(verbal!='' && quants!=''){
	 		var total = Number(quants) + Number(verbal);
		
	 		document.getElementById('gre_total').value = total;
	 	}

	 	
	}

	function greCalculate1(){
			
		var quants = document.getElementById('gre_quants').value;
		var total = document.getElementById('gre_total').value;
		var verbal = Number(total) - Number(quants);
		
		document.getElementById('gre_verbal').value = verbal;
	}

	function greCalculate2(){
	 	document.getElementById('gre_total1').value = '';
	 	var verbal = document.getElementById('gre_verbal1').value;
	 	var quants = document.getElementById('gre_quants1').value;
	 	if(verbal!='' && quants!=''){
	 		var total = Number(quants) + Number(verbal);
		
	 		document.getElementById('gre_total1').value = total;
	 	}
	}

	function greCalculate3(){
			
		var quants = document.getElementById('gre_quants1').value;
		var total = document.getElementById('gre_total1').value;
		var verbal = Number(total) - Number(quants);
		
		document.getElementById('gre_verbal1').value = verbal;
	}
</script>