<!-- icons made by : https://www.flaticon.com/authors/pixel-perfect -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=0.7, shrink-to-fit=no">
    <title>Frangitron Share</title>
    <link rel="stylesheet" type="text/css" href="site/style.css">
    <link rel="icon" type="image/png" href="favicon.png" />
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
                <td id="headerAuthorIcon" class="headerAuthor"></td>
                <td></td>
                <td class="headerUpload">
                    <table id="uploadTable">
                        <tr><td>
                            <div id="dropfile"></div>
                            <form id="form" enctype="multipart/form-data">
                                <input name="file" type="file" id="file" class="hiddenFormItem"/>
                                <label for="file" class="button">Browse...</label>
                                <input type="submit" value="Upload" id="send" class="hiddenFormItem"/>
                                <label for="send" class="button">Send !</label>
                            </form>
                            <div id="uploadDiv">
                                <div id="uploadBackdrop">
                                    <div id="uploadProgress"></div>
                                </div>
                            </div>
                        </td></tr>
                        <tr><td id="message" colspan="3"></td></tr>
                    </table>
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
                <td><div class="playerMargin"></div></td>
                <td><div id="previous"></div></td>
                <td><div id="playpause"></div></td>
                <td><div id="next"></div></td>
                <td><div class="playerControlSpacer"></div></td>
                <td><div id="currentTime">0:00</div></td>
                <td class="expanding">
                    <div id="seekClickable">
                        <div id="seekBackdrop">
                            <div id="seekBar"></div>
                        </div>
                    </div>
                </td>
                <td><div id="totalTime">0:00</div></td>
                <td><div class="playerControlSpacer"></div></td>
                <td><div id="volumeIcon"></div></td>
                <td><div class="playerMargin"></div></td>
            </tr>
        </table>
    </div>

    <?php include 'app/playlist.php'; ?>

    <script src="site/jquery.js"></script>
    <script src="site/jquery.scrollintoview.js"></script>
    <script src="site/audioplayer.js"></script>
    <script src="site/filedropper.js"></script>
    <script>
        setupAudioPlayer();
        setupUploader();
    </script>
</body>
</html>
