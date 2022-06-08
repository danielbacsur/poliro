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
        $length = $_GET["l"];
        echo 'egz';
        $insert_customer = "INSERT INTO exercises (`account_id`, `paragraph_id`, `length`) VALUES ('$account_id', '$paragraph_id', '$length')";
        echo $insert_customer;
        $run_customer = mysqli_query($db,$insert_customer);
        echo 'ketto';
        $exercise_id = mysqli_insert_id($db);
/*
        for($i = 0; $i < count($data); $i++) { // modif to smaller length
            $d = $data[$i];
            if(!$d) continue;
            $insert_customer = "INSERT INTO errors (`exercise_id`, `position`, `text`) VALUES ('$exercise_id', '$i', '$d')";
            $run_customer = mysqli_query($db,$insert_customer);
        }
*/
echo 'alma';
        for($i = 0; $i < count($arr); $i++) {
            $arri = $arr[$i];
            $sum = '';
            echo '   ';
            for($n = $i; $n < count($arr); $n++) {
                $arrn = $arr[$n];
                if($arrn == '') {
                    break;
                }
                else {
                    $sum .= $arrn;
                    $i++;
                }
                
            }
            $insert_customer = "INSERT INTO errors (`exercise_id`, `position`, `text`) VALUES ('$exercise_id', '$i', '$sum')";
            echo $insert_customer;
            //$run_customer = mysqli_query($db,$insert_customer);
        }

        header("Location: index.php");
        die();
        ?>
    </body>
</html>