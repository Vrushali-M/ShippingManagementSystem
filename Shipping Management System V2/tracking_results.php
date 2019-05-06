<?php
$servername = "dbprojectteam7.ci4s4nk57ha9.us-east-2.rds.amazonaws.com";
$username = "DBProject2018";
$password = "ABC123abc";
$dbname = "shipping_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

   if($_SERVER["REQUEST_METHOD"] == "POST") {


   $order_id = mysqli_real_escape_string($conn,$_POST['order_id']);

   $sql="call order_tracker('$order_id')";
      echo '<link rel="stylesheet" type="text/css" href="style.css"></head>';

   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
     echo '<div>';
     echo '<h1>Order Status</h1>';
       echo "<table><tr><th>order_id</th><th>order_capacity</th><th>order_value</th><th>shipping_address_line_1</th><th>shipping_address_line_2</th><th>shipping_city</th><th>shipping_state</th><th>shipping_country</th><th>shipping_zip_code</th><th>order_status</th></tr>";
       // output data of each row
       while($row = $result->fetch_assoc()) {
           echo "<tr><td>".$row["order_id"]."</td><td>".$row["order_capacity"]."</td><td>".$row["order_value"]."</td><td>".$row["shipping_address_line_1"]."</td><td>".$row["shipping_address_line_2"]."</td><td>".$row["shipping_city"]."</td><td>".$row["shipping_state"]."</td><td>".$row["shipping_country"]."</td><td>".$row["shipping_zip_code"]."</td><td>".$row["order_status"]."</td></tr>";
       }
       echo "</table>";
       echo'<div>';
   } else {
       echo "0 results";
   }

   }

   ?>
