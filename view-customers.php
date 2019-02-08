<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>VIEW CUSTOMERS</title>
  <style>
    .client{
      margin-top: 20px;
    }
    .client:nth-child(even){
      background-color: rgba(0,0,0,.1);
    }
  </style>
</head>
<body>

  <h1>VIEW CUSTOMERS</h1>

  <?php 
    $sData = file_get_contents('database.txt');
    // echo $sData;
    $jData = json_decode($sData);
    if($jData == null){
      echo 'Error, data is corrupted';
      exit;
      // send email to system admin
      // show a page that says "Please wait, system under.."
      // NEVER SAY TO THE USER SORRY DATABASE CORRUPTED (fool the user)
    }

    foreach($jData->clients as $jClient){

      $sWord = ($jClient->active == 0) ? 'UNBLOCK' : 'BLOCK';

      // $sWord = 'BLOCK';
      // if($jClient->active == 0){
      //   $sWord = 'UNBLOCK';
      // }

      echo "<div class='client'>
              <div>id: $jClient->id</div>
              <div>name: $jClient->name</div>
              <a href='block-customer.php?id=$jClient->id'>$sWord</a>
            </div>";
    }
?>

</body>
</html>