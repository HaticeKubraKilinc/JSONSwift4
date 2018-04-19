<?php
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'password');
define('DB_HOST', 'localhost');
define('DB_NAME', 'Twitter');
$con=mysqli_connect("DB_HOST","DB_USERNAME","pDB_PASSWORD","DB_NAME");
 
define('USER_CREATED', 0);
define('USER_ALREADY_EXIST', 1);
define('USER_NOT_CREATED', 2);

?>