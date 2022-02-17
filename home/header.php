<nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top" style="background-color: #f0f1f2 !important;" >
	<div class="container justify-content-center">
		<h1><a href="index.php">Blood Bank <img src="image/blood.png" width="30" height="30" style="margin-top: -10px;"></a></h1>
      

         

        <?php if (isset($_SESSION['hid'])) { ?>

		<div class="fab">
  <span class="fab-action-button">
        <i class="fa fa-compass" style="font-size: 58px;"></i>
    </span>
  <ul class="fab-buttons">
    <li class="fab-buttons__item">
      <a href="index.php" class="fab-buttons__link" data-tooltip="Home">
        <i class="fa fa-home" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="bloodinfo.php" class="fab-buttons__link" data-tooltip="Add blood info">
        <i class="fa fa-plus" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="bloodrequest.php" class="fab-buttons__link" data-tooltip="Blood Requests">
        <i class="fa fa-users" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="abs.php" class="fab-buttons__link" data-tooltip="Available blood samples">
        <i class="fa fa-tint" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="hprofile.php?id=<?php echo $_SESSION['hid']; ?>" class="fab-buttons__link" data-tooltip="<?php echo ' '.$_SESSION['hname']; ?>">
        <i class="fa fa-hospital" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="logout.php" class="fab-buttons__link" data-tooltip="Logout">
        <i class="fa fa-minus" style="font-size: 40px;"></i>
      </a>
    </li>
    </ul>
  </div>

        <?php } elseif (isset($_SESSION['rid'])) { ?>

        <div class="fab">
  <span class="fab-action-button">
        <i class="fa fa-compass" style="font-size: 58px;"></i>
    </span>
  <ul class="fab-buttons">
    <li class="fab-buttons__item">
      <a href="index.php" class="fab-buttons__link" data-tooltip="Home">
        <i class="fa fa-home" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="sentrequest.php" class="fab-buttons__link" data-tooltip="Sent Blood Requests">
        <i class="fa fa-paper-plane" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="abs.php" class="fab-buttons__link" data-tooltip="Available blood samples">
        <i class="fa fa-tint" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="rprofile.php?id=<?php echo $_SESSION['rid']; ?>" class="fab-buttons__link" data-tooltip="<?php echo ' '.$_SESSION['rname']; ?>">
        <i class="fa fa-user" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="logout.php" class="fab-buttons__link" data-tooltip="Logout">
        <i class="fa fa-minus" style="font-size: 40px;"></i>
      </a>
    </li>
    </ul>
  </div>

        <?php }  else { ?>

        <div class="fab">

  <span class="fab-action-button">
        <i class="fa fa-compass" style="font-size: 58px;"></i>
    </span>
  <ul class="fab-buttons">
    <li class="fab-buttons__item">
      <a href="index.php" class="fab-buttons__link" data-tooltip="Home">
        <i class="fa fa-home" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="login.php" class="fab-buttons__link" data-tooltip="Hospital Login">
        <i class="fa fa-hospital" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="login1.php" class="fab-buttons__link" data-tooltip="User Login">
        <i class="fa fa-user" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="register.php" class="fab-buttons__link" data-tooltip="Hospital Register">
        <i class="fa fa-hospital" style="font-size: 40px;"></i>
      </a>
    </li>
    <li class="fab-buttons__item">
      <a href="register1.php" class="fab-buttons__link" data-tooltip="User Register">
        <i class="fa fa-user" style="font-size: 40px;"></i>
      </a>
    </li>
    </ul>
  </div>

        <?php } ?>
       
  </div>
  </nav>      
