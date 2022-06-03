<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <title>Hxdro</title>
    </head>
    <body>
        <h1>Hxdro Cloud</h1>

        <?php
                $account_id = $_SESSION['account_id'];
                $exercise_id = $_GET['exercise_id'];
                $get_email = "SELECT * FROM exercises WHERE account_id='$account_id' AND id='$exercise_id'";
                $run_email = mysqli_query($db,$get_email);
                $row = mysqli_fetch_array($run_email);
                $pid = $row["paragraph_id"];


                $get_email = "SELECT * FROM paragraphs WHERE id='$pid'";
                $run_email = mysqli_query($db,$get_email);
                $row = mysqli_fetch_array($run_email);


                $text = $row['text'];

                /*$get_email = "SELECT * FROM errors WHERE exercise_id='$exercise_id'";
                $run_email = mysqli_query($db,$get_email);
                $loca = 0
                while ($row = mysqli_fetch_array($run_email))  
                {
                    $error_index = $row["index"];
                    $error_char = $row["char"];
                    $corr = '<span style="color:blue">'.$error_char.'</span>';
                    echo $corr.'<br>';
                    $tlen = strlen($text);
                    $text = substr($text, 0, $error_index+$loca).'---'.substr($text, -($tlen - $error_index)).'<br>';
                    $loca += 3;
                }*/

                $text = substr($text, 0, 3).'---'.substr($text, -($tlen - 4 + 1)).'<br>';
                $text = substr($text, 0, 6+1).'---'.substr($text, -($tlen - 6 + 1)+1).'<br>';

                echo $text;

?>
                
    </body>
</html>