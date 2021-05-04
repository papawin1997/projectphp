<?php
define('servername', 'localhost');
define('username', 'root');
define('password', '');
define('dbname', 'project_db');
$objCon = mysqli_connect(servername, username, password,dbname);
mysqli_set_charset($objCon,"utf8");
?>