<?php
session_start();

$email=$_POST['email'];
$message=$_POST['message'];
$date_=$_POST['date_'];

$email=stripcslashes($email);
$message=stripcslashes($message);
$date_=stripcslashes($date_);

$db=mysqli_connect('localhost','root','','cakeshoppe');


$email=mysqli_real_escape_string($db,$email);
$message=mysqli_real_escape_string($db,$message);
$date=mysqli_real_escape_string($db,$date_);
//echo $email;


if (isset($_POST['home'])) {
    $checkbox1=$_POST['boxes'];  
    $chk="";
    foreach($checkbox1 as $chk1){  
        $chk .= $chk1.",";  
    }  
    $query="INSERT INTO query (email,message,date,cake_stall) VALUES('$email','$message','$date_','$chk')";
    mysqli_query($db,$query);
    header("location: home.php");
}
elseif (isset($_POST['index'])) {
    $checkbox1=$_POST['boxes'];  
    $chk="";  
    foreach($checkbox1 as $chk1){  
        $chk .= $chk1.",";
    }  
    $query="INSERT INTO query (email,message,date,cake_stall) VALUES('$email','$message','$date_','$chk')";
    mysqli_query($db,$query);
    header("location: index.html");
}

?>