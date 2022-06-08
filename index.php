<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Hxdro Cloud</h1>

        <?php if(!isset($_SESSION['account_id'])) { ?>
            <a href="signin.php">signin</a>
        <?php } else { 
            echo $_SESSION['account_id']; ?>

            <a href="signout.php">signout</a>
            <a href="history.php">history</a>
            <a href="exercise.php?paragraph_uuid=f86079de-e767-11ec-9865-06f2f87c82bc">exercise</a>
        <?php } ?>
    </body>
</html>