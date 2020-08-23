<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script> -->


    <section class="content">
        <div class="container-fluid">
            <!-- <div class="block-header">
                <h2>Form</h2>
            </div> -->
           <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>Add User (Admin)</b>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form method="post" action="<?php echo site_url('admin/insert_user'); ?>" enctype="multipart/form-data" onSubmit="return validate()">
                                <div class="row clearfix">
                                    <?php if($this->session->flashdata('success')){?>
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


                                     <div class="col-md-12">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group">

                                                <div class="form-line">
                                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" onBlur="validate()">
                                                </div>
                                            </div>
                                            <span id="name"></span>
                                        </div>
                                        

                                        
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group">

                                                <div class="form-line">
                                                    <input type="text" name="email" class="form-control" placeholder="Enter Email" onBlur="validate()">
                                                </div>
                                            </div>
                                            <span id="email"></span>
                                        </div>
                                        
                                    </div><!--col-md-12-->
                                    <div class="col-md-12">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" name="password" class="form-control" placeholder="Enter Password" onBlur="validate()">
                                                </div><span style="color: red;">Password must be minimum of 8 chars</span>
                                            </div>
                                            <span id="pass1"></span>
                                        </div>
                                        
    									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" name="password2" class="form-control" placeholder="Repeat Password" onBlur="validate()">
                                                </div>
                                            </div>
                                            <span id="pass2"></span>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            
                                            <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" name="add">Add User</button>
                                        </div>
                                    </div>
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
                                Admin List
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Updated</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Updated</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if($admin=='false'){ ?>

                                            <tr><td><h4>No Record Found</h4><td></tr>

                                        <?php  } //if()
                                            else{
                                        ?>
                                        <?php foreach ($admin as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value['name']; ?></td>
                                            <td><?php echo $value['username']; ?></td>
                                            <td><?php echo $value['password']; ?></td>
                                            <td><?php echo date('d-m-Y H:m:i',strtotime($value['updated_on'])); ?></td>
                                             <td>
                                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                    <a href="<?php echo site_url('admin/update_admin/'.$value['id']);?>">
                                                        <button class="btn btn-primary btn-xs" data-title="Edit" >
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </a>
                                                </p>
                                            </td>

                                           <td>
                                                <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                  <a href="<?php echo site_url('admin/delete_admin/'.$value['id']);?>">  
                                                    <button class="btn btn-danger btn-xs" data-title="Delete" >
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>
                                                  </a>  
                                                </p>
                                            </td>
                                        </tr>
                                    <?php } 

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


