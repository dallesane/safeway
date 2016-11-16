<html>
    <body>
        <?php
        	function uploadForm(){
        ?>
	           <form enctype="multipart/form-data" method="post" >

				    <label class="form-label span3" for="file">File</label>
				    <input type="file" name="file" id="file" required />


				    <br><br>
				    <input type="submit" value="Submit" name="submit" />

			    </form>
        <?php
        }	
        ?>
    
	</body>	

</html>

<?php
    include("../connect_db.php");

	function datefix($val){
		// $dif=(41885-$val)*86400;
		// $seconds=1409737670-$dif;
		$date=date("Y/m/d", PHPExcel_Shared_Date::ExcelToPHP($val));
		return $date;
	}
    
    uploadform();

	/** Set default timezone (will throw a notice otherwise) */
	date_default_timezone_set('Asia/Kathmandu');

	include '../Classes/PHPExcel/IOFactory.php';

    if(isset($_POST['submit'])){


	if(isset($_FILES['file']['name'])){

    $file_name = $_FILES['file']['name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    //Checking the file extension
    if($ext == "xlsx"){

            $file_name = $_FILES['file']['tmp_name'];
            $inputFileName = $file_name;

    /**********************PHPExcel Script to Read Excel File**********************/

        //  Read your Excel workbook
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName); //Identify the file
            $objReader = PHPExcel_IOFactory::createReader($inputFileType); //Creating the reader
            $objPHPExcel = $objReader->load($inputFileName); //Loading the file
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) 
            . '": ' . $e->getMessage());
        }

        //Table used to display the contents of the file
        // echo '<center><table style="width:50%;" border=1>';

        //  Get worksheet dimensions
        $sheet = $objPHPExcel->getSheet(0);     //Selecting sheet 0
        $highestRow = $sheet->getHighestRow();     //Getting number of rows
        $highestColumn = $sheet->getHighestColumn();     //Getting number of columns

        //  Loop through each row of the worksheet in turn
        for ($row = 2; $row <= $highestRow; $row++) {

            //  Read a row of data into an array

            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, 
            NULL, TRUE, FALSE);
            // This line works as $sheet->rangeToArray('A1:E1') that is selecting all the cells in that row from cell A to highest column cell


            //echoing every cell in the selected row for simplicity. You can save the data in database too.
            // foreach($rowData[0] as $k=>$v)
            //     echo "<td>".$v."</td>";
           // $id = $rowData[0][0]; 
           $phone_no = $rowData[0][0]; 
           $date = datefix($rowData[0][1]);

           // echo $phone_no;
           // echo $date;

            $sm_query = "SELECT * FROM sim_details";

            $sm_result = mysql_query($sm_query);

            // echo $sm_result;


            // echo $sm_result;

            while($row1 = mysql_fetch_assoc($sm_result)){
                $from = $row1['phone_number_from_range'];
                $to = $row1['phone_number_to_range'];



                if ($phone_no<=$to & $phone_no>=$from){
                	$distributor = $row1['distributor'];

     				mysql_query("INSERT activate_no SET phone_no='$phone_no', distributor='$distributor', date='$date'")

			         or die(mysql_error());



            
                }
       //          

            }	


            
        }
         echo 'Activate no with distributor saved Sucessfully';

       
    }

    else{
        echo '<p style="color:red;">Please upload file with xlsx extension only</p>'; 
    }   

}
}


	// if (isset($_POST['submit'])){

	// 	$activate_no_file = $_POST['file'];

	// 	echo $activate_no_file;
	// }else{

	// 	uploadForm();
	// }




?>