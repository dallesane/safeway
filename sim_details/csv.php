<?php
include (../connect_db.php);

$sql= $sql = "LOAD DATA LOCAL INFILE 'csv.csv'
       INTO TABLE sim_details
       FIELDS TERMINATED BY ','
       OPTIONALLY ENCLOSED BY '\"' 
       LINES TERMINATED BY '\n' 
       IGNORE 1 LINES;";

?>