<html> 
    <body> 
        <form action="" method="GET">
        Beginning Time : <input type="date" name="issued_date_start" />&ensp;
        Ending time :<input type="date" name="issued_date_end" />&ensp;
        <strong>district: *</strong><?php echo $district; ?><b/>
            <select name="district">
                <option selected="selected" value="">Select district</option>
                <?php 
                    include("../connect_db.php");
                    $query = "SELECT * FROM district";
                    $result = mysql_query($query);
                    if ($result) {
                        while($row = mysql_fetch_array($result)) {
                        
                            if ($district == $row['id']){

                                echo '<option selected="selected" value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
                                // echo '<option selected="selected" value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
                            }else{
                                echo '<option value="'.$row['id'].'">"'.$row['district_name'].'"</option>';
                                // echo '<option value="'.$row['id'].'">"'.$row['district_name'].'"</option>'; 
                            }
 
                        }
                    }else {
                        echo mysql_error();
                    }
                ?>
            </select>

            <strong>distributor: *</strong><?php echo $distributor; ?><b/>
            
            <select name="distributor">
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
                    }else {
                        echo mysql_error();
                    }
                ?>
            </select>

            <input type="submit" name="submit">
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
                $input_name_lists = array("issued_date_start", "issued_date_end", "distributor", "district");
                $query = "SELECT * FROM sim_details INNER JOIN district ON sim_details.district=district.id";
                foreach($input_name_lists as $input_name){
                    $and = " AND ";
                    if(!empty($_GET[$input_name]) && $input_name == "issued_date_start"){
                        $query .= $and."sim_details.date>='".$_GET[$input_name]."'"; 
                    }elseif(!empty($_GET[$input_name]) && $input_name == "issued_date_end"){
                        $query .= $and."sim_details.date<='".$_GET[$input_name]."'"; 
                    }elseif(!empty($_GET[$input_name])){
                        $query .= $and."sim_details.".$input_name."=".$_GET[$input_name]; 
                    }
                }
                
                //  $query = "SELECT * FROM sim_details INNER JOIN district ON sim_details.district=district.id AND sim_details.distributor=$distributor_id";
                $result = mysql_query($query);
                while($row=mysql_fetch_array($result)){

                    $from = $row['phone_number_from_range'];
                    $to = $row['phone_number_to_range'];
                    $date = $row['date'];
                    $district = $row['district_name'];

                    while($from <= $to){
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