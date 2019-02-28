<?php include('header.php'); ?>
<div class="container">
  <div class="columns">
    <div class="column col-3 col-mx-auto col-xs-12 col-md-6 col-sm-6">
    <div class="centered text-center"><img width="100px" src="img/logo.jpg"/></div>
    <div class="centered text-center"><h4>CSI District Church <br/>Muzhucode</h4></div>
    <form id="login-form" action="controls/login_check.php" name="findkural" method="post">
                  <div class="form-group ">
                    <label class="form-label" for="username">Email</label>
                    <input class="form-input" name="username" id="username" type="text" placeholder="Email">
                    <?php if( isset($_SESSION['login_error'])){?>
            <p class="form-input-hint"><?php echo  $_SESSION['login_error'];?> </p>
            <?php  } ?>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="input-example-2pwd">Password</label>
                    <input class="form-input" name="pwd" id="pwd"  type="password" placeholder="Password">
                  </div>
                  <div class="form-group ">
                  
                    <input class="btn btn-primary centered btn-block" type="submit" name="login" id="login" value="Login" />
                   
                  </div>
                </form>
    </div>
  </div>
</div>
<?php include('footer.php'); ?> 
