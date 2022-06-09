<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Elemzés</h1>

        <?php
                $account_id = $_SESSION['account_id'];

                $exercise_uuid = $_GET['exercise_uuid'];
                $exercise_sql = "SELECT * FROM exercises WHERE account_id='$account_id' AND uuid='$exercise_uuid'";
                $exercise_qry = mysqli_query($db,$exercise_sql);
                $exercise_arr = mysqli_fetch_array($exercise_qry);
                $exercise_id = $exercise_arr['id'];
                $exercise_length = $exercise_arr['length'];
                $exercise_timestamp = $exercise_arr['timestamp'];
                
                $paragraph_id = $exercise_arr['paragraph_id'];
                $paragraph_sql = "SELECT * FROM paragraphs WHERE id='$paragraph_id'";
                $paragraph_qry = mysqli_query($db,$paragraph_sql);
                $paragraph_row = mysqli_fetch_array($paragraph_qry);
                $paragraph_title = $paragraph_row['title'];
                $paragraph_text = $paragraph_row['text'];
                $paragraph_grading = $paragraph_row['grading'];
                $paragraph_length = strlen($paragraph_text);

                $correction_text = substr($paragraph_text, 0, $exercise_length);

                $get_email = "SELECT * FROM errors WHERE exercise_id='$exercise_id' ORDER BY 'position' DESC";
                $run_email = mysqli_query($db,$get_email);
                $pointer = 0;
                while ($row = mysqli_fetch_array($run_email))  
                {
                    $error_position = $row["position"];
                    $error_text = $row["text"];
                    $error_length = strlen($error_text);
                    $corr = '<span style="text-decoration:underline; color:red">'.$error_text.'</span>';

                    $correction_text = substr($correction_text, 0, $error_position+$pointer).$corr.substr($correction_text, $error_position+$pointer+$error_length);
                    $pointer += strlen($corr)-$error_length;
                }
                if (-($paragraph_length + $pointer-strlen($correction_text))) {
                    $correction_text .= '<span style="text-decoration:line-through; color: rgba(127, 0, 0, 0.5)">'.substr($paragraph_text, -($paragraph_length + $pointer-strlen($correction_text))).'</span>';
                }
                $writed_length = strval($exercise_length / $paragraph_length * 100).'%';
                $error_sql = "SELECT * FROM errors WHERE exercise_id='$exercise_id'";
            $error_qry = mysqli_query($db,$error_sql);
            $error_length = 0;
            while ($error_arr = mysqli_fetch_array($error_qry)) {
                $error_text = $error_arr['text'];
                $error_length += strlen($error_text);
            }

            $error_percent = 100 - ($error_length / $exercise_length * 100);

            $grade_arr = unpack("c*", $paragraph_grading);

            array_unshift($grade_arr, 0);
            array_push($grade_arr, 101);
            $grade = 0;
            for($i = 0; $i < 5; $i++) {
                if ($error_percent >= $grade_arr[$i] && $error_percent < $grade_arr[$i+1])
                $grade = $i+1;
            }
        ?>
        <table style="width:100%">
            <tr>
                <td>IDŐPONT:</td>
                <td><?php echo $exercise_timestamp; ?></td>
            </tr>
            <tr>
                <td>PARAGRAFUS CIME:</td>
                <td><?php echo $paragraph_title; ?></td>
            </tr>
            <tr>
                <td>JAVITOTT PARAGRAFUS:</td>
                <td><?php echo $text; ?></td>
            </tr>
            <tr>
                <td>MEGIRT HOSSZ:</td>
                <td><?php echo $writed_length; ?></td>
            </tr>
            <tr>
                <td>HELYESSÉG:</td>
                <td><?php echo $error_percent; ?></td>
            </tr>
            <tr>
                <td>ÉRDEMJEGY:</td>
                <td><?php echo $grade; ?></td>
            </tr>
        </table>
    </body>
</html>