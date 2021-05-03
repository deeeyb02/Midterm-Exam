<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PAGE</title>
</head>
<style>
 button{
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 40%;
  border-radius: 8px;
}

button:hover {
  opacity: 0.8;
}
</style>
<body bgcolor="violet">
<center>
	<h2>Activity Logs</h2>
<?php
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "signup";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");

    $dispquery = mysqli_query($con, "SELECT * FROM event_log");
    echo "<table border = 1>
    <tr>

		<th>Id</th>

		<th>Activity</th>

		<th>Username</th>

		<th>Date & Time</th>

	</tr>";
    if(mysqli_num_rows($dispquery) > 0){
    	while($row = mysqli_fetch_assoc($dispquery)){

    		  echo "<tr>";

			  echo "<td>" . $row['e_id'] . "</td>";

			  echo "<td>" . $row['activity'] . "</td>";

			  echo "<td>" . $row['username'] . "</td>";

			  echo "<td>" . $row['date_time'] . "</td>";

			  echo "</tr>";
    	}
    }
    echo "</table>";
?>
<form method="post">
<button name="logout">Logout</button>
</form>
</center>
</body>
</html>
<?php
if(isset($_POST['logout'])){
          date_default_timezone_set('Asia/Taipei');
          $time = date("Y-m-d h:i:s");
          $user = "ADMIN";
            $act = "LOGOUT";
            $logoutins = "INSERT INTO event_log (activity, username, date_time) VALUES ('$act', '$user', '$time')";
            $logoutres = mysqli_query($con, $logoutins);

            echo'<script>
			      window.location.replace("Sample.php");
			      </script>';
        }
?>
