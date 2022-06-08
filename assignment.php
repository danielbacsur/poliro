<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Előzmények</h1>

        <?php
        $account_id = $_SESSION['account_id'];
        $exercise_sql = "SELECT * FROM assignments WHERE account_id='$account_id'";
        $exercise_qry = mysqli_query($db,$exercise_sql);
        while ($exercise_arr = mysqli_fetch_array($exercise_qry)) {
            $paragraph_id = $exercise_arr['paragraph_id'];
            $exercise_assigned = $exercise_arr['assigned'];
            $exercise_due = $exercise_arr['due'];
            $exercise_type = $exercise_arr['type'];
            
            $arr = array();
            array_push($arr, $paragraph_id);
            array_push($arr, $exercise_assigned);
            array_push($arr, $exercise_due);
            array_push($arr, $exercise_type);
            echo join('&nbsp&nbsp&nbsp&nbsp&nbsp', $arr).'<br>';
        }
        ?>
    </body>
</html>