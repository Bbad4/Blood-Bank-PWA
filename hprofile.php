<?php
require 'file/connection.php';
session_start();
if(!isset($_SESSION['hid']))
{
  header('location:login.php');
}
else {
	if(isset($_SESSION['hid'])){
		$id=$_SESSION['hid'];
		$sql = "SELECT * FROM hospitals WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
	}
}
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Receiver Profile"; ?>
<?php require 'head.php';?>
<body>
	<?php require 'header.php'; ?>

	<div class="container cont">

		<?php require 'message.php'; ?>

		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 col-sm-8 mb-5">
				<div class="card text-white bg-secondary mb-3 text-center">
					
				
						<div class="card-header text-center">Hospital</div> 
					

					<div class="card-body">
					   <form action="file/updateprofile.php" method="post">
					   	
						<input type="text" name="hname" placeholder="Hospital Name" value="<?php echo $row['hname']; ?>" class="form-control mb-3">
						
						<input type="email" name="hemail" placeholder="Hospital Email" value="<?php echo $row['hemail']; ?>" class="form-control mb-3">
						
						<input type="text" name="hpassword" placeholder="Hospital Password" value="<?php echo $row['hpassword']; ?>" class="form-control mb-3">
						
						<input type="text" name="hphone" placeholder="Hospital Phone Number" value="<?php echo $row['hphone']; ?>" class="form-control mb-3">
						
						<input type="text" name="hcity" placeholder="Hospital City" value="<?php echo $row['hcity']; ?>" class="form-control mb-3">
						<input type="submit" name="update" class="btn btn-block btn-primary" value="Update">
					   </form>
					</div>
					<a href="index.php" class="text-center text-white">Cancel</a><br>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>