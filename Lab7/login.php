<?php
	include 'main_header.php';
	include 'controllers/UserController.php';
?>
<!--login status-->
<div class="center-login">
	<h1 class="text text-center">Login</h1>
    <h5 class="text-danger"><?php echo $err_db;?></h5>
	<form action="" method="post" class="form-horizontal form-material">
		
		<div class="form_group text-center">
			<h4 class="text">UserName</h4>
			<input type="text" name="uname" value="<?php echo $uname;?>" class="form-control1">
			<span class="text-danger"><?php echo $err_uname;?></span>
		</div>
		<div class="form-group text-center">
			<h4 class="text">Password</h4>
			<input type="password" name="pass" class="form-control1">
			<span class="text-danger"><?php echo $err_pass;?></span>
		</div>
		<div class="form-group text-center">
			<input type="submit" name="btn_login" class="btn btn-danger" value="Login" class="form-control">
		</div>
		<div class="form-group text-center">
			
			<a href="signup.php">Not Registered yet? Sign Up</a>
			
		</div>
	</form>
</div>

<!--login ends-->
<?php include 'main_footer.php';?>
