<?php
// $host="localhost";
// $username="root";
// $port="3307";
// $pass="1234";
// $dbname="dbpdo";
// $conn=new PDO("mysql:host=$host;dbname=$dbname;port=$port",$username,$pass);
class db{
    private  $host="localhost";
    private $username="root";
    private $port="3307";
    private $pass="1234";
    private $dbname="dbpdo";
    private $conn="";
     function __construct(){
   

        $this->conn=new PDO("mysql:host=$this->host;dbname=$this->dbname;port=$this->port",$this->username,$this->pass);
     }
     function get_connection()
     {
        return $this->conn;
     }
     function get_data($table_name,$condition=1)
     {
        return $this->conn->query("select * from $table_name where $condition");

     } 
     function delete_data($table_name,$condition=1)
     {
        return $this->conn->query("delete  from $table_name where $condition");
     }
     function insert_data($table_name,$cols,$values)
     {
        return $this->conn->query("insert into  $table_name ($cols) values ($values) ");
        // echo ("insert into  $table_name ($cols) values ($values) ");
        
     }
     function update_data($table_name,$cols,$condition=1)
     {
        return $this->conn->query("update $table_name set $cols where $condition");
        
     }
    
     
}

?>