<?php

$infos = json_decode(file_get_contents("../config.json"), true);
$host = $infos["host"];
$dbname = $infos["dbname"];
$username = $infos["username"];
$password = $infos["password"];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $request = 'SELECT song.id as id, author.name as author, song.name as song, timestamp FROM song
                INNER JOIN author ON song.author = author.id
                ORDER BY author.name, song.timestamp DESC';

    $result = $conn->query($request);
    $result->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>