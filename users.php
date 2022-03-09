
<?php
	

//database connection

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli =  new mysqli("localhost", "root", "", "userInfo");

// Check databse connection

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}else{
	//echo "success"; 
}


// get csv file from terminal

$options = ['file:'];

$values = getopt(null, $options);

$open = file($values['file'], FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);


// Parsing CSV file to PHP

if ($data = file($values['file'], FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES)) 
{
	for ($i=0; $i < count($open) ; $i++) 
	{ 
		$raws = $open[$i];
		
		$data[$i]  = explode(",", $raws);
		
		
	}  
   	while (count($data) > 0 ) 
   	{
   		
   		//print_r($data);
        $num = count($data);

        for ($c=1; $c < $num ; $c++) 
        {
            //print_r($data[$c]); 

            for ($d=0; $d <3; $d++) 
            { 
            	if($data[$c][0] == $data[$c][$d])
	       		{
	       			 $name    = ucfirst(strtolower(trim($data[$c][$d])));
	       		}elseif ($data[$c][1] == $data[$c][$d]) 
	       		{
	       			 $surname = ucfirst(strtolower(trim($data[$c][$d])));
	       		}else
	       		{
	       			
	       			
	       			 $email   = strtolower($data[$c][$d]);
	       		}
            	

            }  
            $name 	 = $mysqli -> real_escape_string($name);
        	$surname = $mysqli -> real_escape_string($surname);


        	//Email Validation

        	 $email = filter_var($email, FILTER_SANITIZE_EMAIL); 
        	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
				echo  "$email is not a valid email address.\n";  exit;
			}else{
				//echo  "$email is a valid email address.\n";
			}



			// Restrict duplicate entry

			$raw = $mysqli->query("SELECT email FROM users WHERE name = '".$name."' AND surname = '".$surname."' ");
		
			$raw = $raw->fetch_all();
	
			if(!empty($raw))
			{
				$raw[0][0] == $email;
				echo "User already exist";  

			}else
			{


				//Insert user value

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
    
}

















?>




