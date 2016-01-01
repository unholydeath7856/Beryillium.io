<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Assets/Styles/CSS/main.css" media="screen" title="no title" charset="utf-8">
    <title>Beryillium.io</title>
  </head>
  <body>
    <header>

    </header>

    <div class="game">
      <div class="endMenu pannel-container">
        <div class="pannel">
          <h2 class="pannel-title">Game Over</h2>
          <h4 class="score"></h4>
          <ul class="options">
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.main()">Quit</li>
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.new()">Restart</li>
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="">Highscores</li>
          </ul>
        </div>
      </div>


      <div class="pauseMenu pannel-container">
        <div class="pannel">
          <h2 class="pannel-title">Paused</h2>
          <ul class="options">
            <li class="option" onmouseover="" onmouseout="" onclick="">Quit</li>
            <li class="option" onmouseover="" onmouseout="" onclick="">Restart</li>
            <li class="option" onmouseover="" onmouseout="" onclick="">Highscores</li>
          </ul>
        </div>
      </div>

      <div class="mainMenu pannel-container">
        <div class="pannel">
          <h3 class="pannel-title">Beryillium.io</h3>
          <ul class="options">
            <li id="quit" class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.new()">New Game</li>
            <li id="restart" class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="">Settings</li>
            <li id="highscores" class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="">Highscores</li>
          </ul>
        </div>
      </div>

      <div class="mainMenu pannel-container">
        <div class="pannel">
          <h3 class="pannel-title">Beryillium.io</h3>
          <ul class="options">
            <li id="quit" class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.new()">New Game</li>
            <li id="restart" class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="">Settings</li>
            <li id="highscores" class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="">Highscores</li>
          </ul>
        </div>
      </div>
      <canvas id="mycanvas" width="600" height="600" onclick="beryilliumApp.hit(this,event)"></canvas>
    </div>

    <footer>

    </footer>

    <script src="Assets/Scripts/JS/jquery.js"></script>
    <script src="Assets/Scripts/JS/game.js"></script>
  </body>
</html>
