<?php
    include("../connect_db.php");
?>
<html>
	<body>
	    <table>
	    	
	    	<?php
	    	    $query = "SELECT * FROM district";

 		        $result = mysql_query($query);
		  

		    if ($result) {

 			        while($row = mysql_fetch_array($result)) {
 	    	             echo '<tr>';
 	    	             // echo '<td>'. $row['id'].'</td>';
 	    	             echo '<td>'. $row['district_name'].'</td>';
 	    	             echo '</tr>';

 	    	        }
 	    	    }   
 	    	?>
	    		
 	    </table>
 	</body>

 </html>  