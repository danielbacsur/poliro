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

            $source = utf8_decode($paragraph_text);
            $w =      utf8_decode($_GET["data"]);
            $conv1 =  utf8_decode( $source);
            $conv2 =  utf8_decode( $w);
            echo $conv1.'<br>'.$conv2.'<br>';


            echo $source.'<br>'.$w.'<br>';

            for($i = 0; $i < strlen($w); $i++) { // modif to smaller ength
                if($source[$i] != $w[$i]) {
                    $ccc =  ($w[$i]) ;

                    $insert_customer = "INSERT INTO errors (`exercise_id`, `index`, `char`) VALUES ('1', '$i', '$ccc')";
                    echo $insert_customer.'<br>';
                    #$run_customer = mysqli_query($db,$insert_customer);
                }
            }
        ?>
    </body>
</html>