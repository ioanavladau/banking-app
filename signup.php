<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIGNUP</title>
</head>
<body>
  <h1>SIGNUP</h1>
  <form id="frmSignup" action="signup.php" method="POST">
    <input id="txtSignupName" type="text" maxlength="10">
    <button>sign me up</button>
    
    
    
    
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
     $("#frmSignup").submit(function(){
      // validate the name min 2 max 10
      let sSignupName = $("#txtSignupName").val()
      console.log(sSignupName);
      return false
     })


  </script>
</body>
</html>