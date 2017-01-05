<?php

$database = 'database.txt';
      if (!file_exists($database))
      {
          fopen('database.txt', 'x');
      }
      session_start();


$guestBookEntries = getEntriesFromDatabase('./database.txt');
