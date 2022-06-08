<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Elemzés</h1>

        <?php
                $account_id = $_SESSION['account_id'];
                $exercise_uuid = $_GET['exercise_uuid'];
                $get_email = "SELECT * FROM exercises WHERE account_id='$account_id' AND uuid='$exercise_uuid'";
                $run_email = mysqli_query($db,$get_email);
                $exercise_arr = mysqli_fetch_array($run_email);
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
                $loca = 0;
                while ($row = mysqli_fetch_array($run_email))  
                {
                    $error_index = $row["position"];
                    $error_char = $row["text"];
                    $err_len = strlen($error_char);
                    $corr = '<span style="text-decoration:underline; color:red">'.$error_char.'</span>';

                    $text = substr($text, 0, $error_index+$loca-$err_len).$corr.substr($text, -($tlen - $error_index-1 )+$loca-1);
                    $loca += strlen($corr)-$err_len;
                }
                $text .= '<span style="text-decoration:line-through; color: rgba(127, 0, 0, 0.5)">'.substr($paragraph_text, -($paragraph_length + $loca-strlen($text))).'</span>';
                $writed_length = strval($exercise_length / $paragraph_length * 100).'%';
                $error_sql = "SELECT * FROM errors WHERE exercise_id='$exercise_id'";
            $error_qry = mysqli_query($db,$error_sql);
            $error_length = 0;
            while ($error_arr = mysqli_fetch_array($error_qry)) {
                $error_text = $error_arr['text'];
                $error_length += ceil(strlen($error_text) / 10);
            }

            $error_percent = 100 - ($error_length / $exercise_length * 100);

            /*$grade_sql = "SELECT * FROM controls WHERE id='$control_id'";
            $grade_qry = mysqli_query($db,$grade_sql);
            $grade_row = mysqli_fetch_array($grade_qry);
            $grade_limits = $grade_row['grading'];*/
            $grade_arr = unpack("c*", '2<HU');

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