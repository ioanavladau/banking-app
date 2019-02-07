<?php

  if(isset($_POST['txtLoginEmail']) && isset($_POST['txtLoginPassword'])){
    // echo $_POST['txtLoginEmail'];
    // echo $_POST['txtLoginPassword'];
    // $sCorrectEmail = "a@a.com";
    // $sCorrectPassword = "111";

    $sData = file_get_contents('database.txt');
    $jData = json_decode($sData);

    foreach($jData->clients as $jClient){
      // check if the user name and password exist n the database
      if( $jClient->email == $_POST['txtLoginEmail'] && 
          $jClient->password == $_POST['txtLoginPassword']
        ){
          // echo 'OK, you are logged in';
          session_start(); // WE MUST MUST MUST HAVE THIS TO USE SESSIONS
          $_SESSION['email'] = $_POST['txtLoginEmail'];
          header('Location: profile.php');
        }
    }

    echo "Sorry try again";
  }

?>

<?php 
  // include include_once require require_once
  $sTitle = 'Login';
  $sLinkToCss = "<link rel='stylesheet' href='login.css'";
  $sLinkToJs = "<script src='login.js'></script>";

  require_once 'top.php';
?>

  <h1>LOGIN</h1>
  <form action="login.php" method="POST">
    <input name="txtLoginEmail" type="text" placeholder="email" data-validate="yes" data-type="email" data-min="6" data-max="300">
    <input name="txtLoginPassword" type="password" placeholder="password" data-validate="yes" data-type="string" data-min="3" data-max="50">
    <button>login</button>
  </form>

<?php 
  $sLinkToJs = "<script src='login.js'></script>";
  require_once 'bottom.php';
?>