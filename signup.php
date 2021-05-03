<!DOCTYPE html>
<?php
	
	if(isset($_POST['signup'])){
		$user = $_POST['username'];
		$cpass = $_POST['conpassword'];
		$email = $_POST['email'];
    	$uppercase = preg_match('@[A-Z]@',$cpass);
		$lowercase = preg_match('@[a-z]@', $cpass);
		$number    = preg_match('@[0-9]@', $cpass);
		$specialChars = preg_match('@[^\w]@', $cpass);

				if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($cpass) <= 8) {
    					echo '<script>alert("Password should be at least 8 characters in length and should include at least one uppercase/lowercase letter, one number, and one special character.")</script>';
				}
		else{
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "signup";

		$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");
		

}



}
				
	

?>
			
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<style>
	body, html{
	height: 100%;
	margin: 0;
}
 input[type=text], input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  border: 2px solid #ccc;
  box-sizing: border-box;
}
 
 .bg {
  height: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  background-image: linear-gradient(violet, blue);
}
.box {
  cursor: pointer;
  padding: 60px;
  width: 35%;
  border-style: groove;
  background-color: white;
  position: absolute; 
	top: calc(290px/2);
	left: calc(50% - 290px);
}

.box i {
    position: absolute; 
	top: calc(765px/2);
	left: calc(50% - -190px);
    cursor: pointer;
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

.button2{
	background-color: blue;
}





</style>
<body>
	
<div class="bg">
	<center>
<form action="" method="post">

  <div class="box">
  	<img src="monkey.gif" alt="monkey>" style="width:128px;height:140px;padding-left: 10px;"><br>
  	<b style="font-size: 32px;"> Register </b><br>
    <b>Enter Username</b>
    <input type="text"  name="username" id="username "required><br>

    <b>Enter Password</b>
    <input type="password"  name="password" required><br>
    

    <b style="margin-left: -20px" >Confirm Password</b>
    
    	<input type="password"  name="conpassword" id="conpassword" required><br>
    	<i class="far fa-eye" id="togglePassword"></i>
			<script>
				const togglePassword = document.querySelector('#togglePassword');
				const password = document.querySelector('#conpassword');

				togglePassword.addEventListener('click', function (e) {
				    // toggle the type attribute
				    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
				    password.setAttribute('type', type);
				    // toggle the eye slash icon
				    this.classList.toggle('fa-eye-slash');
				});
			</script>	

    	<?php  
 if(isset($_POST['signup'])){
				$pass = $_POST['password'];
				$cpass = $_POST['conpassword'];

				if($pass != $cpass){
				echo "<b> <font color=red> Password doesn't match! </font></b> <br> "; 
			}
				else{

				}
			}
				?>
			

    
    <b style="margin-left: 20px">Enter Email</b>
    <input type="text" name="email" id="email"required><br>

 <?php  
 if(isset($_POST['signup'])){
				$email = $_POST['email'];
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				echo "<b> <font color=red> Email is not Valid </font></b>";
			}
				else{
					
				}
			}
				?>
				<br>


				<?php
					
					if(isset($_POST['signup']))
					{
					$user = $_POST['username'];
					$cpass = $_POST['conpassword'];
					$email = $_POST['email'];
					$pass = $_POST['password'];
					$uppercase = preg_match('@[A-Z]@',$cpass);
					$lowercase = preg_match('@[a-z]@', $cpass);
					$number    = preg_match('@[0-9]@', $cpass);
					$specialChars = preg_match('@[^\w]@', $cpass);
					if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($cpass) <= 8 || $pass != $cpass || !filter_var($email, FILTER_VALIDATE_EMAIL)){

					}
					else{
									$dbhost = "localhost";
									$dbuser = "root";
									$dbpass = "";
									$dbname = "signup";

									$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");

									$user = $_POST['username'];

							        $select = "select * from registerform where username = '$user'";
							        $result = mysqli_query($con, $select);
							        $num = mysqli_num_rows($result);

							        if($num == 1){
							        		echo '<script>alert("Username already taken!")</script>';
							        }
							        else{
								$insert_Query = "INSERT INTO registerform (username, cpassword,email) VALUES ('$user','$cpass','$email')";

									if(mysqli_query($con,$insert_Query)){
								echo '<script>alert("Success")</script>';
								header( "Location: home.php" );

							}
							else{
								echo "fail";
							}
								}
							}
						}
				?>

    
    <button class="button" type="submit" name="signup">Sign Up</button>
    <button class="button button2" type="submit" name="submit" onclick="document.location='Sample.php'">Back</button>
    
  </div>
</center>
</form>

</div>
</body>
</html>