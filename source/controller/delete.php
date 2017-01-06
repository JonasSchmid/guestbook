<?php

$guestBookEntries = getEntriesFromDatabase('./database.txt');


echo '<h1>Controller: delete</h1>';

  echo 'zu löschende ID ist: ' . $_POST['ID'];

      foreach ($guestBookEntries as $key => $value) {
          if ($key === $_POST['ID']) {
              unset($guestBookEntries[$key]);
          }

      }
