
<?php



if (isset($_POST['feed'])) {  
  $oid=$_POST['oid'];
$message=$_POST['message'];
$message=stripcslashes($message);

$db=mysqli_connect('localhost','root','','cakeshoppe');
$message=mysqli_real_escape_string($db,$message);
$query="INSERT INTO feed (oid,message) VALUES('$oid','$message')";
mysqli_query($db,$query);
echo '<body  onload="myFunction()">
<script>
function myFunction() {
alert("feedback received");
}
</script>
</body>';
// header("location: home.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>previous customer Orders</title>
</head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 10px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: left;
  background-color: grey;
  color: white;
}
header{
        background-postion: left;
        min-height: 625px;
        max-width: 1500px;
        
        }
</style>
<body>
<a href="home.php" class="center lighten-2 waves-effect waves-light black-text">Home</a>
<table id="customers">
  <tr>
    <th>Date</th>  
    <th>OrderID</th>
    <th>total items</th>
    <th>Order amount</th>
    <th>Status</th>
    
  </tr>
  <?php
  session_start();
  $conn = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);
  $pid=$_SESSION['user'];

  $sql="select o.orderdate,o.pid,o.ordramnt,o.status,o.description,o.orderid from _order o
        where o.pid='$pid'";
  $result=mysqli_query($conn,$sql);
  if($result->num_rows >0){
      while($row=$result->fetch_assoc()){
          $total=substr_count($row['description'],",");
          if($total==0)
            {
              $total=1;
            }
          echo "<tr><td>". $row['orderdate'] ."</td><td>". $row['orderid'] ."</td><td>". $total ."</td><td>". $row['ordramnt'] ."</td><td>". $row['status'] ."</td></tr>";
      }
  }
  else{
      echo "NO ORDERS PLACED";
  }
  $conn->close();
  ?>
</table>
<h2>Feedback Form</h2>
<form action="prevord.php" method="POST">
<div class="input-field">
                <textarea id="messag" name="oid" class="materialize-textarea"></textarea>
                <label for="messag">orderid</label>
            </div>
    <div class="input-field">
                <i class="material-icons prefix">message</i>
                <textarea id="message" name="message" class="materialize-textarea"></textarea>
                <label for="message">Your Message</label>
            </div>
            <div class="input-field center">
                <button class="btn" name="feed" type="submit">submit</button>
            </div>
      </form>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
                $('.materialboxed').materialbox();
                $('.tabs').tabs();
                $('.tooltipped').tooltip();
            });
        </script>
</body>
</html>
