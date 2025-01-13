<?php

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    setcookie("prod_cache", json_encode($data), time() + (86400 * 30), "/");
} 