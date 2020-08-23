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
                        <h3 class="box-title">Add University Images</h3>
                      </div>
            <?php echo form_open_multipart('insert_images_data'); ?>
              <div class="box-body">
                  <div class="row" id="dynamic_field">
                          
                    <div class="col-md-3    ">
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
                        <label>Logo: </label>
                          <input type="file" name="img1" class="form-control" style="border-bottom: 1px solid #ddd;"> 
                        
                        </div>

                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Main Image: </label>
                            <input type="file" name="img2" class="form-control">                     
                        </div>

                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Slider Image 1: </label>
                            <input type="file" name="img3" class="form-control">                   
                        </div>

                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Slider Image 2:</label>
                            <input type="file" name="img4" class="form-control">                     
                        </div>

                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Slider Image 3:</label>
                            <input type="file" name="img5" class="form-control">                     
                        </div>

                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Slider Image 4:</label>
                            <input type="file" name="img6" class="form-control">                     
                        </div>

                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Slider Image 5:</label>
                            <input type="file" name="img7" class="form-control">                     
                        </div>

                      </div>

               </div><!--row dynamic_field-->
            </div><!--box-body--> 
             
               <div class="box-footer" style="text-align: center;" >

                <button type="submit" class="btn btn-info btn-fill" name="stu_submit">Add Images</button>
                
              </div>
              <div class="clearfix"></div>


            </form>
          </div><!--box-->


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">University Images</h3>

            </div>

            <div class="box-body" style="overflow-x: scroll;">


              <table id="example1" class="table table-bordered ">
                <thead>
                <tr style="background-color:  #424949 ; color: white;">
                    <th>Sr No.</th>
                    <th>University Name</th>
                    <th>Logo</th>
                    <th>Main Image</th>
                    <th>Slider Images</th>
                    <th>Updated</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                   
                  <?php $i = 0;
                  foreach ($university_images as $key => $value) { 
                   $i++;

                    ?>

                 <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['university_name']; ?></td>
                      
                      <td><a class="btn btn-success btn-sm" href="<?php echo base_url('universityImages/'.$value['logo']); ?>" target="_blank">Logo</a>
                      </td>
                      <td><a class="btn btn-success btn-sm" href="<?php echo base_url('universityImages/'.$value['main_img']); ?>" target="_blank">Main Image</a>
                      </td>
                      <td><a href="<?php echo base_url('universityImages/'.$value['img1']); ?>" target="_blank">Image 1</a>,<a href="<?php echo base_url('universityImages/'.$value['img2']); ?>" target="_blank">Image 2</a>,<a href="<?php echo base_url('universityImages/'.$value['img3']); ?>" target="_blank">Image 3</a>,<a href="<?php echo base_url('universityImages/'.$value['img4']); ?>" target="_blank">Image 4</a>,<a href="<?php echo base_url('universityImages/'.$value['img5']); ?>" target="_blank">Image 5</a>
                      </td>
                      <td><?php echo date('d-M-Y H:i:s',strtotime($value['i_updated'])); ?></td>
                      <td>  
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalu<?php echo $value['u_image_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></button>
                      </td>

                     <td>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $value['u_image_id']; ?>"><span class="glyphicon glyphicon-trash"></span></button>  
                          
                      </td>
                  </tr>

              <div class="modal fade" id="myModal<?php echo $value['u_image_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete University</h4>
                    </div>
                    <form action="<?php echo base_url('delete_images_data')?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="image_id" value="<?php echo $value['u_image_id']; ?>">
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

               <div class="modal fade" id="myModalu<?php echo $value['u_image_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update University Image</h4>
                    </div>
                    <div class="modal-body">
                       <form action="<?php echo site_url('update_images_data')?>" method="post" enctype="multipart/form-data">
                    <div class="row" id="dynamic_field">
                    <div class="col-md-3    ">
                      <div class="form-group">
                        <label>University: <span style="color:red;">*</span></label>
                        <select name="university_name" class="form-control select2">
                            <option value="<?php echo $value['u_name_id'] ?>"><?php echo $value['university_name'] ?></option>
                                                      
                        </select>
                        <input type="hidden" name="image_id" value="<?php echo $value['u_image_id']; ?>">
                        </div>
                      </div>
                     
                     <div class="col-md-3">
                      <div class="form-group">
                        <label>Logo: </label>&nbsp;&nbsp;&nbsp;<?php if($value['logo']!=''){ ?><a class="btn btn-success btn-xs" href="<?php echo base_url('universityImages/'.$value['logo']); ?>" target="_blank">Logo</a><?php } ?>  
                          <input type="file" name="img11" class="form-control"> 
                            <input type="hidden" name="img1" value="<?php echo $value['logo']; ?>">
                        </div>

                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Main Image: </label> &nbsp;&nbsp;&nbsp;<?php if($value['main_img']!=''){ ?><a class="btn btn-success btn-xs" href="<?php echo base_url('universityImages/'.$value['main_img']); ?>" target="_blank">Main Image</a><?php } ?>  
                            <input type="file" name="img21" class="form-control"> 
                            <input type="hidden" name="img2" value="<?php echo $value['main_img']; ?>">                             
                        </div>

                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Slider Image 1: </label>&nbsp;&nbsp;&nbsp;<?php if($value['img1']!=''){ ?><a class="btn btn-success btn-xs" href="<?php echo base_url('universityImages/'.$value['img1']); ?>" target="_blank">Slider Image 1</a><?php } ?> 
                            <input type="file" name="img31" class="form-control">
                            <input type="hidden" name="img3" value="<?php echo $value['img1']; ?>">                          
                        </div>

                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Slider Image 2:</label>&nbsp;&nbsp;&nbsp;<?php if($value['img2']!=''){ ?><a class="btn btn-success btn-xs" href="<?php echo base_url('universityImages/'.$value['img2']); ?>" target="_blank">Slider Image 2</a><?php } ?>  
                            <input type="file" name="img41" class="form-control">
                           <input type="hidden" name="img4" value="<?php echo $value['img2']; ?>">                            
                        </div>

                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Slider Image 3:</label>&nbsp;&nbsp;&nbsp;<?php if($value['img3']!=''){ ?><a class="btn btn-success btn-xs" href="<?php echo base_url('universityImages/'.$value['img3']); ?>" target="_blank">Slider Image 3</a><?php } ?>     
                            <input type="file" name="img51" class="form-control">
                            <input type="hidden" name="img5" value="<?php echo $value['img3']; ?>">                        
                        </div>

                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Slider Image 4:</label>&nbsp;&nbsp;&nbsp;<?php if($value['img4']!=''){ ?><a class="btn btn-success btn-xs" href="<?php echo base_url('universityImages/'.$value['img4']); ?>" target="_blank">Slider Image 4</a><?php } ?>  
                            <input type="file" name="img61" class="form-control">
                             <input type="hidden" name="img6" value="<?php echo $value['img4']; ?>">                        
                        </div>

                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Slider Image 5:</label>&nbsp;&nbsp;&nbsp;<?php if($value['img5']!=''){ ?><a class="btn btn-success btn-xs" href="<?php echo base_url('universityImages/'.$value['img5']); ?>" target="_blank">Slider Image 5</a><?php } ?>   
                            <input type="file" name="img71" class="form-control">
                            <input type="hidden" name="img7" value="<?php echo $value['img5']; ?>">                         
                        </div>

                      </div>

               </div><!--row dynamic_field-->
                      
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
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
      })
</script>