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
      <div class="pause">
        <img src="Assets/Images/pause.jpg" onclick="beryilliumApp.pause()" alt="pause" />
      </div>
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
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this)" onclick="beryilliumApp.back()">Resume</li>
            <li class="option" onmouseover="" onmouseout="" onclick="">Restart</li>
            <li class="option" onmouseover="" onmouseout="" onclick="">Highscores</li>
          </ul>
        </div>
      </div>

      <div class="mainMenu pannel-container">
        <div class="pannel">
          <h3 class="pannel-title">Beryillium.io</h3>
          <ul class="options">
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.new()">New Game</li>
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.settings()">Settings</li>
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="">Highscores</li>
          </ul>
        </div>
      </div>

      <div class="settingsMenu pannel-container">
        <div class="pannel">
          <h3 class="pannel-title">Settings</h3>
          <ul class="options">
            <li class="option" onclick=""><input id="random" onclick="beryilliumApp.color()" type="checkbox" checked="true" name="random" value="checked"><label onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.color()" for="random">Random Colors?</label></li>
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);">
              <select id="color-select" name="color" disabled="true">
                <option value="option"><span class="red"></span>Red</option>
                <option value="option"><span class="orange"></span>Orange</option>
                <option value="option"><span class="yellow"></span>Yellow</option>
                <option value="option"><span class="green"></span>Green</option>
                <option value="option"><span class="blue"></span>Blue</option>
                <option value="option"><span class="indigo"></span>Indigo</option>
                <option value="option"><span class="violet"></span>Violet</option>
              </select><label for="color-select">Color</label>
            </li>
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.main()">Back</li>
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
