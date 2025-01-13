<?php

$tabledata = json_decode(file_get_contents('php://input'), true);

if ($tabledata) {
    setcookie("poo", json_encode($tabledata), time() + (86400 * 30), "/");
    print($_COOKIE["poo"]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
}
// $myfile = fopen("testfile.txt", "w");
// fwrite($myfile, "hkja");
// fwrite($myfile, $_POST['item']);
// fclose($myfile);

