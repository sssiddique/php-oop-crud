<?php
    include 'functions.php';

    $obj = new query();
    $conditionArr=array('email'=>'hello@gmail.com'); //Conditions are always in array because there are several conditions
    $deleteData = $obj->updateData('user', $conditionArr,'id', 1);
    // $updateData = $obj->deleteData('user',$conditionArr);
    // echo '<pre>';
    // print_r($deleteData);
?>