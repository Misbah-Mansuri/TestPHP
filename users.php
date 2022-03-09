
<?php
	

//database connection

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli =  new mysqli("localhost", "root", "", "Test");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}else{
	//echo "success";
}




$options = ['file:'];

$values = getopt(null, $options);
//print_r($values);
//$data = fgetcsv($options, 1000, ","); 
//print_r($data);


$open = file($values['file'], FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);

//print_r($open);


//$open = implode(", ", $open);
//print_r($open);
//$open = explode(" ", trim($open));
//print_r($open);


echo count($open);
for ($i=0; $i < count($open) ; $i++) 
{ 
	 $raws = $open[$i];
	//echo "\n";
	$rawArray[$i]  = explode(",", $raws);
	//$rawArray[$i] = array_merge(array1)
	//print_r($rawArray);
	
}  print_r($rawArray);
//exit;

//$open = json_encode($open);
//print_r(json_encode($open));

//$open = explode(" ", $open);
//print_r(json_encode($open));



//exit; 
// Parsing CSV file to PHP

if ($data = file($values['file'], FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES)) 
{
	//echo "in if----";
  	//print_r($open);

  // $data = fgetcsv($open, 1000, ",");  
  // print_r($data);

//exit;
   // $row = 1;
   	while (count($rawArray) > 0 ) 
   	{
   		$data = $rawArray;
   		//print_r($rawArray);

        echo $num = count($data);

        //get data by line
       // $row++;

        for ($c=0; $c < $num ; $c++) 
        {
            //print_r($data[$c]); 

            for ($d=0; $d <3; $d++) { 
            	

            	
            	$name    = ucfirst(strtolower(trim($data[$c][$d])));
            	$surname = ucfirst(strtolower(trim($data[$c][$d])));
            	$email   = strtolower($data[$c][$d]);
            	if($data[0] == $data[$c][$d])
	       		{
	       			echo $name    = ucfirst(strtolower(trim($data[$c][$d])));
	       		}elseif ($data[1] == $data[$c][$d]) 
	       		{
	       			echo $surname = ucfirst(strtolower(trim($data[$c][$d])));
	       		}else
	       		{
	       			echo $email   = strtolower($data[$c][$d]);
	       		}

            }  

        } exit;

        	$name 	 = $mysqli -> real_escape_string($name);
        	$surname = $mysqli -> real_escape_string($surname);

 			exit;
        	//Email Validation

        	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
        	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
				echo  "$email is not a valid email address.\n";  exit;
			}else{
				//echo "$email is a valid email address.\n";
			}


			
		


          
      		


    }
    
}

















?>




