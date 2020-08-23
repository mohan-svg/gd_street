<style type="text/css">
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
    </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<section id="login">
        
        <div class="container">
            <div class="intro-text">
              <h3>Apply through GradStreet for fast and smooth process</h3>
              <p>MS in US University Just One Step to go</p>
              <a href="<?php echo site_url('university')?>" class="btn-get-started">Apply Now</a>      

            </div> 
        </div>
    </section>

    <!-- header -->
        

        <div class="login-form">
            <form method="post" action="<?php echo site_url('verify_admin');?>" >
                <h2 class="text-center">Admin - Login</h2>
                <div class="form-group">
                    <?php if($this->session->flashdata('message')){?>
                                        <!-- <div class="col-sm-3 text-center"> -->
                                            <div id="hides" class="col-sm-12">

                                            <?php echo $this->session->flashdata('message');?>
                                            </div>
                                        <!-- </div> -->

                                        <?php  }   ?>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Username" required="required" <?php if(isset($_COOKIE['admin_login'])){  ?> value="<?php echo get_cookie('admin_login') ?>" <?php } ?>>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required" <?php if(isset($_COOKIE['admin_password'])){  ?> value="<?php echo get_cookie('admin_password') ?>" <?php } ?>>
                    </div>
                </div>
                <div class="form-group pull-left" style="margin-left:20px; ">                        
                        <input type="checkbox" name="remember" <?php if(isset($_COOKIE['admin_login'])){  ?> checked <?php } ?>>
                        <span style="margin-left:10px;">Remember me</span>
                    </div>
                    <div class="form-group pull-right" style="margin-left:20px; ">                        
                        <input type="checkbox" onclick="myFunction();">
                        <span style="margin-left:10px;">Show Password</span>
                    </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary login-btn btn-block">Sign in</button>
                </div>
              
            </form>
            
        </div>

 <script type="text/javascript">
     $(function() {

    var timeout = 3000; // in miliseconds (3*1000)
    
    $('#hide').delay(timeout).fadeOut(300);

});


  function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
 </script>