<?php

/*

EDIT.PHP

Allows user to edit specific entry in database

*/

// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($id, $date, $distributor, $phone_number_from_range, $phone_number_to_range, $IMSI_from_range, $IMSI_to_range, $sim_quantity, $sim_remarks, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

	<title>Edit Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

	{

		echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

	}

?>



	<form action="" method="post">

	<input type="hidden" name="id" value="<?php echo $id; ?>"/>

	<div>

		<p><strong>id:</strong> <?php echo $id; ?></p>

		<strong>date: *</strong> <input type="text" name="date" value="<?php echo $date; ?>"/><br/>
		<strong>distributor: *</strong> <input type="text" name="distributor" value="<?php echo $distributor; ?>"/><br/>
		<strong>phone_number_from_range: *</strong> <input type="text" name="phone_number_from_range" value="<?php echo $phone_number_from_range; ?>"/><br/>
		<strong>phone_number_to_range: *</strong> <input type="text" name="phone_number_to_range" value="<?php echo $phone_number_to_range; ?>"/><br/>
		<strong>IMSI_from_range: *</strong> <input type="text" name="IMSI_from_range" value="<?php echo $IMSI_from_range; ?>"/><br/>
		<strong>IMSI_to_range: *</strong> <input type="text" name="IMSI_to_range" value="<?php echo $IMSI_from_range; ?>"/><br/>
		<strong>sim_quantity: *</strong> <input type="text" name="sim_quantity" value="<?php echo $dsim_quantity; ?>"/><br/>
		<strong>sim_remarks: *</strong> <input type="text" name="sim_remarks" value="<?php echo $sim_remarks; ?>"/><br/>

		<p>* Required</p>

		<input type="submit" name="submit" value="Submit">

	</div>

</form>

</body>

</html>

<?php

}
// connect to the database

include("../connect_db.php");

// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

	{	

	// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['id']))

	{

	// get form data, making sure it is valid

		$id = $_POST['id'];

		$date = mysql_real_escape_string(htmlspecialchars($_POST['date']));
		$distributor = mysql_real_escape_string(htmlspecialchars($_POST['distributor']));
		$phone_number_from_range = mysql_real_escape_string(htmlspecialchars($_POST['phone_number_from_range']));
		$phone_number_to_range = mysql_real_escape_string(htmlspecialchars($_POST['phone_number_to_range']));
		$IMSI_from_range = mysql_real_escape_string(htmlspecialchars($_POST['IMSI_from_range']))
		$IMSI_to_range = mysql_real_escape_string(htmlspecialchars($_POST['IMSI_to_range']));
		$sim_quantity = mysql_real_escape_string(htmlspecialchars($_POST['sim_quantity']));
		$sim_remarks = mysql_real_escape_string(htmlspecialchars($_POST['sim_remarks']));	 

// check that distributor/lastname fields are both filled in

if ($id == '' || $date == '' || $distributor == '' || $phone_number_from_range == '' || $phone_number_to_range == '' || $IMSI_from_range == '' || $IMSI_to_range == '' || $sim_quantity == '' $sim_remarks == '')

	{

		// generate error message

		$error = 'ERROR: Please fill in all required fields!';

		//error, display form

		renderForm($id, $date, $distributor, $phone_number_from_range, $phone_number_to_range, $IMSI_from_range, $IMSI_to_range, $sim_quantity, $sim_remarks, $error);

	}

else

	{	

		// save the data to the database

		mysql_query("UPDATE sim_details SET id='$id' date='$date', distributor='$distributor', phone_number_from_range='$phone_number_from_range' phone_number_to_range='$phone_number_to_range', serial_number_from_range='$serial_number_from_range' IMSI_to_range='$IMSI_to_range', sim_remarks='$sim_quantity' sim_remarks='$sim_remarks")
			or die(mysql_error());

		// once saved, redirect back to the view page

		header("Location: .php");

	}

	}

else

	{

		// if the 'id' isn't valid, display an error
		echo 'Error!';

	}

	}

else

// if the form hasn't been submitted, get the data from the db and display the form

	{

	// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

	{

	// query db

		$id = $_GET['id'];

		$result = mysql_query("SELECT * FROM sim_details")
		or die(mysql_error());

		$row = mysql_fetch_array($result);

// check that the 'id' matches up with a row in the databse

if($row)
 
	{

	// get data from db
		$id = $_GET['id'];
		$date = $row['date'];
	 	$distributor = $row['distributor'];
		$phone_number_from_range = $row['phone_number_from_range'];
		$phone_number_to_range = $row['phone_number_to_range'];
		$IMSI_from_range = $row['IMSI_from_range'];
		$IMSI_to_range = $row['IMSI_TO_range'];
		$sim_quantity = $row['sim_quantity'];
		$sim_remarks = $row['sim_remarks'];

	
	// show form

	renderForm($date, $distributor, $phone_number_from_range, $phone_number_to_range, $IMSI_from_range, $IMSI_to_range, $sim_quantity, $sim_remarks, '');

	}

else

	// if no match, display result

	{

	echo "No results!";

	}

	}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>  