<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Előzmények</h1>
        <table style="width:50vw">
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
            <tr>
                <?php
                $account_id = $_SESSION['account_id'];
                $exercise_sql = "SELECT * FROM exercises WHERE account_id='$account_id'";
                $exercise_qry = mysqli_query($db,$exercise_sql);
                while ($exercise_arr = mysqli_fetch_array($exercise_qry)) {
                    echo '<tr>';
                    $exercise_id = $exercise_arr['id'];
                    $exercise_uuid = $exercise_arr['uuid'];
                    $exercise_length = $exercise_arr['length'];
                    $exercise_time = $exercise_arr['time'];
                    
                    $paragraph_id = $exercise_arr['paragraph_id'];
                    $paragraph_sql = "SELECT * FROM paragraphs WHERE id='$paragraph_id'";
                    $paragraph_qry = mysqli_query($db,$paragraph_sql);
                    $paragraph_row = mysqli_fetch_array($paragraph_qry);
                    $paragraph_title = $paragraph_row['title'];
                    $paragraph_title_id = $paragraph_row["title_id"];
                    $paragraph_subtitle_id = $paragraph_row["subtitle_id"];

                    $paragraph_title_sql = "SELECT * FROM paragraph_titles WHERE id='$paragraph_title_id'";
                    $paragraph_title_qry = mysqli_query($db,$paragraph_title_sql);
                    $paragraph_title_row = mysqli_fetch_array($paragraph_title_qry);
                    $paragraph_title = $paragraph_title_row['name'];
                    $paragraph_subtitle_sql = "SELECT * FROM paragraph_subtitles WHERE id='$paragraph_subtitle_id'";
                    $paragraph_subtitle_qry = mysqli_query($db,$paragraph_subtitle_sql);
                    $paragraph_subtitle_row = mysqli_fetch_array($paragraph_subtitle_qry);
                    $paragraph_subtitle = $paragraph_subtitle_row['name'];
                    
                    $arr = array();
                    echo '<td>'.$exercise_time.'</td>';
                    echo '<td>'.$paragraph_title.' - '.$paragraph_subtitle.'</td>';
                    echo '<td><a href="inspect.php?exercise_uuid='.strval($exercise_uuid).'">Megtekintés</a></td>';
                    echo '</tr>';
                }
                ?>
        </table>
    </body>
</html>