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
    $assignment_id = $row["assignment_id"];
    if(isset($assignment_id)) {
        $get_email = "SELECT * FROM assignments WHERE id='$assignment_id' AND `open` < CURRENT_TIMESTAMP() AND `close` > CURRENT_TIMESTAMP()";
        $run_email = mysqli_query($db,$get_email);
        $num = mysqli_num_rows($run_email);
        $row =  mysqli_fetch_array($run_email);
        if($num > 0) {
            echo 'VAN ILZEN';
        } else {
            echo 'OUTDATED';
            die();
        }
        $assignment_name = $row["name"];
    }
    
    echo $assignment_name;
    ?>
    <body>
        <div class="typingtest w3-panel w3-info intro">
        <br class="w3-hide-small">
        <br>
        <h1>TEST YOUR TYPING SPEED</h1>
        <br>
        <div id="startdiv" class="w3-row" style="max-width:500px;margin:auto;">
            TIME:<br>
            <div class="bench" id="time" style="margin-bottom:-10px;">60</div>
            <span id="timefooter">Starts counting when you start typing.</span>
            <div id="phonebutton">
                Phone/Tablet users:<br>Double click the text field to activate the keyboard.
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
    </script>
    <script src="exercise.js"></script>
    </body>
</html>