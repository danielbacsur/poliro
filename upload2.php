<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hxdro</title>
    </head>
    <body>
        <?php
            $data = $_GET["d"];
            
            for($i = 0; $i < count($data); $i++) { // modif to smaller length
                $d = $data[$i];
                if(!$d) continue;
                if (preg_match('/[\'^£$%&*()}{@#~?><>,;|=_+¬-]/', $d))
                    {
                        $d = urlencode($d);
                    }
                    $insert_customer = "INSERT INTO errors (`exercise_id`, `index`, `char`) VALUES ('1', '$i', '$d')";
                    echo $insert_customer.'<br>';
                    $run_customer = mysqli_query($db,$insert_customer);

            }
            
        ?>
    </body>
</html>