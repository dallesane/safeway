<?php
    include("../connect_db.php");
?>
<html>
	<body>
	    <table>
	    	
	    	<?php
	    	    $query = "SELECT * FROM activate_no";

		        $result = mysql_query($query);
		  

			    if ($result) {

			        while($row = mysql_fetch_array($result)) {
	    	             echo '<tr>';
	    	             echo '<td>'. $row['id'].'</td>';
	    	             echo '<td>'. $row['phone_no'].'</td>';
	    	             echo '<td>'. $row['distributor'].'</td>';
	    	             echo '<td>'. $row['date'].'</td>';
	    	             echo '</tr>';

	    	        }
	    	    }   
	    	?>
	    		
	    </table>
	</body>

</html>    