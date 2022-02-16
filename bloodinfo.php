<?php 
  require 'file/connection.php';
  session_start();
  if(!isset($_SESSION['hid']))
  {
  header('location:login.php');
  }
  else {
?>
<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Add blood samples"; ?>
<?php require 'head.php'; ?>
<body>
  <?php require 'header.php'; ?>

    <div class="container cont">

      <?php require 'message.php'; ?>

      <div class="row justify-content-center">
          
        <div class="row col-lg-3 col-md-5 col-sm-6 col-xs-7 mb-4 justify-content-center">
        <div class="card text-white bg-secondary mb-3 text-center">
        
        <div class="card-body">
        <form action="file/infoAdd.php" method="post" style="margin-top:-20px; ">
          
          <select class="form-control" name="bg" required="">
                <option disabled selected>Blood Group</option>
                <option>A-</option>
                <option>A+</option>
                <option>B-</option>
                <option>B+</option>
                <option>AB-</option>
                <option>AB+</option>
                <option>O-</option>
                <option>O+</option>
          </select><br>
          <input type="submit" name="add" value="Add" class="btn btn-primary btn-block">
        </form>
         </div>
       </div>
       </div>


<?php   if(isset($_SESSION['hid'])){
    $hid=$_SESSION['hid'];
    $sql = "select * from bloodinfo where hid='$hid'";
    $result = mysqli_query($conn, $sql);
  }
  ?>


             <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">Nothing to show.</b>';
            }
            ?>
            </div>


<?php while($row = mysqli_fetch_array($result)) { ?>  
    
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-3 ">          
      <div class="card bg-light mb-3 text-center">
      <div class="card-header"><?php echo $row['bg'];?></div>
      <div class="card-body">
      
           <a href="file/delete.php?bid=<?php echo $row['bid'];?>" class="btn btn-danger">Delete</a>
            
</div>
      </div>
      </div>


            <?php } ?>
      

      

   </div>
</div>
<?php require 'footer.php' ?>
</body>
<?php } ?>