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
        $account_id = $_SESSION['account_id'];
        $data = $_GET["d"];
        $paragraph_id = $_GET["p"];
        $length = $_GET["length"];
        $insert_customer = "INSERT INTO exercises (`account_id`, `paragraph_id`, `length`) VALUES ('$account_id', '$paragraph_id', '$length')";
        echo $insert_customer;
        #$run_customer = mysqli_query($db,$insert_customer);
        echo 'donewithone';
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