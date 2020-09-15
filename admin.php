<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("location:Adlogin.php");
}
?>



<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cake shop Project</title>
    <style>
        nav .badge{
            position: relative;
            top: 20px;
            right: 20px;
        }
    section{
        padding-top: 5vw;
        padding-bottom: 5vw;
    }



.zoom {
  padding-bottom: 10px;
  background-color: green;
  transition: transform .2s;
  max-height: 50px;
  width: 250px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5);
  transform: scale(1.3); 
}
    </style>
</head>
<body>
    <div class="row">
        <div class="col s12 l4">
<h5>Admin <?php echo $_SESSION['admin'];?></h>
</div>
<div class="col s12 l8">
<div class="container right" style="padding-right:2vw;padding-top:1vw">
    <a href="logout.php" class="btn lighten-2 waves-effect waves-light grey darken-3 right"><i class="material-icons right">power_settings_new</i>logout</a>
</div>
</div>
</div>
<div class="row" style="padding-top:5vw">
    <div class="col s12 l5">
    
    <div  class="container left" style="padding-left:5vw;padding-bottom:1vw">
    <a href="showorders.php" class=" zoom btn lighten-2 waves-effect waves-light grey darken-3 right">show orders</a>
    </div>
    
    <div class="container left" style="padding-left:5vw;padding-bottom:1vw">
    <a href="queries.php" class="zoom btn lighten-2 waves-effect waves-light grey darken-3 right">show queries</a>
    </div>
    
    <div class="container left" style="padding-left:5vw;padding-bottom:1vw">
    <a href="customers.php" class="zoom btn lighten-2 waves-effect waves-light grey darken-3 right">show customers</a>
    </div>
    
    <div class="container left" style="padding-left:5vw;padding-bottom:1vw">
    <a href="cakes.php" class="zoom btn lighten-2 waves-effect waves-light grey darken-3 right">Add or remove items</a>
    </div>
    </div>

</div>

    
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
            $(document).ready(function(){
                $('.sidenav').sidenav()
                $('.materialboxed').materialbox();
                $('.tabs').tabs();
                $('.tooltipped').tooltip();
                $('.scrollspy').scrollSpy();
                $('.modal').modal();
            });
          </script>

</body>
</html>