<?php
//prüft ob file existiert sonst wird es erstellt.
$database = 'database.txt';
      if (!file_exists($database))
      {
          fopen('database.txt', 'x');
      }


$guestBookEntries = getEntriesFromDatabase('./database.txt');
