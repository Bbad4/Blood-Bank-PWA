<?php
require 'file/connection.php';
session_start();
if(!isset($_SESSION['rid']))
{
  header('location:login1.php');
}
else {
	if(isset($_SESSION['rid'])){
		$id=$_SESSION['rid'];
		$sql = "SELECT * FROM receivers WHERE id='$id'";
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
           
					<div class="card-header text-center">Receiver</div>

					<div class="card-body">
					   <form action="file/updateprofile.php" method="post">
					   	
						<input type="text" name="rname" placeholder="Receiver Name" value="<?php echo $row['rname']; ?>" class="form-control mb-3">
						
						<input type="email" name="remail" placeholder="Receiver Email" value="<?php echo $row['remail']; ?>" class="form-control mb-3">
						
						<input type="text" name="rpassword" placeholder="Receiver Password" value="<?php echo $row['rpassword']; ?>" class="form-control mb-3">
						
						<input type="text" name="rphone" placeholder="Receiver Phone Number" value="<?php echo $row['rphone']; ?>" class="form-control mb-3">
						
						<input type="text" name="rcity" placeholder="Receiver City" value="<?php echo $row['rcity']; ?>" class="form-control mb-3">
						
						<select class="form-control mb-3" name="bg" required>
                             <option selected><?php echo $row['rbg']; ?></option>
                             <option>A-</option>
                             <option>A+</option>
                             <option>B-</option>
                             <option>B+</option>
                             <option>AB-</option>
                             <option>AB+</option>
                             <option>O-</option>
                             <option>O+</option>
                        </select>
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