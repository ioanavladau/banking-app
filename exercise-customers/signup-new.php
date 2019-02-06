<?php
  // check if the data is valid
  // echo $_POST['txtSignupName'] ?? "You did not post anything";

  if(isset($_POST['txtSignupName'])){
    $sSignupName = $_POST['txtSignupName'];
    // validate the name
    if( strlen($sSignupName) >=2 && strlen($sSignupName) <= 10){
      // save name to the file
      $sData = file_get_contents("database.txt");
      $jData = json_decode($sData);

      $sNewClient = '{}';
      $jNewClient = json_decode($sNewClient);
      $jNewClient->id = uniqid();
      $jNewClient->name = $sSignupName;

      array_push($jData->clients, $jNewClient);
      $sFinalData = json_encode($jData);

      file_put_contents('database.txt', $sFinalData);
      //file_put_contents("db.txt", $sSignupName);
      
      // take the user to the success page
      header('Location: signup-new-ok.php');
    } else{
      header('Location: signup-new-error.php');
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIGN UP NEW</title>
  <style>
    input.invalid{
      border: 5px solid red;
    }
  </style>
</head>
<body>
<h1>SIGNUP</h1>
  <form id="frmSignup" action="signup-new.php" method="POST">
    <input name="txtSignupName" id="txtSignupName" type="text" maxlength="10">
    <button>sign me up</button>    
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
      $("#frmSignup").submit(function(){
      // validate the name min 2 max 10
      let sSignupName = $("#txtSignupName").val();
      if(sSignupName.length >= 2 && sSignupName.length <= 10){
        return true;
      }
     })

      // initial database structure
      // json object but text
      // {
      //   "name": "Uni name here",
      //   "address": "address here",
      //   "students": []
      // }
  </script>
</body>
</html>