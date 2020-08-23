
		<section class="content">
			<div class="container-fluid">
				<div class="block-header">
					
				</div>
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>
									Add News
								</h2>
								
							</div>
							<div class="body">
								<form class="form-horizontal" action="<?php echo site_url('admin/insert_news/');?>" method="post" enctype="multipart/form-data">

									<div class="row clearfix">

											<?php if($this->session->flashdata('message')){?>
		                                    <div class="col-md-12 text-center">
		                                        <div id="hide" class="col-md-3">

		                                            <?php echo $this->session->flashdata('message');?>
		                                        </div>
		                                    </div>

                                   			 <?php  }   ?>


										<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
											<label for="apfee">News Image:</label>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
											<div class="form-group">
												<div class="form-line">
													<input type="file" name="news_image" class="form-control">
													
												</div>
											</div>
										</div>
								</div><!--row clearfix-->
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="sopfee">News Title:</label>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-8 col-xs-7">
                                        <div class="form-group">
											<div class="form-line">
												<input type="text" class="form-control" name="title">
												
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="sopfee">Content:</label>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="5" class="form-control no-resize" name="content" placeholder="Enter News Content" style="border:1px solid #ccc;"></textarea>
                                        </div>
                                    </div>
                                </div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="sopfee">Posting Date:</label>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                        <div class="form-group">
											<div class="form-line">
												<input type="date" class="datepicker form-control" placeholder="Please choose a date..." data-dtp="dtp_bMkPk" name="posting_date">
												
											</div>
										</div>
									</div>
								</div>
								
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add News</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div><!--row clear fix-->

			  <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                News
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>News Title</th>
                                            <th>Image</th>
                                            <th>Content</th>
                                            <th>Posted Date</th>
                                            <th>Updated</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>News Title</th>
                                            <th>Image</th>
                                            <th>Content</th>
                                            <th>Posted Date</th>
                                            <th>Updated</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if($news=='false'){ ?>

                                            <tr><td><h4>No Record Found</h4><td></tr>

                                        <?php  } //if()
                                            else{
                                        ?>

                                        <?php foreach ($news as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value['news_title']; ?></td>
                                            <td><div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                    <a href="<?php echo base_url('imgg/news/'.$value['news_image']); ?>" target="_blank">
                                                        <button class="btn btn-primary">View</button>
                                                    </a>
                                                </div></td>
                                            <td><?php echo substr($value['content'],0,100).'...'; ?></td>
                                            <td>
                                                <?php echo date('d-m-Y',strtotime($value['posting_date'])); ?>
                                                                                                   
                                            </td>
                                                
                                            <td><?php echo date('d-m-Y H:m:i',strtotime($value['updated'])); ?></td>
                                             <td>
                                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                    <a href="<?php echo site_url('admin/update_news/'.$value['news_id']);?>">
                                                        <button class="btn btn-primary btn-xs" data-title="Edit" >
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </a>
                                                </p>
                                            </td>

                                           <td>
                                                <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                  <a href="<?php echo site_url('admin/delete_news/'.$value['news_id']);?>">  
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
	