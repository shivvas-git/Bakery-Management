<?php
session_start();
$isempty=1;


if(isset($_POST['pay'])){
    $db = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);
    $cakeid=array_column($_SESSION['cart'],"cakeid");
    $chk="";
    foreach($cakeid as $chk1){  
        $q="UPDATE cakestock SET quantity=quantity-1 WHERE cakeid='$chk1' ";
        mysqli_query($db,$q);
        $chk .= $chk1.",";  
    }
    $res=$db->query("select * from cakestock");
    $total=$_SESSION['total'];
    $pid=$_SESSION['user'];
    $status="In progress";
    $date=date("Y-m-d"); 
    $q="INSERT INTO payment (ordramnt,pid) VALUES('$total','$pid')";
    mysqli_query($db,$q);
    $query="INSERT INTO _order (pid,ordramnt,status,orderdate,description) VALUES('$pid','$total','$status','$date','$chk')";
    mysqli_query($db,$query);
    foreach($_SESSION['cart'] as $key =>$value){    
        unset($_SESSION['cart'][$key]);
    }
    echo "<script>alert('Order has been placed Successfully...!')</script>";
}

$total=0;
if(isset($_POST['remove'])){
    //print_r($_GET['id']);
    if($_GET['action']=='remove'){
        foreach($_SESSION['cart'] as $key =>$value){
            if($value["cakeid"]==$_GET['id']){
                $count=count($_SESSION['cart']);
                if($count==1){
                    unset($_SESSION['cart'][$key]);
                    //echo "<script>alert('Product has been Removed...!')</script>";
                    echo "<script>window.location='cart.php'</script>";
                }else{
                    unset($_SESSION['cart'][$key]);
                    $count=count($_SESSION['cart']);
                    $a=$count-$key;
                    while($a!=0){
                        $_SESSION['cart'][$key]=$_SESSION['cart'][$key+1];
                        $key=$key+1;
                        $a=$a-1;
                    }
                    unset($_SESSION['cart'][$count]);
                   // echo "<script>alert('Product has been Removed...!')</script>";
                    echo "<script>window.location='cart.php'</script>";
                }
                
            }
        }
    }
}
// if(isset($_POST['plus'])){
//     //print_r($_GET['id']);
//     //echo "<script>window.location='home.php'</script>";
//     if($_GET['action']=='plus'){
//         echo "<script>window.location='home.php'</script>";
//         foreach($_SESSION['cart'] as $key =>$value){
//             if($value["cakeid"]==$_GET['id']){
                
//                 $count=count($_SESSION['cart']);
//                 $item_array=array(
//                     'cakeid'=> $_GET['id']
//                 );
//                 $_SESSION['cart'][$count]=$item_array;
//             }
//         }
        
//     }
    
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 20px;
    }
    
    body{
        background-image:url(https://techandall.com/wp-content/uploads/2013/10/techandall_wallpaper_1.jpg);
        background-repeat: no-repeat;
        background-size:cover;
    }
  </style>
</head>
<body>
    <nav class="nav-wrapper transparent darken-4">
        <div class="container">
            <p href="#" class="brand-logo black-text">Shopping Cart</p>
            
                <ul class="right hide-on-med-and-down">
                    <li ><a href="cart.php" class="tooltipped lighten-2 waves-effect waves-light black-text" data-tooltip="My Cart" ><i class="material-icons">shopping_cart</i></a></li>
                    <li ><a href="home.php" class="lighten-2 waves-effect waves-light black-text">Home</a></li>
                    <?php
                    if(isset($_SESSION['cart'])){
                        $count=count($_SESSION['cart']);
                        echo '<li style="margin-left:-8vw;margin-top:0.4vw"><span class="badge white-text transparent">'.$count.'</span></li>';
                    }else{
                        echo '<li style="margin-left:-8vw;margin-top:0.5vw"><span class="badge white-text transparent">0</span></li>';
                    }
                    ?>
                </ul>
                <!-- <span class="badge white-text pink">3</span> -->
    </nav>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>
                    <?php
                    
                    if(isset($_SESSION['cart'])){
                        $isempty=0;
                        $cakeid=array_column($_SESSION['cart'],"cakeid");
                        $conn = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);

                        $res=$conn->query("select * from cakestock");
                        while($row=$res->fetch_object()){
                            foreach($cakeid as $id){
                                if($row->cakeid==$id){   ?>
                                    <form action="cart.php?action=remove&id=<?php echo $id;?>" method="post" class="cart-items">
                                        <div class="border rounded">
                                            <div class="row bg-white">
                                                <div class="col-md-4">
                                                    <img src="<?php echo $row->image?>" style="width:240px;height:240px"alt="Image1" class="img-fluid">
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="pt2"><?php echo $row->name;?></h5>
                                                    <small class="text-secondary">Seller:abc</small>
                                                    <h5 class="pt-2"><?php echo $row->price;?></h5>
                                                    <button type="submit" class="btn btn-warning">Save for Later</button>
                                                    <button type="submit" class="btn btn-danger mx3" name="remove" onclick="alert('Product has been Removed...!')">Remove</button>
                                                </div>
                                                <div class="col-md-3 py5">
                                                    <!-- <div>
                                                        <button type="submit" name="plus" class="btn border rounded-circle">plus</button>
                                                        <input type="text" value="1" class="form-control w-25 d-inline">
                                                        <button type="submit" name="minus" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </form><?php 
                                    $total=$total+(int)$row->price;
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5";
                        $isempty=1;
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-5 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if(isset($_SESSION['cart'])){
                                $count=count($_SESSION['cart']);
                                echo "<h6>Price($count items)</h6";
                            }else{
                                echo "<h6>Price(0 items)</h6";
                            }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>Rs<?php echo $total;?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>Rs<?php
                                echo $total;
                                $_SESSION['total']=$total;
                            ?></h6>
                        </div>
                        <?php if($isempty==0 && $total!=0){
                        echo "
                        <form action='checkout.php' method='POST'>
                            <div class='container' style='padding-left: 23vw;padding-top: 10vw'>
                            <button class='btn transparent waves-effect waves-light black-text'  name='place' type='submit' style='border-radius: 10%;margin-left:-0.8vw'>Place Order</button>
                            </div>
                        </form>";
        }?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
                $('.materialboxed').materialbox();
                $('.tabs').tabs();
                $('.tooltipped').tooltip();
                $('.scrollspy').scrollSpy();
                $('.dropdown-trigger').dropdown();
            });
    
        </script>
</body>
</html>
<?php

?>



