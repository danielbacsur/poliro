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
            $arr1 = str_split($source);
            
            $w =      ',.-éáőúűüű'; #($_GET["data"]);
            $arr2 = str_split($w);
            echo $arr1.'<br>'.$arr2.'<br>';


            echo strlen($source).'<br>'.strlen($w).'<br>';
            

            for($i = 0; $i < strlen($w); $i++) { // modif to smaller length

                if(strcmp($source[$i], $w[$i]) !== 0) {
                    echo 'ketsyer';
                    $ccc =  utf8_encode($w[$i]) ;

                    $insert_customer = "INSERT INTO errors (`exercise_id`, `index`, `char`) VALUES ('1', '$i', '$ccc')";
                    echo $insert_customer.'<br>';
                    #$run_customer = mysqli_query($db,$insert_customer);
                }
            }
        ?>
    </body>
</html>