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
                    echo '1';
                    $exercise_length = $exercise_arr['length'];
                    $exercise_timestamp = $exercise_arr['timestamp'];
                    $paragraph_id = $exercise_arr['paragraph_id'];
                    echo '2';

                    $paragraph_sql = "SELECT * FROM paragraphs WHERE id='$paragraph_id'";
                    echo '3';

                    $paragraph_qry = mysqli_query($db,$paragraph_sql);
                    $paragraph_row = mysqli_fetch_array($paragraph_qry);
                    echo '4';

                    $paragraph_title = $paragraph_row['title'];
                    $paragraph_text = $paragraph_row['text'];
                    echo '5';

                    $paragraph_length = strlen($paragraph_text);
                    $arr = array();
                    echo '6';

                    array_push($arr, $exercise_timestamp);
                    array_push($arr, $paragraph_id);
                    array_push($arr, $paragraph_title);
                    array_push($arr, substr($paragraph_length, 0, 20)+'..');
                    array_push($arr, $exercise_length / $paragraph_length);
                    echo '7';

                    echo join('&nbsp&nbsp&nbsp&nbsp&nbsp', $arr);


                }
?>
                
    </body>
</html>