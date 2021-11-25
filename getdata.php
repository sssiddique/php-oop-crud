<?php

include('database.php');

$obj = new query();
$condition_arr = array('id'=>1, 'name'=>'Shovon');
$result = $obj->getAllData('*','employee', $condition_arr, 'id', 'desc', 7);
echo '<pre>';
print_r($result);
?>