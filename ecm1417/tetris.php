<!DOCTYPE html>
<html>
<head>
  <?php
	session_start();
  ?>
  <style>
    .navbar {
      background-color: blue;
      overflow: hidden;
    }
    .navbar a {
      font-family: arial;
      font-weight: bold;
      font-size: 12px;
      float: right;
      color: white;
      text-align: center;
      padding: 6px 6px;
    }
    .navbar a[name="home"] {
      float: left;
    }

    .tetris {
      background-color: #c7c7c7;
      box-shadow: 5px 5px 5px;
      width: 300px;
      height: 600px;
    }
  
    .main {
      background-image: url("tetris.png");
      width: 100%;
      height: 1000px;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      background-size: 95% auto;
    }
    
  </style>
</head>
<body>
<div class="navbar">
  <a name="home" href="index.php">Home</a>
  <a name="tetris" href="tetris.php">Play Tetris</a>
  <a name="leaderboard" href="leaderboard.php">Leaderboard</a>
</div>
  
<div class="main">
  <div class="tetris">
    <div id="tetris-bg">
      <img src="tetris-grid-bg.png">
    </div>
    <button id="start-button" onclick="startGame()">Click here to play</button>
	<form action="leaderboard.php" method="post">
	  <label for="score">Enter score</label>
	  <input type="number" id="score" name="score">
	</form>
	<script>
	function startGame() {
		var soundtrack = new Audio("tetris-theme.mp3");
		soundtrack.play();
		soundtrack.loop = true;
		document.getElementById("start-button").style.visibility="hidden";
	}
	</script>
  </div>
</div>
</body>
  
</html>