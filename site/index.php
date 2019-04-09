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
        <table>
            <tr>
                <td><img id="previous" src="site/icons/previous.png"></td>
                <td><img id="stop" src="site/icons/stop.png"></td>
                <td><img id="play" src="site/icons/play.png"></td>
                <td><img id="pause" src="site/icons/pause.png"></td>
                <td><img id="next" src="site/icons/next.png"></td>
                <td><div id="seekBackdrop">
                    <div id="seekBar"></div>
                </div></td>
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
