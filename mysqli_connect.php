<?php # Establish the database connection via importing this file.
#Make sure to modify the variables if you have different login, password, or host.
DEFINE ('DB_USER', 'root');
DEFINE('DB_PASSWORD','');
DEFINE('DB_HOST','127.0.0.1');
DEFINE('DB_NAME','csc350_final');

$dbc = mysqli_connect(DB_HOST,DB_USER, DB_PASSWORD,DB_NAME) OR die ('Could not connect to MYSQL" '.mysqli_connect_error());

mysqli_set_charset($dbc,'utf8');
?>