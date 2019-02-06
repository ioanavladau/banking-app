<?php 
// put the content of the file in a variable
$sData = file_get_contents("database.txt");
// echo $sData;
// create an object out of the text
// text into object json_decode() - convert txt into JSON object
$jData = json_decode($sData); // convert text into a JSON object
echo '<div>'.$jData->name.'</div>';
echo '<div>'.$jData->address.'</div>';
echo '<h1>CLIENTS</h1>';
// ["a", "b", "c"]
foreach($jData->clients as $jClient){
  echo "<p>id: $jClient->id</p>";
  echo "<p>name: $jClient->name</p>";
  echo "<p>last name: $jClient->lastName</p>";
  // echo '<h2>Yes</h2>';
}
$sNewClient = '{}';
$jNewClient = json_decode($sNewClient);
$jNewClient->id = uniqid();
$jNewClient->name = "AAA";
$jNewClient->lastName = "BBB";
// put the new client inside the array of clients
// all this is in RAM
array_push($jData->clients, $jNewClient);
// Did I save the JSON object back to the file? NO
$sFinalData = json_encode($jData);
// save it
file_put_contents('database.txt', $sFinalData);
echo json_encode($jNewClient); // object to text