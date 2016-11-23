<html>
<body>
        
        <form action="" method="post">
        Beginning Time : <input style="width:100px;" type="text" name="BeginningTime" value="2016-11-23" />&ensp;Ending time : <input style="width:100px;" type="text" name="EndingTime" value="2016-11-23" />&ensp;<input type='submit'>


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
                <!-- <th>distributor</th> -->
                <th>disrict</th>
                </tr>
            <?php
               include("../connect_db.php");
               $distributor_id = $_GET['distributor_id'];
                    // $query = "SELECT * FROM sim_details WHERE distributor='$distributor_id'";
                    $query = "SELECT * FROM sim_details INNER JOIN district ON sim_details.district=district.id AND sim_details.distributor=$distributor_id";
                    $result = mysql_query($query);
                    // $qu = "SELECT * FROM activate_no INNER JOIN district ON activate_no.district=district.id AND activate_no.distributor=$distributor_id";
                    $res = mysql_query($qu);
                    // $total_activate_no = mysql_fetch_array($res);
                    while($row=mysql_fetch_array($result)){

                        $from = $row['phone_number_from_range'];
                        $to = $row['phone_number_to_range'];
                        $date = $row['date'];
                        $district = $row['district_name'];    
                        while($from <= $to){
                            $number_exist = False;
                            while($row4 = mysql_fetch_array($res)){ 
                                if($from == $row4['phone_no']){
                                    $number_exist = True;
                                }
                                
                            }
                            if($number_exist == False){
                                echo "<tr>";
                                echo "<td>".$date."</td>";
                                echo "<td>".$from."</td>";
                                echo "<td>".$district."</td>";
                                echo "<tr>";
                            }
                            $from = $from + 1;
                        }     
                    }
            ?>   

            </table>
        </div>  

</body>        
</html>              