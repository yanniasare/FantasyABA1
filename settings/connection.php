<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'YYdajvslMa/0';
$db_name = 'fantasy';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
} 

//$conn->query("SET GLOBAL general);
$conn->query("SET GLOBAL general_log = 'ON'");
$conn->query("SET GLOBAL log_output = 'TABLE'");
?>