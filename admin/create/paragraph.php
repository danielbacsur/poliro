<!DOCTYPE html>
<?php include("../../database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Paragrafus Létrehozása</h1>
        <form action="" method="post">
            Cim: <input type="text" name="title"><br>
            Szöveg: <input type="text" name="text"><br>
            <input type="submit" name="submit">
        </form>

        <?php
        if(isset($_POST['submit'])){                 
            $paragraph_title = $_POST['title'];
            $paragraph_text = $_POST['text'];

            $paragraph_sql = "INSERT INTO paragraphs (`title`, `text`) VALUES ('$paragraph_title', '$paragraph_text')";
            $paragraph_qry = mysqli_query($db,$paragraph_sql);
                        
            header( 'Location: ../../index.php' );
        } ?>
    </body>
</html>