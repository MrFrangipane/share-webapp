<?php

function request($request_)
{
    $infos = json_decode(file_get_contents("config.json"), true);
    $host = $infos["host"];
    $dbname = $infos["dbname"];
    $username = $infos["username"];
    $password = $infos["password"];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        $result = $conn->query($request_);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result;

    } catch (PDOException $pe) {
        die("MySQL error :" . $pe->getMessage());
    }
}

?>