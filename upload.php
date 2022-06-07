<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hxdro</title>
    </head>
    <body>
        <?php
        header('Content-Type: text/html; charset=utf-8');
            $get_email = "SELECT * FROM paragraphs WHERE id='1'";
            $run_email = mysqli_query($db,$get_email);
            $row = mysqli_fetch_array($run_email);
            $paragraph_title = $row["title"];
            $paragraph_text = $row["text"];

            $source = ($paragraph_text);
            $w =      ($_GET["data"]);
            $conv1 =  iconv("UTF-8", "ASCII//TRANSLIT", $paragraph_text);
            $conv2 =  iconv("UTF-8", "ASCII//TRANSLIT", $_GET["data"]);
            #echo $conv1.'<br>'.$conv2.'<br>';


            echo $source.'<br>'.$w.'<br>';

            for($i = 0; $i < strlen($w); $i++) { // modif to smaller length

                if(strcmp($source[$i], $w[$i]) !== 0) {
                    $ccc =  utf8_decode($w[$i]) ;

                    $insert_customer = "INSERT INTO errors (`exercise_id`, `index`, `char`) VALUES ('1', '$i', '$ccc')";
                    echo $insert_customer.'<br>';
                    #$run_customer = mysqli_query($db,$insert_customer);
                }
            }
        ?>
    </body>
</html>