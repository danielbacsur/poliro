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

                $get_email = "SELECT * FROM errors WHERE exercise_id='$exercise_id'";
                $run_email = mysqli_query($db,$get_email);
                
                while ($row = mysqli_fetch_array($run_email))  
                {
                    $error_index = $row["index"];
                    $error_char = $row["char"];
                    $text = substr_replace($text,'<span class="red">'.$error_char.'</span>', $error_index,1);
                    echo substr_replace('hello','span class="red"'.'vilag'.'/span', 2,1).'<br>';
                }
                echo '<span class="red">A</span>LMA';
                echo $text;

?>
                
    </body>
</html>