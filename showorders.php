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
  <title>Show Orders</title>
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
<a href="admin.php" class="center lighten-2 waves-effect waves-light black-text">admin</a>
<table id="customers">
  <tr>
  <th>OrderID</th>  
    <th>Name</th>
    <th>Order amount</th>
    <th>Status</th>
  </tr>
  <?php
  $conn = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);

  $sql="select distinct orderid,name,ordramnt,status from _order o,person p
        where p.pid=o.pid";
  $result=$conn->query($sql);
  if($result->num_rows >0){
      while($row=$result->fetch_assoc()){
          echo "<tr><td>". $row['orderid'] ."</td><td>". $row['name'] ."</td><td>". $row['ordramnt'] ."</td><td>". $row['status'] ."</td></tr>";
      }
  }
  else{
      echo "table is empty";
  }
  $conn->close();
  ?>
</table>
<header>
    <h3>change order status</h3>
<section class="container">
            <div class="container">
                <div class="row">
                    <div class="col s12 l6 pull-l6" style="padding-top:0vw">
                    <form action="updateord.php" method="POST">
                            <div class="input-field">
                                <i class="material-icons prefix">reorder</i>
                                <input type="text" name="orderid" id="orderid">
                                <label for="orderid" class="black-text">orderid</label>
                            </div>
                            <div class="input-field">
                                <select class="browser-default" name="select">
                                <option value="" disabled selected>Change Status</option>
                                <option value="In progress">In progress</option>
                                <option value="Out for delivery">out for delivery</option>
                                <option value="Delivered">Delivered</option>
                                </select>
                                 <!-- <input type="text" name="status" id="status">
                                <label for="status" class="black-text">status</label> -->
                            </div>
                            <div class="input-field center white-text">
                                <button class="btn" type="submit">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            </div>
        </header>
        
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
