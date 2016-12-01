<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Gästebuch</title>
      <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <h1>Ultra Guestbook</h1>
    </header>

    <h3>Name :
      <input type="text" id="name" value="">
    </h3>

    <textarea name="name" rows="8" cols="40"></textarea>

    <button type="button">send</button>

    <?php
    $inhalt = file_get_contents('C:\xampp\htdocs\Projekte\guestbook\source\first.txt');
    echo $inhalt;
    ?>
  </body>
</html>
