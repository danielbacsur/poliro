<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Főoldal</h1>

        <?php if(!isset($_SESSION['account_id'])) { ?>
            <a href="signin.php">signin</a>
        <?php } else { 
            echo $_SESSION['account_id']; ?>

            <a href="signout.php">kijelentkezés</a>
            <a href="history.php">előzmények</a>
            <a href="tasks.php">feladatok</a>
            <a href="exercise.php?paragraph_uuid=f86079de-e767-11ec-9865-06f2f87c82bc">exercise</a>
        <?php } ?>
    </body>
</html>