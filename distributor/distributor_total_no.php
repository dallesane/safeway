<?php
    include("../connect_db.php");
    function gettotalactivatenumber($id) {
    	$query = "SELECT * FROM activate_no WHERE distributor='1'";

    	$result = mysql_query($query);
        while($row = mysql_fetch_array($result)) {
            echo $row['phone_no'];


    	}
    	

    }
?>
<html>
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
        <body>

            <table>
              <tr>
                <th>id</th>
                <th>date</th>
                <th>total activate numbers</th>
                <th>district</th>
              </tr> 

             <?php
                $query = "SELECT * FROM distributor";

                $result = mysql_query($query);
          

                if ($result) {

                    while($row = mysql_fetch_array($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['id'].'</td>';
                        echo '<td>'. $row['date'].'</td>';
                        $distributor_id = $row['id'];
                        $result = gettotalactivatenumber($distributor_id);
                        echo '<td>'. $result .'</td>';
                        echo '<td>'. $row['district'].'</td>';
                        
                        echo '</tr>';

                    }
                }  
                    
            ?> 

            </table>
        </body>
</html>                  