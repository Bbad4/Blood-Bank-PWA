<?php 
session_start();
require 'file/connection.php';
if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id && bg LIKE '%$searchKey%'";
}else{
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id";
}
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Available Blood Samples"; ?>
<?php require 'head.php'; ?>
<body>
    <?php require 'header.php'; ?>

    <div class="container cont">
        
        <?php require 'message.php'; ?>
        
<div class="row justify-content-center">

        <div class="row col-lg-3 col-md-12 col-sm-12 mb-4 justify-content-center">
            <div class="card text-white bg-secondary mb-3 text-center">
             <div class="card-body">

            <form method="get" action="" style="margin-top:-20px; ">
            
               <select name="search" class="form-control">
               <?php echo @$_GET['search']; ?>
               <option disabled selected>Blood Group</option>
               <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
               </select><br>
               <a href="abs.php" class="btn btn-primary mr-4">Reset</a>
               <input type="submit" name="submit" class="btn btn-primary" value="Search">
           </form>
        </div>
    </div>
    </div>


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
      <div class="card-header"><?php echo ($row['bg']); ?></div>
      <div class="card-body">
      <h5 class="card-title"><?php echo $row['hname'];?></h5>
      <p class="card-text omni"><?php echo $row['hcity'];?><br><?php echo $row['hemail'];?><br><?php echo $row['hphone'];?></p>
      
      

                <?php $bid= $row['bid'];?>
                <?php $hid= $row['hid'];?>
                <?php $bg= $row['bg'];?>

                <form action="file/request.php" method="post">
                    <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                    <input type="hidden" name="hid" value="<?php echo $hid; ?>">
                    <input type="hidden" name="bg" value="<?php echo $bg; ?>">

                <?php if (isset($_SESSION['hid'])) { ?>
                <a href="javascript:void(0);" class="btn btn-primary hospital">Request Sample</a>
                <?php } else {(isset($_SESSION['rid']))  ?>
                <input type="submit" name="request" class="btn btn-primary" value="Request Sample">
                <?php } ?>

                </form>

      </div>
      </div>
      </div>



            

        <?php } ?>
               
        </div>
</div>        

    <?php require 'footer.php' ?>
</body>

<script type="text/javascript">
    $('.hospital').on('click', function(){
        alert("Hospital user can't request for blood.");
    });
</script>