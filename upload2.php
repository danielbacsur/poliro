<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hxdro</title>
    </head>
    <body>
        <?php
            $data = $_GET["d"];
            for($i = 0; $i < count($data); $i++) { // modif to smaller length
                echo $data[$i].'<br>';
            }

            for($i = 0; $i < strlen($w); $i++) { // modif to smaller length

                if(strcmp($source[$i], $w[$i]) !== 0) {
                    echo 'ketsyer';
                    $ccc =  utf8_encode($w[$i]) ;

                    $insert_customer = "INSERT INTO errors (`exercise_id`, `index`, `char`) VALUES ('1', '$i', '$ccc')";
                    echo $insert_customer.'<br>';
                    #$run_customer = mysqli_query($db,$insert_customer);
                }
            }
        ?>
    </body>
</html>