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
            $w = $_GET['data'];
            echo $w;
            echo 'a';

            for($i = 0; $i < strlen($w); $i++) {
            echo '-';

                if($source[$i] != $w[$i]) {
                    echo $source[$i].' <> '.$w[$i].' ERROR<br>';
                }
                else {
                    echo $source[$i].' <> '.$w[$i].' GOOD<br>';
                }
            }
            echo 'c';

/*
            $insert_customer = "INSERT INTO errors (id, index, char) VALUES ('$id', '$index', '$char')";
            $run_customer = mysqli_query($db,$insert_customer);
            $_SESSION['account_id'] = mysqli_insert_id($db);
*/
        ?>
    </body>
</html>