<?php

class user
{
    private static $conn = null;
    public static $id = null;
    public function __construct($username)
    {
        user::$conn = database::pdo_getconnection();
        $stmt = user::$conn->prepare("select id from auth where username='$username' or id='$username'");
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            user::$id = $result['id'];
        } else {
            echo "no data";
        }
    }
    public function __call($name, $arg)
    {
        $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
        $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));
        if (substr($name, 0, 3) == 'get') {
            return $this->_get_data($property);
        } else if (substr($name, 0, 3) == 'set') {
            return $this->_set_data($property, $arg[0]);
        } else {
            throw new Exception("__call function -> $name are notavailable");
        }
    }
    public static function signup($username, $password, $email, $phone)
    {
        try {
            $conn = database::pdo_getconnection();
            $option = ['cost' => 8];
            $password = password_hash($password, PASSWORD_DEFAULT, $option);
            $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`,`active`) 
            VALUES ('$username', '$password', '$email', '$phone',1); ";
            return $conn->exec($sql);
        } catch (exception $e) {
            echo $e->getMessage();
        }
    }
    public static function login($email, $password)
    {
        $conn = database::pdo_getconnection();
        $stmt = $conn->prepare("select *from auth where email='$email'");
        $stmt->execute();
        $result = $stmt->fetchAll();
        if (count($result) == 1) {
            if (password_verify($password, $result[0]['password'])) {
                return $result[0]['id'];
            }
        } else {
            return false;
        }
    }
    public function _set_data($attribute, $data)
    {
        if (!user::$conn)
            echo "no database connection";
        else {
            $stmt = "update user set $attribute='$data' where id=" . user::$id;
            return user::$conn->exec($stmt);
        }
    }
    public function _get_data($attribute)
    {
        if (!user::$conn)
            echo "no database connection";
        else {
            $stmt = user::$conn->prepare("select $attribute from user where id=" . user::$id);
            $stmt->execute();
            return $stmt->fetch()[$attribute];
        }
    }
}
