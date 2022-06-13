<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Előzmények</h1>
        <table style="width:60vw">
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
                $account_id = $_SESSION['account_id'];
                $exercise_sql = "SELECT * FROM exercises WHERE account_id='$account_id'";
                $exercise_qry = mysqli_query($db,$exercise_sql);
                while ($exercise_arr = mysqli_fetch_array($exercise_qry)) {
                    $exercise_id = $exercise_arr['id'];
                    $exercise_uuid = $exercise_arr['uuid'];
                    $exercise_length = $exercise_arr['length'];
                    $exercise_timestamp = $exercise_arr['timestamp'];
                    
                    $paragraph_id = $exercise_arr['paragraph_id'];
                    $paragraph_sql = "SELECT * FROM paragraphs WHERE id='$paragraph_id'";
                    $paragraph_qry = mysqli_query($db,$paragraph_sql);
                    $paragraph_row = mysqli_fetch_array($paragraph_qry);
                    $paragraph_title = $paragraph_row['title'];
                    $paragraph_section = $paragraph_row["section"];
                    $paragraph_subsection = $paragraph_row["subsection"];

                    $arr = array();
                    echo '<tr>';
                    echo '<td>'.$exercise_timestamp.'</td>';
                    echo '<td>'.$paragraph_title.'.'.$paragraph_section.'.'.$paragraph_subsection.'</td>';
                    echo '<td><a href="inspect.php?exercise_uuid='.strval($exercise_uuid).'">Megtekintés</a></td>';
                    echo '</tr>';
                }
                ?>
        </table>
    </body>
</html>