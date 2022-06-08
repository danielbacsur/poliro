<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Kitűzött feladatok</h1>

        <?php
        $account_id = $_SESSION['account_id'];
        $exercise_sql = "SELECT * FROM assignments WHERE account_id='$account_id'";
        $exercise_qry = mysqli_query($db,$exercise_sql);
        while ($exercise_arr = mysqli_fetch_array($exercise_qry)) {
            $exercise_assigned = $exercise_arr['assigned'];
            $exercise_due = $exercise_arr['due'];
            $exercise_type = $exercise_arr['type'];
            
            $paragraph_id = $exercise_arr['paragraph_id'];
            $get_email = "SELECT * FROM paragraphs WHERE id='$paragraph_id'";
            $run_email = mysqli_query($db,$get_email);
            $row = mysqli_fetch_array($run_email);
            $paragraph_uuid = $row["uuid"];
            
            $arr = array();
            array_push($arr, $paragraph_id);
            array_push($arr, $exercise_assigned);
            array_push($arr, $exercise_due);
            array_push($arr, $exercise_type);
            array_push($arr, '<a href="exercise.php?paragraph_uuid='.strval($paragraph_uuid).'">Megtekintés</a>');
            echo join('&nbsp&nbsp&nbsp&nbsp&nbsp', $arr).'<br>';
        }
        ?>
    </body>
</html>