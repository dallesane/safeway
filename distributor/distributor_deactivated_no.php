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
                $total_activate_no = array();

                $qu = "SELECT * FROM activate_no WHERE distributor='$distributor_id'";
                $res = mysql_query($qu);
                // $total_activate_no = mysql_fetch_array($res);
                $cnt = 0;
                while($row4 = mysql_fetch_array($res)){

                    $activate_no_detail = array();
                    $activate_no_detail["phone_number"] = $row4['phone_no'];
                    $activate_no_detail["district"] = $row4['district'];
                    $activate_no_detail["date"] = $row4['date'];
                    $total_activate_no[$cnt] = $activate_no_detail;
                    $cnt = $cnt + 1;

                }


                while($row=mysql_fetch_array($result)){

                    $from = $row['phone_number_from_range'];
                    $to = $row['phone_number_to_range'];
                    $date = $row['date'];
                    $district = $row['district'];
                    


                    
                    $counter = 0;
                    while($from <= $to){
                        // echo $from;
                        // echo "<br>";
                        $number_detail = array();
                        $number_detail["phone_number"] = $from;
                        $number_detail["district"] = $district;
                        $number_detail["date"] = $date;
                        


                        // echo "<tr>";
                        // echo "<td>".$date."</td>";
                        // echo "<td>".$from."</td>";
                        // echo "<td>".$district."</td>";
                        // echo "</tr>";
                        $total_number[$counter] = $number_detail;
                        $from = $from + 1;

                        $counter = $counter + 1;

                    }
                    
                      
                } 
                // print_r($total_number);
                print_r($total_activate_no);

            ?>

        </table>
        </div>  

</body>        
</html>              