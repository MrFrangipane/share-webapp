<?php
require_once 'config.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Connected to $dbname at $host successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>


<table id="playlist">
    <tr>
        <td>Odezene</td><td>TuPuDuCu</td>
        <td style="display:none;">songs/Odezenne-TuPuDuCu.mp3</td>
    </tr>
    <tr>
        <td>N'to</td><td>T'es triste</td>
        <td style="display:none;">songs/T'es triste.mp3</td>
    </tr>
    <tr>
        <td>Sonotheque</td><td>Whip</td>
        <td style="display:none;">songs/Whip.mp3</td>
    </tr>
</table>
