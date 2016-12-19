
<?php
$database = 'database.txt';

// prüft ob file vorhanden wenn nicht wird erstellt.
if (!file_exists($database))
{
    fopen('database.txt', 'x');
}


$guestbookEntries = file_get_contents($database);

$arrayEntries = explode("\r\n", $guestbookEntries);
$arrayEntries[0] . "<br />".  $arrayEntries[1] . "<br />".  $arrayEntries[2] . "<  />";


$pos = strpos($guestbookEntries, ";");
echo $pos;
for ($i=0; $i < $pos ; $i++) {
}



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

      if (count($errors) === 0) {

      $email = "<a href='mailto:$email'>$email</a>";
      $newEntry = ";<h4> Dieser Beitrag wurde erstellt von " .'"' .$name .'"' .'(' .$email .')' ." am " .$date ."</h4>" .$message ."<br>" . "\r\n";


        $guestbookEntries = $newEntry . $guestbookEntries;
        //daten($guestbookEntries) in Datenbank speichern
        $handle = fopen ('database.txt', 'w');    //'w' steht für write
        //fwrite fügt dem file etwas hinzu.
        fwrite ($handle, $guestbookEntries);
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


  else
    {
      $errors = '';
      //ist schon ein Eintrag vorhanden?
      if($guestbookEntries === '' )
       {
          $guestbookEntries = "Verfassen Sie den ersten Eintrag.";
       }
    }
