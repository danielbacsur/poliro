<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <title>Hxdro</title>
    </head>
    <body>
        <?php
            $source = 'kavarom a kávém, orvos javasol, vakarom a karom, a sav mar';
            $w = $_GET['data'];

            for($i = 0; $i < $w.count(); $i++) {
                if($source[$i] != $w[$i]) {
                    echo 'error'.$w[$i].'<br>';
                }
                else {
                    echo 'good'.$source[$i].'<br>';
                }
            }
/*
            $insert_customer = "INSERT INTO errors (id, index, char) VALUES ('$id', '$index', '$char')";
            $run_customer = mysqli_query($db,$insert_customer);
            $_SESSION['account_id'] = mysqli_insert_id($db);
*/
        ?>
    </body>
</html>