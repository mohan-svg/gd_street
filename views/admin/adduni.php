

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
               <!--  <h2>Form</h2> -->
            </div>
           <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               <b> Add University</b>
                            </h2>
                            
                        </div>

                         
                        <div class="body">
                            <form method="post" action="<?php echo site_url('admin/insert_university');?>" enctype="multipart/form-data">
                                <div class="row clearfix">

                                    <?php if($this->session->flashdata('success')){ ?>
                                        <div class="col-sm-12 text-center">
                                          
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                              </button>
                                             <?php echo $this->session->flashdata('success'); ?>
                                                
                                            </div>

                                        </div>

                                        <?php  }  else if($this->session->flashdata('error')){?>
                                        <div class="col-sm-12 text-center">
                                          
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                              </button>
                                             <?php echo $this->session->flashdata('error'); ?>
                                                
                                            </div>
                                            
                                        </div>

                                <?php  }   ?>

                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">

                                            <div class="form-line">
                                                <input type="text" name="uname" class="form-control" placeholder="University Name">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">

                                            <div class="form-line">
                                                <input type="text" name="uaddress" class="form-control" placeholder="University Location ex. Tempe, US">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group" style="padding-left: 10px;">
                                            <label>University Details:</label>
                                            <div class="">
                                                <!-- <input type="text" class="form-control" placeholder="Details"> -->
                                                <textarea rows="10" style="width: 100%;" name="univ_details"></textarea>
                                            </div>
                                        </div>
                                    </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="egc">Minimum Eligibility Criteria:</label>
                                </div>
                                
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="egc">GRE Score:</label>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="gre_score" class="form-control" placeholder="GRE score out of 340" style="border-bottom: 1px solid #ddd;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="quants_score" class="form-control" placeholder="Quants score out of 170" style="border-bottom: 1px solid #ddd;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="verbal_score" class="form-control" placeholder="Verbal score out of 170" style="border-bottom: 1px solid #ddd;">
                                        </div>
                                    </div>
                                </div>
                                

                                
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="egc">TOEFL Score:</label>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="toefl_score" class="form-control" placeholder="TOEFL score out of 120" style="border-bottom: 1px solid #ddd;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="egc">IELTS Score:</label>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="ielts_score" class="form-control" placeholder="IELTS score Total band" style="border-bottom: 1px solid #ddd;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="egc">UG-GPA:</label>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="gpa" class="form-control" placeholder="UG-GPA out of 10" style="border-bottom: 1px solid #ddd;">
                                        </div>
                                    </div>
                                </div>

                            </div><!--class="row clearfix"-->
									
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Add University </button>
                                    </div><!--col-lg-3 col-md-3 col-sm-3 col-xs-6-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--row clearfix-->


            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                University List
                            </h2>
                                                                      
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>University Name</th>
                                            <th>Location</th>
                                            <th>Details</th>
                                            <th>Min. Eligibility Criteria</th>
                                            <th>Updated</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>University Name</th>
                                            <th>Location</th>
                                            <th>Details</th>
                                            <th>Min. Eligibility Criteria</th>
                                            <th>Updated</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if($university=='false'){ ?>

                                            <tr><td><h4>No Record Found</h4><td></tr>

                                        <?php  } //if()
                                            else{
                                        ?>

                                        <?php foreach ($university as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value['u_name']; ?></td>
                                            <td><?php echo $value['u_address']; ?></td>
                                            <td><?php echo substr($value['u_details'],0,70).'...'; ?></td>
                                            <td>
                                                
                                                    <b>GRE:</b>&nbsp;&nbsp;<?php echo $value['gre_score']; ?>&nbsp;&nbsp;<b>Q:</b>&nbsp;<?php echo $value['quants_score']; ?>&nbsp;&nbsp;<b>V:</b>&nbsp;<?php echo $value['verbal_score']; ?><br/>
                                                    <b>TOEFL:</b>&nbsp;&nbsp;<?php echo $value['toefl_score']; ?><br/>
                                                    <b>IELTS:</b>&nbsp;&nbsp;<?php echo $value['ielts_score']; ?><br/>
                                                   <b> GPA:</b>&nbsp;&nbsp;<?php echo $value['gpa']; ?>

                                                
                                            </td>
                                                
                                            <td><?php echo date('d-m-Y H:m:i',strtotime($value['updated'])); ?></td>
                                             <td>
                                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                    <a href="<?php echo site_url('admin/update_university/'.$value['u_id']);?>">
                                                        <button class="btn btn-primary btn-xs" data-title="Edit" >
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </a>
                                                </p>
                                            </td>

                                           <td>
                                                <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                  <a href="<?php echo site_url('admin/delete_university/'.$value['u_id']);?>">  
                                                    <button class="btn btn-danger btn-xs" data-title="Delete" >
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>
                                                  </a>  
                                                </p>
                                            </td>
                                        </tr>
                                    <?php }//foreach()

                                }//else

                                     ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

         
           
        </div>
    </section>
