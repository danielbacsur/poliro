<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <title>Hxdro</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Hxdro Cloud</h1>

        <?php
                $account_id = $_SESSION['account_id'];
                echo $account_id;
                $exercise_id = $_GET['exercise_id'];
                $get_email = "SELECT * FROM exercises WHERE account_id='$account_id' AND id='$exercise_id'";
                $run_email = mysqli_query($db,$get_email);
                $row = mysqli_fetch_array($run_email);
                $pid = $row["paragraph_id"];


                $get_email = "SELECT * FROM paragraphs WHERE id='$pid'";
                $run_email = mysqli_query($db,$get_email);
                $row = mysqli_fetch_array($run_email);


                $text =  $row['text'] ;
                $ntext = '';

                $get_email = "SELECT * FROM errors WHERE exercise_id='$exercise_id' ORDER BY 'index' DESC";
                $run_email = mysqli_query($db,$get_email);
                while ($row = mysqli_fetch_array($run_email))  
                {
                    $error_index = $row["index"];
                    echo $error_char.'---';
                    $error_char = $row["char"];
                    $error_char = 'X';
                    $corr = '<span style="color:blue">'.$error_char.'</span>';

                    $text = substr($text, 0, $error_index+$loca).$corr.substr($text, -($tlen - $error_index-1 )+$loca);
                    $loca += strlen($corr)-1;
                }
                echo $text;

?>
                
    </body>
</html>