 <?php
 
 include 'home.php';

 if ($guestBookEntries === "") {
    return 0;
  }


  $max = 0;

  foreach ($guestBookEntries as $key => $value){
      if ($key > $max){

          $max = $key;
      }
  }

    return $max;
