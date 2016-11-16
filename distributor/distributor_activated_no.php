<?php
    include("../connect_db.php");
     $distributor_id = $_GET['distributor_id'];
     
        $query = "SELECT * FROM activate_no WHERE distributor='$distributor_id'";
        $result = mysql_query($query);

         // echo $result;
        ?>

            <table>
            <tr>
                <th>phone_no</th>
                <th>distributor</th>
                <th>date</th>
                <th>district</th>
            </tr>
     <?php       

        while($row = mysql_fetch_array($result))
        {
        
            echo "<tr>";
            echo "<td>" . $row['phone_no'] . "</td>";
            echo "<td>" . $row['distributor'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['district'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        

?>    