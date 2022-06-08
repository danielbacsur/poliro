<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <?php
        echo 'redirecting..';
        $account_id = $_SESSION['account_id'];
        $data = $_GET["d"];
        $paragraph_id = $_GET["p"];
        $control_id = $_GET["c"];
        $length = $_GET["l"];
        $insert_customer = "INSERT INTO exercises (`account_id`, `paragraph_id`, `length`, 'control_id') VALUES ('$account_id', '$paragraph_id', '$length', '$control_id')";
        echo $insert_customer;
        $run_customer = mysqli_query($db,$insert_customer);
        $exercise_id = mysqli_insert_id($db);
        
        for($i = 0; $i < count($data); $i++) {
            $sum = '';
            for($n = $i; $n < count($data); $n++) {
                $arrn = $data[$n];
                if($arrn == '')
                    break;
                else {
                    $sum .= $arrn;
                    $i++;
                }
                
            }
            if(!$sum) continue;
            $insert_customer = "INSERT INTO errors (`exercise_id`, `position`, `text`) VALUES ('$exercise_id', '$i', '$sum')";
            echo $insert_customer;
            $run_customer = mysqli_query($db,$insert_customer);
        }

        header("Location: end.php?exercise_id=".strval($exercise_id));
        die();
        ?>
    </body>
</html>