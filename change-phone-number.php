<?php
  session_start();
  // check if the user is logged
  // defensive coding
  if( ! isset($_SESSION['jClient']) ){
    header('Location: login.php');
  }
  
  $sLoggedUserId = $_SESSION['jClient']->id;

  $sNewPhoneNumber = $_POST['txtNewPhoneNumber'];
  // open the database
  $sData = file_get_contents('database.txt');

  $jData = json_decode($sData);
  
  if($jData == null){
    //TODO: send email, take user to the "system under maintenance" page
    // echo 'error';
  }

  foreach($jData->clients as $jClient){
    if( $jClient->id == $sLoggedUserId ){
      $jClient->phone = $sNewPhoneNumber;

      // IF WE FIND MATCH, we don't continue!
      // encode the data already!!

      $sData = json_encode($jData);
      file_put_contents('database.txt', $sData);
      // update session!!!
      $_SESSION['jClient']->phone = $jClient->phone;
      header('Location: profile.php');
    }
  }

