<?php

#
#    S P Y C
#      a simple php yaml class
#
# license: [MIT License, http://www.opensource.org/licenses/mit-license.php]
#

include('/Users/keithdavis/MineCraft/pocketmine-mp/plugins/EconomyLand/Spyc.php');

#Loads Land.yml into PHP Array
$array = Spyc::YAMLLoad('/Users/keithdavis/MineCraft/pocketmine-mp/plugins/EconomyLand/Land.yml');

echo "Loaded into PHP: \n";
print_r($array);

$answerOne = readline("Would you like to
\n1: Delete all land claims by owner?
\n2: Delete all land claims except owner?
\nType 1 or 2:");

#Answer 1
if ($answerOne == 1){
  $ownerName = readline("What is the owner's name?:  ");

  #Searches land array for owner
  if(array_search($ownerName, array_column($array, 'owner')) !== false ){
      echo "...Found $ownerName \n";

      #Removes owner from array
      $array = removeElementWithValue($array, 'owner', $ownerName);
      echo "...Removed claims owned by $ownerName \n";

      #Sends data back to Land.yml
      $landAfterDump = Spyc::YAMLDump($array);
      echo "YAML Data dumped back: \n";
      echo $landAfterDump;

  }else{
      echo 'Did not find ' . $ownerName . "\n";
  }
#Answer 2
}else{
  $ownerName = readline("What is the owner's name?:  ");

  #Searches land array for owner
  if(array_search($ownerName, array_column($array, 'owner')) !== false ){
      echo "...Found claims by $ownerName \n";

      #Removes from array except owner
      $array = removeElementWithValueExcept($array, 'owner', $ownerName);
      echo "...Removed claims not owned by $ownerName \n";


      #Sends data back to Land.yml
      $landAfterDump = Spyc::YAMLDump($array);
      echo "YAML Data dumped back: \n";
      echo $landAfterDump;
  }
  else {
        echo 'Did not find ' . $ownerName . "\n";
  }
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
