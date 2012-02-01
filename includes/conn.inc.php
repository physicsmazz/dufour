<?php
define('DB_SERVER', 'dufour.db.7855904.hostedresource.com');
define('DB_USER', 'dufour');
define('DB_PASSWORD', 'MyDB!!6299');
define('DB_NAME', 'dufour');
$conn = new mySQLi (DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die(mysqli_error());