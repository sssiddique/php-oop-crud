<?php

class database{
    private $host;
    private $dbuser;
    private $dbpass;
    private $dbname;

    protected function DBconnect(){
        $this->host = 'localhost';
        $this->dbuser = 'root';
        $this->dbpass = '';
        $this->dbname = 'crud';

        $conn = new mysqli($this->host, $this->dbuser, $this->dbpass, $this->dbname);
        return $conn;    
    }
}


/**
 * @return view all tables * All data
 */

class query extends database{
    public function getAllData($field='*',$table, $condition_arr='', $order_by_field='', $order_by_type='asc', $limit=''){
        $sql = "select $field from $table";
        // $sql = "SELECT * FROM user WHERE id=1 AND name="Shovon" ORDER BY id asc LIMIT 1";
        // $sql = "SELECT $field FROM user WHERE id=1 AND name="Shovon" $order_by_filed $order_by_type $limit";

        /**
         * Making all sql parameters dynamic
         */
        if($condition_arr!=''){
            $sql.=' where ';
            $c = count($condition_arr);
            $i = 1;
            /** Removing extra and after each condition */
            foreach($condition_arr as $key=>$val) {
                if($i == $c){
                    $sql.="$key='$val'";
                } else {
                    $sql.="$key='$val' and ";
                }
                $i++;
            }
        }

        if($order_by_field !=''){
            $sql.= " order by $order_by_field $order_by_type ";
        }

        if($limit != ''){
            $sql.=" limit $limit ";
        }
        // die($sql); //Use this die function to see how the actual query look like?
        $result = $this->DBconnect()->query($sql);
        if(mysqli_num_rows($result)>0){
            $arr = array();
             while($row = mysqli_fetch_assoc($result)){
                 $arr[] = $row;
             }
             return $arr;
        }else{
            return 0;
        }
    }


    public function insertData($table, $condition_arr){
        if($condition_arr != ''){
            foreach($condition_arr as $key=>$val){
                $fieldArr[]=$key;
                $valueArr[]=$key;
            }
            
            // $sql = "INSERT INTO user(name, email, password) VALUES('Bonna', 'bonna@gmail.com', '12345')";
            $field = implode(",",$fieldArr);
            $value = implode(",'",$fieldArr);
            $value = "'". $value ."'";
            $sql = "INSERT INTO $table($field) VALUES($value)";
            die($sql); //Use this die function to see how the actual query look like?
            $result=$this->DBconnect->query($sql);

        }
    }





}





?>