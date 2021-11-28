<?php
    include 'functions.php';

    $obj = new query();
    $conditionArr=array('id'=>2, 'name'=>'fatimah'); //Conditions are always in array because there are several conditions
    $allData = $obj->getData('*','user',$conditionArr,'id','asc','2');
    echo '<pre>';
    print_r($allData);
?>