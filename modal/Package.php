<?php
require_once __DIR__.'/../util/initialize.php';

class Package extends DatabaseObject{
    protected static $table_name="package";
    protected static $db_fields=array(); 
    
    protected static $db_fk=array("category"=>"PackageCategory");
    
//    public $id;
//    public $name;

     public function category()
    {
        return parent::get_fk_object("category");
    }
    
}

?>