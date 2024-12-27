<pre>
<?php
// class magic{
    
//     public function __call($name,$arg){
//         print $name."\n";
//         print_r($arg);
//     }
// }   

// $magic=new magic();
// $magic->sam("nkdjsh",[1,2,3,4]);
include '../libs/load.php';
$magic=new user("karthi");
$magic->getBioHi();
?>
</pre>
