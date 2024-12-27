<?php

echo "<pre>";
include "../libs/load.php";

$result=null;
if (session::get("is_loggedin")) {
    $userdata = session::get("session_user");
    print "welcome back \n $userdata[username]";
} else {
    print "no session found \n";
    $result=user::login("karthi", "hello");
    if ($result) {
        print "login sussess,". $result['username'];
        session::set("is_loggedin", true);
        session::set("session_user", $result);
    } else {
        print "invalid";
    }
}   
echo "</pre>";























//echo $count = $stmt->fetchColumn();
// $stmt=$pdo->prepare("SELECT *FROM users LIMIT:limit,:offset");
// $stmt->execute(['limit'=>$limit,'offset'=>$offset]);
// $data=$stmt->fetchAll();
// foreach($data as $row){
//     echo$row['name']."<br/>\n";
// }
