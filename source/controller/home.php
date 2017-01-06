<?php

$database = 'database.txt';
      if (!file_exists($database))
      {
          fopen('database.txt', 'x');
      }


$guestBookEntries = getEntriesFromDatabase('./database.txt');
