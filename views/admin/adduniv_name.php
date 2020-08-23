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
                        <h3 class="box-title">Add University Name,Description</h3>

                      </div>
            <?php echo form_open_multipart('insert_university'); ?>
              <div class="box-body">
                  <div class="row" id="dynamic_field">
                    <div id="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>University Name: <span style="color:red;">*</span></label>
                        <input type="text" name="uname[]" class="form-control" placeholder="University Name" required>
                        

                        </div>
                      </div>
                     <div id="row">
                     <div class="col-md-8">
                      <div class="form-group">
                        <label>University Details: </label>
                        <textarea class="form-control" rows="4" style="width: 100%;" name="university_details[]" required></textarea>
                                           

                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Location:</label>

                              <input type="text" name="location[]" class="form-control" placeholder="ex.Tempe, Arizona USA" required>
                        
                        </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                        <label>Campuses:(comma seperated)</label>
                        <input type="text" name="campus[]" class="form-control" placeholder="ex. Tempe, PolyTechnic, Downtown Phoenix">

                        </div>
                      </div>


                     <div class="col-md-4">
                      <div class="form-group">
                       <label>Tuition Fees:(Master's)</label>
                        <input type="text" name="tuition_fees[]" class="form-control" placeholder="ex. USD 45,000">

                        </div>
                      </div>
                      </div><!--id=row-->
                       <div class="col-md-12">
                        <button type="button" name="add" id="add" class="btn btn-success">+ Add More</button>
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
              <h3 class="box-title">University List</h3>

            </div>

            <div class="box-body" style="overflow-x: scroll;">


              <table id="example1" class="table table-bordered ">
                <thead>
                <tr style="background-color:  #424949 ; color: white;">
                      <th>Sr No.</th>
                      <th>University Name</th>
                      <th>Location</th>
                      <th>Campus</th>
                      <th>Description</th>
                      <th>Fees</th>
                      <th>Updated</th>
                      <th>Edit</th>
                      <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                   
                  <?php $i = 0;
                  foreach ($university as $key => $value) { 
                   $i++;

                    ?>

                 <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['university_name']; ?></td>
                      <td><?php echo $value['campus']; ?></td>
                      <td><?php echo $value['location']; ?></td>
                      <td><?php echo $value['description']; ?></td>
                      <td><?php echo $value['tuition_fees']; ?></td>
                                                
                      <td><?php echo date('d-M-Y H:i:s',strtotime($value['u_name_updated'])); ?></td>
                      <td>  
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalu<?php echo $value['u_name_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></button>
                      </td>

                     <td>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $value['u_name_id']; ?>"><span class="glyphicon glyphicon-trash"></span></button>  
                          
                      </td>
                  </tr>

              <div class="modal fade" id="myModal<?php echo $value['u_name_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete University</h4>
                    </div>
                    <form action="<?php echo base_url('delete_university_name')?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="university_id" value="<?php echo $value['u_name_id']; ?>">
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

               <div class="modal fade" id="myModalu<?php echo $value['u_name_id']; ?>" role="dialog">
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
                      <input type="hidden" name="university_id" value="<?php echo $value['u_name_id']; ?>">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>University Name: </label>
                        <select class="form-control" name="university_name">
                          <option value="<?php echo $value['university_name']; ?>"><?php echo $value['university_name']; ?></option>
                        </select>
                     
                        </div>
                      </div>

                     <div class="col-md-8">
                      <div class="form-group">
                        <label>Description:</label>
                        <textarea class="form-control" rows="5" style="width: 100%;" name="university_details"><?php echo $value['description']; ?></textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                        <label>Campus: </label>
                        <input type="text" class="form-control" name="campus" value = "<?php echo $value['campus']; ?>">

                        </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                        <label>Location: </label>
                        <input type="text" class="form-control" name="location" value = "<?php echo $value['location']; ?>">
                      </div>
                      </div>
                      
                     <div class="col-md-4">
                      <div class="form-group">
                        <label>Tuition Fees: </label>
                        <input type="text" class="form-control" name="tuition_fees" value = "<?php echo $value['tuition_fees']; ?>">

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
      $('#dynamic_field').append('<div id="row'+i+'" class="col-md-12" style="background-color: #95a5a6;padding:10px;margin-top: 15px;"><div class="col-md-12"><button type="button" name="remove" id="'+i+'" class="btn btn_remove pull-right" style="border-radius:50%;color:red;">X</button></div><div class="col-md-4"><div class="form-group"><label>University Name: <span style="color:red;">*</span></label><input type="text" name="uname[]" class="form-control" placeholder="University Name" required></div></div><div id="row"><div class="col-md-8"><div class="form-group"><label>University Details: </label><textarea class="form-control" rows="4" style="width: 100%;" name="university_details[]" required></textarea></div></div><div class="col-md-4"><div class="form-group"><label>Location:</label><input type="text" name="location[]" class="form-control" placeholder="ex.Tempe, Arizona USA" required></div></div><div class="col-md-4"><div class="form-group"><label>Campuses:(comma seperated)</label><input type="text" name="campus[]" class="form-control" placeholder="ex. Tempe, PolyTechnic, Downtown Phoenix"></div></div><div class="col-md-4"><div class="form-group"><label>Tuition Fees:(Master)</label><input type="text" name="tuition_fees[]" class="form-control" placeholder="ex. USD 45,000"></div></div></div>');
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