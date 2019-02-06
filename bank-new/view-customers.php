<?php 

$sData = file_get_contents("database.txt");
$jData = json_decode($sData); // convert text into a JSON object

foreach($jData->clients as $jClient){
  echo "<p>id: $jClient->id</p>";
  echo "<p>name: $jClient->name</p>";
}
