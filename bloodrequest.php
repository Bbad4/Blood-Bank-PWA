<?php 
require 'file/connection.php'; 
session_start();
  if(!isset($_SESSION['hid']))
  {
  header('location:login1.php');
  }
  else {
    $hid = $_SESSION['hid'];
    $sql = "select bloodrequest.*, receivers.* from bloodrequest, receivers where hid='$hid' && bloodrequest.rid=receivers.id";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Blood Requests"; ?>
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
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">No one has requested yet. </b>';
            }
            ?>
            </div>

		<?php while($row = mysqli_fetch_array($result)) { ?>


      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-3 ">
      <div class="card bg-light mb-3 text-center">
      <div class="card-header"><?php echo ($row['status']); ?> for <?php echo $row['bg'];?></div>
      <div class="card-body">
      <h5 class="card-title"><?php echo $row['rname'];?></h5>
      <p class="card-text"><?php echo $row['rcity'];?><br><?php echo $row['remail'];?><br><?php echo $row['rphone'];?></p>
		
			
			<?php if($row['status'] == 'Accepted'){ ?> <a href="" class="btn btn-success disabled">Accepted</a> <?php }
			else{ ?>
				<a href="file/accept.php?reqid=<?php echo $row['reqid'];?>" class="btn btn-success">Accept</a>
			<?php } ?>
			
			<?php if($row['status'] == 'Rejected'){ ?> <a href="" class="btn btn-danger disabled">Rejected</a> <?php }
			else{ ?>
				<a href="file/reject.php?reqid=<?php echo $row['reqid'];?>" class="btn btn-danger">Reject</a>
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