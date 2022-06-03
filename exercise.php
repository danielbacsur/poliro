<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Poliro - Gyakorlat</title>
        <link rel="stylesheet" href="exercise.css">
    </head>
    <body>
        <div class="typingtest w3-panel w3-info intro">
        <br class="w3-hide-small">
        <br>
        <h1>TEST YOUR TYPING SPEED</h1>
        <div class="w3-row" style="max-width:500px;margin:auto;">
          <div id="finishdiv">
            <br>
            <div>
                WORDS PER MINUTE:<br>
                <span class="bench" id="words">0</span>
            </div>
            <div class="w3-half">
                CHARACTERS:<br>
                <span class="bench" id="characters">0</span>
            </div>
            <div class="w3-half">
                ERRORS:<br>
                <span class="bench" id="errors">0</span>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <button type="button" class="w3-btn w3-large" onclick="goAgain()">GO AGAIN</button>
            <br>
          </div>
        </div>
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
            <div id="atext" style="background-color:white;color:rgba(0,0,0,0.3);" contenteditable="true">Alma Jancsi</div>
        </div>
    </div>
    <script src="exercise.js">load();</script>
    </body>
</html>