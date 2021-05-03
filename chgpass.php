<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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
input[type=text], input[type=password] {
  
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
  top: calc(775px/2);
  left: calc(50% - -150px);
    cursor: pointer;
}
.button2{
	background-color: red;
}	
</style>
<body bgcolor="violet">
	<div class="box">
		<center>
		<form method="post">
		<img src="monkey.gif" alt="monkey>" style="width:128px;height:140px;padding-left: 10px;"><br>
  	<b style="font-size: 32px;">  Change Password </b><br>

  	<table>
  		<tr>
  			<td>Enter Current Password</td>
  			<td><input type="password" name="oldpassword"></td>
  		</tr>
  		<tr>
  			<td>Enter New Password</td>
  			<td><input type="password" name="password"></td>
  		</tr>
  		<tr>
  			<td>Re-type New Password</td>
  			<td><input type="password" name="finalpassword" id="password">
  				<i class="far fa-eye" id="togglePassword"></i>
      <script>
          const togglePassword = document.querySelector('#togglePassword');
          const password = document.querySelector('#password');

          togglePassword.addEventListener('click', function (e) {
              
              const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
              password.setAttribute('type', type);
             
              this.classList.toggle('fa-eye-slash');
          });
      </script> 
  			</td>
  		</tr>
  	</table>
  	<button class="button" type="submit" name="change">Change</button>
    <button class="button button2" type="submit" name="cancel" >Cancel</button>
  		</center>
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

    $pass = $_POST['password'] ?? "";
    $npass = $_POST['finalpassword'] ?? "";
    $oldpass = $_POST['oldpassword'] ?? "";

    if(isset($_POST['change'])){
    	$oldpassquery = mysqli_query($con, "SELECT * FROM registerform WHERE cpassword = '$oldpass' ");
    	$rowtest = mysqli_num_rows($oldpassquery);

    	if($rowtest == 1){
    		if($pass == $npass){
    		$user = $_SESSION['user'];

    		$deletepass = mysqli_query($con,"UPDATE registerform SET cpassword = '$npass' WHERE username = '$user' ");
    		date_default_timezone_set('Asia/Taipei');
        	$time = date("Y-m-d h:i:s");
        	$act = "CHANGE PASSWORD";
    		$resetquery = mysqli_query($con,"INSERT INTO event_log (activity, username, date_time) VALUES ('$act','$user','$time')");

    		echo '<script>alert("Password Successfully Changed! ")</script>';
    		header("location:home.php");	
    		}
    		else{
    			echo '<script>alert("New Passwords does not Match ")</script>';
    		}
    	}
    	else{
    		echo '<script>alert("Current Password is wrong!")</script>';
    	}

    	
    }
    if(isset($_POST['cancel'])){
    	header("location:home.php");
    }
?>