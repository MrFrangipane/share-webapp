<?php
require_once("database.php");

$result = request(
    'SELECT song.id as id, user_.name as author, song.name as song, timestamp FROM song
    INNER JOIN user_ ON song.author = user_.id
    ORDER BY user_.name ASC, song.timestamp DESC'
);

?>

<div id="playlistScrollable">
    <table id="playlist">
        <?php while ($row = $result->fetch()) : ?>
            <tr><td>
                <p class="title"><?php echo htmlspecialchars($row['song']) ?></p>
                <p class="details"><?php echo htmlspecialchars($row['author']) ?></p>
                <p style="display:none;">songs/<?php echo htmlspecialchars($row['id']) ?>.mp3</p>
            </td></tr>
        <?php endwhile; ?>
    </table>
</div>