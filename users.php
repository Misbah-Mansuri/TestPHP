
<?php
	

//database connection

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli =  new mysqli("localhost", "root", "", "Test");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}else{
	echo "success";
}


//  Parsing CSV file to PHP



if (($open = fopen("users.csv", "r+")) !== FALSE) 
{
  
   $data = fgetcsv($open, 1000, ",");  



    $row = 1;
   	while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
   	{
        $num = count($data);

        //get data by line
        $row++;

        for ($c=0; $c < $num; $c++) 
        {
            
        	echo $data[$c];
           

        


        }

    }

}












?>




