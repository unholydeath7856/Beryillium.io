<?php
$pagination ="";
$html = "";
$conn = mysqli_connect("localhost","root","","beryillium.io");
if(isset($_POST['name'])) {
  $name = $_POST['name'];
  $score = $_POST['score'];
  $query = mysqli_query($conn,"INSERT INTO highscore (name,score) VALUES ('$name','$score')");
  header('location: http://localhost/beryillium.io/redirect.php');
}
$count_query = mysqli_query($conn,"SELECT NULL FROM highscore");
$count = mysqli_num_rows($count_query);

//pagination
if (isset($_GET['page'])) {
  $page = preg_replace("#[^0-9]#","",$_GET['page']);

} else {
  $page = 1;
}
$perPage = 10;
$lastPage = ceil($count/$perPage);

if($page < 1) {
  $page = 1;
} else if ($page > $lastPage) {
  $page = $lastPage;
}

if($lastPage != 1) {
  if ($page != $lastPage) {
    $next = $page + 1;
    $pagination.='<a href="index.php?page='.$next.'">Next</a>';
  }
  if ($page != 1) {
    $prev = $page - 1;
    $pagination.='<a href="index.php?page='.$prev.'">Previous</a>';
  }
}

$limit = "LIMIT ".($page - 1)*$perPage.", $perPage";
$query = mysqli_query($conn,"SELECT * FROM highscore ORDER BY score DESC $limit");
if (mysqli_num_rows($query)) {
  while ($row = mysqli_fetch_assoc($query)) {
    $name = $row['name'];
    $score = $row['score'];
    $html .= '<tr><td>'.$name.'</td><td>'.$score.'</td></tr>';
  }
}


?>

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
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.highmenu()">Highscores</li>
          </ul>
        </div>
      </div>

      <div class="highscoreMenu pannel-container">
        <div class="pannel">
          <h2 class="pannel-title">Highscores</h2>
          <ul class="options">
            <table style="width:80%; margin-right:10%; margin-left:10%">
              <?php echo($html); ?>
            </table>
            <?php echo($pagination); ?>
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.main(); beryilliumApp.clearPage();">Back</li>
          </ul>
        </div>
      </div>

      <div class="pauseMenu pannel-container">
        <div class="pannel">
          <h2 class="pannel-title">Paused</h2>
          <ul class="options">
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this)" onclick="beryilliumApp.back()">Resume</li>
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this)" onclick="beryilliumApp.new()">Restart</li>
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this)" onclick="beryilliumApp.highmenu()">Highscores</li>
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.stop()">Quit</li>
          </ul>
        </div>
      </div>

      <div class="mainMenu pannel-container">
        <div class="pannel">
          <h3 class="pannel-title">Beryillium.io</h3>
          <ul class="options">
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.new(); intervalID = window.setInterval(beryilliumApp.start,checkTime);">New Game</li>
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.settings()">Settings</li>
            <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);" onclick="beryilliumApp.highmenu()">Highscores</li>
          </ul>
        </div>
      </div>

      <div class="nameMenu pannel-container">
        <div class="pannel">
          <h3 class="pannel-title">Insert Name</h3>
          <ul class="options">
            <form class="highscore-submit" action="index.php" method="post">
              <li class="option" ><input id="name" type="text" onkeyup="beryilliumApp.name()" name="name" placeholder="insert name..."></li>
              <li class="option"><input id="score-dummy" type="hidden" name="score" value=""></li>
              <li class="option" onmouseover="beryilliumApp.hover(true,this)" onmouseout="beryilliumApp.hover(false,this);"><input id="nameinput" onclick="beryilliumApp.highscore()" type="submit" name="next" disabled="true" value="Next"></li>
            </form>
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
      <div class="pause">
        <img src="Assets/Images/pause.jpg" onclick="beryilliumApp.pause()" alt="pause" />
      </div>
      <canvas id="mycanvas" width="600" height="600" onclick="beryilliumApp.hit(this,event)"></canvas>
    </div>

    <footer>

    </footer>

    <script src="Assets/Scripts/JS/jquery.js"></script>
    <script src="Assets/Scripts/JS/game.js"></script>
  </body>
</html>
