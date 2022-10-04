<!DOCTYPE html>
<html>
<head>

  <?php
    ini_set('display_errors', '1');
    $server = "localhost";
    $user = "ecm1417";
    $passwd = "WebDev2021";
    $db = "tetris";

    $conn = mysqli_connect($server, $user, $passwd, $db);
    if (!$conn) {
      die("Connection error: " . mysqli.connect_error());
    }
	session_start();
	if (!isset($_SESSION["loggedin"])) {
		$_SESSION["loggedin"]=false;
	}
    if (isset($_POST["username"])){
      if ($_POST["display"] == "yes") {
        $display = 1;
      } else {
        $display = 0;
      }
      $username = $_POST["username"];
      $firstname = $_POST["first-name"];
      $lastname = $_POST["last-name"];
      $password = $_POST["password"];
      $sql = "INSERT INTO Users (Username, FirstName, LastName, Password, Display) VALUES ('$username', '$firstname', '$lastname', '$password', '$display')";
      if (mysqli_query($conn, $sql)) {
        echo "New user added successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
	}

    if (isset($_POST["login-username"])) {
	  $loginname = $_POST["login-username"];
	  $_SESSION["username"] = $_POST["login-username"];
      $sql = "SELECT Password, Display FROM Users WHERE Username='$loginname'";
      $result = mysqli_query($conn, $sql);
	  $row = mysqli_fetch_assoc($result);
	  $_SESSION["display"] = $row['Display'];
      if ($row['Password'] === $_POST["login-password"]) {
        $_SESSION["loggedin"] = true;
        mysqli_close($conn);
      }
    }
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
  
    .main {
      background-image: url("tetris.png");
      width: 100%;
      height: 1000px;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      background-size: 95% auto;
  
    }
  
    .logged-out {
      box-shadow: 5px 5px 5px;
      width: 40%;
      background-color: #c7c7c7;
      padding: 5px;
      margin-left: auto;
      margin-right: auto;
  
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

  <div class="logged-in" <?php if ($_SESSION['loggedin'] === true){?>style="display: flex"<?php }else{?>style="display:none"<?php } ?>>
    <h1>Welcome to Tetris</h1>
    <a href="tetris.php"><button>Click here to play</button></a>
  </div>

  <div class="logged-out" <?php if ($_SESSION['loggedin'] === true){?>style="display: none"<?php }else{?>style="display:flex"<?php } ?>>
  <form method="post">
    <label for="login-username">Username:</label>
    <input type="text" name="login-username" id="login-username" placeholder="username">
    <label for="login-password">Password:</label>
    <input type="password" name="login-password" id="login-password">
    <input type="submit" name="submit" value="Submit">
  </form>
  <p>Don't have a user account? <a name="register" href="register.php">Register now</a></p>
  </div>

</div>
</body>
  
</html>