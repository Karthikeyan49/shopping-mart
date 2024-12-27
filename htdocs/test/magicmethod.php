<?php 
echo'<pre>';
include '../libs/load.php';

$user=new user("karthikeyan");
echo $user->setBio("wow");
echo '</pre>';