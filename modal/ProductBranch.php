<?php
require_once __DIR__.'/../util/initialize.php';

class ProductBranch extends DatabaseObject{
    protected static $table_name="product_branch";
    protected static $db_fields=array(); 
    
    protected static $db_fk=array("product_id"=>"Product","branch_id"=>"Branch");
    
//    public $id;
//    public $name;

     public function product_id()
    {
        return parent::get_fk_object("product_id");
    }

     public function branch_id()
    {
        return parent::get_fk_object("branch_id");
    }

    public static function find_by_product_id($value){
        global $database;
        $value=$database->escape_value($value);
        $object_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE product_id = '$value' ");
        return $object_array;
    }
    
}

?>