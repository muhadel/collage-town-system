<?php
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE & ~E_DEPRECATED);
class database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "ucity_db";
    private $connection;
    private static $instance;
    
    public function __construct() {
        $this->connection = $this->database_connect($this->host, $this->username, $this->password);
        $this->database_select($this->db_name);
        
        /* here*/
        //$this->getInstance();
       
      
    }
    
     public static function getInstance(){// create only one object for databse 
        if(!self::$instance){
            self::$instance= new  self();
           // echo 'Not  running';
        }
        return self::$instance;
       //echo 'running';
    }
    
    
    private function database_connect($database_host, $database_username, $database_password) {
        $c = mysqli_connect($database_host, $database_username, $database_password);
        if ($c) {
            
            return $c;
            
        } else {
             die("Database connection error");
            
        }
    }
    
    
    private function database_select($database_name) {
        return mysqli_select_db($this->connection,$database_name)
            or die("no db is selecteted");
    }
    
    public   function database_close() {
        if(!mysql_close($this->connection))die ("Connection close failed.");
           
    }
    
    public function clean($str) {
		$str = trim($str); // remove 
               		
                if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string( $this->connection,$str); //Clean any SQL words.
	}
        
        
    public function database_query($database_query) {
        
        $query_result = mysqli_query( $this->connection , $database_query);
        return $query_result;
    }
    
    public function get_row($query) {
        /*if (!strstr(strtoupper($query), "LIMIT"))
            $query .= " LIMIT 0,1"; */
        if (!($res =$this->database_query($query))) {
         die( "Database error: " . mysqli_error($this->connection) . "<br/>In query: " . $query);
        }
        return mysqli_fetch_assoc($res);
    }
    
    public function database_all_array($database_result) {
        $array_return=array();
        while ($row = mysqli_fetch_assoc($database_result)) {
            
            $array_return[] = $row;
        }
//        if(count($array_return)>0)
        return $array_return;


    }
    
    public function last_id()
    {
        $last_id = mysqli_insert_id($this->connection);
        return $last_id;
    }

    
    public function database_all_assoc($database_result) {

        while ($row = mysql_fetch_assoc($database_result)) {
            $array_return[] = $row;
        }
        return $array_return;
    }
    
    
      public   function database_affected_rows($database_result) {

        return mysqli_affected_rows($database_result);
        
    }
    
      public   function database_num_rows($database_result) {

        return mysqli_num_rows($database_result);
    }
    
    
public function insert($table, $data){
    $q="INSERT INTO `$table` ";
    $v=''; $n='';

    foreach($data as $key=>$val){
        $n.="`$key`, ";
        if(strtolower($val)=='null') $v.="NULL, ";
        //elseif(strtolower($val)=='now()') $v.="NOW(), ";
        else $v.= "'".$val."', ";
    }

    $q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");";
    echo $q;
    if($q)
    {
        $this->database_query($q);
    }
    /*if($this->database_query($q)){
        return mysql_insert_id();
    }
    else return false;
*/
}#-#insert() +



//3abnasser function modified
public function update($table, $data){//,$id
    $q="UPDATE `$table` SET ";

    $r="";
    foreach($data as $key=>$val){
        $r.="`".$key."`"."='$val',";
    }
    $r=rtrim($r,", ");
    //echo $r;
    $q1 = $q .$r. ' WHERE '."1";

    
    if($q1)
    {
        $this->database_query($q1);
    }
}

/*public function update($table, $data, $where='1'){
    $q="UPDATE `$table` SET ";

    foreach($data as $key=>$val){

        if(strtolower($val)=='null') $q.= "`$key` = NULL, ";
        //elseif(strtolower($val)=='now()') $q.= "`$key` = NOW(), ";
        //else $q.= "`$key`='".$this->escape_string($val)."', ";
        else $v.= "'".$val."', ";
    }
  
    
    $q = rtrim($q, ', ') . ' WHERE '.$where.';';
    
    return $this->query($q);

}#-#update()*/

    
    
        
}
