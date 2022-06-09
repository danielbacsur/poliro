<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Kitűzött feladatok</h1>

        <?php
        $get_email = "SELECT * FROM paragraphs ORDER BY FIELD(title, 'Dolgozat', 'Gyakorlás')";
        $run_email = mysqli_query($db,$get_email);
        while ($row = mysqli_fetch_array($run_email)) {
            $paragraph_id = $row['id'];
            $paragraph_uuid = $row["uuid"];
            $paragraph_title = $row["title"];
            $paragraph_subtitle = $row["subtitle"];
            $paragraph_attempts = $row["attempts"];

            $get_email = "SELECT * FROM exercises WHERE paragraph_id='$paragraph_id'";
            $run_email = mysqli_query($db,$get_email);
            $check_email = mysqli_num_rows($run_email);



            $arr = array();
            array_push($arr, $paragraph_id);
            array_push($arr, strval($check_email).'/'.strval($paragraph_attempts));
            array_push($arr, $paragraph_title);
            array_push($arr, $paragraph_subtitle);
            array_push($arr, '<a href="exercise.php?paragraph_uuid='.strval($paragraph_uuid).'">Megtekintés</a>');
            echo join('&nbsp&nbsp&nbsp&nbsp&nbsp', $arr).'<br>';
        }
        ?>
    </body>
</html>