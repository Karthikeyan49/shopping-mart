<?php

class product{

    private $conn = null;
    public $data;
    public function __construct(){
        $this->conn = database::pdo_getconnection();
        $stmt = $this->conn->prepare("select * from product");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $this->data = $result;

    }
    public function set_data(){

    }
}