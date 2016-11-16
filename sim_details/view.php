<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>View Records</title>

</head>

<body>

<?php

/*

VIEW.PHP

Displays all data from 'distributor' table

*/



// connect to the database

include('connect-db.php');



// get results from database

$result = mysql_query("SELECT * FROM sim_details")

or die(mysql_error());



	// display data in table

	echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";



	echo "<table border='1' cellpadding='10'>";

	echo "<tr> <th>id</th> <th>distributor</th> <th>phone_number_from_range</th> <th>phone_number_to_range</th> <th>serial_number_from_range</th> <th>serial_number_to_range</th> <th>date</th> <th></th> <th></th></tr>";



// loop through results of database query, displaying them in the table

while($row = mysql_fetch_array( $result )) {



	// echo out the contents of each row into a table

	echo "<tr>";

	echo '<td>' . $row['id'] . '</td>';

	echo '<td>' . $row['distributor'] . '</td>';

	echo '<td>' . $row['phone_number_from_range'] . '</td>';

	echo '<td>' . $row['phone_number_to_range'] . '</td>';

	echo '<td>' . $row['serial_number_from_range'] . '</td>';

	echo '<td>' . $row['serial_number_to_range'] . '</td>';

	echo '<td>' . $row['date'] . '</td>';

	echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';

	echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';

	echo "</tr>";

}



// close table>

echo "</table>";

?>

<p><a href="new.php">Add a new record</a></p>



</body>

</html>