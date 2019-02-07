<?php 

  if(isset($_POST['txtLoginEmail']) && isset($_POST['txtLoginPassword'])){
    // echo $_POST['txtLoginEmail'];
    // echo $_POST['txtLoginPassword'];

    // $sCorrectEmail = "a@a.com";
    // $sCorrectPassword = "111";

    $sData = file_get_contents("database.txt");
    $jData = json_decode($sData);

    foreach($jData->clients as $jClient){
      // check if the user name and password exist n the database
      if( $jClient->email == $_POST['txtLoginEmail'] && 
          $jClient->password == $_POST['txtLoginPassword']
        ) {
          // echo 'OK, you are logged in';
          session_start(); // WE MUST HAVE THIS TO USE SESSIONS
          $_SESSION['email'] = $_POST['txtLoginEmail'];
          header('Location: profile.php');
        }
    }

    echo "Sorry try again";
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
</head>
<body>
  <h1>LOGIN</h1>
  <form action="login.php" method="POST">
    <input name="txtLoginEmail" type="text" placeholder="email">
    <input name="txtLoginPassword" type="password" placeholder="password">
    <button>login</button>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="validate.js"></script>
</body>
</html>