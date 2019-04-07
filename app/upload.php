<?php

$user = $_SERVER['REDIRECT_REMOTE_USER'];

$infos = json_decode(file_get_contents("config.json"), true);
$host = $infos["host"];
$dbname = $infos["dbname"];
$username = $infos["username"];
$password = $infos["password"];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $request = 'SELECT name FROM author
                INNER JOIN author ON song.author = author.id
                ORDER BY author.name, song.timestamp DESC';

    $result = $conn->query($request);
    $result->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

print_r($_REQUEST);
echo("==============");
print_r($_SERVER['REDIRECT_REMOTE_USER']);

?>