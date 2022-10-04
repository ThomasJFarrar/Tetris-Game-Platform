<!DOCTYPE html>
<html>
<head>
  <?php
    $server = "localhost";
    $user = "ecm1417";
    $passwd = "WebDev2021";
    $db = "tetris";

    $conn = mysqli_connect($server, $user, $passwd, $db);
    if (!$conn) {
      die("Connection error: " . mysqli.connect_error());
    }
	session_start();
	if ($_SESSION["display"] == 1) {
	  if (isset($_POST["score"])) {
	    $username = $_SESSION["username"];
	    $score = $_POST["score"];
	    $sql = "INSERT INTO Scores (Username, Score) VALUES ('$username', '$score')";
	    if (mysqli_query($conn, $sql)) {
		  echo "Score added";
	    } else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	    }
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

    table,td {
      background-color: #c7c7c7;
      box-shadow: 5px 5px 5px;
      border-spacing: 2px;
    }

    th {
      background-color: blue;
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
  <div class="leaderboard">
	<?php
	  $sql = "SELECT * FROM Scores";
	  $result = mysqli_query($conn, $sql);
	  echo "<table>
	  <th scope='col'>Username</th>
	  <th scope='col'>Score</th>
	  </tr>";
	  
	  while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row['Username'] . "</td>";
		echo "<td>" . $row['Score'] . "</td>";
		echo "</tr>";
	  }
	  echo "</table>";
	  ?>
  </div>
</div>
</body>

  
</html>