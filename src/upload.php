<?php
require_once("database.php");
require_once("rest.php");

$user = $_SERVER['REDIRECT_REMOTE_USER'];
$response['status'] = 0;
$response['error'] = "Unknown error !";

// ANY FILES ?
if(isset($_POST["songName"])) {
    $request_ = "SELECT * FROM user_ WHERE user_.username = '" . $user ."'";   
    $user = request($request_)->fetch();

    // USER EXISTS
    if( $user != false )
    {
        $request_ = "INSERT INTO song (author, name) VALUES (" . $user['id'] . ", '" . $_POST["songName"] . "')";
        $inserted_id = exec_($request_);

        if( $inserted_id != 0 )
        {
            $target_file = "songs/" . $inserted_id . ".mp3";
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

            $response['newFile'] = $target_file;
            $response['error'] = "";
            $response['status'] = 1;
        }
        else
        {
            $response['error'] = "Song already exists !";
        }
    }
    else {
        $response['error'] = "User is not registered !";
    }
}
else {
    $response['error'] = "No song name !";
}


header('Content-Type: application/json');
echo(json_encode($response));
?>
