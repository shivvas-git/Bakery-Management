<!DOCTYPE html>
<html>
<head>
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
</style>
</head>
<body>

<table id="customers">
  <tr>
  <th>personid</th>  
    <th>name</th>
    <th>email</th>
    <th>quantity</th>
  </tr>
  <?php
  $conn = new mysqli("localhost","root", "", "cakeshoppe") or die($conn);

  $sql="select DISTINCT p.pid as personid,name,email,(SELECT count(*) from _order q WHERE q.pid=p.pid) as quantity from person p,_order o where p.pid=o.pid";
  $result=$conn->query($sql);
  if($result->num_rows >0){
      while($row=$result->fetch_assoc()){
          echo "<tr><td>". $row['personid'] ."</td><td>". $row['name'] ."</td><td>". $row['email'] ."</td><td>". $row['quantity'] ."</td></tr>";
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
