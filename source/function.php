
<?php
session_start();

$database = 'database.txt';

// prüft ob file vorhanden wenn nicht wird erstellt.
if (!file_exists($database))
{
    fopen('database.txt', 'x');
}

$guestBookEntries = getEntriesFromDatabase($database);

/*
foreach ($guestBookEntries as $key => $value) {
  echo "Key: " . $key . " | Value: " . $value . "<br />";
}
*/
// das Array $arrayEntries hat nun soviele Elemente, wie die Datenbank Zeilen hat, d.h. pro Element eine Zeile = ein GB-Eintrag

// die Struktur eines GB-Eintrags ist wie folgt:
// ID|¦|Inhalt
// das heisst, wir brauchen nochmals ein Array, siehe Excel!








#$pos = strpos($guestbookEntries, "¦");
#echo $pos;
#$file = implode("$@", file('database.txt'));
#$bereich = explode("$@", $file);
#$zahl = 0;
#$lB = $bereich ["$zahl"]; //Gibt den 2ten Bereich aus

$errors = [];

//bestimmt das datum
$timestamp = time();
$datum = date("d.m.Y",$timestamp);
$uhrzeit = date("H:i",$timestamp);
$date = $datum ." - " .$uhrzeit ." Uhr";

 if($_SERVER['REQUEST_METHOD'] === 'POST')
  {
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

      $abc = $_SESSION["gaga"];

      if (count($errors) === 0) {

      $nB = $lB + 1;
      $email = "<a href='mailto:$email'>$email</a>";
      $newEntry = $nB ."<h4> Dieser Beitrag wurde erstellt von " .'"' .$name .'"' .'(' .$email .')' ." am " .$date ."</h4>" .$message ."<br>" . "\r\n";

      // todo: neue ID bestimmen
      $newID = $max;

      $guestBookEntries[$newID] = $newEntry;
      //daten($guestbookEntries) in Datenbank speichern

      $handle = fopen ('database.txt', 'w');    //'w' steht für write

      //fwrite fügt dem file etwas hinzu.
      $dbContent = "";

      foreach ($guestBookEntries as $key => $value) {
        $dbContent .= $key . "|||" . $value;
      }

      fwrite ($handle, $dbContent);
      fclose ($handle);
    }

      if (count($errors > 0)) {
        echo ("<br>");
        echo ("<ul class = 'error'>");
        foreach ($errors as $value) {
        echo ("<li>$value</li>");}
        echo ("</ul>");
      }

      // index.php wird aufgerufen dann nicht mehr POST
      //header ("Location: index.php");
  }
#--------->getMaxIDFromArray($assArray);

  else
    {
      $errors = '';
      //ist schon ein Eintrag vorhanden?
      if($guestBookEntries === null )
       {
          $guestBookEntries = "Verfassen Sie den ersten Eintrag.";
       }
    }


function getMaxIDFromArray(){

  $max = 0;

  foreach ($a as $key => $value){
      if ($key > $max){

          $max = $key;
      }
  }

    return $max;
}


function getEntriesFromDatabase($database) {
    $dbContent = file_get_contents($database);
    $arrayEntries = explode("\r\n", $dbContent);
    $anzahl = count($arrayEntries);

    for ($i=0; $i < $anzahl ; $i++) {
      if ($arrayEntries[$i] != "") {
        $b = explode("|||", $arrayEntries[$i]);
        $assArray[$b[0]] = $b[1];
      }

      return $assArray;
  }



}
