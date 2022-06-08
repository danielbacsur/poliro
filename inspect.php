<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Hxdro Cloud</h1>

        <?php
                $account_id = $_SESSION['account_id'];
                $exercise_id = $_GET['exercise_id'];
                $get_email = "SELECT * FROM exercises WHERE account_id='$account_id' AND id='$exercise_id'";
                $run_email = mysqli_query($db,$get_email);
                $exercise_arr = mysqli_fetch_array($run_email);
                $pid = $exercise_arr["paragraph_id"];
                $exercise_length = $exercise_arr['length'];
                $exercise_timestamp = $exercise_arr['timestamp'];
                $paragraph_id = $exercise_arr['paragraph_id'];

                $paragraph_sql = "SELECT * FROM paragraphs WHERE id='$paragraph_id'";
                $paragraph_qry = mysqli_query($db,$paragraph_sql);
                $paragraph_row = mysqli_fetch_array($paragraph_qry);
                $paragraph_title = $paragraph_row['title'];
                $paragraph_text = $paragraph_row['text'];
                $paragraph_length = strlen($paragraph_text);

                $text = substr($paragraph_text, 0, $exercise_length);

                $get_email = "SELECT * FROM errors WHERE exercise_id='$exercise_id' ORDER BY 'position' DESC";
                $run_email = mysqli_query($db,$get_email);
                while ($row = mysqli_fetch_array($run_email))  
                {
                    $error_index = $row["position"];
                    $error_char = $row["text"];
                    $err_len = strlen($error_char);
                    $corr = '<span style="text-decoration:underline; color:red">'.$error_char.'</span>';

                    $text = substr($text, 0, $error_index+$loca-$err_len).$corr.substr($text, -($tlen - $error_index-1 )+$loca-1);
                    $loca += strlen($corr)-$err_len;
                }
                echo $text;

                $error_sql = "SELECT * FROM errors WHERE exercise_id='$exercise_id'";
            $error_qry = mysqli_query($db,$error_sql);
            $error_length = 0;
            while ($error_arr = mysqli_fetch_array($error_qry)) {
                $error_text = $error_arr['text'];
                $error_length += strlen($error_text);
            }
            $error_percent = 100 - ($error_length / $exercise_length * 100);

            $grade_sql = "SELECT * FROM grades";
            $grade_qry = mysqli_query($db,$grade_sql);
            $grade_row = mysqli_fetch_array($grade_qry);
            $grade_limits = $grade_row['limits'];
            $grade_arr = unpack("c*", $grade_limits);

            array_unshift($grade_arr, 0);
            array_push($grade_arr, 101);
            $grade = 0;
            for($i = 0; $i < 5; $i++) {
                if ($error_percent >= $grade_arr[$i] && $error_percent < $grade_arr[$i+1])
                $grade = $i+1;
            }

            $arr = array();
            array_push($arr, ':'.$exercise_timestamp);
            array_push($arr, $exercise_id);
            array_push($arr, $paragraph_title);
            array_push($arr, substr($paragraph_text, 0, 20).'..');
            array_push($arr, strval($exercise_length / $paragraph_length * 100).'%');
            array_push($arr, strval($error_percent).'%');
            array_push($arr, $grade);
            array_push($arr, '<a href="inspect.php?exercise_id='.strval($exercise_id).'">Megtekintés</a>');
            echo join('<br>', $arr);

?>
    <b>TIMESTAMP:</b> <?php echo $exercise_timestamp; ?> <br/>
    </body>
</html>