<?php

session_start();

$orderid=$_POST['orderid'];
$select=$_POST['select'];
//echo $orderid;
//$orderid=stripcslashes($orderid);
//$select=stripcslashes($select);

$db=mysqli_connect('localhost','root','','cakeshoppe');

//$orderid=mysqli_real_escape_string($db,$orderid);
//$select=mysqli_real_escape_string($db,$select);

$result=mysqli_query($db,"select * from _order where orderid='$orderid' ");

$row=mysqli_fetch_assoc($result);

if ($row['orderid']==$orderid) {
    $query="UPDATE _order SET status='$select' WHERE orderid=$orderid";
    mysqli_query($db,$query);
    header('location: showorders.php');

} else {
    header('refresh:0; url=showorders.php');
}
?>
<body href="showorders.php" onload="myFunction()">
<script>
function myFunction() {
   alert("orderid doen't exists");  
}
</script>
</body>
