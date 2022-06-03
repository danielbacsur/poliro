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


                echo $row['text'];
                echo '<br>';

                $get_email = "SELECT * FROM errors WHERE exercise_id='$exercise_id'";
                $run_email = mysqli_query($db,$get_email);
                
                while ($row = mysql_fetch_array($run_email))  
                {
                    echo $row["char"];
                }


?>
                
    </body>
</html>