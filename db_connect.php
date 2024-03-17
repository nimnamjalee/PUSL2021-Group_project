<?php
require_once 'db_config.php';

try {
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
} catch (mysqli_sql_exception $e) {
  die("Error connecting to the database: " . $e->getMessage());
}

return $mysqli;
