<?php
include 'database.php';
/**
 * Contains all the querys
 */
class query extends database{

    /**
     * This function is for get all data with static sql.
     *
     * @return void
     */
    // public function getData(){
    //     $sql = "SELECT * FROM user WHERE id=1 ORDER BY name asc";
    //     $result = $this->connect()->query($sql);
    //     if($result->num_rows>0){
    //         $arr = array(); /** Taken This $arr variable to push the result into array */
    //         while($row=$result->fetch_assoc()){
    //             $arr[] = $row;
    //         }
    //         return $arr;
    //     }else{
    //         return 0;
    //     }
    // }



    /**
     * This function is for data retrieve.
     * The passing value '' options are non mandatory
     * @param Countable|Array  $conditionArr
     */
    public function getData($field='', $table, $conditionArr='', $order_by_field='', $order_by_type='desc', $limit=''){
        /** 
         * Main SQL Query
         * SELECT * FROM user WHERE id=1 AND name='Shovon' ORDER BY name asc limit 1
         * Dynamic Sql Look Like:
         * SELECT $field FROM $table WHERE $condition $order_by_field $order_by_type limit $limit
         * need to pace space at the begining and the end of every query which are making dynamic the sql query
         */
        $sql = "SELECT $field from $table ";
        /**
         * This is to make the condition dynamic
         * Conditions are always in array because there are several conditions
         *@param Countable|Array  $conditionArr
         */
        if($conditionArr!=''){
            $sql .=" where ";
            $c = count($conditionArr);
            $i=1;
            foreach($conditionArr as $key=>$val){
                //This if condition is for not to repeat the 'and' without logic.
                if($i==$c){
                    $sql .="$key='$val'";
                }else{
                    $sql .="$key='$val' and ";
                }
                $i++;
            }
        }
        /**
         * This is to make the 'order by' clause dynamic
         */
        if($order_by_field!=''){
            $sql .=" order by $order_by_field $order_by_type ";
        }
        /**
         * This is for making the $limit dynamic...
         */
        if($limit!=''){
            $sql.=" limit $limit";
        }
        //die($sql); //Will enable this function if we need to see, how the sql query look like?
        $result = $this->connect()->query($sql);
        if($result->num_rows>0){
            $arr = array(); /** Taken This $arr variable to push the result into array */
            while($row=$result->fetch_assoc()){
                $arr[] = $row;
            }
            return $arr;
        }else{
            return 0;
        }
    }


    /**
     * This function is for data insert 
     *
     * @param string $table
     * @param Countable|Array  $conditionArr
     * @return void
     */
    
    public function insertData($table, $conditionArr){
        /** 
         * Main SQL Query for insert data
        */       
        if($conditionArr!=''){
            foreach($conditionArr as $key=>$val){
                $fieldArr[]=$key;
                $valueArr[]=$val;
            }
            $field = implode(",", $fieldArr);
            $value = implode("','", $valueArr);
            $value = "'".$value."'";
            $sql = "INSERT INTO $table($field) VALUES($value)";
            $result = $this->connect()->query($sql);
            // die($sql); /** Taken This $arr variable to push the result into array */
        }
    }



    /**
     * This function is for data delete
     *
     * @param string $table
     * @param Countable|Array $conditionArr
     * @return void
     */
    
    public function deleteData($table, $conditionArr){
        /** 
         * Main SQL Query for delete data
        */       
        if($conditionArr!=''){
            $sql = "DELETE FROM $table where ";
            $c = count($conditionArr);
            $i = 1;
            foreach($conditionArr as $key=>$val){
                if($i==$c){
                    $sql .="$key='$val'";
                }else{
                    $sql .="$key='$val' and";
                }
                $i++;
        }
        //echo $sql;
        $result = $this->connect()->query($sql);
        }
    }



    /**
     * This function is for Update data
     *
     * @param string $table
     * @param Countable|Array $conditionArr
     * @param string $where_field
     * @param string $where_value
     * @return void
     */
    
    public function updateData($table, $conditionArr, $where_field, $where_value){
        /** 
         * Main SQL Query for update data
        */       
        if($conditionArr!=''){
            $sql = "UPDATE $table SET ";
            $c = count($conditionArr);
            $i = 1;
            foreach($conditionArr as $key=>$val){
                if($i==$c){
                    $sql .="$key='$val'";
                }else{
                    $sql .="$key='$val' and";
                }
                $i++;
        }
        $sql.=" WHERE $where_field = '$where_value' ";
        //echo $sql;
        $result = $this->connect()->query($sql);
        }
    }



    /**
    *End of the Class query
    */
} 
?>