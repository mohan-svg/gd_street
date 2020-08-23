

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

</style>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<section id="login">
        
        <div class="container">
            <div class="intro-text">
              <h3>Login your Account for smooth process</h3>
              <p>Not have an Account yet?</p>
              <a href="<?php echo site_url('sign_up')?>" class="btn-get-started scrollto">Sign Up</a>     

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

       
        <form id="myForm" method="post" accept-charset="utf-8" class="form-horizontal" action="<?php echo site_url('verify_otp');?>">
        <div class="section-header">
          <h3 class="section-title">Enter OTP</h3>
          <span class="section-divider"></span>
          <p class="section-description">Please enter OTP received in your registered email id then press next to create new password</p>
        </div>

        <div class="row">

          <div class="col-lg-10">
            <div class="box wow fadeInLeft">              
              <!-- <h4 class="title text-center">Login Details</h4> -->
              
              <div class="form-group ">
                    <label class="col-sm-4 control-label">One Time Password(OTP):</label>
                        <div class="col-sm-6">                             
                              <div class="input text"><input type="number" name="otp" class="form-control" placeholder="Enter OTP sent to your email id"  id="otp"></div> 
                        </div>
                </div>

               <div class="pull-right">
                  <button type="submit" class="btn btn-info" style="">Verify Account</button>
                </div>
            </div><!--./box wow fadeInLeft--> 

          </div><!--col-lg-10-->          
        </div><!-- ./row-->
        
      </form>
      </div><!-- ./container-->
    </section><!-- #more-features -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script src="<?php echo base_url('js/dist/jquery.validate.js'); ?>"></script>

<script type="text/javascript">
  $(function() {
    // setTimeout() function will be fired after page is loaded
    // it will wait for 5 sec. and then will fire
    // $("#successMessage").hide() function
    setTimeout(function() {
        $("#successMessage").hide('blind', {}, 500)
    }, 5000);
});
</script>

<script>
  
    $().ready(function() {
    

        // validate signup form on keyup and submit
        $("#myForm").validate({
            rules: {

               otp: {
                    required: true, 
                    minlength: 6,
                    maxlength:6                 
                  }
                                    
            },
            messages: {
                
                otp: {
                  required: "Please Enter Valid Activation Code",
                  minlength: "Please Enter Valid Activation Code",
                  maxlength: "Please Enter Valid Activation Code"
                }                         
                
            }//messages
        });

           
    });
</script>