<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <?php
        echo 'redirecting..';
        $account_id = $_SESSION['account_id'];
        $data = $_GET["d"];
        $length = $_GET["l"];
        $paragraph_uuid = $_GET["p"];
        $get_email = "SELECT * FROM paragraphs WHERE uuid='$paragraph_uuid'";
                $run_email = mysqli_query($db,$get_email);
                $row = mysqli_fetch_array($run_email);
                $paragraph_id = $row["id"];
        $insert_customer = "INSERT INTO exercises (`uuid`, `account_id`, `paragraph_id`, `length`) VALUES (UUID(), '$account_id', '$paragraph_id', '$length')";
        echo $insert_customer;
        
        $run_customer = mysqli_query($db,$insert_customer);
        $exercise_id = mysqli_insert_id($db);
        $get_email = "SELECT * FROM exercises WHERE id='$exercise_id'";
        $run_email = mysqli_query($db,$get_email);
        $row = mysqli_fetch_array($run_email);
        $exercise_uuid = $row["uuid"];
        echo $exercise_uuid;
        if(isset($data)) {
            echo 'inside';
            for($i = 0; $i < count($data); $i++) {
                $data[$i] = urldecode($data[$i]);
            }
            echo 'adfter';
            for($i = 0; $i < count($data); $i++) {
                $sum = '';
                $origi = $i;
                for($n = $i; $n < count($data); $n++) {
                    $arrn = $data[$n];
                    if($arrn == '')
                        break;
                    else {
                        $sum .= str_replace( array( '\0', '\'', '\"', '\b', '\n', '\r', '\t', '\Z', '\\', '\%', '\_' ), ' ', $arrn);
                        echo $sum.'<br>';
                        $i++;
                    }
                    
                }
                if(!$sum) continue;
                $insert_customer = "INSERT INTO errors (`exercise_id`, `position`, `text`) VALUES ('$exercise_id', '$origi', '$sum')";
                echo $insert_customer.'<br>';
                $run_customer = mysqli_query($db,$insert_customer);
            }
        }
        echo 'befheader';

        header("Location: ../pages/end.php?exercise_uuid=".strval($exercise_uuid));
        die();
        ?>
    </body>
</html>