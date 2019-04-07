<?php
require_once("database.php");
$user = $_SERVER['REDIRECT_REMOTE_USER'];

$result = request('SELECT * FROM user_');
/*print_r($result);*/
echo("==============");

print_r($_REQUEST);
echo("==============");

print_r($_SERVER['REDIRECT_REMOTE_USER']);

?>