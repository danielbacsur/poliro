<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Főoldal</h1>

        <?php if(!isset($_SESSION['account_id'])) { ?>
            <a href="signin.php">signin</a>
        <?php } else { ?>
            <a href="signout.php">kijelentkezés</a>
            <a href="history.php">előzmények</a>
            <a href="tasks.php">feladatok</a>
        <?php } ?>
    </body>
</html>