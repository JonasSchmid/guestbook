<?php
session_start();
$user = $_POST['user'];

if (!isset($user) OR empty($user)) {
  $user = "Gast";
}

$_SESSION['username'] = $user;

echo "Hallo $user <br />
<a href=\"seite2.php\">Seite 2</a><br />
<a href=\"logout.php\">Logout</a>";
/*$user = strip_tags($_POST['user']);
$password = strip_tags($_POST['password']);

echo $user, $password;  */
