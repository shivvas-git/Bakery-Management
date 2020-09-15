<?php

session_start();

$username=$_POST['username'];
$password=$_POST['password'];

$username=stripcslashes($username);
$password=stripcslashes($password);

$conn = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);

//$username=mysqli_real_escape_string($conn,$username);
//$password=mysqli_real_escape_string($conn,$password);
//$password=md5($password);
$result=mysqli_query($conn,"select * from admin where username='$username' and password='$password'");

$row=mysqli_fetch_array($result);

if ($row['username']==$username && $row['password']==$password && $username!=NULL) {
     $_SESSION['admin']=$row['name'];
    
     header("location:admin.php");

} else {
     echo '<body onload="myFunction()">
     <script>
    function myFunction() {
       alert("Invalid username/password");  
    }
     </script>
     </body>';
    header("refresh:0; url=Adlogin.php");
     } 
?>

 


