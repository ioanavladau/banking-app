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

  <h1>Profile</h1>

  <?php echo json_encode($_SESSION)?>

  <?php echo $_SESSION['jClient']->active?>

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