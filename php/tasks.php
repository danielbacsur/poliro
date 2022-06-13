<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Kitűzött feladatok</h1>
        <table style="width:60vw">
            <tr>
                <th style="text-align: left">
                    Paragrafus ID
                </th>
                <th style="text-align: left">
                    Paragrafus Cime
                </th>
                <th style="text-align: left">
                    Kezdés Időpontja
                </th>
                <th style="text-align: left">
                    Zárás Időpontja
                </th>
                <th style="text-align: left">
                    Próbálkozások
                </th>
                <th style="text-align: left">
                    Beavatkozás
                </th>
            </tr>

        <?php
        $account_id = $_SESSION['account_id'];

        $get_email = "SELECT *, CURRENT_TIMESTAMP() AS time_now FROM paragraphs ORDER BY title, section, subsection";
        $run_email = mysqli_query($db,$get_email);
        while ($row = mysqli_fetch_array($run_email)) {
            echo '<tr>';
            $paragraph_id = $row['id'];
            $paragraph_uuid = $row["uuid"];
            $paragraph_title = $row["title"];
            $paragraph_section = $row["section"];
            $paragraph_subsection = $row["subsection"];
            $paragraph_attempts = $row["attempts"];
            $paragraph_start = $row["start"];
            $paragraph_deadline = $row["deadline"];
            $paragraph_time_now = $row["time_now"];

            $exercise_sql = "SELECT * FROM exercises WHERE paragraph_id='$paragraph_id' AND account_id='$account_id'";
            $exercise_qry = mysqli_query($db,$exercise_sql);
            $exercise_num = mysqli_num_rows($exercise_qry);

            echo '<td>'.$paragraph_id.'</td>';
            echo '<td>'.$paragraph_title.'.'.$paragraph_section.'.'.$paragraph_subsection.'</td>';
            
            if ($paragraph_start != '2000-01-01 00:00:00') echo '<td>'.$paragraph_start.'</td>';
            else echo '<td>Nincs</td>';
            if ($paragraph_deadline != '2000-01-01 00:00:00') echo '<td>'.$paragraph_deadline.'</td>';
            else echo '<td>Nincs</td>';
            echo '<td>'.strval($exercise_num);
            if($paragraph_attempts)
                echo '/'.strval($paragraph_attempts).'</td>';
            else
                echo '/#</td>';


            if($paragraph_attempts != 0 && $paragraph_attempts-$exercise_num<=0)
                echo '<td>Megirva</td>';
            else if (
                !(($paragraph_start != '2000-01-01 00:00:00' &&
                $paragraph_start > $paragraph_time_now) or
                ($paragraph_deadline != '2000-01-01 00:00:00' &&
                $paragraph_deadline < $paragraph_time_now))
            ) {
                echo '<td><a href="exercise.php?paragraph_uuid='.strval($paragraph_uuid).'">Megtekintés</a></td>';
            }
            else
                $text .= '<td>Már/még nem Aktiv</td>';
            echo $text.'</tr>';

        }
        ?>
        </table>
    </body>
</html>