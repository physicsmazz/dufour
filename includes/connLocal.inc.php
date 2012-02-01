<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'dufour');
$conn = new mySQLi (DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die(mysqli_error());