<!DOCTYPE html>


		<?php
    include("../connect_db.php");
    function getdistributortotalnumber($id) {
    	$query = "SELECT * FROM sim_details WHERE distributor='$id'";
    	$result = mysql_query($query);

    	$total_number = 0;
    	while ($row=mysql_fetch_array($result)){

    		$from = $row['phone_number_from_range'];
            $to = $row['phone_number_to_range'];
        
            $total_number += $to - $from + 1;


    	}
    	return $total_number;

    }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Distributor & sim details</title>
  </head>
  <body>

		<style>

            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
           
		</style>
		</div>
		

		<div class="container">

		<header>
		   <h1><center>Distributor & sim details</h1>
		</header>
		  
		<nav>
		  <ul>
		    <li><a href="activate_no_form.php">Add new activated numbers</a></li>
		    <br>
		    <li><a href="distributor_form.php">Add new distributor</a></li>
		    <br>
		    <li><a href="sim_details_form.php">Add new distributor sim details</a></li>
		    
		  </ul>
		</nav>
		</div>

			

			<table>
			  <tr>
			    <th>id</th>
			    <th>distributor</th>
			    <th>total numbers</th>
			    <th>total activated numbers</th>
			    <th>total deactivated numbers</th>
			  </tr> 
	    	
	   	
	    	<?php
	    	    $query = "SELECT * FROM distributor";

		        $result = mysql_query($query);
		  

			    if ($result) {

			        while($row = mysql_fetch_array($result)) {
	    	            echo '<tr>';
	    	            echo '<td>'. $row['id'].'</td>';
	    	            echo '<td>'. $row['distributor_name'].'</td>';
	    	            $distributor_id = $row['id'];
	    	            $total_number = getdistributortotalnumber($distributor_id);
	    	            echo '<td>'. $total_number .' <a href="distributor_total_no.php/?distributor='.$distributor_id.'"><button> details!</button></a></td>';
	    	            // echo "sumeet";
	    	            
	    	            $qu = "SELECT * FROM activate_no WHERE distributor='$distributor_id'";
	    	            $res = mysql_query($qu);
	    	            $activate_count = mysql_num_rows($res);

	    	            // $activate_count = mysql_num_rows(mysql_query("SELECT * FROM activate_no WHERE 'distributor' = '$row['id'] "));
	    	            echo '<td><a>'. $activate_count .' <a href="distributor_activated_no.php/?distributor='.$distributor_id.'"><button> details!</button></a></td>';
	    	            $deactivate_no = $total_number - $activate_count;
	    	            echo '<td>'. $deactivate_no  .'  <a href="distributor_deactivated_no.php/?distributor='.$distributor_id.'"><button> details!</button></a></td>';
	    	            echo '</tr>';

	    	        }
	    	    }  
	  			  	
	    	?>
	    		
	    </table>

  </body>
</html>
