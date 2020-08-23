

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           <!--  <h2>
                   University Data

                </h2> -->
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                                University Data 
                            </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        
                                        <th>university Name</th>
                                        <th>Course Name</th>
                                        <th>Benefits</th>
                                        <th>Images Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                        // print_r($list);
                                    foreach ($list as $key => $value) {
                                        $this->db->where('university_id', $value['u_id']);
                                        $query = $this->db->get('course');

                                        $course=$query->result_array();
                                        ?>

                                    <tr>
                                        <td><?php echo $value['u_name'];?></td><!--university Name-->
                                        <td><!--Course Name-->

                                    <div class="panel-group" role="tablist" aria-multiselectable="true">
                                        

                                        <div class="panel panel-primary">
                                            <div class="panel-heading" role="tab" id="heading_1<?php echo $value['u_id'];?>">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse1<?php echo $value['u_id'];?>" aria-expanded="false" aria-controls="collapse1<?php echo $value['u_id'];?>">
                                                        All Courses
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse1<?php echo $value['u_id'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_1<?php echo $value['u_id'];?>" aria-expanded="false" style="width: 200px;">
                                                <div class="panel-body" style="width: 200px;">
                                                    <ul style="padding: 0px;">
                                                    <?php foreach($course as $k => $v){?>
                                                        <li style="list-style: disk;"><?php echo $v['c_name']; ?></li>

                                                    <?php } ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!--panel-primary-->
                                        
                                    </div><!--panel-group-->




                                        </td><!--Course Name-->

                                        <td>
                                            <div class="panel-group" role="tablist" aria-multiselectable="true">
                                        

                                                <div class="panel panel-primary">
                                                    <div class="panel-heading" role="tab" id="heading2<?php echo $value['u_id'];?>">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse2<?php echo $value['u_id'];?>" aria-expanded="false" aria-controls="collapse2<?php echo $value['u_id'];?>">
                                                                All Benefits
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse2<?php echo $value['u_id'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2<?php echo $value['u_id'];?>" aria-expanded="false" style="width: 150px;">
                                                        <div class="panel-body" style="width: 150px;">
                                                            <ul style="padding: 0px;">
                                                            
                                                                <li style="list-style: disk;">Application Fees - &nbsp; $<?php echo $value['b_univ_fees']; ?>&nbsp;: &nbsp; Free: &nbsp;<?php echo $value['app_fees_free'];?></li>

                                                                <li style="list-style: disk;">SOP Evaluation Fees - &nbsp; $<?php echo $value['b_sop_eval'];?>&nbsp;: &nbsp; Free: &nbsp;<?php echo $value['b_sop_eval_free']; ?></li>

                                                                <li style="list-style: disk;">Application Process Fees -&nbsp; $<?php echo $value['b_app_process_fees']; ?>&nbsp;: &nbsp; Free: &nbsp;<?php echo $value['app_process_free']; ?></li>

                                                                <li style="list-style: disk;">Docs Shipping Fees - &nbsp;$<?php echo $value['b_doc_shipping_fees']; ?>&nbsp;: &nbsp; Free: &nbsp;<?php echo $value['free_doc_shipping_fees']; ?></li>
                                                           
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!--panel-primary-->
                                                
                                            </div><!--panel-group-->
                                                
                                        </td><!--Benefit-->
                                        

                                        <td>
                                            <div class="panel-group" role="tablist" aria-multiselectable="true">
                                        

                                                <div class="panel panel-primary">
                                                    <div class="panel-heading" role="tab" id="heading3<?php echo $value['u_id'];?>">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse3<?php echo $value['u_id'];?>" aria-expanded="false" aria-controls="collapse3<?php echo $value['u_id'];?>">
                                                                All University Images
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse3<?php echo $value['u_id'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3<?php echo $value['u_id'];?>" aria-expanded="false" style="width: 100px;">
                                                        <div class="panel-body" style="width: 205px;">
                                                            <ul style="padding: 0px;">
                                                            
                                                                <li style="list-style: disk;">Logo - &nbsp;<?php echo $value['logo']; ?></li>

                                                                <li style="list-style: disk;">Main Image - &nbsp; <?php echo $value['main_img'];?></li>

                                                                <li style="list-style: disk;">Slider Images Process Fees -&nbsp; <?php echo $value['img1']; ?>,&nbsp;<br/><?php echo $value['img2']; ?>,<br/>&nbsp;<?php echo $value['img3']; ?>,&nbsp;<br/><?php echo $value['img4']; ?>,&nbsp;<br/><?php echo $value['img5']; ?></li>
                                                           
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!--panel-primary-->
                                                
                                            </div><!--panel-group-->


                                        </td><!--image-->
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                <button class="btn btn-primary btn-xs" data-title="Edit" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            </p>
                                        </td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <button class="btn btn-danger btn-xs" data-title="Delete" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button>
                                            </p>
                                        </td>

                                    </tr>
                                    <?php

                                # code...
                            } ?>

                                </tbody>
                            </table>

                        </div><!--table-->

                       
                    </div><!--body-->
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

        <!-- #END# Exportable Table -->
    </div>
</section>

</body>

</html>
	

