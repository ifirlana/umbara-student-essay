<style type="text/css">
  body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
<div class="container">

      <form class="form-signin" method="POST" action="<?php echo site_url();?>app/check_login/">
        <h2 class="form-signin-heading"><img class="img-responsive img-thumbnail" src="<?php echo base_url()?>assets/img_template_3/2.jpg"></h2>
        <input type="username" class="form-control" name="username" placeholder="username" required autofocus>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
      
		<?php
		if(isset($message))
		{
			echo "<br />";
			echo $message;
		}
		?>
	  </form>
    </div> <!-- /container -->