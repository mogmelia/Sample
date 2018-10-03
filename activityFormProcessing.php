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

$aid = $_POST['ID'];
$jobid = $_POST['Job'];
$qty = $_POST['Qty'];
$day = $_POST['Day'];
$nick = $_POST['Nickname'];

// Assert that the specified job exists in the database
$jobAssertSQL = "SELECT * FROM Jobs 
		  WHERE jID = '$jobid'";
$jobAssertResult = mysqli_query($conn, $jobAssertSQL);

// Assert that the activity ID does not already exist in the database
$aidAssertSQL = "SELECT * FROM Activities 
		  WHERE aID = '$aid'";
$aidAssertResult = mysqli_query($conn, $aidAssertSQL);

if (empty($aid) === false) {
	if ($jobAssertResult->num_rows > 0) {
		$row = $jobAssertResult->fetch_assoc();
		if ($aidAssertResult->num_rows == 0) {
			if (empty($nick)) {
				mysqli_query($conn,"INSERT INTO Activities (aID, jID, Quantity, Day)
					    VALUES ('$aid', '$jobid', '$qty', '$day')");
				echo "New activity added for $row[Name] on $day.<br>";
			} else {
				mysqli_query($conn,"INSERT INTO Activities (aID, jID, Quantity, Day, Nickname)
					    VALUES ('$aid', '$jobid', '$qty', '$day', '$nick')");
				echo "New activity added for $row[Name] on $day with nickname \"$nick\".<br>";
			}
		} else {
			echo "Activity ID#$aid already exists in the database.<br>";
		}
	} else {
		echo "The entered job was not found in database.<br>";
	}
} else {
	echo "You must enter a valid ID for the activity.<br>";
}
echo "Activity ID#: $aid<br>";
echo "Job ID#: $jobid<br>";
echo "Quantity: $qty<br>";
$conn->close();
?> 