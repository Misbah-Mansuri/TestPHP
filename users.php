
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




//$options = ['file:'];

//$values = getopt(null, $options);

//$lines = file($values['file'], FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);



 
// Parsing CSV file to PHP

if (($open = fopen("users.csv", "r+")) !== FALSE) 
{
  
   $data = fgetcsv($open, 1000, ",");  
   print_r($data[0]);



    $row = 1;
   	while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
   	{
        $num = count($data);

        //get data by line
        $row++;

        for ($c=0; $c < $num; $c++) 
        {
            

            if($data[0] == $data[$c])
       		{
       			$name = ucfirst(strtolower(trim($data[$c])));
       		}elseif ($data[1] == $data[$c]) 
       		{
       			$surname = ucfirst(strtolower(trim($data[$c])));
       		}else
       		{
       			$email = strtolower($data[$c]); 
       		}

        


        }

        	$name 	 = $mysqli -> real_escape_string($name);
        	$surname = $mysqli -> real_escape_string($surname);


        	//Email Validation

        	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
        	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
				echo  "$email is not a valid email address.\n";  exit;
			}else{
				//echo "$email is a valid email address.\n";
			}


			
			$raw = $mysqli->query("SELECT email FROM users WHERE name = '".$name."' AND surname = '".$surname."' ");
		
			$raw = $raw->fetch_all();
			
			if(!empty($raw))
			{
				$raw[0][0] == $email;
				echo "User already exist";  

			}else
			{
				$result = $mysqli->query("INSERT INTO users (name, surname, email) VALUES ('" .$name."','".$surname."','" .$mysqli -> real_escape_string($email)." ') ");

				if (! empty($result)) 
		        {
		            echo  $message = "CSV Data Imported into the Database.\n";
		        }
		        else 
		        {
		           echo  $message =  $mysqli -> error; exit;
		          
		        }	
			}


          
      		


    }
    
}

















?>




