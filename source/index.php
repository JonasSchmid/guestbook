<?php
  //error_reporting(0);
  include "shared/dbAccess.php";

  // Falls die `url` keine erlaubte ist,
  // die 404-Fehler-Seite anzeigen
  $view = $_GET['action'] ?? 'home';

  // Controller für die aktuelle View einbinden,
  // falls einer existiert.
  $controllerPath = __DIR__ . "/controller/${view}.php";
  if (file_exists($controllerPath)) {
      include $controllerPath;
  }

  // view anzeigen
  if ($view === 'add') {
    include "views/home.php";
  }
  else {
    include "views/${view}.php";
  }
