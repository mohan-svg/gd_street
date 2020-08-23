<!-- header END -->
   <style type="text/css">
    label{
  color: #fd5f00;
  font-weight: 500;
}


.title_grad{
      background: #0d1128;
    color: white;
    margin-top: 10px;
    font-weight: bold;
}
   </style>

   <section id="login">
        
        <div class="container">
            <div class="intro-text">
              <h3>Apply through GradStreet for fast and smooth process</h3>
              <p>MS in US University Just One Step to go</p>
              <a href="<?php echo site_url('university')?>" class="btn-get-started">Apply Now</a>      

            </div> 
        </div>
    </section>

    
    <section>
      <div class="container">
        <div class="row" style="padding-top:10px;">
       
          <div class="col-md-8 column-in-center" style="margin: 30px auto; border:1px solid #ccc; background: #f7f7f7;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);">
            <h2 class="title_grad" style="text-align:center; padding-bottom:5px;padding-top:10px">Grad School Finder</h2><hr>

            <form method="post" class="form-horizontal" action="<?php echo site_url('university/grad_school_finder_result');?>" style="font-size:18px; margin-left: 30px;"><div style="display:none;"></div>
              <div class="row">
                <div class="col-md-4 col-sm-4 form-group">
                  <label>Course : </label>
                </div>
                <div class="col-sm-8 form-group">
                  <div class="input select">
                    <select name="course" class="form-control" style="padding: .3em;height: 30px;">
                      <option value="MCS Computer Science" selected="selected">MCS Computer Science</option>
                      <option value="MS Information Systems">MS Information Systems</option>                      
                    </select>
                  </div> 
                </div>
              </div>
              <hr/>
              <div class="row">
                <div class="col-md-4 col-sm-4 form-group">
                  <label>GRE :</label>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="input number required">
                    <label>Verbal Score:</label>
                    <input type="number" name="gre_verbal_score" class="form-control" min="130" max="170" required="required" id="gre-verbal-score" value="0">
                  </div> 
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="input number required">
                    <label>Quant Score:</label>
                    <input type="number" name="quant_score" class="form-control" min="130" max="170" required="required" value="0">
                  </div>
                </div>
              </div>
              <hr/>
              <div class="row">
                <div class="col-md-4 col-sm-4 form-group">
                  <label>English Test :</label>
                </div>
                <div class="col-sm-3 col-xs-11 col-xs-offset-1">
                  <div class="radio">
                    <input type="radio" name="en_test" required="required" value="toefl"> TOEFL
                  </div>
                  <div class="radio">
                    <input type="radio" name="en_test" required="required" value="ielts"> IELTS
                  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="input number required"><label for="en-exam-score">English test score (out of 9 for IELTS)</label>
                  <input type="number" name="en_exam_score" class="form-control" step="0.1" min="1" max="120" required="required"></div>
                </div>
              </div>
              <hr/>
              <div class="row">
                <div class="col-md-4 col-sm-4 form-group">
                  <label>Undergrad Academics<br><small>(out of 10 for CGPA)</small> :</label>
                </div>
                <div class="col-sm-3 col-xs-11 col-xs-offset-1">
                  <div class="radio">
                    <input  type="radio" name="ug_exam" checked="checked" required="required"> CGPA/Credit based
                  </div>
                  <!-- <div class="radio">
                    <input  type="radio" name="ug_exam" required="required"> Percentage
                  </div> -->
                </div>
                <div class="col-md-4 col-sm-4">
                  <label>Undergrad score :</label>
                  <input type="number" name="ug_exam_score" class="form-control" step="0.01" min="1" max="100" required="required">
                </div> 
              </div>
              <hr/> 
              
              <div class="row">
                <div class="col-sm-7 form-group">
                  <label>Relevant Work Experience<br><small>(in months)</small> :</label>
                </div>
                <div class="col-md-4 col-sm-4">
                  <input type="number" name="work_experience_months" class="form-control" required="required">
                </div>
              </div>
              <hr/>
              
              <hr>
              <div class="text-center">
                <div class="form-group">
                  <input type="submit" value="Search" class="btn btn-primary  px-4">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      </section>



    <script src="<?php echo base_url('js/jquery.min.js')?>"></script>