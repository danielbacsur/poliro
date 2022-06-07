<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hxdro</title>
    </head>
    <body>
        <?php

            $get_email = "SELECT * FROM paragraphs WHERE id='1'";
            $run_email = mysqli_query($db,$get_email);
            $row = mysqli_fetch_array($run_email);
            $paragraph_title = $row["title"];
            $paragraph_text = $row["text"];

            $source = $paragraph_text;
            $w =      $_GET["data"];

            $nobreak = str_replace(["\r", "\n"], "", $w);
            echo $source.'<br>'.$w.'<br>'.$nobreak;

            for($i = 0; $i < strlen($w); $i++) { // modif to smaller ength
                if($source[$i] != $w[$i]) {
                    $ccc =  urlencode($w[$i]) ;

                    $insert_customer = "INSERT INTO errors (`exercise_id`, `index`, `char`) VALUES ('1', '$i', '$ccc')";
                    echo $insert_customer.'<br>';
                    $run_customer = mysqli_query($db,$insert_customer);
                }
            }
        ?>
    </body>
</html>