<?php

class Product
{
    private $conn;
    public function __construct() {
        $conn=database::pdo_getconnection();
        $stmt = $conn->prepare("select *from product");
        $stmt->execute();
        $result = $stmt->fetchAll();
        print_r($result);
    }
}
