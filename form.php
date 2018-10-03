<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Get the names and IDs of employees
$namesQuery = "SELECT eID, Name FROM Employees 
		WHERE Active = 1
		ORDER BY Name";
$namesResult = mysqli_query($conn, $namesQuery);

// Get the names and IDs of jobs
$jobsQuery = "SELECT jID, Name FROM Jobs
		ORDER BY Name";
$jobsResult = mysqli_query($conn, $jobsQuery);

// Get the names and IDs of jobs and activities
$actisQuery = "SELECT j.Name, a.aID, a.Nickname FROM Jobs j, Activities a
		WHERE j.jID = a.jID";
$actisResult = mysqli_query($conn, $actisQuery); 
?>
<form action="activityFormProcessing.php" method="post">
	<h3>Activity Form<br>
	<table>
		<tr>
			<td>ID#:</td>
			<td><input type="number" name="ID"></td>
		</tr>
		<tr>
			<td>Job:</td>
			<td><select name="Job">
			<?php while ($row = $jobsResult->fetch_assoc()) {
				echo "\t\t\t<option value=\"$row[jID]\">$row[Name]</option>\n\t";
			} ?>
		</select></td>
		</tr>
		<tr>
			<td>Quantity:</td>
			<td><input type="number" name="Qty" value="0" min="0" max="9999"></td>
		</tr>
		<tr>
			<td>Date:</td>
			<td><input type="date" name="Day" value="<?php echo date('Y-m-d');?>"></td>
		</tr>
		<tr>
			<td>Nickname:</td>
			<td><input type="text" name="Nickname"></td>
		</tr>
	</table>
	<input type="submit" value="Submit">
	</h3>
</form>
<form action="timeTicketProcessing.php" method="post">
	<h3>Time Ticket Form<br>
	<table>
		<tr>
			<td>Name:</td>
			<td><select name="Employee">
			<?php while ($row = $namesResult->fetch_assoc()) {
				echo "\t\t\t<option value=\"$row[eID]\">$row[Name]</option>\n\t";
			} ?>
		</select></td>
		</tr>
		<tr>
			<td>Activity #:</td>
			<td><select name="Activity">
			<?php while ($row = $actisResult->fetch_assoc()) {
				echo "\t\t\t<option value=\"$row[aID]\">$row[aID] ($row[Name]";
				if (empty($row['Nickname']) === false) {
					echo ", \"$row[Nickname]\"";
				} else {
					echo ", unnamed";
				}
				echo ")</option>\n\t";
			} ?>
		</select></td>
		</tr>
		<tr>
			<td>Hours:</td>
			<td><input type="number" name="Hours" value="0" min="0" max="9999"></td>
		</tr>
		<tr>
			<td>Date:</td>
			<td><input type="date" name="Day" value="<?php echo date('Y-m-d');?>"></td>
		</tr>
	</table>
	<input type="submit" value="Submit">
	</h3>
</form>
<?php
$conn->close();
?>
</body>
</html>