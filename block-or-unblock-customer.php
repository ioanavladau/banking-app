<?php
  // block-customer.php?id=1
  // block-customer.php?id=1&name=A
  // block-customer.php?id=1&name=A&lastName=B
  // block-customer.php?id=1&name=A&lastName=B&year=2019
  // %20 is space
  // up to 2kB
  // pass variable via URL - GET
  // ? - variable
  // no '' or "" in address bar

  if( ! isset($_GET['id'])){
    header('Location: view-customers.php');
  }
    // open the file
    $sData = file_get_contents('database.txt');
    // echo $sData;
    // convert the data to json
    $jData = json_decode($sData);
    if($jData == null){
      // TODO: show the maintenance page
    }
    
    // loop through the customers and FIND A MATCH in the id 
    foreach($jData->clients as $jClient){
      if($jClient->id == $_GET['id']){
        echo "id matches address bar";
        // flip the active key to 0
        $jClient->active = ! $jClient->active;
        session_start();
        $_SESSION['active'] = $jClient->active;
        // convert the json back to text
        $sFinalData = json_encode($jData);
        // save thhe data back to the file - file_put_contents('database.txt')
        file_put_contents('database.txt', $sFinalData);    
        // redirect the user to view-customers.php page
        header('Location: view-customers.php');
      }
    }
  
