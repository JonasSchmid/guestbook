<?php
session_start();

$_logindaten = ARRAY("name"=>"admin", "passwort"=>"12345");


    if (isset($_POST["user"]) && isset($_POST["password"]))
    $_SESSION["login"] = 0;
    {
      if($_logindaten["name"] == $_POST["user"] &&
         $_logindaten["passwort"] == $_POST["password"])
         {
           echo "<p class='login'>du bist nun angemeldet</p>";
           $_SESSION["login"] = 1;
         }
    }

    if ($_SESSION["login"] != 1)
    {
      echo "anmeldung fehlgeschlagen";
    }

    header("Location: index.php");

/*$user = strip_tags($_POST['user']);
$password = strip_tags($_POST['password']);

echo $user, $password;  */
