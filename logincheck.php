<?php

session_start();

$username=$_POST['username'];
$password=$_POST['password'];


$conn = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);

$password=md5($password);
$result=mysqli_query($conn,"select * from person where username='$username' and password='$password'");

$row=mysqli_fetch_array($result);

if ($row['username']==$username && $row['password']==$password && $username!=NULL) {
    $_SESSION['user']=$row['pid'];
    header('location:home.php');

} else {
    header("refresh:0; url=login.html");
     } 
?>

<body href="login.html" onload="myFunction()">
<script>
function myFunction() {
   alert("Invalid username/password");  
}
</script>
</body>


