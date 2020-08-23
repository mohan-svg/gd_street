<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css'); ?>">
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
                        <h3 class="box-title">Add Benefits</h3>
                      </div>
            <?php echo form_open_multipart('insert_benefits_data'); ?>
              <div class="box-body">
                  <div class="row" id="dynamic_field">
                  <div id="row">                 	

                    <div class="col-md-4">
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
                        <label>Application Fees: </label>
                        <input type="text" class="form-control" name="appFees" placeholder="Fees without symbol $">
                        <label >Free:&nbsp;&nbsp;
						  <input type="radio" name="application_fees" value="yes" checked="checked">Yes&nbsp;&nbsp;
						  <input type="radio" name="application_fees" value="no">No
						  
						</label>
                        </div>

                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>GradStreet Processing Fees: </label>
                        <input type="text" class="form-control" name="process_fees" placeholder="Fees without symbol $">
                        <label>Free:&nbsp;&nbsp;
						 
						  <input type="radio" name="processing_fees" value="yes" checked="checked">Yes&nbsp;&nbsp;
						  <input type="radio" name="processing_fees" value="no">No
						</label>
                        </div>

                      </div>


                      </div><!--id=row-->
                       <div class="col-md-12">
                        <button type="button" name="add" id="add" class="btn btn-success">+ Add More</button>
                      </div>

               </div><!--row dynamic_field-->
            </div><!--box-body--> 
               <div class="col-md-12">      
                     <label>Note: Tick Free if wants to make Application/Processing fees free for students</label>
               </div>
               <div class="box-footer" style="text-align: center;" >

                <button type="submit" class="btn btn-info btn-fill" name="stu_submit">Add Course</button>
                
              </div>
              <div class="clearfix"></div>


            </form>
          </div><!--box-->


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Fees Benefit List</h3>

            </div>

            <div class="box-body" style="overflow-x: scroll;">


              <table id="example1" class="table table-bordered ">
                <thead>
                <tr style="background-color:  #424949 ; color: white;">
                      <th>Sr No.</th>
                      <th>University Name</th>                      
                      <th>Application Fees</th>                      
                      <th>Processing Fees</th>
                      <th>Updated</th>
                      <th>Edit</th>
                      <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                   
                  <?php $i = 0;
                  foreach ($benefits as $key => $value) { 
                   $i++;

                    ?>

                 <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['university_name']; ?></td>
                      
                      <td><b>$</b><?php echo $value['b_univ_fees']; ?> &nbsp;&nbsp;&nbsp;Free: 
                      	<?php if($value['app_fees_free']=='yes') {?> <i class="fa fa-check-square" style="color: green;"></i><?php } else{ ?> <i class="fa  fa-times-circle" style="color: red;"></i><?php } ?>
                      </td>
                      <td><b>$</b><?php echo $value['b_app_process_fees']; ?>&nbsp;&nbsp;&nbsp;Free: 
                      	<?php if($value['app_process_free']=='yes') {?> <i class="fa fa-check-square" style="color: green;"></i><?php } else{ ?> <i class="fa  fa-times-circle" style="color: red;"></i><?php } ?>
                      </td>
                      <td><?php echo date('d-M-Y H:i:s',strtotime($value['b_updated'])); ?></td>
                      <td>  
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalu<?php echo $value['b_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></button>
                      </td>

                     <td>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $value['b_id']; ?>"><span class="glyphicon glyphicon-trash"></span></button>  
                          
                      </td>
                  </tr>

              <div class="modal fade" id="myModal<?php echo $value['b_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete University</h4>
                    </div>
                    <form action="<?php echo base_url('delete_benefits_data')?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="benefit_id" value="<?php echo $value['b_id']; ?>">
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

               <div class="modal fade" id="myModalu<?php echo $value['b_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update Benefits Details</h4>
                    </div>
                    <div class="modal-body">
                       <form action="<?php echo site_url('update_benefits_data')?>" method="post">
                    <div class="row">
                      <input type="hidden" name="benefit_id" value="<?php echo $value['b_id']; ?>">
                   <div class="col-md-4">
                      <div class="form-group">
                        <label>University: <span style="color:red;">*</span></label>
                        <select name="university_name" class="form-control select2">                        	
                        	<option value="<?php echo $value['u_name_id'] ?>"><?php echo $value['university_name'] ?></option>
                        </select>
                        
                        </div>
                      </div>
                     
                     <div class="col-md-3">
                      <div class="form-group">
                        <label>Application Fees: </label>
                        <input type="text" class="form-control" name="appFees" placeholder="Fees without symbol $" value="<?php echo $value['b_univ_fees'];?>">
                        <label >Free:&nbsp;&nbsp;
                        	
						  <input type="radio" name="application_fees" value="yes" <?php if($value['app_fees_free']=='yes'){ ?> checked="checked" <?php } ?>>Yes&nbsp;&nbsp;
						  <input type="radio" name="application_fees" value="no" <?php if($value['app_fees_free']=='no'){ ?> checked="checked" <?php } ?>>No
						  
						</label>
                        </div>

                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>GradStreet Processing Fees: </label>
                        <input type="text" class="form-control" name="process_fees" placeholder="Fees without symbol $" value="<?php echo $value['b_app_process_fees']?>">
                        <label>Free:&nbsp;&nbsp;
						 
						  <input type="radio" name="processing_fees" value="yes" <?php if($value['app_process_free']=='yes'){ ?> checked="checked" <?php } ?>>Yes&nbsp;&nbsp;
						  <input type="radio" name="processing_fees" value="no" <?php if($value['app_process_free']=='no'){ ?> checked="checked" <?php } ?>>No
						</label>
                        </div>

                      </div>


                      </div><!--id=row-->
                      
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
<!-- Select2 -->
<script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.min.js'); ?>"></script>

<script>
  // $(document).ready(function(){
//     var i =1;

//     $('#add').click(function(){
//       i++;
//       $('#dynamic_field').append('<div id="row'+i+'" class="col-md-12" style="background-color: #95a5a6;padding:10px;margin-top: 15px;"><div class="col-md-12"><button type="button" name="remove" id="'+i+'" class="btn btn_remove pull-right" style="border-radius:50%;color:red;">X</button></div><div class="col-md-4"><div class="form-group"><label>University: <span style="color:red;">*</span></label><select name="university_name" class="form-control"></select></div></div><div class="col-md-3"><div class="form-group"><label>Application Fees: </label><input type="text" class="form-control" name="appFees" placeholder="Fees without symbol $"><label class="container">Free<input type="checkbox" name="application_fees"><span class="checkmark"></span></label></div></div><div class="col-md-3"><div class="form-group"><label>GradStreet Processing Fees: </label><input type="text" class="form-control" name="process_fees" placeholder="Fees without symbol $"><label class="container">Free<input type="checkbox" name="processing_fees"><span class="checkmark"></span></label></div></div></div>');
//     });

//     $(document).on('click', '.btn_remove', function(){
//       var button_id = $(this).attr("id");
//       $('#row'+button_id+'').remove();
//     });
//   });

//   document.addEventListener("DOMContentLoaded", function() {
//     var elements = document.getElementsByTagName("INPUT");
//     for (var i = 0; i < elements.length; i++) {
//         elements[i].oninvalid = function(e) {
//             e.target.setCustomValidity("");
//             if (!e.target.validity.valid) {
//                 e.target.setCustomValidity("Please fill this option");
//             }
//         };
//         elements[i].oninput = function(e) {
//             e.target.setCustomValidity("");
//         };
//     }
// });


</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
      })
</script>