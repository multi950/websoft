<?php

require "config.php";
$dsn_config = $dsn;

/**
 * @var array $dsn with connection details
 * @return object database connection
 */


function connectDatabase(array $dsn = null)
{
    if($dsn === null){
        global $dsn_config;
        $dsn = $dsn_config;
    }
    try {
        $db = new PDO(
            $dsn["dsn"],
            $dsn["username"],
            $dsn["password"]
        );

        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>\n";
        print_r($dsn);
        throw $e;
    }

    return $db;
}

/**
 * @var string $prepared_statement
 * @var array $query_parameters
 * @var bool $expected_return
 * @return string query_result
 */
function sqlQuery(string $prepared_statement, array $query_parameters = null, bool $expected_return = false){
    $db = connectDatabase();
    $stmt = $db->prepare($prepared_statement);
    $query_parameters === null ? $stmt->execute() : $stmt->execute($query_parameters);
    return $expected_return ? $stmt->fetchAll() : null;
}