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

    <form method="post" action="function.php">

      <?php /* var_dump($_POST) */ ?>

      <h3>Name :
        <input type="text" id="name" name="name" value="">
      </h3>

      <textarea name="note" id="note" rows="8" cols="40"></textarea>

      <p class="action">
        <input type="submit" value="Eintrag abschicken">
      </p>
    </form>
    <?php include ("function.php");
        echo $guestbookEntries;
    ?>
  </body>
</html>
