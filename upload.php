<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hxdro</title>
    </head>
    <body>
        <?php
            $source = utf8_decode('kavarom a kávém, orvos javasol, vakarom a karom, a sav mar');
            $w = utf8_encode($_GET['data']);
            echo $w;
            echo 'a';

            for($i = 0; $i < strlen($w); $i++) {
            echo '-';

                if($source[$i] != $w[$i]) {
                    $ccc = $w[$i];
                    $insert_customer = "INSERT INTO errors (`exercise_id`, `index`, `char`) VALUES ('1', '$i', '$ccc')";
                    echo $insert_customer.'<br>';
                    $run_customer = mysqli_query($db,$insert_customer);
                }
                else {
                    echo $source[$i].' <> '.$w[$i].' GOOD<br>';
                }
            }
            echo 'c';


        ?>
    </body>
</html>