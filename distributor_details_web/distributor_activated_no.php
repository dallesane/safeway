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
                // $query1 = "SELECT * FROM sim_details INNER JOIN district ON sim_details.district=district.id AND sim_details.distributor=$distributor_id";
                // $result1 = mysql_query($query1);
            ?>     
               

                    <table>
                    <tr>
                        <th>date</th>
                        <th>phone_no</th>
                        <th>district</th>
                    </tr>
                   
        <?php            
                while($row = mysql_fetch_array($result))
                {
                
                    echo "<tr>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['phone_no'] . "</td>";
                    echo "<td>" . $row['district_name'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

        
        ?>

         </table>
        </div>  

</body>        
</html>         