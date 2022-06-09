<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Kitűzött feladatok</h1>

        <?php

        $get_email = "SELECT * FROM paragraph_titles ORDER BY id";
        $run_email = mysqli_query($db,$get_email);
        $title_arr = array();
        while( $exercise_arr = mysqli_fetch_array($run_email) ) {
            $paragraph_order = $exercise_arr['id'];
            array_push($title_arr, $paragraph_order);
        }
        $title_arr = join(', ', $title_arr);

        $get_email = "SELECT * FROM paragraph_subtitles ORDER BY id";
        $run_email = mysqli_query($db,$get_email);
        $subtitle_arr = array();
        while( $exercise_arr = mysqli_fetch_array($run_email) ) {
            $paragraph_order = $exercise_arr['id'];
            array_push($subtitle_arr, $paragraph_order);
        }
        $subtitle_arr = join(', ', $subtitle_arr);

        $get_email = "SELECT * FROM paragraphs ORDER BY FIELD(title_id, $title_arr), FIELD(subtitle_id, $subtitle_arr)";
        $run_email = mysqli_query($db,$get_email);
        while ($row = mysqli_fetch_array($run_email)) {
            $paragraph_id = $row['id'];
            $paragraph_uuid = $row["uuid"];
            $paragraph_title = $row["title"];
            $paragraph_subtitle = $row["subtitle"];
            $paragraph_attempts = $row["attempts"];
            if($paragraph_attempts) {
                $exercise_sql = "SELECT * FROM exercises WHERE paragraph_id='$paragraph_id'";
                $exercise_qry = mysqli_query($db,$exercise_sql);
                $exercise_num = mysqli_num_rows($exercise_qry);
            }



            $arr = array();
            array_push($arr, $paragraph_id);
            if($paragraph_attempts)
                array_push($arr, strval($exercise_num).'/'.strval($paragraph_attempts));
            else
                array_push($arr, '-/-');
            array_push($arr, $paragraph_title);
            array_push($arr, $paragraph_subtitle);
            array_push($arr, '<a href="exercise.php?paragraph_uuid='.strval($paragraph_uuid).'">Megtekintés</a>');
            $text = join('&nbsp&nbsp&nbsp&nbsp&nbsp', $arr).'<br>';
            if($paragraph_attempts-$exercise_num==0)
                $text = '<span style="text-decoration:line-through">'.$text.'</span>';
            echo $text;
        }
        ?>
    </body>
</html>