<?php
    ob_start();

/*

NEW.PHP

Allows user to create a new entry in the database

*/

// creates the new record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($date, $distributor, $district, $phone_number_from_range, $phone_number_to_range, $IMSI_from_range, $IMSI_to_range, $sim_quantity, $sim_remarks, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

		<title>New Record</title>

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

	<div>


			<strong>distributor: *</strong><?php echo $distributor; ?><b/>
		    
			<select name="distributor">
		    <option selected="selected" value="">select distributor</option>
		    <?php 
		   
		        $query = "SELECT * FROM distributor";

		        $result = mysql_query($query);
		  

			    if ($result) {
			      while($row = mysql_fetch_array($result)) {
					// do something with the $row
			        
			      	if ($distributor == $row['id']){

			      		echo '<option selected="selected" value="'.$row['id'].'">"'.$row['distributor'].'"</option>';
			      		// echo '<option selected="selected" value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
			      		


			      	}else{

			      		echo '<option value="'.$row['id'].'">"'.$row['distributor'].'"</option>';
			      		// echo '<option value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
			      		

			      	}

			      }

			    }
			    else {
			      echo mysql_error();
			    }
		    ?>
		    
		    
		    </select>

		    <br>

		    <strong>district: *</strong><?php echo $district; ?><b/>
		    
			<select name="district">
		    <option selected="selected" value="">Select district</option>
		    <?php 
		   
		        $query = "SELECT * FROM district";

		        $result = mysql_query($query);
		  

			    if ($result) {
			      while($row = mysql_fetch_array($result)) {
					// do something with the $row
			        
			      	if ($district == $row['id']){

			      		echo '<option selected="selected" value="'.$row['id'].'">"'.$row['district'].'"</option>';
			      		// echo '<option selected="selected" value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
			      		


			      	}else{

			      		echo '<option value="'.$row['id'].'">"'.$row['district'].'"</option>';
			      		// echo '<option value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
			      		

			      	}

			      }

			    }
			    else {
			      echo mysql_error();
			    }
		    ?>
		    
		    
		    </select>


			<br>
			<strong>date: *</strong> <input type="text" name="date" value="<?php echo $date; ?>" /><br/>

			<strong>phone_number_from_range: *</strong> <input type="text" name="phone_number_from_range" value="<?php echo $phone_number_from_range; ?>" /><br/>
			<strong>phone_number_to_range: *</strong> <input type="text" name="phone_number_to_range" value="<?php echo $phone_number_to_range; ?>" /><br/>
			<strong>IMSI_from_range: *</strong> <input type="text" name="IMSI_from_range" value="<?php echo $IMSI_from_range; ?>" /><br/>
			<strong>IMSI_to_range: *</strong> <input type="text" name="IMSI_to_range" value="<?php echo $serial_number_to_range; ?>" /><br/>
			<strong>sim_quantity: *</strong> <input type="text" name="sim_quantity" value="<?php echo $SIM_quantity; ?>" /><br/>
			<strong>sim_remarks: *</strong> <input type="text" name="sim_remarks" value="<?php echo $sim_remarks; ?>" /><br/>

			<input type="submit" name="submit" value="Submit">


	</div>

	</form>  

</body>

</html>

<?php

}
// connect to the database

include('../connect_db.php');
// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

		{

		// get form data, making sure it is valid

			$date = mysql_real_escape_string(htmlspecialchars($_POST['date']));
			$distributor = mysql_real_escape_string(htmlspecialchars($_POST['distributor']));
			$district = mysql_real_escape_string(htmlspecialchars($_POST['district']));
			$phone_number_from_range = mysql_real_escape_string(htmlspecialchars($_POST['phone_number_from_range']));
			$phone_number_to_range = mysql_real_escape_string(htmlspecialchars($_POST['phone_number_to_range']));
			$IMSI_from_range = mysql_real_escape_string(htmlspecialchars($_POST['IMSI_from_range']));
			$IMSI_to_range = mysql_real_escape_string(htmlspecialchars($_POST['IMSI_to_range']));
			$sim_quantity = mysql_real_escape_string(htmlspecialchars($_POST['sim_quantity']));
			$sim_remarks = mysql_real_escape_string(htmlspecialchars($_POST['sim_remarks']));
			

		// check to make sure both fields are entered

if ($date == '' || $distributor == '' || $district == '' || $phone_number_from_range == '' || $phone_number_to_range == '' || $IMSI_from_range == '' || $IMSI_to_range == '' || $sim_quantity == '' || $sim_remarks == '')

		{
		// generate error message

			$error = 'ERROR: Please fill in all required fields!';

		// if either field is blank, display the form again

			renderForm($date, $distributor, $district, $phone_number_from_range, $phone_number_to_range, $IMSI_from_range, $IMSI_to_range, $sim_quantity, $sim_remarks, $error);

		}

else

		{

			// save the data to the database

			mysql_query("INSERT sim_details SET date='$date', distributor='$distributor', district='$district', phone_number_from_range='$phone_number_from_range', phone_number_to_range='$phone_number_to_range', IMSI_from_range='$IMSI_from_range', IMSI_to_range='$IMSI_to_range', sim_quantity='$sim_quantity', sim_remarks='$sim_remarks'")

			or die(mysql_error());

			// once saved, redirect back to the view page
			echo "distributor details entered successfully";

			header('Location: sim_details_form.php');

		}

        }

else
		// if the form hasn't been submitted, display the form

		{

			renderForm('','','','','','','','');

		}

?>