<?php
if(isset($_POST['resend'])){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "signup";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");

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