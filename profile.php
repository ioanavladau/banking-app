<?php
  session_start(); // MUST MUST MUST
  // $sSessionEmail = $_SESSION['email'];
  if( !isset($_SESSION['jClient']) ){
    header('Location: login.php');
  }
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $_SESSION['jClient']->email; ?></title>
  <style>
    .error{
      color: red;
    }
  </style>
</head>
<body>

  <form action="transfer-money.php" method="POST">
    <input name="txtToPhone" type="text" placeholder="to phone">
    <input name="txtAmount" type="text" placeholder="amount">
    <button>send money</button>
  </form>

  <form action="change-phone-number.php" method="POST">
    <input name="txtNewPhoneNumber" type="text" placeholder="new phone number">
    <button>change phone</button>
  </form>

  <h1>Profile</h1>

  <a href="logout.php">Logout</a>

  <h1>Amount available: <?php echo $_SESSION['jClient']->amount?></h1>

  <?php echo json_encode($_SESSION)?>

  <?php 
  
    if($_SESSION['jClient']->active==false){
      echo '<div class="error">USER BLOCKED, contact the bank</div>';
    }
  ?>

  <h2>Hello, <?php echo $_SESSION['jClient']->email; ?>  </h2>

  <h3>Phone: <?php echo $_SESSION['jClient']->phone ?></h3>

  <?php echo json_encode($_SESSION['jClient'])?>

  <a href="logout.php">logout</a>




  


</body>
</html>