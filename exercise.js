function goAgain() {
  window.location = "exercise.html";
}
function dblclickc() {
  document.getElementById("ctext").click();
}
document.getElementById("ctext").addEventListener("focus", function() {
  setBlink();
});

var source = ["kavarom a kávém, orvos javasol, vakarom a karom, a sav mar",
  "kavarom a kávém, orvos javasol, vakarom a karom, a sav mar",
  "kavarom a kávém, orvos javasol, vakarom a karom, a sav mar",
  "kavarom a kávém, orvos javasol, vakarom a karom, a sav mar"

];
var source = source.join(', ')

/*window.addEventListener("load", function() {
  source2 = source.toString().replace(/,/g, "&#44;");
  //var x = mywords.sort(function() {return 0.5 - Math.random() });
  //x = x.slice(0, 200);
  //document.getElementById("nyarr").innerHTML = x;
  
  document.getElementById("atext").innerHTML = source2;
  document.getElementById("ctext").focus();
  document.getElementById("ctext").style.height = w3_getStyleValue(document.getElementById("atext"), "height");
});*/
function load() {
  
  document.getElementById("ctext").focus();
  document.getElementById("ctext").style.height = w3_getStyleValue(document.getElementById("atext"), "height");
}

function clickc() {
  var c = document.getElementById("ctext");
  var caretPos = c.innerText.length;
  var el = c;
  var range = document.createRange();
  var sel = window.getSelection();
  if (el.childNodes[0]) {
    range.setStart(el.childNodes[0], caretPos);
    range.collapse(true);
    sel.removeAllRanges();
    sel.addRange(range);
  }
}

var blinktimeout, blinkstyle = "";
var cursorPos = 0;
function setBlink(a) {
  var n = cursorPos;
  if (blinkstyle == "") blinkstyle = "background-color:rgba(30, 144, 255,0.2)";
  if (a == "stop") blinkstyle = "";
  document.getElementById("atext").innerHTML = document.getElementById("atext").innerText.substr(0, n) + "<span style='" + blinkstyle + "'>" + document.getElementById("atext").innerText.substr(n, 1) + "</span>" + document.getElementById("atext").innerText.substr(n + 1);
  if (a == "stop") return false;
  if (blinkstyle == "background-color:rgba(30, 144, 255,0.2)") {
    blinkstyle = "background-color:none";
  } else {
    blinkstyle = "background-color:rgba(30, 144, 255,0.2)";
  }
  blinktimeout = window.setTimeout(setBlink, 530);
}

var dheight = w3_getStyleValue(document.getElementById("dtext"), "height");
function checkScroll() {
  var c = document.getElementById("ctext");
  var d = document.getElementById("dtext");
  var wh = window.innerHeight;
  d.innerText = c.innerText + " passeord ";
  new_dheight = w3_getStyleValue(document.getElementById("dtext"), "height");
  var x = dheight.replace("px", "");
  var y = new_dheight.replace("px", "");
//  console.log((Number(y) + Number(750))  + " " + wh)
  if (y > x && ((Number(y) + Number(750))) > wh) {
    window.scrollBy(0, y-x);
  }
  dheight = w3_getStyleValue(document.getElementById("dtext"), "height");
}

var start = 0, keycount = 0, wcount, wrongword, charcount, errcount;
function ku(e) {
  wcount = 0, charcount = 0, errcount = 0;
  keycount++;
  if (start == 0) {
    initCount();
    start = 1;
  }
  var a, b, c, i, txt = "", aARR, cARR;
  checkScroll();
  a = document.getElementById("atext").innerText;
  b = document.getElementById("btext").innerText;
  c = document.getElementById("ctext").innerText;
  if ((keycount + 5) < c.length) {
    c = "";
    document.getElementById("ctext").innerText = c;
  }
  cursorPos = c.length;
  window.clearTimeout(blinktimeout);
  blinkstyle = "";
  setBlink();
  for (i = 0; i < c.length; i++) {
    if (a[i] == c[i] || (a[i].charCodeAt(0) == 32 && c[i].charCodeAt(0) == 160)) {
      charcount++;
      txt += "<span class='corchar'>" + a[i] + "</span>";
    } else {
      errcount++;
      txt += "<span class='errchar'>" + a[i] + "</span>";
    }
      if (a[i] == " ") {c = c.substr(0, i) + "|" + c.substr(i+1);}
  }
  document.getElementById("btext").innerHTML = txt + a.substr(i);
  document.getElementById("characters").innerHTML = charcount;
  document.getElementById("errors").innerHTML = errcount;
  aARR = a.split(" ");
  cARR = c.split("|");
  wrongword = 0;
  for (i = 0; i < cARR.length; i++) {
    if (cARR[i].trim() == aARR[i].trim()) {
      wcount++;
    } else {
      wrongword++;
    }
  }
  document.getElementById("words").innerHTML = Math.ceil((c.length/5) - wrongword);
}

timelength = 10;
var ttimer;
function initCount() {
  document.getElementById("timefooter").innerHTML = "&nbsp;";
  document.getElementById("time").innerHTML = timelength;
  ttimer = window.setInterval(updateTimer, 1000);
}

function updateTimer() {
  timelength--;
  document.getElementById("time").innerHTML = timelength;
  if (timelength == 0) {
    stopTyping();
    compare();
    window.clearInterval(ttimer);
    displayScore();
  }
}
var res = '';

function compare() {
  var c = document.getElementById("ctext").innerText
  for (let i = 0; i < c.length; i++) {
    const charr = c[i];
    const sourcec = source[i];
    if (charr != sourcec) {
      res += '#';
    }
    else {
      res += sourcec;
    }
    
  }
  console.log(res);
  console.log(source);
  console.log(c);
  document.location = 'upload.php?exercise_id=1&data='+encodeURI(c);
}

function displayScore() {
  document.getElementById("startdiv").style.display = "none";
  document.getElementById("finishdiv").style.display = "block";
  window.scrollTo(0, 0);
}

function stopTyping() {
  document.getElementById("ctext").contentEditable = false;
  window.addEventListener("keydown", function(e) {
    if(window.event) { // IE                    
      keynum = e.keyCode;
    } else if(e.which){
      keynum = e.which;
    }
    if (keynum == 32) {
      e.preventDefault();
      return false;
    }
  });
}

function kd(e) {
  var cARR = [33,34,35,36,37,38,39,40];
  if(window.event) { // IE                    
    keynum = e.keyCode;
  } else if(e.which){
    keynum = e.which;
  }
  if (cARR.indexOf(keynum) > -1) {
    e.preventDefault();
    return false;
  }
  if (keynum == 86 && e.ctrlKey) {
    e.preventDefault();
    return false;
  }
  
}

function unfocus() {
  window.clearTimeout(blinktimeout);
  setBlink("stop");
}


function w3_getStyleValue(elmnt,style) {
    if (window.getComputedStyle) {
        return window.getComputedStyle(elmnt,null).getPropertyValue(style);
    } else {
        return elmnt.currentStyle[style];
    }
}