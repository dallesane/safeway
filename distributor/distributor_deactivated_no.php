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
            
                <tr>
                <th>Issued date</th>
                <th>deactivated_no</th>
                <th>distributor</th>
                <th>disrict</th>
                </tr>

            <?php
           include("../connect_db.php");
           $distributor_id = $_GET['distributor_id'];
            
                $query = "SELECT * FROM sim_details WHERE distributor='$distributor_id'";

                $result = mysql_query($query);
                $total_number = array();
                 // echo "hello";

                while($row=mysql_fetch_array($result)){

                    $from = $row['phone_number_from_range'];
                    $to = $row['phone_number_to_range'];
                    $date = $row['date'];
                    $district = $row['district'];

                    
                    $counter = 0;
                    while($from <= $to){
                        // echo $from;
                        // echo "<br>";
                        

                        // echo "<tr>";
                        // echo "<td>".$date."</td>";
                        // echo "<td>".$from."</td>";
                        // echo "<td>".$district."</td>";
                        // echo "</tr>";
                        $total_number[$counter] = $from;
                        $from = $from + 1;

                        $counter = $counter + 1;

                    }
                    
                      
                } 
                print_r($total_number);

            ?>

        </table>
        </div>  

</body>        
</html>              