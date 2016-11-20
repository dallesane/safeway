<html>
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

        <div class="container">   
        <table class="table stripped">
            
                <!-- <tr>
                <th>Issued date</th>
                <th>phone_no</th>
                <th>disrict</th>
                </tr> -->


		<?php
		    include("../connect_db.php");
		     $distributor_id = $_GET['distributor_id'];
		     
		        $query = "SELECT * FROM activate_no WHERE distributor='$distributor_id'";
		        $result = mysql_query($query);

		         // echo $result;
		        ?>

		            <table>
		            <tr>
		            	<th>date</th>
		                <th>phone_no</th>
		                <th>distributor</th>
		                <th>district</th>
		            </tr>
		     <?php       

		        while($row = mysql_fetch_array($result))
		        {
		        
		            echo "<tr>";
		            echo "<td>" . $row['date'] . "</td>";
		            echo "<td>" . $row['phone_no'] . "</td>";
		            echo "<td>" . $row['distributor'] . "</td>";
		            echo "<td>" . $row['district'] . "</td>";
		            echo "</tr>";
		        }
		        echo "</table>";

        
		?>

		 </table>
        </div>  

</body>        
</html>		    