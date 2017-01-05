<?php 

$guestBookEntries = getEntriesFromDatabase('./database.txt');

function getEntriesFromDatabase($database) {
    $dbContent = file_get_contents($database);


    if ($dbContent === "") {
      return "";
    }

    $assArray = "";
    $arrayEntries = explode("\r\n", $dbContent);
    $anzahl = count($arrayEntries);

    for ($i=0; $i < $anzahl ; $i++) {
        if ($arrayEntries[$i] != "") {
          
            $b = explode("|||", $arrayEntries[$i]);
            $assArray[$b[0]] = $b[1];
        }
  }

    return $assArray;
}
