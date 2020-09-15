<?php
session_start();
$username="";
$email="";
$errors=array();

//connect to db
$db=mysqli_connect('localhost','root','','cakeshoppe') or die("could not connect to database");

//register
$name = isset($_POST['name']) ? $_POST['name'] : '';
$username=isset($_POST['username']) ? $_POST['username'] : '';
$password_1=isset($_POST['password_1']) ? $_POST['password_1'] : '';
$password_2=isset($_POST['password_2']) ? $_POST['password_2'] : '';
$phone=isset($_POST['phone']) ? $_POST['phone'] : '';
$email=isset($_POST['email']) ? $_POST['email'] : '';

//form validation
if(empty($name)) {
    array_push($errors,"Name is required");
   
};
if(empty($username)) {
    array_push($errors,"Username is required");
    
};
if(empty($password_1)){ array_push($errors,"Password is required");echo 'password';};
if(empty($phone)){ array_push($errors,"Mobile No. is required");echo 'phone';};
if(empty($email)){ array_push($errors,"Email is required");echo 'email';};
if($password_1!=$password_2){
    array_push($errors,"Passwords do not match");
    header("refresh:1;url=register.php");
    echo '<body  onload="myFunction()">
    <script>
    function myFunction() {
    alert("password doesnt match");
   }
    </script>
    </body>';
}

//check db for existing user with same username
$user_check_query="SELECT * from person WHERE username='$username' or email='$email' LIMIT 1";

$results=mysqli_query($db,$user_check_query);
$user=mysqli_fetch_assoc($results);
if($user){
    if($user['email']==$email) {
        array_push($errors,"Email already exists");
       echo '<body  onload="myFunction()">
       <script>
       function myFunction() {
       alert("email already taken");
      }
       </script>
       </body>';
    }
    if($user['username']==$username){ 
        array_push($errors,"Username already exists");
        ?>
    <body  onload="myFunction()">
    <script>
    function myFunction() {
    alert("username already taken");
   }
    </script>
    </body>
    <?php   
    }
    header("refresh:1;url=register.php");
}

//register
if(count($errors)==0){
    $password=md5($password_1); //this will encrypt password
    $query="INSERT INTO person (name,username,password,email,phone) VALUES('$name','$username','$password','$email','$phone')";

    mysqli_query($db,$query);
?>
    <body  onload="myFunction()">
    <script>
    function myFunction() {
    alert("successfully registered");
   }
    </script>
    </body>
    <?php
    $result=mysqli_query($db,"select * from person where username='$username'");
    $row=mysqli_fetch_array($result);
    $_SESSION['user']=$row['pid'];
    //$_SESSION['success']="You are logged in";
    header("refresh:0;url=home.php");
}
?>