<?php
require_once("database.php");
require_once("rest.php");

$user = $_SERVER['REDIRECT_REMOTE_USER'];
$post_infos = read_post();

$request_ = "SELECT * FROM user_ WHERE user_.username = '" . $user ."'";
$result = request($request_)->fetch();

// USER EXISTS
if( $result != false )
{
    $request_ = "INSERT INTO song (author, name) VALUES (" . $result['id'] . ", '" . $post_infos['song_name'] . "')";
    $result['inserted_id'] = exec_($request_);
}


header('Content-Type: application/json');
echo json_encode($result);
?>