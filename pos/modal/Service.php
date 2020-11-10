<?php
require_once __DIR__.'/../util/initialize.php';

class Service extends DatabaseObject{
    protected static $table_name="service";
    protected static $db_fields=array(); 
    
    protected static $db_fk=array("category"=>"ServiceCategory");
    
//    public $id;
//    public $name;

     public function category()
    {
        return parent::get_fk_object("category");
    }
    
}

?>