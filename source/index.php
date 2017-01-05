<?php

  if($_SERVER['REQUEST_METHOD'] === 'POST')
  {
    // prüfen, welche Aktion verlangt wird -> neuer Eintrag? Löschen eines Eintrages? irgendwas sonst: was?
    $action = 'new';
    if ($action = 'new')
    {
        include ("addNew.php");
    }


  }

  include 'controller/guestbook.php';
  include 'views/guestbook.php';
