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
                <th>phone_no</th>
                <th>disrict</th>
                </tr>



        <?php
           include("../connect_db.php");
           $distributor_id = $_GET['distributor_id'];
            
                $query = "SELECT * FROM sim_details WHERE distributor='$distributor_id'";

                $result = mysql_query($query);

                 // echo "hello";

                while($row=mysql_fetch_array($result)){

                    $from = $row['phone_number_from_range'];
                    $to = $row['phone_number_to_range'];
                    $date = $row['date'];
                    $district = $row['district'];
                
                    while($from <= $to){
                        // echo $from;
                        // echo "<br>";
                        

                        echo "<tr>";
                        echo "<td>".$date."</td>";
                        echo "<td>".$from."</td>";
                        echo "<td>".$district."</td>";
                        echo "</tr>";

                        $from = $from + 1;

                    }
                    
                      


                } 

        ?>


        </table>
        </div>  

</body>        
</html>