<?php 
require 'file/connection.php'; 
session_start();
  if(!isset($_SESSION['rid']))
  {
  header('location:login1.php');
  }
  else {
    $rid = $_SESSION['rid'];
    $sql = "select bloodrequest.*, hospitals.* from bloodrequest, hospitals where rid='$rid' && bloodrequest.hid=hospitals.id";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Sent Requests"; ?>
<?php require 'head.php'; ?>
<body>
	<?php require 'header.php'; ?>
	<div class="container cont">

		<?php require 'message.php'; ?>

<div class="row justify-content-center">		

		        <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">You have not requested yet. </b>';
            }
            ?>
            </div>

		<?php while($row = mysqli_fetch_array($result)) { ?>

		  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-3 ">
      <div class="card bg-light mb-3 text-center">
      <div class="card-header"><?php echo ($row['status']); ?> for <?php echo $row['bg'];?></div>
      <div class="card-body">
      <h5 class="card-title"><?php echo $row['hname'];?></h5>
      <p class="card-text"><?php echo $row['hcity'];?><br><?php echo $row['hemail'];?><br><?php echo $row['hphone'];?></p>
			


			<?php if($row['status'] == 'Pending'){ ?>
				<a href="file/cancel.php?reqid=<?php echo $row['reqid'];?>" class="btn btn-danger">Cancel</a>
			<?php } ?>

			<?php if($row['status'] == 'Rejected'){ ?>
				<a href="file/cancel.php?reqid=<?php echo $row['reqid'];?>" class="btn btn-primary">Ok</a>
			<?php } ?>


      </div>
      </div>
      </div>			
			
		
		<?php } ?>
  </div>	
</div>
    <?php require 'footer.php'; ?>
</body>
</html>
<?php } ?>