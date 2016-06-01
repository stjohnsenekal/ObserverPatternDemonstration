<?php

$count = 0;
$flowers = array(0,1,2,3,4,5,6,7,8,9);

print_r($flowers);


print("HELLO".PHP_EOL);


do {
		$count++;   
		$key = array_rand($flowers,1);
		print("key: $key");
		unset($flowers[$key]);
		print_r($flowers);

} while($count < 4);



?>