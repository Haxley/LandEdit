<?php

#Loads Land.yml into PHP Array
$file = '/Users/keithdavis/MineCraft/pocketmine-mp/plugins/EconomyLand/Land.yml';
$array = yaml_parse_file($file);

echo "Loaded into PHP: \n";
print_r($array);

echo "Would you like to
\n1: Delete all land claims by owner?
\n2: Delete all land claims except owner?\n";
$answer = readline("\nType 1 or 2: ");

#Answer 1
if ($answer == 1){
  $ownerName = readline("What is the owner's name?:  ");

  #Searches land array for owner
  if(array_search($ownerName, array_column($array, 'owner')) !== false ){
      echo "...Found $ownerName \n";

      #Removes owner from array
      $array = removeElementWithValue($array, 'owner', $ownerName);

      #Sends data back to Land.yml
      $landAfterDump = yaml_emit(array_values($array));
      file_put_contents($file, $landAfterDump);
      echo "YAML Data dumped back: \n";
      echo $landAfterDump;
      echo "...Successfully removed claims owned by $ownerName \n";

  }else{
      echo 'Did not find ' . $ownerName . "\n";
  }
#Answer 2
}elseif ($answer == 2){
  $ownerName = readline("What is the owner's name?:  ");

  #Searches land array for owner
  if(array_search($ownerName, array_column($array, 'owner')) !== false ){
      echo "...Found claims by $ownerName \n";

      #Removes from array except owner
      $array = removeElementWithValueExcept($array, 'owner', $ownerName);

      #Sends data back to Land.yml
      $landAfterDump = yaml_emit(array_values($array));
      file_put_contents($file, $landAfterDump);
      echo "YAML Data dumped back: \n";
      echo $landAfterDump;
      echo "...Successfully removed claims not owned by $ownerName \n";
  }
  else {
        echo 'Did not find ' . $ownerName . "\n";
  }
}else {
  echo "Input not recognized. Please run program again.\n";
}


#Remove from array
function removeElementWithValue($array, $key, $value){
     foreach($array as $subKey => $subArray){
          if($subArray[$key] == $value){
               unset($array[$subKey]);
          }
     }
     return $array;
}

#Remove from array except
function removeElementWithValueExcept($array, $key, $value){
     foreach($array as $subKey => $subArray){
          if($subArray[$key] !== $value){
               unset($array[$subKey]);
          }
     }
     return $array;
}
