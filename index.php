<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Frangitron Share</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="player">
        <audio src="" controls id="audioPlayer">
            HTML is not supported :/
        </audio>
    </div>

    <?php include 'playlist.php'; ?>

    <script src="http://code.jquery.com/jquery-2.2.0.js"></script>
    <script src="audioplayer.js"></script>
    <script>
        setupAudioPlayer();
    </script>
</body>
</html>
