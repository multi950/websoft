<?php

require "config.php";
require "SQL.php";


$db = connectDatabase($dsn);

// Prepare and execute the SQL statement
$stmt = $db->prepare("SELECT * FROM tech");
$stmt->execute();

// Get the results as an array with column names as array keys
$res = $stmt->fetchAll();
echo "<pre>", print_r($res, true), "</pre>";
?>
