<?php
    include("../connect_db.php");
?>
<html>
	<body>
	    <table>
	    	
	    	<?php
	    	    $query = "SELECT * FROM sim_details";

		        $result = mysql_query($query);
		  

			    if ($result) {

			        while($row = mysql_fetch_array($result)) {
	    	             echo '<tr>';
	    	             echo '<td>'. $row['date'].'</td>';
	    	             echo '<td>'. $row['distributor'].'</td>';
	    	             echo '<td>'. $row['district'].'</td>';
	    	             echo '<td>'. $row['phone_number_from_range'].'</td>';
	    	             echo '<td>'. $row['phone_number_to_range'].'</td>';
	    	             echo '<td>'. $row['IMSI_from_range'].'</td>';
	    	             echo '<td>'. $row['IMSI_to_range'].'</td>';
	    	             echo '<td>'. $row['sim_quantity'].'</td>';
	    	             echo '<td>'. $row['sim_remarks'].'</td>';
	    	             echo '</tr>';

	    	        }
	    	    }   
	    	?>
	    		
	    </table>
	</body>

</html>    