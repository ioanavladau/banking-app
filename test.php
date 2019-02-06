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