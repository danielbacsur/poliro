<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>A feladat lezáródott</h1>
        <a href="index.php">Főoldal</a>
        <a href="inspect.php?exercise_uuid=<?php echo $_GET['exercise_uuid']; ?>">Áttekintés</a>
        
    </body>
</html>