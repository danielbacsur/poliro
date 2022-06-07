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
            echo $source.'<br>'.$w.'<br>'.$nobreak;

            for($i = 0; $i < strlen($w); $i++) { // modif to smaller ength
                if($source[$i] != $w[$i]) {
                    $ccc =  $w[$i] ;
                    echo $ccc.'<br>';
                    $insert_customer = "INSERT INTO errors (`exercise_id`, `index`, `char`) VALUES ('1', '$i', '$ccc')";
                    $run_customer = mysqli_query($db,$insert_customer);
                }
            }
        ?>
    </body>
</html>