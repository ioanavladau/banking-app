<?php
  session_start();
  // check if the user is logged
  // defensive coding
  if( ! isset($_SESSION['jClient']) ){
    header('Location: login.php');
    // no exit because the header is an exit
  }
  
  // based on phone, amount and id we send money
  $sLoggedUserId = $_SESSION['jClient']->id;

  // TODO: validate the phone and the amount
  $sToPhone = $_POST['txtToPhone'];
  $iAmount = $_POST['txtAmount'];

  // open the database
  $sData = file_get_contents('database.txt');
  echo $sData;

  $jData = json_decode($sData);
  if($jData == null){
    //TODO: send email, take user to the "system under maintenance" page
    // echo 'error';
  }

  // echo $sLoggedUserId.' '.$sToPhone.' '.$iAmount;

  foreach($jData->clients as $jClient){
    if( $jClient->id == $sLoggedUserId ){
      // echo "match";
      // $jClient->amount = $jClient->amount - $iAmount; // old amount - whatever we place in the amount
      $jClient->amount -= $iAmount;
      // echo json_encode($jData);
    }

    // check the destination user by phone
    if( $jClient->phone == $sToPhone ){
      $jClient->amount += $iAmount;
    }
  }

  $sData = json_encode($jData);
  file_put_contents('database.txt', $sData);

  header('Location: profile.php');