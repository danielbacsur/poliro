<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <?php
    $account_id = $_SESSION['account_id'];
    $paragraph_uuid = $_GET['paragraph_uuid'];
    $get_email = "SELECT * FROM paragraphs WHERE uuid='$paragraph_uuid'";
    $run_email = mysqli_query($db,$get_email);
    $row = mysqli_fetch_array($run_email);
    $paragraph_title = $row["title"];
    $paragraph_text = $row["text"];
    $paragraph_time = $row["time"];
    
    ?>
    <body>
        <div class="typingtest w3-panel w3-info intro">
        <br class="w3-hide-small">
        <br>
        <h1><?php echo $paragraph_title; ?></h1>
        <br>
        <div id="startdiv" class="w3-row" style="max-width:500px;margin:auto;">
            <?php if($paragraph_time) { ?>
                TIME:<br>
                <div class="bench" id="time" style="margin-bottom:-10px;"><?php echo $paragraph_time; ?></div>
                <span id="timefooter">Az óra, az első billentyű lenyomásával együtt indul.</span>
            <?php } ?>
            <div id="phonebutton">
                Telefonos / Tabletes felhasználók<br>Dupla klikk
            </div>
        </div>
        <br class="w3-hide-small">
        <br>
        <div style="position:relative;  width: 60%; margin-left: 20%;">
            <div id="btext" style="color:transparent;" contenteditable="true"></div>
            <div id="ctext" autocomplete="off" autocorrect="off" autocapitalize="off" onmouseup="clickc()" onblur="unfocus()" onkeydown="kd(event)" onkeyup="ku(event)" style="outline: 0 solid transparent;color:transparent;" contenteditable="true" spellcheck="false"></div>
            <div id="dtext" contenteditable="true"></div>
            <div id="atext" style="background-color:white;color:rgba(0,0,0,0.3);" contenteditable="true">
                <?php echo $paragraph_text; ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var paragraph_uuid = '<?php echo $paragraph_uuid; ?>';
        var paragraph_time = '<?php echo $paragraph_time; ?>';
    </script>
    <script src="exercise.js"></script>
    </body>
</html>