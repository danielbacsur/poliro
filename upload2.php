<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hxdro</title>
    </head>
    <body>
        <?php
        echo 'redirecting..';
        $data = $_GET["d"];
        for($i = 0; $i < count($data); $i++) { // modif to smaller length
            $d = $data[$i];
            if(!$d) continue;
            $insert_customer = "INSERT INTO errors (`exercise_id`, `index`, `char`) VALUES ('1', '$i', '$d')";
            $run_customer = mysqli_query($db,$insert_customer);
            header("Location: index.php");
            die();
        }
        ?>
    </body>
</html>