<?php

  if(isset($_POST['submit1'])){

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "signup";

        $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");

        $user = $_POST['username'];
        $pass = $_POST['password'];

        $select = "select * from registerform where username = '$user' ";
        $select1 = "select * from registerform where cpassword = '$pass'";
        $result = mysqli_query($con, $select);
        $result1 = mysqli_query($con, $select1);
        $num = mysqli_num_rows($result);
        $num1 = mysqli_num_rows($result1);


        
          
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
?>