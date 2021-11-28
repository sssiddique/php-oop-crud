<?php
    include 'functions.php';
    $obj = new query();
    $conditionArr=array('name'=>'Bonna', 'password'=>'3333333'); //Conditions are always in array because there are several conditions
    $allData = $obj->insertData('user',$conditionArr);
    echo '<pre>';
    print_r($allData);
?>