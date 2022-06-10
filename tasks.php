<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Kitűzött feladatok</h1>
        <tr>
                <th style="text-align: left">
                    Feladat Ideje
                </th>
                <th style="text-align: left">
                    Feladat Cime
                </th>
                <th style="text-align: left">
                    Feladat Megtekintése
                </th>
            </tr>

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

        $get_email = "SELECT *, CURRENT_TIMESTAMP() AS time_now FROM paragraphs ORDER BY FIELD(title_id, $title_arr), FIELD(subtitle_id, $subtitle_arr)";
        $run_email = mysqli_query($db,$get_email);
        while ($row = mysqli_fetch_array($run_email)) {
            echo '<tr>';
            $paragraph_id = $row['id'];
            $paragraph_uuid = $row["uuid"];
            $paragraph_title_id = $row["title_id"];
            $paragraph_subtitle_id = $row["subtitle_id"];
            $paragraph_attempts = $row["attempts"];
            $paragraph_start = $row["start"];
            $paragraph_deadline = $row["deadline"];
            $paragraph_time_now = $row["time_now"];

            $paragraph_title_sql = "SELECT * FROM paragraph_titles WHERE id='$paragraph_title_id'";
            $paragraph_title_qry = mysqli_query($db,$paragraph_title_sql);
            $paragraph_title_row = mysqli_fetch_array($paragraph_title_qry);
            $paragraph_title = $paragraph_title_row['name'];
            $paragraph_subtitle_sql = "SELECT * FROM paragraph_subtitles WHERE id='$paragraph_subtitle_id'";
            $paragraph_subtitle_qry = mysqli_query($db,$paragraph_subtitle_sql);
            $paragraph_subtitle_row = mysqli_fetch_array($paragraph_subtitle_qry);
            $paragraph_subtitle = $paragraph_subtitle_row['name'];

            if($paragraph_attempts) {
                $exercise_sql = "SELECT * FROM exercises WHERE paragraph_id='$paragraph_id'";
                $exercise_qry = mysqli_query($db,$exercise_sql);
                $exercise_num = mysqli_num_rows($exercise_qry);
            }

            echo '<td>'.$paragraph_id.'</td>';
            
            if ($paragraph_start != '2000-01-01 00:00:00') echo '<td>'.$paragraph_start.'</td>';
            if ($paragraph_deadline != '2000-01-01 00:00:00') echo '<td>'.$paragraph_deadline.'</td>';
            if($paragraph_attempts)
                echo '<td>'.strval($exercise_num).'/'.strval($paragraph_attempts).'</td>';
            else
                echo '<td>#/#</td>';

            echo '<td>'.$paragraph_title.'</td>';
            echo '<td>'.$paragraph_subtitle.'</td>';

            if($paragraph_attempts != 0 && $paragraph_attempts-$exercise_num<=0)
                $text = '<span style="text-decoration:line-through">'.$text.'</span>';
            else if (
                !(($paragraph_start != '2000-01-01 00:00:00' &&
                $paragraph_start > $paragraph_time_now) or
                ($paragraph_deadline != '2000-01-01 00:00:00' &&
                $paragraph_deadline < $paragraph_time_now))
            ) {
                $text .= '<a href="exercise.php?paragraph_uuid='.strval($paragraph_uuid).'">Megtekintés</a>';
            }
            else
                $text .= 'Már/még nem Aktiv';
            echo $text.'</tr>';

        }
        ?>
    </body>
</html>