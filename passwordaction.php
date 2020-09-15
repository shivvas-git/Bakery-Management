<?php

session_start();
$pid=$_SESSION['user'];
$oldpassword=$_POST['oldpassword'];
$password1=$_POST['password_1'];
$password2=$_POST['password_2'];
$conn = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);
$oldpassword=md5($oldpassword);

$result=mysqli_query($conn,"select * from person where password='$oldpassword'");

$row=mysqli_fetch_array($result);

if ($row['password']==$oldpassword && $oldpassword!=NULL && $password1!=NULL && $row['pid']=$pid && $password1=$password2) {
    $password1=md5($password1);
    mysqli_query($conn,"update person set password='$password1' where pid='$pid'");
    echo '<body onload="myFunction()">
    <script>
    function myFunction() {
       alert("password successfully updated");  
    }
    </script>
    </body>';
    header("refresh:0; url=home.php");

} else {
    echo '<body onload="myFunction()">
    <script>
    function myFunction() {
       alert("something went wrong");  
    }
    </script>
    </body>';
    header("refresh:0; url=changepswd.php");
     } 
?>


