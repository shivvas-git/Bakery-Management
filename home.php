
<?php

session_start();
if(!isset($_SESSION['user'])){
    header("location:login.html");
}

$conn = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);
$personid=$_SESSION['user'];
$res=$conn->query("select name from person where pid='$personid'"); 
$row=$res->fetch_object();
$_SESSION['username']=$row->name;
$conn->close();

if(isset($_POST['pay'])){
    $db = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);
     $cakeid=$_POST['pay'];
        $q="UPDATE cakestock SET quantity=quantity-1 WHERE cakeid='$cakeid' ";
        mysqli_query($db,$q);
    $que="SELECT * from cakestock WHERE cakeid='$cakeid' ";
    $res=mysqli_query($db,$que);
    $row=mysqli_fetch_assoc($res);
    //$res=$db->query("select * from cakestock where cakeid='$cakeid' ");
    $total=$row['price'];
    $pid=$_SESSION['user'];
    $status="In progress";
    $date=date("Y-m-d");
    $query="INSERT INTO _order (pid,ordramnt,status,orderdate,description) VALUES('$pid','$total','$status','$date','$cakeid')";
    mysqli_query($db,$query);
    echo "<script>alert('Order has been placed Successfully...!')</script>";
}

if (isset($_POST['asd'])) {
    //print_r($_POST['cakeid']);
    if(isset($_SESSION['cart'])){
        $item_array_id=array_column($_SESSION['cart'],"cakeid");
        //print_r($item_array_id);

        if(in_array($_POST['cakeid'],$item_array_id)){
            echo"<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'home.php'</script>";
        }else{
            $count=count($_SESSION['cart']);
            $item_array=array(
                'cakeid'=> $_POST['cakeid']
            );
            $_SESSION['cart'][$count]=$item_array;
            //print_r($_SESSION['cart']);
        }
    
    }else{
        $item_array=array(
            'cakeid'=> $_POST['cakeid']
        );

    //create new session variable
    $_SESSION['cart'][0]=$item_array;
    //print_r($_SESSION['cart']);
    }
}
?>

<html lang="en">
<head>
  <title>online cake shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      position: fixed;
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
    #myInput {
    margin-top: -5px;
    border: 0;
    border-radius: 0;
    background: #f1f1f1;
    }
    body{
        background-image:url(https://techandall.com/wp-content/uploads/2013/10/techandall_wallpaper_1.jpg);
        background-repeat: no-repeat;
        background-size:cover;
}
  </style>
</head>
<body >
<nav class="nav-wrapper transparent darken-4">
        <div class="container">
            <p href="#" class="brand-logo black-text">Hello <?php echo  $_SESSION['username']; ?>!</p>
            <a href="#" class="sidenav-trigger" data-target="abcd">
                <i class="material-icons">menu</i>
            </a>
                <ul class="right hide-on-med-and-down">
                <li>
                    <a class='dropdown-trigger black-text' href='#' data-target='dropdown1'>MyAccount</a>
                            <ul id='dropdown1' class='dropdown-content'>
                                <li><a href="changepswd.php">Change Password</a></li>
                                <li><a href="prevord.php">Previous Orders</a></li>
                            </ul>
                    </li>
                    <li><a href="#about" class="lighten-2 waves-effect waves-light black-text">About</a></li>
                    <li><a href="#contact" class="lighten-2 waves-effect waves-light black-text">Contact</a></li>
                    <li ><a href="cart.php" class="tooltipped lighten-2 waves-effect waves-light black-text" data-tooltip="My Cart" ><i class="material-icons">shopping_cart</i></a></li>
                    <?php
                    if(isset($_SESSION['cart'])){
                        $count=count($_SESSION['cart']);
                        echo '<li style="margin-left:-3vw;margin-top:0.5vw"><span class="badge white-text transparent">'.$count.'</span></li>';
                    }else{
                        echo '<li style="margin-left:-3vw;margin-top:0.5vw"><span class="badge white-text transparent">0</span></li>';
                    }
                    ?>
                    
                    <li style="margin-left:-1vw"><a href="logout.php" class="tooltipped btn transparent darken-4 z-depth-3 red-text" data-tooltip="logout">
                        <i class="material-icons">power_settings_new</i>
                    </a></li>
                </ul>
                <!-- <span class="badge white-text pink">3</span> -->
    </nav>
    <ul class="sidenav" id="abcd">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>    
    </ul>
    <div class="container">
  <h2>Find Eatables</h2>
  <p>We have variety of items available with reasonable prices.</p>
  <p>find it here.</p>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Category
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <form action='home.php' method='POST' style="margin-bottom:-1vw;">
    <input class="form-control center"  id="myInput" type='text' placeholder="Search..." style="margin-bottom:0vw;">
      <!-- <input class="form-control" id="myInput"> -->
      <li><button class="btn grey darken-3" name='itemid' value='1' style="width:190px">cakes</button></li>
      <li><button class="btn grey darken-3" name='itemid' value='2' style="width:190px">cupcakes</button></li>
      <li><button class="btn grey darken-3" name='itemid' value='3' style="width:190px">pastry</button></li>
      <li><button class="btn grey darken-3" name='itemid' value='4' style="width:190px">jar desserts</button></li>
      <li><button class="btn grey darken-3" name='itemid' value='5' style="width:190px">cookies</button></li>
      <li><button class="btn grey darken-3" name='itemid' value='6' style="width:190px">doughnuts</button></li>
    </form>
    </ul>
  </div>
</div>
<?php
$count=1;
$conn = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);

$res=$conn->query("select * from cakestock");


while($row=$res->fetch_object()){
    if((isset($_POST['itemid']) && $row->itemid == $_POST['itemid']) || (!isset($_POST['itemid']) && $row->itemid==1)){
    $_SESSION['cake']=$row->cakeid;
    if($count==1){
        echo "<div class='container' style='padding-top:3vw'>   
        <div class='row'> ";
        //$count=0;
    }
    if($count==4){
        echo "<div class='container' style='padding-top:3vw;'>   
        <div class='row'> ";
        $count=1;
    }
    //$_SESSION[$row->cakeid]=$row->cakeid;
    echo "
    <div class='col-sm-4'>
    <div class='card' style='margin-bottom:0vw;background-color:transparent'>
    <div class='card-image'><img src='".$row->image."' alt=''  height='270'>
    <form action='checkout.php' method='POST'>
                        <input type='hidden' name='cid' value='$row->cakeid'>
                        <button class='tooltipped halfway-fab btn-floating grey darken-3  pulse left' data-tooltip='Buy Now' name='buy' type='submit'><i class='material-icons'>input</i></button>
                    </form>
                    
                      <form action='home.php' method='POST'>
                          <input type='hidden' name='cakeid' value='$row->cakeid'>
                          <button class='tooltipped halfway-fab btn-floating grey darken-3 pulse' data-tooltip='Add to Cart' name='asd' type='submit'><i class='material-icons'>add_shopping_cart</i></button>
                      </form>
                    
              </div> 
              <div class='card-content'>
              ";
              echo 'customer reviews:-';
              ?><br><?php
              $fd=$conn->query("select o.orderid,o.description,f.message from _order o,feed f where o.orderid=f.oid");
              while($rw=$fd->fetch_object())
              {
                  if(($rw->description)==($row->cakeid))
                  {

                      echo $rw->message;
                      ?><br><?php
                      
                  }
              }echo"
                  <span class='card-title'>".$row->name."</span>
                  <h6>Price:".$row->price."</h6>
              </div>
              </div>
  </div> 
  ";
  $count++;
  if($count==4){
      echo "</div>
      </div><br>";
  }
}
}
if($count!=4){
    echo "</div>
    </div><br>";
}
?>


<div class="container scrollSpy" id="contact">
        <div class="row">
                <div class="col s12 l4 pull-l2">
                        <h2 class="indigo-text text-darken-4">Get In Touch</h2>
                        <p>What I would like to do is make sure that if you are 
                            develop most promising avenues to spend 
                            your time pursuing</p>
                            <p>What I would like to do is make sure that if you are 
                            develop most promising avenues to spend 
                            your time pursuing</p>
                    </div>
            <div class="col s12 l4 right push-l1">
                <h3>Contact Us</h3>
            <ul class="collection with-header">
            
            <li class="collection-item avatar transparent">
                <i class="material-icons circle grey darken-3">person</i>
                <span class="title">Dora</span>
                <p>9870733636</p>
                <a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJTLpccCWRpSsrGWSXTdHWhVHfcLWcCXptFgfcfCZGjVWTmmTDgvMZxFctCktbsdGqQpDGV" target="_blank" class="secondary-content">
                    <i class="material-icons grey-text text-darken-3 right">email</i>
                </a>
            </li>

        
            <li class="collection-item avatar transparent">
                <i class="material-icons circle grey darken-3">person</i>
                <span class="title">samik</span>
                <p>8059112425</p>
                <a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSDZqdFnpgvWqKzWrghjznMnJqnfNMCNrxqhmdnxhWRgZjgmxXnKpTdRHqQqJBXBThSppBCR" target="_blank" class="secondary-content">
                    <i class="material-icons grey-text text-darken-3 right">email</i>
                </a>
            </li>
            </ul>
        </div>
        
    <div class="col s12 l4 pull-l1">
        <form action="help.php" method="POST">
            
            <div class="input-field">
                <i class="material-icons prefix">email</i>
                <input type="email" name="email" id="email">
                <label for="email">Your Email</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">message</i>
                <textarea id="message" name="message" class="materialize-textarea"></textarea>
                <label for="message">Your Message</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">date_range</i>
                <input type="text" name="date_" id="date" class="datepicker">
                <label for="date">choose a date you need us for</label>
            </div>
            <div class="input-field">
                <p>Services required...</p>
                <p>
                    <label>
                        <input type="checkbox" name="boxes[]" value="for wedding">
                        <span>cake stall in wedding </span>
                    </label>
                </p>
                <p>
                    <label>
                        <input type="checkbox" name="boxes[]" value="for event">
                        <span>cake stall in event</span>
                    </label>
                </p>
            </div>
            <div class="input-field center">
                <button class="btn" name="home" type="submit">submit</button>
            </div>
        </form>
    </div>
</div>
    </div>


<footer class="page-footer transparent darken-3 scrollSpy" id="about">
        <div class="container">
            <div class="row">
            <div class="col s12 l4 pull-l2 black-text">
                <h5>About Us</h5>
                <p>What I would like to do is make sure that if you are 
                    develop most promising avenues to spend 
                    your time pursuing</p>
            </div>
            <div class="col s12 l4 offset-l4 push-l2 black-text">
                <h5>   ---Connect With Us---</h5>
                <div class="nav-wrapper transparent" style="padding-left: 3vw;">

                        <a href="https://www.facebook.com/shivanshu.gupta.9275" target="_blank" class="tooltipped btn-floating btn-small transparent darken-4" data-tooltip="This is Facebook">
                            <i class="fa fa-facebook black-text"> </i>
                            </a>
                        
                        <a href="https://www.instagram.com/shivanshu_vaslas/" target="_blank" class="tooltipped btn-floating btn-small transparent darken-4" data-tooltip="This is Instagram">
                            <i class="fa fa-instagram black-text"></i>
                            </a>
                    
                        <a href="https://twitter.com/samik_mehta" target="_blank" class="tooltipped btn-floating btn-small transparent darken-4" data-tooltip="This is Twitter">
                            <i class="fa fa-twitter black-text"></i>
                            </a>
                    
                        <a href="https://www.linkedin.com/in/dipesh-garg-16b442191/" target="_blank" class="tooltipped btn-floating btn-small transparent darken-4" data-tooltip="This is Linkedin">
                            <i class="fa fa-linkedin black-text"></i>
                            </a>
                    
            </div>
            
            </div>
        </div>
        </div>
        <div class="footer-copyright grey darken-4">
            <div class="container center-align">
                &copy; 2019 Samik-Shivanshu
            </div> 
        </div>
    </footer>
    


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
                $("#myInput").on("keyup", function() {
                 var value = $(this).val().toLowerCase();
                 $(".dropdown-menu li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
            function myFunction() {
              alert("Successfully logged in");  
            }
    
          </script>
</body>
</html>
