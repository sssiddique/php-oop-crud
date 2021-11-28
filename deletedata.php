<?php
    include 'functions.php';

    $obj = new query();
    $conditionArr=array('id'=>14); //Conditions are always in array because there are several conditions
    $deleteData = $obj->deleteData('user',$conditionArr);
    echo '<pre>';
    print_r($deleteData);
?>