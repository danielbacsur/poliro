<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Hxdro Cloud</h1>

        <?php
        $account_id = $_SESSION['account_id'];
        $assignment_sql = "SELECT * FROM assignments WHERE account_id='$account_id'";
        echo $assignment_sql;
        $assignment_qry = mysqli_query($db,$assignment_sql);
        while ($assignment_arr = mysqli_fetch_array($assignment_qry)) {
            $assignment_id = $assignment_arr['id'];
            $paragraph_id = $assignment_arr['paragraph_id'];
            $control_id = $assignment_arr['control_id'];

            $paragraph_sql = "SELECT * FROM paragraphs WHERE id='$paragraph_id'";
            echo $paragraph_sql;
            $paragraph_qry = mysqli_query($db,$paragraph_sql);
            $paragraph_row = mysqli_fetch_array($paragraph_qry);
            $paragraph_title = $paragraph_row['title'];
            
            $control_sql = "SELECT * FROM controls WHERE id='$control_id'";
            echo $control_sql;
            $control_qry = mysqli_query($db,$control_sql);
            $control_row = mysqli_fetch_array($control_qry);
            $control_title = $control_row['name'];

            $arr = array();
            array_push($arr, $assignment_id);
            array_push($arr, $paragraph_title);
            array_push($arr, $control_title);
            array_push($arr, '<a href="exercise.php?
                paragraph_id='.strval($paragraph_id).'&
                control_id='.strval($control_id).'">Megnyitás</a>');
            echo join('&nbsp&nbsp&nbsp&nbsp&nbsp', $arr).'<br>';

        }
        ?>
                
    </body>
</html>