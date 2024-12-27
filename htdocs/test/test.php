<pre>
<?php

global $__site_config;
$__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '\..\photogramconfig.json');

function get_db_config($key)
{
    global $__site_config;
    $array = json_decode($__site_config, true);
    if (isset($array[$key]))
        return $array[$key];
    else
        return null;
}
echo get_db_config("db_username");
$array = json_decode($__site_config, true);
print_r($array);
?>
</pre>












<?php
/*print_r($_POST);
print_r($_COOKIE);
try {
  $conn = new PDO("mysql:host=localhost;dbname=lostandfind", 'root', 'Karthi@2004');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "select *from user";
  $conn->exec($sql);
  echo "selected";
} catch (PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;*/
//print_r($_SERVER);
/*if (signup($_POST['username'], $_POST['pass'], $_POST['emailid'], $_POST['phone'])) {
  print 'success';
}else{
  echo 'fail';
}*/
//database::getconnection();
?>