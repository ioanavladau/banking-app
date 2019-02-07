<?php
  session_start(); // MUST MUST MUST
  if( !isset($_SESSION['email']) ){
    header('Location: login.php');
  }


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Profile</title>
</head>
<body>
  <h1>Profile</h1>
  <h2>Hello, <?php echo $_SESSION['email']; ?>  </h2>
  
  <a href="logout.php">logout</a>
</body>
</html>