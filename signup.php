<?php
  // check if the data is valid
  // echo $_POST['txtSignupName'] ?? "You did not post anything";

  if(isset($_POST['txtSignupName'])){
    $sSignupName = $_POST['txtSignupName'];
    // validate the name
    if( strlen($sSignupName) >=2 && strlen($sSignupName) <= 10){
      // save it to the file
      // take the user to the success page
      header('Location: signup-ok.php');
    } else{
      header('Location: signup-error.php');
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIGNUP</title>
  <style>
    input.invalid{
      border: 5px solid red;
    }
  </style>
</head>
<body>
  <h1>SIGNUP</h1>
  <form id="frmSignup" action="signup.php" method="POST">
    <input name="txtSignupName" id="txtSignupName" type="text" maxlength="10">
    <button>sign me up</button>    
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
     $("#frmSignup").submit(function(){
      // validate the name min 2 max 10
      let sSignupName = $("#txtSignupName").val()
      if(sSignupName.length >= 2 && sSignupName.length <= 10){
        return true;
      }else{
        // something is not valid
        $("#txtSignupName").addClass("invalid");
        return false;
      }
     })


  </script>
</body>
</html>