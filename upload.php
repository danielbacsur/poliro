<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hxdro</title>
    </head>
    <body>
        <?php
            $source = 'kavarom a kávém, orvos javasol, vakarom a karom, a sav mar';
            $w =      $_GET["data"];
            $nobreak = str_replace(["\r", "\n"], "", $w);

            for($i = 0; $i < strlen($w); $i++)
            {
            echo ord($w[$i])." ";
            }
            echo '<br>';
            for($i = 0; $i < strlen($source); $i++)
            {
            echo ord($source[$i])." ";
            }
            echo '<br>';


            for($i = 0; $i < strlen($w); $i++) { // modif to smaller ength
                if($source[$i] != $w[$i]) {
                    $ccc =  urlencode($w[$i]) ;
                    $insert_customer = "INSERT INTO errors (`exercise_id`, `index`, `char`) VALUES ('1', '$i', '$ccc')";
                    echo $insert_customer.'<br>';
                    $run_customer = mysqli_query($db,$insert_customer);
                }
            }
        ?>
    </body>
</html>