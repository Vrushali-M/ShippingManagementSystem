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
      
      $from = mysqli_real_escape_string($conn,$_POST['from']);
      $to = mysqli_real_escape_string($conn,$_POST['to']); 
      $startdate = mysqli_real_escape_string($conn,$_POST['startdate']);
     $enddate = mysqli_real_escape_string($conn,$_POST['enddate']); 



      $sql="call showschedule('$from','$to','$startdate','$enddate')";
      
      $result = $conn->query($sql); 
   echo '<link rel="stylesheet" type="text/css" href="style.css"></head>';
   
   
if ($result->num_rows > 0) {
  echo '<div>';
  echo '<h1>Schedule</h1>';
    echo "<table><tr><th>Schedule ID</th><th>Vessel Name</th><th>Departing Date</th><th>Departing Time</th><th>Arriving Date</th><th>Arriving Time</th><th>Available Capacity</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["schedule_id"]."</td><td>".$row["vessel_name"]."</td><td>".$row["departing_date"]."</td><td>".$row["departing_time"]."</td><td>".$row["arriving_date"]."</td><td>".$row["arriving_time"]."</td><td>".$row["available_capacity"]."</td></tr>";
    }
    echo "</table>";
    echo'<div>';
} else {
    echo "0 results";
}
      
}		
     
?>