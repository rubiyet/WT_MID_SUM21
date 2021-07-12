<?php
    include 'admin_header.php';
    include 'controllers/CategoryController.php';
    $id = $_GET["id"];
    $c = getCategory($id);
?>
<div class="center">
	<form clss="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text">Name:</h4>
			<input type="text" value="<?php echo $c["name"]?>" class="form-control">
		</div>
		<div class="form-group text-center">
			<input type="submit" class="btn btn-success" value="Edit Category" class="form-control">
		</div>
	</form>
</div>
<!--edit category ends-->
<?php include 'admin_fotter.php';?>
