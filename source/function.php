
<?php
session_start();

if (!isset($_SESSION["login"])) {
  $_SESSION["login"] = 0;
}

$database = 'database.txt';

// prüft ob file vorhanden wenn nicht wird erstellt.
if (!file_exists($database))
{
    fopen('database.txt', 'x');
}

$guestBookEntries = getEntriesFromDatabase($database);

// das Array $arrayEntries hat nun soviele Elemente, wie die Datenbank Zeilen hat, d.h. pro Element eine Zeile = ein GB-Eintrag

// die Struktur eines GB-Eintrags ist wie folgt:
// ID|¦|Inhalt
// das heisst, wir brauchen nochmals ein Array, siehe Excel!





$errors = [];


 if($_SERVER['REQUEST_METHOD'] === 'POST')
  {
      // index.php wird aufgerufen dann nicht mehr POST
      //header ("Location: index.php");
      saveNewEntry($guestBookEntries, $errors);
  }
  else
    {
      $errors = '';
      //ist schon ein Eintrag vorhanden?
      if($guestBookEntries === null )
       {
          $guestBookEntries = "Verfassen Sie den ersten Eintrag.";
       }
    }

# Funktionen
#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


function getMaxIDFromArray($guestBookEntries){

  if ($guestBookEntries === "") {
    return 0;
  }


  $max = 0;

  foreach ($guestBookEntries as $key => $value){
      if ($key > $max){

          $max = $key;
      }
  }

    return $max;
}


/*
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
*/


function makeErrors($errors) {

  if (count($errors > 0)) {
    echo ("<br>");
    echo ("<ul class = 'error'>");
    foreach ($errors as $value) {
    echo ("<li>$value</li>");}
    echo ("</ul>");
  }
  }

  function saveNewEntry($guestBookEntries, $errors) {

    $timestamp = time();
    $datum = date("d.m.Y",$timestamp);
    $uhrzeit = date("H:i",$timestamp);
    $date = $datum ." - " .$uhrzeit ." Uhr";

    // prüfen ob variable vorhanden sonst''
    $name = strip_tags ($_POST['name']) ?? '';
    // prüfen ob <> eingegeben wurden
    $name = htmlentities ($name);
    // löscht alle leerschläge
    $name = str_replace(" ", "", $name);

    $message = strip_tags ($_POST['note']) ?? '';
    $message = htmlentities ($message);

    $email = strip_tags ($_POST['email']) ?? '';
    $email = htmlentities ($email);


      if ($name === '') {
        $errors[] = 'Bitte geben sie einen Namen ein.';
      }
      if ($message === '') {
        $errors[] = 'Bitte geben sie eine Nachricht ein';
      }
      if ($email === '') {
        $errors[] = 'Bitte geben sie eine E-Mail ein';
      }

    makeErrors($errors);

    $email = "<a href='mailto:$email'>$email</a>";

    if (count($errors) === 0) {

        $newEntry = "<h4> Dieser Beitrag wurde erstellt von " .'"' .$name .'"' .'(' .$email .')' ." am " . $date ."</h4>" .$message ."<br>";

       #$newEntry
        // todo: neue ID bestimmen
        $maxID = getMaxIDFromArray($guestBookEntries);
        $newID = $maxID + 1;

        $guestBookEntries[$newID] = $newEntry;
        //daten($guestbookEntries) in Datenbank speichern

        $handle = fopen('database.txt', 'w');    //'w' steht für write

        //fwrite fügt dem file etwas hinzu.
        $dbContent = "";

        foreach ($guestBookEntries as $key => $value) {
          $dbContent .= $key . "|||" . $value . "\r\n";
        }

        fwrite ($handle, $dbContent);
        fclose ($handle);
  }


}
