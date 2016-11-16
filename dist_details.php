<?php
include ("connect_db.php");
function get_activate_no($distributor_id=0){ 
    $default = 0;
    $query = "SELECT count(*) AS total_activations FROM distributor  JOIN activate_no ON distributor.id=activate_no.distributor where distributor.id = ". $distributor_id;
    $result = mysql_query($query);

   while($row = mysql_fetch_array($result)){
   return $row['total_activations'];
}
    
    }
function subtract_values($a=0, $b=0){
    $c =  $a - $b;
    return $c;
}
 ?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html >
  <head>
    <meta charset="UTF-8">
    <title>distributor table</title>
    
      <link rel="stylesheet" href="css/style.css">

    
</head>


    <body>
    <div class="wrapper">
        <!-- PRICING-TABLE CONTAINER -->
        <div class="pricing-table group">
            <h1 class="heading">
                distributor listt
            </h1>
            

                         <!-- PERSONAL -->
            <?php
            $query = "SELECT distributor.id as id, distributor.distributor as distributor_name, SUM(sim_details.total_number) AS total_numbers_sum FROM distributor left JOIN sim_details ON distributor.id=sim_details.distributor group by distributor.id";
            $result = mysql_query($query);

            while($row = mysql_fetch_array($result)){
            echo '
            <div class="block personal fl">
                <h6 class="title"></h6>
                <!-- CONTENT -->
                <div class="content">
                    <p class="price">
                        <!-- <sup>$</sup> -->
                        
                        <!-- <sub></sub> -->
                    </p>'. $row['distributor_name'] .'<p class="hint">
                    
            
            </p>

                </div>
                <!-- CONTENT  -->
                <!-- FEATURES -->
                <ul class="features">
                     <li><span class="fontawesome-cog"></span>Total numbers: ('. $row['total_numbers_sum'] .')</li>
                    <li><span class="fontawesome-star"></span> Activated Numbers ('. get_activate_no($row['id']) .')</li>
                    <li><span class="fontawesome-dashboard"></span>Unactivated numbers: ('. subtract_values($row['total_numbers_sum'],get_activate_no($row['id'])) .') </li>
                </ul>
                <!-- /FEATURES -->
                <!-- PT-FOOTER -->
                <div class="pt-footer">
                    <p>click for details</p>
                </div>
                <!-- /PT-FOOTER -->
            </div>
            ';


            }
            ?>

            <!-- SELECT count(distributor.id) as activated_numbers FROM distributor join activate_no on distributor.id = activate_no.distributor where activate_no.distributor = 1 GROUP by distributor.id -->

                        
            

        

        </div>
       </div>     
    
    
    
    
  </body>
</html>
