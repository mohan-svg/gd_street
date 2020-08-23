<style type="text/css">
.hclass{
  /*background: linear-gradient(45deg, #d1c3c3, transparent);*/
  background: #0d1128;
  padding-left: 10px;

}

.aclass{
  color: #ffffff;
  font-weight: bold;
}

.eduHead{
  font-weight: bold; 
  color: #c70039;
}


</style>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

  <section id="login">        
        <div class="container">          
            <div class="profile">
              <div class="row">
                  <div class="col-md-5" style="margin-left:10%;">
                    <a href="#" class="pull-right"><i class="fa fa-pencil-square" style="font-size: 30px; color:white;"></i></a>
                    <p class="stud_name"> <span><?php echo $stud_detail['stud_fname']." ".$stud_detail['stud_fname']; ?></span> </p>
                    <p> <span><strong>Email:&nbsp;&nbsp;</strong><?php echo $stud_detail['email_id']; ?></span><span class="pull-right"><strong>Mobile:&nbsp;&nbsp;</strong><?php echo $stud_detail['mobile1']; ?></span> </p>
                    
                    <p> <span><strong>City:&nbsp;&nbsp;</strong><?php echo $stud_detail['city']; ?></span> <span class="pull-right"><strong>Zip Code:&nbsp;&nbsp;</strong><?php echo $stud_detail['zipcode']; ?></span> </p>
                    <p> <span><strong>Address:&nbsp;&nbsp;</strong><?php echo $stud_detail['stud_mail_address']; ?></span> </p>
                  </div>
                  <div class="col-md-3">
                    <h1 class="personal-detail">Personal Details</h1>
                  </div>   
              </div>      
            </div> 
          
        </div>
    </section>

<div class="container">
    <div class="row" style="padding-top:50px; padding-bottom: 60px;">
        <div class="col-lg-6">      
        
        <div id="alert-message"></div>
         
            <div class="accordion" id="user_details">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#ug-details" aria-expanded="true" aria-controls="ug-details">
                        <i class="fa fa-mortar-board"></i>&nbsp;&nbsp;Education details
                      </button>
                      <button class="btn btn-light btn-sm pull-right" data-toggle="modal" data-target="#educationModal">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp;ADD
                      </button>
                    </h2>
                  </div>

                  <div id="ug-details" class="collapse show" aria-labelledby="headingOne" data-parent="#user_details">
                    <div class="card-body" id="edu_body">

                     <!-- <?php  foreach ($education as $key => $edu) { ?>
                        
                        <div class="col-md-12 border-top border-bottom eduHead">
                          <span class="font-20"><?php echo ucfirst($edu['edu_type']); ?></span> 
                          <span class="pull-right"> 
                            <a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="showDeleteEducation(<?php echo $edu['edu_id'] ?>);">
                              <i class="fa fa-pencil-square font-20" ></i>
                            </a> | <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="showEditEducation(<?php echo $edu['edu_id'] ?>)">
                              <i class="fa fa-trash font-20"></i>
                            </a>
                          </span>
                        </div>
                        <div class="row p-3">
                            <div class="col-md-9 col-xs-12 col-sm-12 mt-3">
                              <h4 class="font-weight-bold"><?php echo $edu['college']; ?></h4>
                              <div><?php echo $edu['degree_name']; ?></div>
                              <div><?php echo $edu['branch']; ?></div>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-12 mt-3">
                              <div class="font-weight-bold"><?php echo $edu['starting_year'].'-'.$edu['ending_year']; ?></div>
                              <div><strong>CGPA:</strong> <?php echo $edu['cgpa']; ?></div>                          
                            </div>
                        </div>
                        <div class="text-center"><i class="fa fa-minus"></i><i class="fa fa-minus"></i><i class="fa fa-minus"></i></div>
                      <?php } ?> -->
                                            
                    </div>
                    <br>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#test_scores" aria-expanded="false" aria-controls="test_scores">
                        <i class="fa fa-tasks"></i>&nbsp;&nbsp;Test Scores
                      </button>
                      <button class="btn btn-light btn-sm pull-right" data-toggle="modal" data-target="#testScoreModal"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD</button>
                    </h2>
                  </div>
                  <div id="test_scores" class="collapse" aria-labelledby="headingTwo" data-parent="#user_details">
                    <div class="card-body">
                      <div class="row p-3">
                  <?php if(empty($gre)): 

                        else: ?>

                        <?php foreach ($gre as $key => $gre_info): ?>
                            <div class="col-md-6 mt-3">
                              <h3>GRE <a href="javascript:void(0);" class="btn btn-info btn-sm pull-right" onclick="showEditGre(<?php echo $gre_info['gre_id'] ?>)"> 
                                        <i class="fa fa-pencil-square font-20"></i>
                                      </a>
                              </h3>
                              <div class="font-weight-bold" style="font-size:20px">
                                <label>Total:</label>&nbsp;<?php echo $gre_info['total_score']; ?> 
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm pull-right" onclick="showDeleteGre(<?php echo $gre_info['gre_id'] ?>)">
                                  <i class="fa fa-trash font-20"></i>
                                </a>
                              </div>
                              <div>Quantitave:&nbsp;<?php echo $gre_info['quants']; ?></div>
                              <div>Verbal:&nbsp;<?php echo $gre_info['verbal']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                      <?php foreach ($ielts_toefl as $key => $ielts): ?>
                            <div class="col-md-6 mt-3">
                              <h3><?php echo $ielts['english_test_name']; ?>
                                <a href="javascript:void(0);" class="btn btn-info btn-sm pull-right" onclick="showDeleteIELTS(<?php echo $ielts['it_id']?>)">
                                  <i class="fa fa-pencil-square font-20"></i>
                                </a>
                              </h3>
                              <div class="font-weight-bold" style="font-size:20px">
                                <label>Total:</label>&nbsp;&nbsp;<?php echo $ielts['total_band']; ?> 
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm pull-right" onclick="showEditIELTS(<?php echo $ielts['it_id'] ?>)">
                                  <i class="fa fa-trash font-20"></i>
                                </a>
                              </div>
                              <div class="row">
                                <div class="col-md-6">Reading: &nbsp;<?php echo $ielts['reading']; ?></div>
                                <div class="col-md-6">Listening: &nbsp;<?php echo $ielts['listening']; ?></div>
                                <div class="col-md-6">Speaking: &nbsp;<?php echo $ielts['speaking']; ?></div>
                                <div class="col-md-6">Writing: &nbsp;<?php echo $ielts['writing']; ?></div>
                              </div>
                            </div>                                                     
                       <?php endforeach; ?>
                      </div>
                        
                      <br>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#work_exp" aria-expanded="false" aria-controls="work_exp">
                        <i class="fa fa-sitemap"></i>&nbsp;&nbsp;Work Experience
                      </button>
                      <button class="btn btn-light btn-sm pull-right" data-toggle="modal" data-target="#workExperienceModal"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD</button>
                    </h2>
                  </div>
                  <div id="work_exp" class="collapse" aria-labelledby="headingThree" data-parent="#user_details">
                    <div class="card-body">
                      <?php  foreach ($work_experience as $key => $we) { ?>
                        
                        <div class="col-md-12 border-top border-bottom" style="font-weight: bold; color: #c70039;">
                          <span class="font-20"><?php echo ucfirst($we['company_name']); ?></span> 
                          <span class="pull-right"> 
                            <a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="showDeleteWorkExperience(<?php echo $we['we_id'] ?>)">
                              <i class="fa fa-pencil-square font-20" ></i>
                            </a> | <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="showEditWorkExperience(<?php echo $we['we_id'] ?>)">
                              <i class="fa fa-trash font-20"></i>
                            </a>
                          </span>
                        </div>
                        <div class="row p-3">
                            <div class="col-md-9 col-xs-12 col-sm-12 mt-3">
                              <h4 class="font-weight-bold"><?php echo $we['position']; ?></h4>                              
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-12 mt-3">
                              <div class="font-weight-bold"><?php echo $we['start_year'].'-'.$we['end_year']; ?></div>                                                        
                            </div>
                        </div>
                        <div class="text-center"><i class="fa fa-minus"></i><i class="fa fa-minus"></i><i class="fa fa-minus"></i></div>
                      <?php } ?>
                      <br>
                    </div>
                  </div>
                </div>
              </div>  


        </div>
        <div class="col-lg-6">
          <h1>Applied Universities</h1>
        </div>

    </div>   
</div>

<div class="modal" id="educationModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title modalHeading">Add Education Details</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" id="education_form">
              <div class="form-group">
                <label for="edu_type" class="modalLabel">Education Level:<span class="red-star">*</span></label>
                <select class="form-control form-control-lg select_increase" name="edu_type" id="edu_type">
                  <option value="">--Select Education Level--</option>
                  <option value="Diploma">Diploma</option>
                  <option value="Under-Graduate">Under-Graduate</option>
                  <option value="Post-Graduate Degree">Post-Graduate Degree</option>
                  <option value="Post-Graduate Diploma">Post-Graduate Diploma</option>
                </select>
                <div class="eduTypeError"></div>
              </div>
              <div class="form-group">
                <label for="college_name" class="modalLabel">College Name:<span class="red-star">*</span></label>
                <input type="text" class="form-control input-lg" id="college_name" name="college_name" placeholder="Enter College Name">
                <div class="collegeNameError"></div>
              </div>
              <div class="form-group">
                <label for="degree_name" class="modalLabel">Degree Name:<span class="red-star">*</span></label>
                <input type="text" class="form-control input-lg" id="degree_name" name="degree" placeholder="Enter Degree Name">
                <div class="degreeNameError"></div>
              </div>
              <div class="form-group">
                <label for="branch_name" class="modalLabel">Branch:<span class="red-star">*</span></label>
                <input type="text" class="form-control input-lg" id="branch_name" name="branch" placeholder="Enter Branch">
                <div class="branchNameError"></div>
              </div>
              <div class="form-group">
                <label for="start_date" class="modalLabel">Start Date<span class="red-star">*</span></label>
                <input type="date" class="form-control input-lg" id="start_date" name="start_date" placeholder="Enter email">
                <div class="startDateError"></div>
              </div>
              <div class="form-group">
                <label for="end_date" class="modalLabel">End Date<span class="red-star">*</span></label>
                <input type="date" class="form-control input-lg" id="end_date" name="end_date">
                <div class="endDateError"></div>
              </div>
              <div class="form-group">
                <label for="cgpa" class="modalLabel">CGPA<span class="red-star">*</span></label>
                <input type="text" class="form-control input-lg" id="cgpa" name="cgpa" placeholder="ex. 79% or 8.2">
                <div class="cgpaError"></div>
              </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          </div>
              
          </form>
          
      </div>
      
    </div>
  </div>
</div>

<div class="modal" id="testScoreModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title modalHeading">Add Test Scores</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="">
              <div class="form-group">
                <label for="" class="modalLabel">Test Name:<span class="red-star">*</span></label>
                <select class="form-control form-control-lg select_increase" name="test_name" id="test_name">
                  <option value="">---Select Test Name--</option>
                  <option value="gre">GRE</option>
                  <option value="toefl">TOEFL</option>
                  <option value="ielts">IELTS</option>                  
                </select>
              </div>
              <div class="form-group">
                <label class="modalLabel">Test Date:</label>
                <input type="date" name="test_date" class="form-control input-lg">
              </div>
              <div id="gre">
                  <div class="form-group">
                    <label for="" class="modalLabel">Total Score:</label>
                    <input type="text" name="gre_total" class="form-control input-lg" placeholder="total score out of 340">
                  </div>
                  <div class="form-group">
                    <label for="" class="modalLabel">Quantitative Score:</label>
                    <input type="text" name="quants_score" class="form-control input-lg" placeholder="quantitative score out of 170">
                  </div>
                  <div class="form-group">
                    <label for="" class="modalLabel">Verbal Score:</label>
                    <input type="text" name="verbal_score" class="form-control input-lg" placeholder="verbal score out of 170">
                  </div>
                  <div class="form-group">
                    <label for="" class="modalLabel">AWA Score:</label>
                    <input type="text" name="awa_score" class="form-control input-lg" placeholder="AWA score out of 4.0">
                  </div>

              </div><!--gre-->
              <div id="ielts">
                  <div class="form-group">
                    <label for="" class="modalLabel">Total Score:</label>
                    <input type="text" name="gre_total" class="form-control input-lg" placeholder="total score out of 340">
                  </div>
                  <div class="form-group">
                    <label for="" class="modalLabel">Reading:</label>
                    <input type="text" name="reading" class="form-control input-lg" placeholder="reading score">
                  </div>
                  <div class="form-group">
                    <label for="" class="modalLabel">Writing:</label>
                    <input type="text" name="writing" class="form-control input-lg" placeholder="writing score">
                  </div>
                  <div class="form-group">
                    <label for="" class="modalLabel">Listening:</label>
                    <input type="text" name="listening" class="form-control input-lg" placeholder="listening score">
                  </div>
                  <div class="form-group">
                    <label for="" class="modalLabel">Speaking:</label>
                    <input type="text" name="speaking" class="form-control input-lg" placeholder="speaking score">
                  </div>
                
              </div><!--ielts-->
              
              
          </form>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          </div>
      </div>
      
    </div>
  </div>
</div>

<div class="modal" id="workExperienceModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title modalHeading">Add Work Experience</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="">
          <div class="form-group">
                <label for="" class="modalLabel">Job Type:<span class="red-star">*</span></label>
                <select class="form-control form-control-lg select_increase" name="job_type" >
                  <option value="">--Select Job Type--</option>
                  <option value="internship">Internship</option>
                  <option value="full-time job">Full-Time Job</option>
                  <option value="part-time job">Part-Time Job</option>                  
                </select>
              </div>              
              <div class="form-group">
                <label for="college_name" class="modalLabel">Company Name:<span class="red-star">*</span></label>
                <input type="text" class="form-control" id="college_name" name="college_name" placeholder="Enter College Name">
              </div>
              <div class="form-group">
                <label for="degree_name" class="modalLabel">Designation:<span class="red-star">*</span></label>
                <input type="text" class="form-control" id="degree_name" name="degree" placeholder="Enter Degree Name">
              </div>              
              <div class="form-group">
                <label for="degree_name" class="modalLabel">Job Started :<span class="red-star">*</span></label>
                <input type="date" class="form-control" id="degree_name" name="" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="degree_name" class="modalLabel">Job Left :<span class="red-star">*</span></label>
                <input type="date" class="form-control" id="degree_name" name="">
              </div>
              
          </form>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          </div>
      </div>
      
    </div>
  </div>
</div>

<div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title modalHeading">Delete Education Detail</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="">
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
              
          </form>          
      </div>
      
    </div>
  </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->

<script type="text/javascript">
$(document).ready(function(){  
    showEducationDetails();

    $("#test_name").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue == 'gre'){            
                $("#gre").show();
                $("#ielts").hide();
            } else{
                $("#gre").hide();
                $("#ielts").show();
            }
        });
    }).change();


    

});

$('#education_form').submit(function(e){
    e.preventDefault();

    $.ajax({
      url: '<?php echo base_url()."/save_education_details" ?>',
      type:'POST',
      data: $(this).serializeArray(),
      dataType:'json',
      success:function(response){
        if(response['status']==0){

            //edu_type response is empty or not
            if(response['edu_type']!=''){
                $('.eduTypeError').html(response['edu_type']).addClass('invalid-feedback');
                $('#edu_type').addClass('is-invalid');
            } else{
                $('.eduTypeError').html('').removeClass('invalid-feedback');
                $('#edu_type').removeClass('is-invalid');
            }

            //college_name response is empty or not
            if(response['college_name']!=''){
                $('.collegeNameError').html(response['college_name']).addClass('invalid-feedback');
                $('#college_name').addClass('is-invalid');
            } else{
                $('.collegeNameError').html('').removeClass('invalid-feedback');
                $('#college_name').removeClass('is-invalid');
            }

            //degree response is empty or not
            if(response['degree']!=''){
                $('.degreeNameError').html(response['degree']).addClass('invalid-feedback');
                $('#degree_name').addClass('is-invalid');
            } else{
                $('.degreeNameError').html('').removeClass('invalid-feedback');
                $('#degree_name').removeClass('is-invalid');
            }

            //branch response is empty or not
            if(response['branch']!=''){
                $('.branchNameError').html(response['branch']).addClass('invalid-feedback');
                $('#branch_name').addClass('is-invalid');
            } else{
                $('.branchNameError').html('').removeClass('invalid-feedback');
                $('#branch_name').removeClass('is-invalid');
            }

            //start_date response is empty or not
            if(response['start_date']!=''){
                $('.startDateError').html(response['start_date']).addClass('invalid-feedback');
                $('#start_date').addClass('is-invalid');
            } else{
                $('.startDateError').html('').removeClass('invalid-feedback');
                $('#start_date').removeClass('is-invalid');
            }
            
            //end_date response is empty or not
            if(response['end_date']!=''){
                $('.endDateError').html(response['end_date']).addClass('invalid-feedback');
                $('#end_date').addClass('is-invalid');
            } else{
                $('.endDateError').html('').removeClass('invalid-feedback');
                $('#end_date').removeClass('is-invalid');
            }

            //cgpa response is empty or not
            if(response['cgpa']!=''){
                $('.cgpaError').html(response['cgpa']).addClass('invalid-feedback');
                $('#cgpa').addClass('is-invalid');
            } else{
                $('.cgpaError').html('').removeClass('invalid-feedback');
                $('#cgpa').removeClass('is-invalid');
            }


        } else{

                $('#educationModal').modal('hide');
                $('#education_form')[0].reset();
                
                $('#alert-message').html(response['message']).fadeIn().delay(3000).fadeOut('slow');  
                
                
                $('.eduTypeError').html('').removeClass('invalid-feedback');
                $('#edu_type').removeClass('is-invalid');

                $('.collegeNameError').html('').removeClass('invalid-feedback');
                $('#college_name').removeClass('is-invalid');

                $('.degreeNameError').html('').removeClass('invalid-feedback');
                $('#degree_name').removeClass('is-invalid');

                $('.branchNameError').html('').removeClass('invalid-feedback');
                $('#branch_name').removeClass('is-invalid');

                $('.startDateError').html('').removeClass('invalid-feedback');
                $('#start_date').removeClass('is-invalid');

                $('.endDateError').html('').removeClass('invalid-feedback');
                $('#end_date').removeClass('is-invalid');

                $('.cgpaError').html('').removeClass('invalid-feedback');
                $('#cgpa').removeClass('is-invalid');

                $("#edu_body").append(response['row']);
        }
      }
    });
});

function showDeleteEducation(education_id){
    
}

function showEditEducation(education_id){
    alert(education_id);
}

function showDeleteGre(gre_id){
  alert(gre_id);
}

function showEditGre(gre_id){
  alert(gre_id);
}

function showDeleteIELTS(ielts_id){
  alert(ielts_id);
} 

function showEditIELTS(ielts_id){
  alert(ielts_id);
}

function showDeleteWorkExperience(work_exp_id){
    alert(work_exp_id);
}

function showEditWorkExperience(work_exp_id){
    alert(work_exp_id);
}

function showEducationDetails(){
    $.ajax({        
        url:'<?php echo base_url()."/showAllEducationDetails" ?>',
        async: false,
        dataType:'json',
        success:function(data){
            var html='';
            var i='';
            for(i=0;i<data.length;i++){
                html += '<div class="col-md-12 border-top border-bottom eduHead">'+
                          '<span class="font-20">'+data[i].edu_type+'</span>'+ 
                          '<span class="pull-right">'+ 
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="showDeleteEducation('+data[i].edu_id+')">'+
                              '<i class="fa fa-pencil-square font-20" ></i>'+
                            '</a> | <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="showEditEducation('+data[i].edu_id+')"><i class="fa fa-trash font-20"></i>'+
                            '</a>'+
                          '</span>'+
                        '</div>'+
                        '<div class="row p-3">'+
                            '<div class="col-md-9 col-xs-12 col-sm-12 mt-3">'+
                              '<h4 class="font-weight-bold">'+data[i].college+'</h4>'+
                              '<div>'+data[i].degree_name+'</div>'+
                              '<div>'+data[i].branch+'</div>'+
                            '</div>'+
                            '<div class="col-md-3 col-xs-12 col-sm-12 mt-3">'+
                              '<div class="font-weight-bold">'+data[i].starting_year+'-'+data[i].ending_year+'</div>'+
                              '<div><strong>CGPA:</strong>'+data[i].cgpa+'</div>'+                          
                            '</div>'+
                        '</div>'+
                        '<div class="text-center"><i class="fa fa-minus"></i><i class="fa fa-minus"></i><i class="fa fa-minus"></i></div>';
            }

            $('#edu_body').html(html);

        },
        error:function(){
          alert('Could not get Education details from DataBase');
        }

    });
}

</script>