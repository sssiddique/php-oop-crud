<?php
/**
 * Insert Data
 */

include('database.php');

$obj = new query();
$condition_arr = array('name'=>'Bonna', 'email'=> 'bonna@gmail.com', 'password'=>'bonnapassword');


$result = $obj->insertData('user', $condition_arr);
echo '<pre>';
print_r($result);


?>