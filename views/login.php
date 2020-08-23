
<style type="text/css">

input.error { border: 1px dotted red; } /* for from validations*/
      
@media(max-width: 728px){
    .login-form {
            width:100% !important;
            padding-right: 5px;
            padding-left: 5px;
        }
}
        .login-form {
            width: 450px;
            margin: 30px auto;
            padding-top: 20px;
        }
        
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        
        .login-form h2 {
            margin: 0 0 15px;
        }
        
        .form-control,
        .login-btn {
            min-height: 38px;
            border-radius: 2px;
        }
        
        .input-group-addon .fa {
            font-size: 18px;
        }
        
        .login-btn {
            font-size: 15px;
            font-weight: bold;
        }
        
        .social-btn .btn {
            border: none;
            margin: 10px 3px 0;
            opacity: 1;
        }
        
        .social-btn .btn:hover {
            opacity: 0.9;
        }
        
        .social-btn .btn-primary {
            background: #507cc0;
        }
        
        .social-btn .btn-info {
            background: #64ccf1;
        }
        
        .social-btn .btn-danger {
            background: #df4930;
        }
        
        .or-seperator {
            margin-top: 20px;
            text-align: center;
            border-top: 1px solid #ccc;
        }
        
        .or-seperator i {
            padding: 0 10px;
            background: #f7f7f7;
            position: relative;
            top: -11px;
            z-index: 1;
        }

        /*.btn-primary {
            color: #fff;
            background-color: #0d1128;
            border-color: #0d1128;
        }*/
    </style>

<section id="login">
        
        <div class="container">
            <div class="intro-text">
              <h3>Login your Account for smooth process</h3>
              <p>Not have an Account yet?</p>
              <a href="<?php echo site_url('sign_up')?>" class="btn-get-started scrollto">Sign Up</a>      

            </div> 
        </div>
    </section>

    <!-- header -->

        <div class="login-form">
             

            <form id="myForm" method="post" action="<?php echo site_url('verify');?>"  >
                <h2 class="text-center">Student Log in</h2>
                <div class="form-group">
              
                <?php if ($this->session->flashdata('message')) { ?>

                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('message'); ?>   
                        </div>
                <?php } ?>
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


                </div>
                <div class="form-group">

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" style="width: 100%;" <?php if(isset($_COOKIE['user_login'])){  ?> value="<?php echo $this->input->cookie('user_login') ?>" <?php } ?>> 
                        <label for="username"></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="width: 100%;" <?php if(isset($_COOKIE['user_password'])){  ?> value="<?php echo $this->input->cookie('user_password') ?>" <?php } ?>>
                        <label for="password"></label>
                    </div>
                    <br/>
                    <div class="form-group pull-left" style="margin-left:20px; ">                        
                        <input type="checkbox" name="remember" <?php if(isset($_COOKIE['user_login'])){  ?> checked <?php } ?>>
                        <span style="margin-left:10px;">Remember me</span>
                    </div>
                    <div class="form-group pull-right" style="margin-left:20px; ">                        
                        <input type="checkbox" onclick="myFunction();">
                        <span style="margin-left:10px;">Show Password</span>
                    </div>
                    
                    
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary login-btn btn-block">Sign in</button><br/>
                    <a href="forgot_password">Forgot Password ? click here</a>
                </div>
                <!-- <div class="clearfix">
                    <label class="pull-left checkbox-inline">
                        <input type="checkbox"> Remember me</label>
                    <a href="#" class="pull-right">Forgot Password?</a>
                </div> -->
               <!--  <div class="or-seperator"><i>or</i></div>
                <p class="text-center">Login with your social media account</p>
                <div class="text-center social-btn">
                    <a href="#" class="btn btn-primary"><i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                    <a href="#" class="btn btn-info"><i class="fa fa-twitter"></i>&nbsp; Twitter</a>
                    <a href="#" class="btn btn-danger"><i class="fa fa-google"></i>&nbsp; Google</a>
                </div> -->
            </form>
            <p class="text-center text-muted small">Don't have an account? <a href="<?php echo site_url('sign_up');?>">Sign up here!</a></p>
        </div>

<script type="text/javascript">
     $(function() {

    var timeout = 3000; // in miliseconds (3*1000)
    
    $('#hide').delay(timeout).fadeOut(300);

});
</script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script src="<?php echo base_url('js/dist/jquery.validate.js'); ?>"></script>
<!-- <script src="<?php echo base_url('js/lib/jquery.js'); ?>"></script> -->

<script>
  
    $().ready(function() {
    

        // validate signup form on keyup and submit
        $("#myForm").validate({
            rules: {
                               
                username: {
                    required: true,
                    minlength: 8
                },
                password: {
                    required: true,
                    minlength: 8
                },
                               
            },
            messages: {
                
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 8 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                
            }
        });

           
    });
</script>

<script type="text/javascript">

function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 

</script>