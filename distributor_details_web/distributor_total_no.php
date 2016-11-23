<html> 
<body> 

        <form action="" method="GET">
        Beginning Time : <input style="width:100px;" type="text" name="BeginningTime" value="2016-11-23" />&ensp;Ending time : <input style="width:100px;" type="text" name="EndingTime" value="2016-11-23" />&ensp;

        <strong>district: *</strong><?php echo $district; ?><b/>
            

            <select name="district">

            <option selected="selected" value="">Select district</option>

            <?php 
            
                include("../connect_db.php");
           
                $query = "SELECT * FROM district";

                $result = mysql_query($query);
          

                if ($result) {
                  while($row = mysql_fetch_array($result)) {
                    // do something with the $row
                    
                    if ($district == $row['id']){

                        echo '<option selected="selected" value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
                        // echo '<option selected="selected" value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
                        


                    }else{

                        echo '<option value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
                        // echo '<option value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
                        

                    }

                  }

                }
                else {
                  echo mysql_error();
                }
            ?>
            </select>

            <strong>distributor: *</strong><?php echo $distributor; ?><b/>
            
            <select name="distributor_id">
            <option selected="selected" value="">select distributor</option>
            <?php 
           
                $query = "SELECT * FROM distributor";

                $result = mysql_query($query);
          

                if ($result) {
                  while($row = mysql_fetch_array($result)) {
                    // do something with the $row
                    
                    if ($distributor == $row['id']){

                        echo '<option selected="selected" value="'.$row['id'].'">"'.$row['distributor_name'].'"</option>';
                        // echo '<option selected="selected" value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
                        


                    }else{

                        echo '<option value="'.$row['id'].'">"'.$row['distributor_name'].'"</option>';
                        // echo '<option value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
                        

                    }

                  }

                }
                else {
                  echo mysql_error();
                }
            ?>
            
            
            </select>

        <input type='submit'>
        </form>


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
            
                // $query = "SELECT * FROM sim_details WHERE distributor='$distributor_id'";
            $query = "SELECT * FROM sim_details INNER JOIN district ON sim_details.district=district.id AND sim_details.distributor=$distributor_id";
            $result = mysql_query($query);
            // $result = mysql_query($query);

             // echo "hello";

            while($row=mysql_fetch_array($result)){

                $from = $row['phone_number_from_range'];
                $to = $row['phone_number_to_range'];
                $date = $row['date'];
                $district = $row['district_name'];

            
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