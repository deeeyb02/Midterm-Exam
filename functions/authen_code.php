<?php
//AUTHENTICATION

  if(isset($_POST['pindutan'])){

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "signup";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");

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
            $logins = "INSERT INTO event_log (activity, username, date_time) VALUES ('$act2', '$user', '$curtime')";
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
?>