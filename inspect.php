<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <meta charset="UTF-8">
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
                $exercise_length = $row["length"];


                $get_email = "SELECT * FROM paragraphs WHERE id='$pid'";
                $run_email = mysqli_query($db,$get_email);
                $row = mysqli_fetch_array($run_email);


                $text =  $row['text'];
                $text = substr($text, 0, $exercise_length);

                $get_email = "SELECT * FROM errors WHERE exercise_id='$exercise_id' ORDER BY 'position' DESC";
                $run_email = mysqli_query($db,$get_email);
                while ($row = mysqli_fetch_array($run_email))  
                {
                    $error_index = $row["position"];
                    $error_char = $row["text"];
                    $err_len = strlen($error_char);
                    $corr = '<span style="text-decoration:underline; color:red">'.$error_char.'</span>';

                    $text = substr($text, 0, $error_index+$loca).$corr.substr($text, -($tlen - $error_index-1 )+$loca);
                    $loca += strlen($corr)-1-$err_len;
                }
                echo $text.'<br>LOL';

?>
                
    </body>
</html>