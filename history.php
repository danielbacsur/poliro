<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <title>Hxdro</title>
    </head>
    <body>
        <h1>Hxdro Cloud</h1>
        <?php
                $account_id = $row_account['account_id'];
                $get_email = "SELECT * FROM exercises WHERE account_id='$account_id'";
                $run_email = mysqli_query($db,$get_email);
                /*while ($row = mysqli_fetch_array($run_email)) {
                    $exercise_name = $row['name'];
                    echo $exercise_name; 
                }*/?>
                
    </body>
</html>