<?php

$mysqli = new mysqli($DB_HOST,$DB_USER , $DB_PASSWORD,$DB_NAME);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>