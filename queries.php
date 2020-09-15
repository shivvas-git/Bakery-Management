<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
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
</style>
</head>
<body>

<table id="customers">
  <tr>
    <th>Message</th>
    <th>email</th>
    <th>date</th>
    <th>cake_stall</th>
  </tr>
  <?php
  $conn = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);

  $sql="select message,email,date,cake_stall from query";
  $result=$conn->query($sql);
  if($result->num_rows >0){
      while($row=$result->fetch_assoc()){
          echo "<tr><td>". $row['message'] ."</td><td>". $row['email'] ."</td><td>". $row['date'] ."</td><td>". $row['cake_stall'] ."</td></tr>";
      }
  }
  else{
      echo "table is empty";
  }
  $conn->close();
  ?>
</table>

</body>
</html>
