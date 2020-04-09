<?php
require_once("database.php");

$result = request('
    SELECT song.id as id, user_.name as author, user_.id as author_id, song.name as song, timestamp FROM song
    INNER JOIN user_ ON song.author = user_.id
    WHERE song.public = TRUE
    ORDER BY user_.name ASC, song.timestamp DESC
');

$download_icon = 'icons/download.png';

?>

<div id="playlistScrollable">
    <table id="playlist">
        <?php while ($row = $result->fetch()) : ?>
            <tr><td class="authorTd"><img class="authorIcon" src="authors/<?php echo htmlspecialchars($row['author_id']) ?>.png"></td>
            <td>
                <p class="songTitle"><?php echo htmlspecialchars($row['song']) ?></p>
                <p class="songDetails"><?php echo htmlspecialchars($row['author']) ?></p>
                <p style="display:none;">songs/<?php echo htmlspecialchars($row['id']) ?>.mp3</p>
            </td>
            <td class="downloadTd">
                <form method="get" action="songs/<?php echo htmlspecialchars($row['id']) ?>.mp3">
                    <button type="submit"><img class="downloadIcon" src="<?php echo htmlspecialchars($download_icon) ?>"></button>
                </form>
            </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
