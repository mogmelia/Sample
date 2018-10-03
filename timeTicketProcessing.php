<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully. <br>";

$empid = $_POST['Employee'];
$aid = $_POST['Activity'];
$hours = $_POST['Hours'];
$day = $_POST['Day'];

// Get employee name matching ID from database
$nameAssertSQL = "SELECT * FROM Employees 
		  WHERE eID = '$_POST[Employee]'";
$nameAssertResult = mysqli_query($conn, $nameAssertSQL);
$row = $nameAssertResult->fetch_assoc();
$empname = $row['Name'];

mysqli_query($conn,"INSERT INTO TimeTickets (eID, aID, Hours, Day)
		    VALUES ('$empid', '$aid', '$hours', '$day')");
echo "Time charge successful for $empname on activity #$aid.<br>";
echo "Hours: $hours<br>";
echo "Date: $day";

$conn->close();
?> 