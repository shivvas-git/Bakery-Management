<?php

session_start();

//$orderid=stripcslashes($orderid);
//$select=stripcslashes($select);

$db=mysqli_connect('localhost','root','','cakeshoppe');

//$orderid=mysqli_real_escape_string($db,$orderid);
//$select=mysqli_real_escape_string($db,$select);

if (isset($_POST['add'])) { 
    $type=$_POST['type'];
    $name=$_POST['name'];
    $image=$_POST['image'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    
    $query="INSERT INTO cakestock (name,price,quantity,image,itemid) VALUES('$name','$price','$quantity','$image','$type')";
    mysqli_query($db,$query);
    header('refresh:0; url=cakes.php');
?>
<body onload="myFunction()">
<script>
function myFunction() {
   alert("Added successfully");
}
</script>
</body>
<?php
}
elseif (isset($_POST['remove'])) { 
    $cakeid=$_POST['cakeid'];
    
    $result=mysqli_query($db,"select * from cakestock where cakeid='$cakeid' ");
    $row=mysqli_fetch_assoc($result);
    
    if($row['cakeid']==$cakeid){
        $query="DELETE FROM cakestock WHERE cakeid='$cakeid' ";
        mysqli_query($db,$query);
        header('refresh:0; url=cakes.php');
        ?>
        <body href="cakes.php" onload="myFunction()">
        <script>
            function myFunction() {
            alert("Removed successfully");
            }
        </script>
        </body>
<?php
    }
    else{
        header('refresh:0; url=cakes.php');
        ?>
        <body href="cakes.php" onload="myFunction()">
        <script>
            function myFunction() {
            alert("Cakedid doesn't exists");
            }
        </script>
        </body>
        <?php
    }
}
?>

