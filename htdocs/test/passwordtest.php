<?php

// print time()."\n";
// $pass="karthi";
// $option=['cost'=> 9];
// echo password_hash($pass,PASSWORD_DEFAULT,$option);
// print "\n".microtime(true)-time();
include '../libs/load.php';
function login($username, $password)
{
    $conn = database::pdo_getconnection();
    $stmt = $conn->prepare("select *from user where username='$username'");
    $stmt->execute();
    $result = $stmt->fetchAll();
    print_r($result);
    if (count($result) == 1) {
        if (password_verify($password, $result[0]['password'])) {
            return $result[0];
        }
    } else {
        return false;
    }
}
print_r(login("karthikeyan", "karthi"));
