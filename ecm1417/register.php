<!DOCTYPE html>
<html>
<head>
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

    .main {
      background-image: url("tetris.png");
      width: 100%;
      height: 1000px;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      background-size: 95% auto;
    }
  
    .registration {
      width: 45%;
      padding: 5px;
      background-color: #c7c7c7;
      box-shadow: 5px 5px 5px;
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
  <div class="registration">
    <form id="registration" name="registration" action="index.php" method="post">
      <label for="first-name">First Name:</label>
      <input type="text" name="first-name" id="first-name">
      <br>
      <label for="last-name">Last Name:</label>
      <input type="text" name="last-name" id="last-name">
      <br>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username">
      <br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" placeholder="Password">
      <br>
      <label for="confirm-password">Confirm password:</label>
      <input type="password" name="password" id="confirm-password" placeholder="Confirm password">
      <br>
      <label for="yes">Display Scores on leaderboard: Yes</label>
      <input type="radio" id="yes" name="display" value="yes" checked>
      <label for="no">No</label>
      <input type="radio" id="no" name="display" value="no">
      <br>
      <input type="submit" name="submit" value="Submit">
      
    </form>
  </div>
</div>
</body>

  
</html>