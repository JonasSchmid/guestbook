<?php

//echo "Ihr Eintrag wurde erfolgreich gelöscht";
include ("function.php");

getEntriesFromDatabase('database.txt');

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo 'zu löschende ID ist: ' . $_POST['ID'];

      foreach ($guestBookEntries as $key => $value) {
          if ($key === $_POST['ID']) {
              unset($guestBookEntries[$key]);
          }

      }
  }
