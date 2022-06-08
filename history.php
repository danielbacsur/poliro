<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <title>Hxdro</title>
    </head>
    <body>
        <h1>Hxdro Cloud</h1>

        <?php
                $account_id = $_SESSION['account_id'];
                $exercise_sql = "SELECT * FROM exercises WHERE account_id='$account_id'";
                $exercise_qry = mysqli_query($db,$exercise_sql);
                while ($exercise_arr = mysqli_fetch_array($exercise_qry)) {
                    $exercise_id = $exercise_arr['id'];
                    $exercise_length = $exercise_arr['length'];
                    $exercise_timestamp = $exercise_arr['timestamp'];
                    $paragraph_id = $exercise_arr['paragraph_id'];
                    $paragraph_sql = "SELECT * FROM paragraphs WHERE id='$paragraph_id'";
                    $paragraph_qry = mysqli_query($db,$paragraph_sql);
                    $paragraph_row = mysqli_fetch_array($paragraph_qry);
                    $paragraph_title = $paragraph_row['title'];
                    $paragraph_text = $paragraph_row['text'];
                    $paragraph_length = strlen($paragraph_text);
                    $error_sql = "SELECT * FROM errors WHERE exercise_id='$exercise_id'";
                    $error_qry = mysqli_query($db,$error_sql);
                    $error_num = mysqli_num_rows($error_qry);

                    $arr = array();
                    array_push($arr, $exercise_timestamp);
                    array_push($arr, $exercise_id);
                    array_push($arr, $paragraph_title);
                    array_push($arr, substr($paragraph_text, 0, 20).'..');
                    array_push($arr, strval($exercise_length / $paragraph_length * 100).'%');
                    array_push($arr, strval(100-($error_num / $exercise_length * 100)).'%');

                    array_push($arr, '<a href="inspect.php?exercise_id='.strval($exercise_id).'">Megtekintés</a>');
                    echo join('&nbsp&nbsp&nbsp&nbsp&nbsp', $arr).'<br>';
                }
?>
                
    </body>
</html>