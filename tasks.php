<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Kitűzött feladatok</h1>

        <?php
        $get_email = "SELECT * FROM paragraphs ORDER BY FIELD(title, 'Dolgozat', 'Gyakorlás')";
        $run_email = mysqli_query($db,$get_email);
        $row = mysqli_fetch_array($run_email);
        $paragraph_id = $row['paragraph_id'];
        $paragraph_uuid = $row["uuid"];
        $paragraph_title = $row["title"];
        $paragraph_subtitle = $row["subtitle"];
        $paragraph_uuid = $row["uuid"];
        $paragraph_uuid = $row["uuid"];
        array_push($arr, $exercise_due);
        array_push($arr, $exercise_type);
        array_push($arr, '<a href="exercise.php?paragraph_uuid='.strval($paragraph_uuid).'">Megtekintés</a>');
        echo join('&nbsp&nbsp&nbsp&nbsp&nbsp', $arr).'<br>';
        ?>
    </body>
</html>