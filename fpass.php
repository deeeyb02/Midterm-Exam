<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	
</head>
<style>
.box{
  cursor: pointer;
  padding: 60px;
  width: 30%;
  border-style: groove;
  background-color: white;
  position: absolute; 
	top: calc(290px/2);
	left: calc(50% - 290px);
}
input[type=text]{
  
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

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

.box i{
	position: absolute; 
  top: calc(650px/2);
  left: calc(50% - -130px);
    cursor: pointer;
}
.button2{
	background-color: red;
}
</style>
<body bgcolor="violet">
<center>
	<div class="box">
		<form method="post">
		<img src="monkey.gif" alt="monkey>" style="width:128px;height:140px;padding-left: 10px;"><br>
  	<b style="font-size: 32px;">  Input your Username and Email </b><br>
  	<table>
  		<tr>
  			<td><b>Username</b></td>
  			<td><input type="text" placeholder="Enter Username" name="username" required></td>
  		</tr>
		<tr>
  			<td><b>Email</b></td>
  			<td><input type="text" placeholder="Enter Email" name="email" required></td>
  		</tr>  		
  	</table>
    
 
    
    
    <button class="button" type="submit" name="confirm">Confirm</button>
    <button class="button button2" type="submit" name="cancel" onclick="document.location='Sample.php'">Cancel</button>
    </form>
	</div>
</center>
</body>
</html>

<?php
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "signup";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");

    if(isset($_POST['confirm'])){
    	$user = $_POST['username'];
    	$email = $_POST['email'];
    	$userquery = mysqli_query($con, "SELECT username FROM registerform WHERE username = '$user' ");
    	$num1 = mysqli_num_rows($userquery);
    	$emailquery = mysqli_query($con, "SELECT email FROM registerform WHERE email = '$email' ");
    	$num2 = mysqli_num_rows($emailquery);
    	if($num1 == 1 && $num2 == 1){
    		echo '<script>alert("Account Verified")</script>';
    		date_default_timezone_set('Asia/Taipei');
        	$time = date("Y-m-d h:i:s");
        	$act = "FORGOT PASSWORD";
        	$_SESSION['user'] = $user;
    		$forgotquery = mysqli_query($con,"INSERT INTO event_log (activity, username, date_time) VALUES ('$act','$user','$time')");


    		
    		header("location:respass.php");
    	}
    	elseif($num1 == 1 && $num2 != 1){
    		echo '<script>alert("Incorrect Email")</script>';
    	}
    	elseif ($num1 != 1 && $num2 == 1) {
    		echo '<script>alert("Incorrect Username")</script>';
    	}
    	else{
    		echo '<script>alert("Account is not existing")</script>';
    	}




	}
?>