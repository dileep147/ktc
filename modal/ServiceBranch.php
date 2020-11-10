<?php
require_once __DIR__.'/../util/initialize.php';

class ServiceBranch extends DatabaseObject{
    protected static $table_name="service_branch";
    protected static $db_fields=array(); 
    
    protected static $db_fk=array("service_id"=>"Service","branch_id"=>"Branch");
    
//    public $id;
//    public $name;

     public function service_id()
    {
        return parent::get_fk_object("service_id");
    }

     public function branch_id()
    {
        return parent::get_fk_object("branch_id");
    }

    public static function find_by_service_id($value){
        global $database;
        $value=$database->escape_value($value);
        $object_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE service_id = '$value' ");
        return $object_array;
    }
    
}

?>