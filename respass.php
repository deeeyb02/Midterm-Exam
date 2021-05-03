<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
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
  top: calc(650px/2);
  left: calc(50% - -150px);
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
  	<b style="font-size: 32px;">  Input your New Password </b><br>

  	<table>
  		<tr>
  			<td>Enter New Password</td>
  			<td><input type="password" name="password" ></td>
  		</tr>
  		<tr>
  			<td>Re-type New Password</td>
  			<td><input type="password" name="finalpassword" id="password" >
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
    
    $pass = $_POST['password'] ?? "";
    $npass = $_POST['finalpassword'] ?? "";

    if(isset($_POST['change'])){
    	if($pass == $npass){
		$user = $_SESSION['user'];

    	$deletepass = mysqli_query($con,"UPDATE registerform SET cpassword = '$npass' WHERE username = '$user' ");
    		date_default_timezone_set('Asia/Taipei');
        	$time = date("Y-m-d h:i:s");
        	$act = "RESET PASSWORD";
    		$resetquery = mysqli_query($con,"INSERT INTO event_log (activity, username, date_time) VALUES ('$act','$user','$time')");

    	echo '<script>alert("Password Successfully Reset!")</script>';
    	header("location:Sample.php");

    	}
    elseif ($pass != $npass) {
    	echo '<script>alert("Password does not Match!")</script>';
    }
    	
    }

    if(isset($_POST['cancel'])){
    	header("location:Sample.php");
    }


?>