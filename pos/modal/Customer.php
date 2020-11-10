<?php
require_once __DIR__.'/../util/initialize.php';

class Customer extends DatabaseObject{
    protected static $table_name="customer";
    protected static $db_fields=array(); 
    
    protected static $db_fk=array("customer_status"=>"CustomerStatus");
    
//    public $id;
//    public $name;

     public function customer_status()
    {
        return parent::get_fk_object("customer_status");
    }
    
}

?>