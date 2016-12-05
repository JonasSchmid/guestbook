<?php

$database = 'database.txt';

// prüft ob file vorhanden wenn nicht wird erstellt.
if (!file_exists($database))
{
    fopen('database.txt', 'x');
}


$guestbookEntries = file_get_contents($database);

 if($_SERVER['REQUEST_METHOD'] === 'POST')
  {

    // prüfen ob variable vorhanden sonst''
    $name = strip_tags ($_POST['name']) ?? '';
    $name = htmlentities ($name);
    $message = strip_tags ($_POST['note']) ?? '';
    $message = htmlentities ($message);
    $newEntry = "<h2>" .$name ."</h2>" .$message ."<br>";
    echo $newEntry;

    $guestbookEntries .= $newEntry;

    $handle = fopen ('database.txt', 'w');
    fwrite ($handle, $guestbookEntries);
    fclose($handle);

    // todo $guestbookEntries in die Datenbank speichern.


    header("Location: index.php");
  }
  else
    {
      //ist schon ein Eintrag vorhanden?
      if($guestbookEntries === '' )
       {
          $guestbookEntries = "Verfassen Sie den ersten Eintrag.";
       }
    }
