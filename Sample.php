<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="login.css">
  
  
</head>
<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0%;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color:rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
}
/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: RED;
  text-decoration: none;
  cursor: pointer;
}

    /* Modal Header */
.modal-header {
  padding: 2px 16px;
  background-color: #D108CB;
  color: black;
}

/* Modal Body */
.modal-body {
  padding: 8%;
  color: white;
}
.modal-body input{
  padding: 5%;
}

/* Modal Footer */
.modal-footer{
    background-color: #08119E;
  color: white;
}
.rs{
  
  width: 30%;
  height: 40px;
  cursor: pointer;
  border: none;
  outline: none;
  color: black;
  font-size: 16px;
  background:  #4CAF50;
  border-radius: 5px;
  border:2px solid gray;
  margin: 5% 5% 5%;
}
.csub{

  width: 30%;
  height: 40px;
  cursor: pointer;
  border: none;
  outline: none;
  color: black;
  font-size: 16px;
  background: #4CAF50;
  border-radius: 5px;
  border:2px solid gray;
  margin-left: 23%;
}


.rs:hover, .csub:hover
{
       background: rgb(12,27,15);
       color: white;
       border:2px solid white;
}

/* Modal Content */
.modal-content {
  position: relative;
  margin: auto;
  padding: 0;
  border: 1px solid gray;
  box-shadow: 100px red;
  width: 30%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  animation-name: animatetop;
  animation-duration: 0.6s;
  margin-top: 20%;
  border-radius: 5px;
  background:  #C4BCBC;
}

/* Add Animation */
@keyframes animatetop {
  from {top: -300px; opacity: 0}
  to {top: 0; opacity: 1}
}

.modal-body input { 
  width: 95%; 
  margin-bottom: 10px; 
  background: rgba(130,130,100,0.3);
  border: none;
  outline: none;
  padding: 10px;
  font-size: 13px;
  color: black;
  border: 1px solid rgba(0,0,0,0.3);
  border-radius: 4px;
  box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
  margin-top: 10px;
  margin-left: 2%;

}

</style>
<body>
<div class="bg">
<center>

<form action="Sample.php" method="post">
  <div class="box">
  	<img src="monkey.gif" alt="monkey>" style="width:128px;height:140px;padding-left: 10px;"><br>
  	<b style="font-size: 32px;"> Log In </b><br>
    <b>Username</b>
    <input type="text" placeholder="Enter Username" name="username" required><br>
    <b>Password</b>
    <input type="password" placeholder="Enter Password" name="password" id="password" required><br>
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
    <button class="button" type="submit" name="submit1">Login</button>
    <button class="button button2" type="submit" name="signup" onclick="document.location='signup.php'">Sign Up</button> <br>
    <input type="checkbox" checked="checked" name="remember"> Remember me <br>
    <br>
    <a href="fpass.php" name="forgot"> Forgot Password? </a>
    
  </div>
</form>
</center>


<!--MODAL-->
    <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Verification</h2>
      </div>
      <form action="Sample.php" method="post">
        <div class="modal-body">
          <table>
            <tr>
              <td>Authentication Code: </td>
              <td><input type="text" name="code" > </td>
              <td>
            </tr>
          </table>
          
        </div>
        <div class="modal-footer">
          <button name="resend" id="resend" class="rs">Resend </button>
          <button name="pindutan" id="pindutan"  class="csub">Submit</button>
          
        </div>
     
      </form>
    </div>

</div>




<script type="text/javascript">
 // Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on the button, open the modal
// When the user clicks on <span> (x), close the modal

var button = document.getElementById("sub");


span.onclick = function() {
   modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
     modal.style.display = "none";
  }
}


</script>

</div>



<?php
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "signup";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");

  if(isset($_POST['submit1'])){

        

        $user = $_POST['username'];
        $pass = $_POST['password'];

        $select = "select * from registerform where username = '$user' ";
        $select1 = "select * from registerform where cpassword = '$pass'";
        $result = mysqli_query($con, $select);
        $result1 = mysqli_query($con, $select1);
        $num = mysqli_num_rows($result);
        $num1 = mysqli_num_rows($result1);

        if($user == "ADMIN" && $pass == "ADMIN"){
        	date_default_timezone_set('Asia/Taipei');
            $time = date("Y-m-d h:i:s");
            $user = "ADMIN";
            $act = "LOGIN SUCCESSFUL";
            $logins = "INSERT INTO event_log (activity, username, date_time) VALUES ('$act', '$user', '$time')";
            $logres = mysqli_query($con, $logins);
        	echo'<script>
			      window.alert("login Successfully");
			      window.location.replace("admin.php");
			      </script>';
        }
        
        else{
          
        if($num == 1){
          if($num1 == 1){
            $randcode=(rand(100000,999999));
            $user = $_POST['username'];
            $userquery = "SELECT id from registerform where username = '$user'";
            $result = mysqli_query($con, $userquery);
            
            date_default_timezone_set('Asia/Taipei');
            $time = date("Y-m-d h:i:s");
          
            $currentDate = strtotime($time);
            $futureDate = $currentDate+(60*5);
            $formatDate = date("Y-m-d H:i:s", $futureDate);

            
            $codeins = "INSERT INTO authen (userid,code,oras,exptime)  SELECT id,'$randcode','$time','$formatDate' FROM registerform  where username = '$user' ";
            $result1 = mysqli_query($con, $codeins);


            $act = "LOGIN ATTEMPT";
            $logins = "INSERT INTO event_log (activity, username, date_time) VALUES ('$act', '$user', '$time')";
            $logres = mysqli_query($con, $logins);
               
               $user = $_POST['username'];	
   			   $_SESSION['user'] =  $user;
             
            echo '<script>alert("Your Authentication Code is: '.$randcode.'" );
            modal.style.display = "block";
          
            </script>';
            
            
            
           
          }
          elseif($num1 != 1){
            echo '<script>alert("Wrong Password!")</script>';
          }
        }

        
        elseif($num1 == 1){
          if($num != 1){
          echo '<script>alert("Wrong Username!")</script>';
          }
        }

        else{
          echo '<script>alert("User does not exist!")</script>';
        }
    }
  }





  //AUTHENTICATION

  if(isset($_POST['pindutan'])){

    

    $code=$_POST['code'];
    $getcode = "SELECT * FROM authen WHERE code = '$code'";
    $coderes = mysqli_query($con,$getcode);
    $num = mysqli_num_rows($coderes);
    
    

    $getexp = "SELECT exptime FROM authen where code = '$code'";
    $expres = mysqli_query($con,$getexp);
    $num2 = mysqli_fetch_assoc($expres);

    if($num>0){
    	date_default_timezone_set('Asia/Taipei');
        $curtime = date("Y-m-d h:i:s");

        $today = strtotime($curtime);
        $exp = strtotime($num2['exptime']);

        $diff = $exp - $today;
        $minuto = $diff / 60;

        

        if($minuto>=0 ){
        	$act2 = "LOGIN SUCCESSFUL";
        	$usern = $_SESSION['user'];
            $logins = "INSERT INTO event_log (activity, username, date_time) VALUES ('$act2', '$usern', '$curtime')";
            $logres = mysqli_query($con, $logins);
           echo'<script>
      window.alert("login Successfully");
      window.location.replace("home.php");
      </script>';
        }
        else{
          echo'<script>
      window.alert("Code Expired");
      modal.style.display="block";
      </script>';
        }


    }
    
  }





  if(isset($_POST['resend'])){
    

    $print = "SELECT * FROM authen ORDER BY id DESC LIMIT 1";
    $searchres = mysqli_query($con,$print);
    $num2 = mysqli_fetch_assoc($searchres);
    $newid = $num2['userid']; 


    $nrandcode=(rand(100000,999999));
    date_default_timezone_set('Asia/Taipei');        
    $newtime = date("Y-m-d h:i:s");
  
    $ncurrentDate = strtotime($newtime);
    $nfutureDate = $ncurrentDate+(60*5);
    $nformatDate = date("Y-m-d h:i:s", $nfutureDate);

    
    $ncodeins = "INSERT INTO authen (userid,code,oras,exptime)  SELECT '$newid','$nrandcode','$newtime','$nformatDate' ";
    $nresult1 = mysqli_query($con, $ncodeins);

    
       
    
    echo '<script>alert("Your Authentication Code is: '.$nrandcode.'" );
    modal.style.display = "block"
  
    </script>';

  }


 
?>




</body>
</html>

