<section class="content">
    <div class="container-fluid">
        <div class="block-header">

        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                                Add courses List
                            </h2>

                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="<?php echo site_url('admin/insert_courses/');?>" method="post" enctype="multipart/form-data">

                            <div class="row clearfix">
                                <?php if($this->session->flashdata('message')){?>
                                    <div class="col-md-12 text-center">
                                        <div id="hide" class="col-md-3">

                                            <?php echo $this->session->flashdata('message');?>
                                        </div>
                                    </div>

                                    <?php  }   ?>

                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="sopfee">University:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <select name="university">
                                                    <?php $query = $this->db->get('university');
                                                            $data = $query->result_array(); 
                                                        foreach ($data as $key => $value) { ?>

                                                        <option value="<?php echo $value['u_id'] ?>">
                                                            <?php echo $value['u_name'] ?>

                                                        </option>
                                                        <?php         
                                                            # code...
                                                        }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                            </div>
                            <!--row clearfix-->

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="uniname">Course name:</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="cname" class="form-control" placeholder="Enter course name e.g. MCS Computer Science">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">

                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="dname">Course Details:</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="5" class="form-control no-resize" name="course_details" placeholder="Enter course details" style="border:1px solid #ccc;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            
                            
                            <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <button type="Submit" class="btn btn-primary m-t-15 waves-effect">Add Course Name</button>
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
                                Courses List
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            
                                            <th>Course Name</th>
                                            <th>Universities</th>
                                            
                                            <th>Updated</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Course Name</th>
                                            <th>Universities</th>
                                            
                                            <th>Updated</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if($course=='false'){ ?>

                                            <tr><td><h4>No Record Found</h4><td></tr>

                                        <?php  } //if()
                                            else{
                                        ?>

                                        <?php foreach ($course as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value['u_name']; ?></td>
                                            <td><?php echo $value['c_name']; ?></td>
                                            
                                            <td><?php echo substr($value['c_detail'],0,70).'...'; ?></td>
                                            <td><?php echo $value['c_term']; ?></td>
                                            <td><?php echo $value['c_deadline']; ?></td>
                                            <td>
                                                
                                                    <b>GRE:</b>&nbsp;&nbsp;<?php echo $value['c_gre_score']; ?><br/>
                                                    <b>TOEFL:</b>&nbsp;&nbsp;<?php echo $value['c_toefl_score']; ?><br/>
                                                    <b>IELTS:</b>&nbsp;&nbsp;<?php echo $value['c_ielts_score']; ?><br/>
                                                   <b> GPA:</b>&nbsp;&nbsp;<?php echo $value['c_ug-gpa']; ?>

                                                
                                            </td>
                                                
                                            <td><?php echo date('d-m-Y H:m:i',strtotime($value['c_updated'])); ?></td>
                                             <td>
                                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                    <a href="<?php echo site_url('admin/update_course/'.$value['id']);?>">
                                                        <button class="btn btn-primary btn-xs" data-title="Edit" >
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </a>
                                                </p>
                                            </td>

                                           <td>
                                                <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                  <a href="<?php echo site_url('admin/delete_course/'.$value['id']);?>">  
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