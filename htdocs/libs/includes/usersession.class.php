<?php

use function PHPSTORM_META\type;

class usersession
{
    public $data;
    public $id;
    public $conn;
    public $token;
    public $uid;
    //allows the user to enter

    public static function authentiaction($email, $pass)
    {
        $user = user::login($email, $pass);
        if ($user) {
            $conn = database::pdo_getconnection();
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $token = md5(rand(0, 999999) . $ip . $agent . time());
            $sql = $conn->prepare("select *from session where uid=$user");
            $sql->execute();
            $result = $sql->fetchAll();
            if (count($result) > 0) {
                if ($conn->query("UPDATE `session` SET `token` = '$token',`login_time` = now(),
                    `ip` = '$ip', `user_agent` = '$agent' WHERE `uid` = $user;")) {
                        return true;
                }else{
                    return false;
                }
            } else {
                $stmt = "INSERT INTO `session` (`uid`, `token`, `login_time`, `ip`, `user_agent`, `active`)
                    VALUES ($user, '$token', now(),'$ip','$agent', '1')";
                if ($conn->exec($stmt)) {
                    session::set('session_token', $token);
                    return $token;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public static function authorize($token)
    {
        try {
            $session = new UserSession($token);
            if (isset($_SERVER['REMOTE_ADDR']) and isset($_SERVER["HTTP_USER_AGENT"])) {
                if ($_SERVER['REMOTE_ADDR'] == $session->getIP()) {
                    if ($_SERVER['HTTP_USER_AGENT'] == $session->getUserAgent()) {
                        return True;
                    } else {
                        return False;
                    }
                } else {
                    return False;
                }
            } else {
                return False;
            }
        } catch (Exception $e) {
            throw new Exception("Something is wrong");
        }
    }

    public function __construct($token)
    {
        $this->conn = database::pdo_getconnection();
        $this->token = $token;
        $this->data = null;
        $sql = "SELECT * FROM `session` WHERE `token`='$token' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        if (count($results) == 1) {
            $this->data = $results[0];
            $this->uid = $results[0]['uid']; //Updating this from database
        } else {
            throw new Exception("Session is invalid.");
        }
    }

    public function getIP()
    {
        return isset($this->data["ip"]) ? $this->data["ip"] : false;
    }

    public function getUserAgent()
    {
        return isset($this->data["user_agent"]) ? $this->data["user_agent"] : false;
    }

    public static function getUsername($token)
    {
        $sql = "SELECT auth.username FROM auth
        INNER JOIN session ON auth.id = (SELECT session.uid WHERE  session.token = '$token' LIMIT 1);";
        $conn = database::pdo_getconnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        if (count($results) == 1) {
            return $results[0]['username'];
        } else {
            return false;
        }
    }
}
