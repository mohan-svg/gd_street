

<style type="text/css">

/* for from validations*/

form.cmxform label.error, label.error {
    /* remove the next line when you have trouble in IE6 with labels in list */
    color: red;
    font-style: italic
}

input.error { border: 1px dotted red; } /* for from validations*/

.form-control{
  color: gray!important;
}

.control-label{
  color: #fd5f00;
  font-weight: bold;
}

.aclass:hover{
  color: #fd5f00;
}

.btn-info{
  background-color: #fd5f00; 
  border-color: #fd5f00;
}
#errmsg
{
color: red;
}
</style>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<section id="login">
        
        <div class="container">
            <div class="intro-text">
              <h3>Create your Account to use full services of GRAD STREET</h3>
              <p>Already have an account?</p>
              <a href="<?php echo site_url('login')?>" class="btn-get-started scrollto">Login here</a>      

            </div> 
        </div>
    </section>

 <section id="more-features" class="section-bg">
      <div class="container">
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

        <ul>
              <li style="color: #cb4335  ;">This details will be used in application process</li>
              <li style="color: #cb4335  ;">You can also update your details later</li>
        </ul>


        <form id="myForm" method="post" accept-charset="utf-8" class="form-horizontal" action="<?php echo site_url('create_account');?>">
        <div class="section-header">
          <h3 class="section-title">Create New Account</h3>
          <span class="section-divider"></span>
          <p class="section-description">Fill Your details to create your account and use our services hastle free</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">              
              <h4 class="title">Login Details</h4>
              
              <div class="form-group ">
                    <label class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-8">
                              <div class="input text"><input type="text" name="email" class="form-control" placeholder="enter email"  id="email"></div> 
                        </div>
                </div>
                            
                <div class="form-group ">
                        <label class="col-sm-3 control-label">Password:</label>
                              <div class="col-sm-8">
                              <div class="input text"><input type="password" name="password" class="form-control" placeholder="Minimum 8 char" id="password"></div> 
                              </div>
                </div>

                <div class="form-group ">
                      <label class="col-sm-3 control-label">Repeat Password:</label>
                        <div class="col-sm-8">
                              <div><input type="password" name="pswrepeat" class="form-control" placeholder="Minimum 8 char" id="pswrepeat"></div>
                        </div>
                </div>
              
               
            </div><!--./box wow fadeInLeft--> 

          </div><!--col-lg-6-->

          <div class="col-lg-6">
            <div class="box wow fadeInRight">              
              <h4 class="title">Personal Details</h4>
                <div class="form-group ">
                      <label class="col-sm-3 control-label">First Name:</label>
                      <div class="col-sm-8">
                            <div class="input text"><input type="text" name="fname" class="form-control" placeholder="Enter First Name" maxlength="255"></div> 
                      </div>
                </div>
                            
                <div class="form-group">
                      <label class="col-sm-3 control-label">Last Name:</label>
                      <div class="col-sm-8">
                          <div class="input text"><input type="text" name="lname" class="form-control" placeholder="Enter Last Name" maxlength="255"></div> 
                      </div>
                </div>

                <div class="form-group">
                      <label class="col-sm-3 control-label column-in-center">Mobile No:</label>
                                                                                     
                      <div class="col-sm-8">
                          <div class="input tel"><input type="number" name="mobile" class="form-control" placeholder="Your Mobile no." maxlength="10" id="mobile"></div> 
                      </div>                       
              </div>
              <br />
            </div><!--./box wow fadeInRight--> 
          </div><!--col-lg-6-->
          
        </div><!-- ./row-->
        <div class="pull-right">
            <button type="submit" id='btnValidate' class="btn btn-info btn-lg" style="">Create Account</button>
          </div>
      </form>
      </div><!-- ./container-->
    </section><!-- #more-features -->




<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script src="<?php echo base_url('js/dist/jquery.validate.js'); ?>"></script>


<script>
  
    $().ready(function() {
    

        // validate signup form on keyup and submit
        $("#myForm").validate({
            rules: {

               email: {
                    required: true, 
                    email: true                   
                  }, 
                                         
                password: {
                  required: true,
                  minlength: 8,                  
                },
                pswrepeat: {
                  required: true,
                  minlength: 8,                  
                  equalTo: "#password"
                },
                fname: {
                  required: true
                },
                lname: {
                  required: true
                },
                          
                mobile: {
                  required: true,                  
                  minlength: 10,
                  maxlength:10
                }                
                                            
            },
            messages: {
                
                email: "Please enter a valid email address",
                password: {
                  required: "Please provide a password",
                  minlength: "Your password must be at least 8 characters long"
                },
                pswrepeat: {
                  required: "Please provide a password",
                  minlength: "Your password must be at least 8 characters long",
                  equalTo: "Repeat Password should match with Password"
                },
                fname: "Enter First name",
                lname: "Enter Last name",
                mobile: {
                  required: "Enter Mobile No.",                  
                  minlength: "Provide Valid Mobile No.",
                  maxlength: "Provide Valid Mobile No.",
                }              
                
            }//messages
        });

           
    });
</script>