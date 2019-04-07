<?php
require_once 'config.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Connected to $dbname at $host successfully.";

    $request = 'SELECT song.id as id, author.name as author, song.name as song, timestamp FROM song
                INNER JOIN author ON song.author = author.id
                ORDER BY author.name, song.timestamp DESC';

    $result = $conn->query($request);
    $result->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>

<table id="playlist">
    <?php while ($row = $result->fetch()) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row['author']) ?></td>
            <td><?php echo htmlspecialchars($row['song']) ?></td>
            <td style="display:none;">songs/<?php echo htmlspecialchars($row['id']) ?>.mp3</td>
        </tr>
    <?php endwhile; ?>
</table>
