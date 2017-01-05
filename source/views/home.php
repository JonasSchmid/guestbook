<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Ultra Guestbook</title>
      <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <h1>Ultra Guestbook</h1>
    </header>

    <form method="post" action="index.php?action=add">


      <?php $database = 'database.txt';
            if (!file_exists($database))
            {
                fopen('database.txt', 'x');
            }
            /* var_dump($_POST) */ session_start();?>

      <h3>Name :
        <input type="text" id="name" name="name" value="">
      </h3>
      <h3>E-Mail :
        <input type="email" id="email" name="email" value="">
      </h3>


      <textarea name="note" id="note" rows="8" cols="40"></textarea>

      <p class="action">
        <input type="submit" value="Eintrag abschicken">
      </p>
    </form>

  <?php

    if ($guestBookEntries === "") {
        echo 'Verfassen Sie den ersten Beitrag.';
    }
    else {
        foreach ($guestBookEntries as $key => $value) {
            echo $value;

            if($_SESSION["login"] === 1) {
    ?>
              <form action="delete.php" method="post" />
              <input type="submit" name="btn" value="delete" />
              <input type="hidden" name="ID" value="<?php echo $key ?>" />
              </form>
    <?php
            }
        }
      }
      ?>
  </body>
</html>
