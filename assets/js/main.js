function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function reveal() {
    var x = document.getElementById("password");
    var y = document.getElementById("reveal-icon");
    if (x.type === "password") {
        x.type = "text";
        y.setAttribute("src", "/assets/png/visibility_off-black-18dp/1x/outline_visibility_off_black_18dp.png");
    } else {
        x.type = "password";
        y.setAttribute("src", "/assets/png/visibility-black-18dp/1x/outline_visibility_black_18dp.png");
    }
}

function removeSessionMessage() {
    document.getElementById("expireNot").remove();
    window.location.href = '/';
}
Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}
NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = this.length - 1; i >= 0; i--) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}

var secondsCounter = 0;
function quizTimer(){
    secondsCounter++;
    if (secondsCounter >= 901) {
        document.getElementById('innerHere').innerHTML = "<div class='expire' id='expireNot'><h1 id='expireh1'>You have been logged out due to inactivity<button onclick='removeSessionMessage()'>Sign back in</button></h1></div>";
    }
}

function rand(min, max) {
  return Math.random() * (max - min) + min;
}

function goToAccount(account) {
    window.location.href = "https://www.gulllebelle.com/accounts/" + account;
}

function nextStep(step) {
    switch(step) {
        case 1:
            console.log('1');
            document.querySelector(".firstCircle").classList.add("currentCircle");
            document.querySelector(".secondCircle").classList.remove("currentCircle");
            document.querySelector(".thirdCircle").classList.remove("currentCircle");
            document.querySelector(".CardSectionFirst").classList.add("firstSection");
            document.querySelector(".CardSectionFirst").classList.remove("secondSection");
            document.querySelector(".CardSectionFirst").classList.remove("thirdSection");
            break;
        case 2:
            console.log('2');
            document.querySelector(".firstCircle").classList.remove("currentCircle");
            document.querySelector(".secondCircle").classList.add("currentCircle");
            document.querySelector(".thirdCircle").classList.remove("currentCircle");
            document.querySelector(".CardSectionFirst").classList.remove("firstSection");
            document.querySelector(".CardSectionFirst").classList.add("secondSection");
            document.querySelector(".CardSectionFirst").classList.remove("thirdSection");
            break;
        case 3:
            console.log('3');
            document.querySelector(".firstCircle").classList.remove("currentCircle");
            document.querySelector(".secondCircle").classList.remove("currentCircle");
            document.querySelector(".thirdCircle").classList.add("currentCircle");
            document.querySelector(".CardSectionFirst").classList.remove("firstSection");
            document.querySelector(".CardSectionFirst").classList.remove("secondSection");
            document.querySelector(".CardSectionFirst").classList.add("thirdSection");
            break;
    }
}

function turnOne(turn) {
    if (typeof turnMore == 'undefined') {
        turnMore = 0;
    }
    turnMore = turnMore + turn;
    console.log(turnMore);
    if (turnMore == 10) {
        window.location.href = "https://www.gulllebelle.com/hidden/";
    }
}