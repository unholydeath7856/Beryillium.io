var beryilliumApp = (function ($) {
  var canvas = document.getElementById('mycanvas');
  var ctx = canvas.getContext("2d");
  var checkTime = 5000;
  var centerX = Math.floor(Math.random()*(600)+1);
  var centerY = Math.floor(Math.random()*(600)+1);
  var radius = 50;
  var hits = 0;
  var lives = 5;
  var intervalID;
  var score = 0;
  var intervalSet = setInterval(ignition, checkTime);

  //functions
  var ignition = function () {
    clean();
    draw();
    window.setInterval(intervalSet,checkTime);
  }

  var draw = function () {
    color = $('#color-select option:selected').text();
    centerX = Math.floor(Math.random()*(600)+1);
    centerY = Math.floor(Math.random()*(600)+1);
    if (($('#random').prop('checked')==true)) {
      ctx.strokeStyle = "#" + Math.floor(Math.random()*0xFFFFFF).toString(16);
    }
    else if (($('#random').prop('checked') == false) && color == "Red") {
      ctx.strokeStyle = "#FF0000";
    }
    else if (($('#random').prop('checked') == false) && color == "Orange") {
      ctx.strokeStyle = "#FF7F00";
    }
    else if (($('#random').prop('checked') == false) && color == "Yellow") {
      ctx.strokeStyle = "#FFFF00";
    }
    else if (($('#random').prop('checked') == false) && color == "Green") {
      ctx.strokeStyle = "#00FF00";
    }
    else if (($('#random').prop('checked') == false) && color == "Blue") {
      ctx.strokeStyle = "#0000FF";
    }
    else if (($('#random').prop('checked') == false) && color == "Indigo") {
      ctx.strokeStyle = "#4B0082";
    }
    else if (($('#random').prop('checked') == false) && color == "Violet") {
      ctx.strokeStyle = "#8B00FF";
    }
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, 0, 2*Math.PI);
    ctx.stroke();
    ctx.fillStyle = ctx.strokeStyle;
    ctx.fill();
    ctx.font = "16px Monospace";
    ctx.fillText("Score:"+ score, 500,16);
  }

  var hoverColor = function (colored, element) {
    var $ele = $(element);
    var color = "#"+Math.floor(Math.random()*0xFFFFFF).toString(16);
    if (colored) {
      $ele.css("color",color);
    } else if (!colored) {
      $ele.css("color","#000");
    }
  }

  var resume = function () {
    $('.pannel-container').slideUp();
    window.setInterval(intervalSet,checkTime);
  }

  var pauseMenu = function () {
    $('.pannel-container').slideUp();
    $('.pauseMenu').slideToggle();
    window.clearInterval(intervalSet);
  }

  var endMenu = function () {
    $('.pannel-container').slideUp();
    $('.score').text("Your Score Was: " + score);
    $('.endMenu').slideToggle();
  }

  var settingsMenu = function () {
    $('.pannel-container').slideUp();
    $('.settingsMenu').slideToggle();
  }

  var mainMenu = function () {
    $('.pannel-container').slideUp();
    reset();
    $('.mainMenu').slideToggle();
  }

  var clean = function () {
    ctx.clearRect(0,0,canvas.width,canvas.height);
  }

  var newGame = function () {
    $('.pannel-container').slideUp();
    reset();
    ignition();
    window.setInterval(intervalSet,checkTime);
  }

  var testForRandom = function () {
    if ($('#random').prop('checked')) {
      $('#color-select').prop('disabled','disabled');
    } else {
      $('#color-select').removeAttr('disabled')
    }
  }

  var getMousePos = function (canvas2, event) {
    var rect = canvas2.getBoundingClientRect();
    return {
      x: event.clientX - rect.left,
      y: event.clientY - rect.top
    };
  }

  var checkClick = function (canvas2, event) {
    var mousePos = getMousePos(canvas2,event);
    var distance = distanceFormula(centerX, mousePos.x, centerY, mousePos.y);
    if (distance <= radius) {
      skillIncrease();
    } else {
      lives --;
      flashRed();
      lifeCheck();
    }
  }

  var flashRed = function () {
    $(canvas).css("background-color","#ec9db0");
    ctx.beginPath();
    ctx.fillStyle = "#fff"
    ctx.font = "72px Monospace";
    ctx.fillText("-1 Life",150,300);
    var timeout = setTimeout(function () {
      $(canvas).css("background-color","white");
    }, 300);
  }

  var lifeCheck = function () {
      if (lives == 0) {
        stop();
      }
      console.log(lives);
  }

  var stop = function () {
    window.clearInterval(intervalSet);
    clean();
    endMenu();
  }

  var reset = function () {
    hits = 0;
    lives = 5;
    radius = 50;
    checkTime = 5000;
    score = 0;
    window.clearInterval(intervalSet);
  }

  var distanceFormula = function (x1,x2,y1,y2) {
    return Math.sqrt((x1-x2)*(x1-x2) + (y1 - y2)*(y1 - y2));
  }

  var skillIncrease = function () {
    score++;
    hits ++;
    clean();
    draw();
    if (hits == 3) {
      hits = 0;
      radius -= 1;
      checkTime -= 10;
    }
  }

  //methods
  return {
    start: ignition,
    hit: checkClick,
    hover: hoverColor,
    pause: pauseMenu,
    end: endMenu,
    main: mainMenu,
    new: newGame,
    settings: settingsMenu,
    color: testForRandom,
    back: resume
  };

})(jQuery);

$(document).ready(function () {
  var canvas = document.getElementById('mycanvas');
  beryilliumApp.main();
});
