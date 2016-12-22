<?php
            echo "<h2>Assoz. Array</h2>";


             // $arr = array('heute' => 'programmieren', 'morgen'=>'schwimmen', 'übermorgen'=>'laufen', '1' => 'GB Eintrag');

             $arr[7] = 'GB Eintrag 1';
             $arr[2] = 'GB Eintrag 2';
             $arr[3] = 'GB Eintrag 3';
             $arr[10] = 'GB Eintrag 4';

             foreach ($arr as $key => $value)
             {
                 echo "Key: " . $key . " | Value: " . $value . "<br />";
             }

             $neueID = getMaxIDFromArray($arr) + 1;
             echo $neueID;

             function getMaxIDFromArray($a)
             {
                $max = 0;
                foreach ($a as $key => $value)
                {
                    if ($key > $max)
                    {

                        $max = $key;
                    }
                }

                return $max;
             }

        ?>
