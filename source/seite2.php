<?php
session_start();

if (!isset($_SESSION['username'])) {
  die("Bitte erst einloggen");
}

$user = $_SESSION['username'];

echo "Du heisst immer noch: $user
      <a href=\"logout.php\">Logout</a>";
