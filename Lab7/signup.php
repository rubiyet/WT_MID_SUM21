<?php include 'main_header.php';?>
<?php
	include 'controllers/UserController.php';
?>
<!--sign up status -->
<div class="center_login">
	<h1 class="text text-center">Sign up</h1>
    <h5 class="text-danger text-center"><?php echo $err_db;?></h5>
	<form action="" method="post" class="form=horizontal form_material">
		<div class="form_group text-center">
			<h4 class="text">Name</h4>
			<input type="text" name="name" value="<?php echo $name;?>" class="form-contrl">
			<span class="text-danger"><?php echo $err_name;?></span>
		</div>
		<div class="form_group text-center">
			<h4 class="text">UserName</h4>
			<input type="text" name="uname" value="<?php echo $uname;?>" class="form-contrl">
			<span class="text-danger"><?php echo $err_uname;?></span>
		</div>
		<div class="form_group text-center">
			<h4 class="text">Email</h4>
			<input type="text" name="email" value="<?php echo $email;?>" class="form-contrl">
			<span class="text-danger"><?php echo $err_email;?></span>
		</div>
		<div class="form_group text-center">
			<h4 class="text">password</h4>
			<input type="password" name="pass" value="<?php echo $pass;?>" class="form-contrl">
			<span class="text-danger"><?php echo $err_pass;?></span>
		</div>
		<div class="form-group text-center">
			<input type="submit" name="sign_up" class="btn btn-success" value="Sign Up" class="form-contrl">
		</div>
	</form>
</div>
			
<?php include 'main_footer.php';?>		
		