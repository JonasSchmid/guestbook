<?php
session_start();

$_logindaten = ARRAY("name"=>"admin", "passwort"=>"12345");
# $_SESSION["login"] = 0;
if (isset($_POST["user"]) && isset($_POST["password"]))
{
  if($_logindaten["name"] == $_POST["user"] &&
     $_logindaten["passwort"] == $_POST["password"])
     {
       echo "du bist nun angemeldet";
       $_SESSION["login"] = 1;
     }
}

if ($_SESSION["login"] != 1)
{
  echo "anmeldung fehlgeschlagen";

  include("login.html");
  exit;
}
/*$user = strip_tags($_POST['user']);
$password = strip_tags($_POST['password']);

echo $user, $password;  */
