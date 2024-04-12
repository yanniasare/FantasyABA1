<?php
// Declare constant variables to store the database connection parameters
$DB_HOST= '127.0.0.1';
$DB_USERNAME= 'root';
$DB_PASSWORD= 'YYdajvslMa/0';
$DB_NAME= 'fantasy.sql';

// Use mysqli connection method
$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// Check if connection worked
if ($conn->connect_error) {
    // Use the die() function if connection fails and display error
    die("Connection failed: " . $conn->connect_error);
}

// You can now use the `$conn` variable to run queries on the database
$conn->query("SET GLOBAL general_log = 'ON'");
$conn->query("SET GLOBAL log_output = 'TABLE'");
?>