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
        $exercise_time = $exercise_arr['time'];
                
        $paragraph_id = $exercise_arr['paragraph_id'];
        $paragraph_sql = "SELECT * FROM paragraphs WHERE id='$paragraph_id'";
        $paragraph_qry = mysqli_query($db,$paragraph_sql);
        $paragraph_arr = mysqli_fetch_array($paragraph_qry);
        $paragraph_text = $paragraph_arr['text'];
        $paragraph_grading = $paragraph_arr['grading'];
        $paragraph_length = strlen($paragraph_text);

        $paragraph_title_id = $paragraph_arr['title_id'];
        $paragraph_title_sql = "SELECT * FROM paragraph_titles WHERE id='$paragraph_title_id'";
        $paragraph_title_qry = mysqli_query($db,$paragraph_title_sql);
        $paragraph_title_arr = mysqli_fetch_array($paragraph_title_qry);
        $paragraph_title = $paragraph_title_arr['name'];

        $paragraph_subtitle_id = $paragraph_arr['subtitle_id'];
        $paragraph_subtitle_sql = "SELECT * FROM paragraph_subtitles WHERE id='$paragraph_subtitle_id'";
        $paragraph_subtitle_qry = mysqli_query($db,$paragraph_subtitle_sql);
        $paragraph_subtitle_arr = mysqli_fetch_array($paragraph_subtitle_qry);
        $paragraph_subtitle = $paragraph_subtitle_arr['name'];

        $correction_text = substr($paragraph_text, 0, $exercise_length);
        $correction_pointer = 0;

        $error_sql = "SELECT * FROM errors WHERE exercise_id='$exercise_id' ORDER BY 'position' DESC";
        $error_qry = mysqli_query($db,$error_sql);
        $error_length = 0;

        while ($error_arr = mysqli_fetch_array($error_qry))  
        {
            $error_position = $error_arr["position"];
            $error_text = $error_arr["text"];
            $error_length += strlen($error_text);

            $error_length = strlen($error_text);
            $corr = '<span style="text-decoration:underline; color:red">'.$error_text.'</span>';

            $correction_text =
                substr($correction_text, 0, $error_position+$correction_pointer).
                $corr.
                substr($correction_text, $error_position+$correction_pointer+$error_length);
            $correction_pointer += strlen($corr)-$error_length;
        }
        if (-($paragraph_length + $correction_pointer-strlen($correction_text))) {
            $correction_text .=
                '<span style="text-decoration:line-through; color: rgba(127, 0, 0, 0.5)">'
                .substr($paragraph_text, -($paragraph_length + $correction_pointer-strlen($correction_text))).
                '</span>';
        }
        $writed_length = strval($exercise_length / $paragraph_length * 100).'%';
                

        $error_percent = 100 - ($error_length / $exercise_length * 100);

        $grading_arr = unpack("c*", $paragraph_grading);
        $grading_value = 0;
        array_unshift($grading_arr, 0);
        array_push($grading_arr, 101);

        for($i = 0; $i < 5; $i++) {
            if ($error_percent >= $grading_arr[$i] && $error_percent < $grading_arr[$i+1])
            $grading_value = $i+1;
        }
        ?>
        <table style="width:100%">
            <tr>
                <td>Keltezés:</td>
                <td><?php echo $exercise_time; ?></td>
            </tr>
            <tr>
                <td>Paragrafus neve:</td>
                <td><?php echo $paragraph_title; ?> - <?php echo $paragraph_subtitle; ?></td>
            </tr>
            <tr>
                <td>Javitott paragrafus:</td>
                <td><?php echo $correction_text; ?></td>
            </tr>
            <tr>
                <td>Megirt hossz:</td>
                <td><?php echo $exercise_length; ?> / <?php echo $paragraph_length; ?> = <?php echo $writed_length; ?></td>
            </tr>
            <tr>
                <td>HELYESSÉG:</td>
                <td><?php echo $error_length; ?> / <?php echo $exercise_length; ?> = <?php echo $error_percent; ?></td>
            </tr>
            <tr>
                <td>ÉRDEMJEGY:</td>
                <td><?php echo $grading_value; ?></td>
            </tr>
        </table>
    </body>
</html>