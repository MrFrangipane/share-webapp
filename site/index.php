<!-- icons made by : https://www.flaticon.com/authors/pixel-perfect -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Frangitron Share</title>
    <link rel="stylesheet" type="text/css" href="site/style.css">
</head>
<body>
    <div id="header">
        <table>
            <tr>
                <td class="headerLogo"></td>
                <td class="headerSong">
                    <p id="songTitle" class="songTitle"></p>
                    <p id="songDetails" class="songDetails"></p>
                </td>
                <td></td>
                <td class="headerUpload">
                    <div id="dropfile">
                        Drop .mp3 here :
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div id="player">
        <audio src="" id="audioPlayer">
            HTML is not supported :/
        </audio>
        <table id="playerControls">
            <tr>
                <td><div id="previous"></div></td>
                <td><div id="stop"></div></td>
                <td><div id="playpause"></div></td>
                <td><div id="next"></div></td>
                <td><div class="playerControlSpacer"></div></td>
                <td><div id="currentTime">1:36</div></td>
                <td><div id="seekBackdrop">
                    <div id="seekBar"></div>
                </div></td>
                <td><div id="totalTime">5:02</div></td>
                <td><div class="playerControlSpacer"></div></td>
                <td><div id="volumeIcon"></div></td>
            </tr>
        </table>
    </div>

    <?php include 'app/playlist.php'; ?>

    <script src="http://code.jquery.com/jquery-2.2.0.js"></script>
    <script src="site/audioplayer.js"></script>
    <script src="site/filedropper.js"></script>
    <script>
        setupAudioPlayer();
    </script>
</body>
</html>
