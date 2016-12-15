<?php

$database = 'database.txt';

// prüft ob file vorhanden wenn nicht wird erstellt.
if (!file_exists($database))
{
    fopen('database.txt', 'x');
}


$guestbookEntries = file_get_contents($database);
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
      $name = '"' .$name .'"';
      // prüfen ob <> eingegeben wurden
      $name = htmlentities ($name);
      $message = strip_tags ($_POST['note']) ?? '';
      $message = htmlentities ($message);
      $newEntry = "<h3>Dieser Beitrag wurde erstellt von " .$name ." am " .$date ."</h3>" .$message ."<br>";

      if ($name === '') {
        $errors[] = 'Bitte geben sie einen Namen ein.';
      }
      if ($message === '') {
        $errors[] = 'Bitte geben sie eine Nachricht ein';
      }

      $guestbookEntries = $newEntry. $guestbookEntries;

      if (count($errors) === 0) {
        //daten($guestbookEntries) in Datenbank speichern
        $handle = fopen ('database.txt', 'w');    //'w' steht für write
        //fwrite fügt dem file etwas hinzu.
        fwrite ($handle, $guestbookEntries);
        fclose ($handle);

        header ("Location: index.php");

      }

      if (count($errors > 0)) {
        echo ("<br>");
        foreach ($errors as $value)
        echo ("<ul><li>$value</li></ul>");
      }

      // index.php wird aufgerufen dann nicht mehr POST
      //header ("Location: index.php");
  }


  else
    {
      $errors = '';
      //ist schon ein Eintrag vorhanden?
      if($guestbookEntries === '' )
       {
          $guestbookEntries = "Verfassen Sie den ersten Eintrag.";
       }
    }
