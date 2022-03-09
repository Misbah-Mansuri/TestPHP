<?php 

// Print 1 to 100 numbers divisible 3 ,5 and both add foo,bar and foobar respectively


for($i=1; $i<= 100; $i++)
{

	if($um % 3 == 0 AND $num % 5 == 0)
  	{
    	echo "foobar ";
  	}elseif($um % 3 == 0)
  	{
    	echo "foo ";
  	}elseif($num % 5 == 0)
  	{
    	echo "bar ";
  	}else
  	{
  		echo $num." ";
  	}
}

?>