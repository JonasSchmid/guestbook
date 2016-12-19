<?php
session_start();

if (isset($_SESSION["login"]))
{

    if ($_SESSION["login"] == 1)
    {
      echo '<button type="button" name="delete">Delete all</button>';
    }

}
