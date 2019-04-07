<?php
require_once("database.php");

$result = request(
    'SELECT song.id as id, user_.name as author, song.name as song, timestamp FROM song
    INNER JOIN user_ ON song.author = user_.id
    ORDER BY user_.name, song.timestamp DESC'
);

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
