<?php
header("Content-type: text/html; charset=utf-8"); 
require  'medoo/medoo.min.php';
require  'config.php';
$medoo = new medoo(array(
	'database_type' => 'mysql',
	'database_name' => 'group',
	'server' => HOST,
	'username' => USERNAME,
	'password' => PASSWORD,
	'charset' => 'utf8',
));


?>