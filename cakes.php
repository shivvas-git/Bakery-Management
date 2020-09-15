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
  <title>cakes</title>
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
  <th>ItemID</th>  
    <th>Name</th>
    <th>Price</th>
    <th>Quantity</th>
  </tr>
  <?php
  $conn = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);

  $sql="select distinct cakeid,name,price,quantity from cakestock";
  $result=$conn->query($sql);
  if($result->num_rows >0){
      while($row=$result->fetch_assoc()){
          echo "<tr><td>". $row['cakeid'] ."</td><td>". $row['name'] ."</td><td>". $row['price'] ."</td><td>". $row['quantity'] ."</td></tr>";
      }
  }
  else{
      echo "table is empty";
  }
  $conn->close();
  ?>
</table>
<br>
<header>
<section class="container">
            <div class="container">
                <div class="row">
                    <div class="col s12 l6 pull-l6" style="padding-top:0vw">
                    <h3>add item</h3>
                    <form action="updatecake.php" method="POST">
                            <div class="input-field">
                                <select class="browser-default" name="type">
                                <option value="" disabled selected>Select item type</option>
                                <option value="1">cake</option>
                                <option value="5">cookies</option>
                                <option value="2">cupcake</option>
                                <option value="3">pastry</option>
                                <option value="4">jar desserts</option>
                                <option value="6">doughnuts</option>
                                </select>
                                 <!-- <input type="text" name="status" id="status">
                                <label for="status" class="black-text">status</label> -->
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">reorder</i>
                                <input type="text" name="name" id="name" required>
                                <label for="name" class="black-text">name</label>
                            </div>
                            <div class="input-field" style="padding-top:1vw">
                                <i class="material-icons prefix">image</i>
                                <input type="file" name="image" id="image" required>
                                <label for="image" class="black-text"></label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">attach_money</i>
                                <input type="number" name="price" id="price" min="100" required>
                                <label for="price" class="black-text">price</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">equalizer</i>
                                <input type="number" name="quantity" id="quantity" min="1" required>
                                <label for="quantity" class="black-text">quantity</label>
                            </div>
                            <div class="input-field center white-text">
                                <button class="btn" name="add" type="submit">submit</button>
                                
                            </div>
                        </form>
                    </div>
                    <div class="col s12 l6 pull-l3" style="padding-top:0vw">
                    <h3>remove item</h3>
                    <form action="updatecake.php" method="POST">
                            <div class="input-field">
                                <i class="material-icons prefix">reorder</i>
                                <input type="text" name="cakeid" id="cakeid">
                                <label for="cakeid" class="black-text">itemid</label>
                            </div>
                            <div class="input-field center white-text">
                                <button class="btn" name="remove" type="submit">submit</button>
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
