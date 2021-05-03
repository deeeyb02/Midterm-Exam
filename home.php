<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<style>

body, html{
	height: 100%;
	margin: 0;
}

.bg {
  height: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  background-image: linear-gradient(violet, blue);
}
button{
  background-color: red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100px;
  border-radius: 8px;
  position: absolute;
  top: 50%;
  margin-left: 900px; 
}
.button2{
  margin-left: 700px; 
}
button:hover {
  opacity: 0.8;
}

</style>
<body>
	<div class="bg">
    <form method="post">
		<h1 align="center"> Welcome  <?php echo $_SESSION['user'];?>! </h1>
		<button class="button" type="submit" name="logoutbtn" >Logout</button><br>
    <button class="button button2" type="submit" name="change_pass">Change Password</button>
  </form>
	</div>
</body>
</html>
<?php

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "signup";

        $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");
        

        if(isset($_POST['change_pass'])){
          $user = $_SESSION['user'];
          header("location:chgpass.php");

        }
        
        if(isset($_POST['logoutbtn'])){
          date_default_timezone_set('Asia/Taipei');
          $time = date("Y-m-d h:i:s");
          $user = $_SESSION['user'];
            $act = "LOGOUT";
            $logoutins = "INSERT INTO event_log (activity, username, date_time) VALUES ('$act', '$user', '$time')";
            $logoutres = mysqli_query($con, $logoutins);

            header("location:Sample.php");
        }
?> 