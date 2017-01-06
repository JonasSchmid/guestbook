<?php
//echo '<h1>Controller: add</h1>';

include 'errors.php';

// erstellt das datum
	$timestamp = time();
		$datum = date("d.m.Y",$timestamp);
		$uhrzeit = date("H:i",$timestamp);
		$date = $datum ." - " .$uhrzeit ." Uhr";


    if (count($errors) === 0) {

		$email = "<a href='mailto:$email'>$email</a>";

        $newEntry = "<h4> Dieser Beitrag wurde erstellt von " .'"' .$name .'"' .'(' .$email .')' ." am " . $date ."</h4>" .$message ."<br>";

		include 'MaxID.php';
       #$newEntry
        // todo: neue ID bestimmen
        $maxID = $max;
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

  $guestBookEntries = getEntriesFromDatabase('./database.txt');
