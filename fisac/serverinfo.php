<?php

$reqtype = $_SERVER['REQUEST_METHOD'];
$server_data = $_SERVER;

// print the whole request data

echo "<pre>";
print_r($server_data);
echo "</pre>";

?>