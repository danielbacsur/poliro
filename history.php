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
                $get_email = "SELECT * FROM exercises WHERE account_id='$account_id'";
                $run_email = mysqli_query($db,$get_email);
                while ($row = mysqli_fetch_array($run_email)) {
                    $paragraph_id = $row["paragraph_id"];
                    $gg = "SELECT * FROM paragraphs WHERE id='$paragraph_id'";
                    $asd = mysqli_query($db,$gg);
                    $rowss = mysqli_fetch_array($asd);
                    $paragraph_text = $rowss["text"];
                    echo $paragraph_text;
                }
?>
                
    </body>
</html>