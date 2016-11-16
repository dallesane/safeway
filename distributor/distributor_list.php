<?php
    include("../connect_db.php");
?>
<html>
	<body>
	    <table>
	    	
	    	<?php
	    	    $query = "SELECT * FROM distributor";

		        $result = mysql_query($query);
		  

			    if ($result) {

			        while($row = mysql_fetch_array($result)) {
	    	             echo '<tr>';
	    	             echo '<td>'. $row['id'].'</td>';
	    	             echo '<td>'. $row['distributor'].'</td>';
	    	             echo '<td>'. $row['district'].'</td>';
	    	             echo '</tr>';

	    	        }
	    	    }   
	    	?>
	    		
	    </table>
	</body>

</html>    