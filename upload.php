<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <?php
        echo 'redirecting..';
        $account_id = $_SESSION['account_id'];
        $data = $_GET["d"];
        for($i = 0; $i < count($data); $i++) {
            $data[$i] = urldecode($data[$i]);
        }
        $length = $_GET["l"];
        $paragraph_uuid = $_GET["p"];
        $get_email = "SELECT * FROM paragraphs WHERE uuid='$paragraph_uuid'";
                $run_email = mysqli_query($db,$get_email);
                $row = mysqli_fetch_array($run_email);
                $paragraph_id = $row["id"];
        echo 'alma';
        $insert_customer = "INSERT INTO exercises (`uuid`, `account_id`, `paragraph_id`, `length`) VALUES (UUID(), '$account_id', '$paragraph_id', '$length')";
        $run_customer = mysqli_query($db,$insert_customer);
        $exercise_id = mysqli_insert_id($db);
        $get_email = "SELECT * FROM exercises WHERE id='$exercise_id'";
        $run_email = mysqli_query($db,$get_email);
        $row = mysqli_fetch_array($run_email);
        $exercise_uuid = $row["uuid"];
        echo $exercise_uuid;
        if(isset($data)) {
            for($i = 0; $i < count($data); $i++) {
                $sum = '';
                $origi = $i;
                for($n = $i; $n < count($data); $n++) {
                    $arrn = $data[$n];
                    if($arrn == '')
                        break;
                    else {
                        echo 'as';
                        $sum .= utf8_encode( $arrn);
                        $i++;
                    }
                    
                }
                if(!$sum) continue;
                $insert_customer = "INSERT INTO errors (`exercise_id`, `position`, `text`) VALUES ('$exercise_id', '$origi', '$sum')";
                $run_customer = mysqli_query($db,$insert_customer);
            }
        }
        echo 'befheader';

        header("Location: end.php?exercise_uuid=".strval($exercise_uuid));
        die();
        ?>
    </body>
</html>