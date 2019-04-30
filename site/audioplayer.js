var player = $("#audioPlayer")[0];

var currentSong = 0;
var playlistRows = $("#playlist tr");

var currentAuthor = 0;
var authorsRows = $("#authors tr");

var buttonPlay = $("#playpause");
var buttonPrevious = $("#previous");
var buttonNext = $("#next");

var seekBarBackdrop = $("#seekClickable");
var seekBar = $("#seekBar");
var currentTime = $("#currentTime");
var totalTime = $("#totalTime");

var headerSongTitle = $("#songTitle");
var headerSongDetails = $("#songDetails");


function select(event) {
    event.preventDefault();
    currentSong = $(this).index();
    updatePlayer();
    player.play();
}


function play(event) {
    event.preventDefault();
    if( player.paused )
    {
        player.play();
        updateProgress();
    }
    else
    {
        player.pause();
        updateProgress();
    }
}


function previous(event) {
    event.preventDefault();
    currentSong--;
    if( currentSong == -1 )
        currentSong = playlistRows.length - 1;

    updatePlayer();
    player.play();
}


function next(event) {
    event.preventDefault();
    currentSong++;
    if( currentSong == playlistRows.length )
        currentSong = 0;

    updatePlayer();
    player.play();
}

function seek(event) {
    var mousePosX = event.clientX - seekBarBackdrop.offset().left;
    var songPos = player.duration * (mousePosX / seekBarBackdrop.outerWidth());
    player.currentTime = songPos;
}


function ended(event) {
    next(event);
}


function updateProgress() {
    // Seek bar
    var progress = (player.currentTime / player.duration) * 100;
    seekBar.width(progress + "%");

    // Buttons
    if( player.paused ) {
        buttonPlay.css('background-image', 'url(site/icons/play.png)')
    } else {
        buttonPlay.css('background-image', 'url(site/icons/pause.png)')
    }
    
    // Time
    var minute = Math.floor(player.currentTime / 60);
    var second = Math.floor(player.currentTime - minute * 60);

    var minuteTotal = Math.floor(player.duration / 60);
    var secondTotal = Math.floor(player.duration - minuteTotal * 60);

    if(minute < 10)
        minute = '0'+minute;

    if(second < 10)
        second = '0'+second;

    if(minuteTotal < 10)
        minuteTotal = '0'+minuteTotal;

    if(secondTotal < 10)
        secondTotal = '0'+secondTotal;

    currentTime.text(minute+':'+second);
    totalTime.text(minuteTotal+':'+secondTotal);
}


function updatePlayer() {
    playlistRows.removeClass("selected");
    authorsRows.removeClass("selected");

    var authorsRow = $("#authors tr:eq(" + currentAuthor + ")");
    authorsRow.addClass("selected");

    var playlistRow = $("#playlist tr:eq(" + currentSong + ")");
    var filename = $("#playlist tr:eq(" + currentSong + ") p:eq(2)").text();
    var artistname = $("#playlist tr:eq(" + currentSong + ") p:eq(1)").text();
    var songname = $("#playlist tr:eq(" + currentSong + ") p:eq(0)").text();

    headerSongTitle.html(songname);
    headerSongDetails.html(artistname);
    
    playlistRow.scrollintoview();
    playlistRow.addClass("selected");

    player.src = filename;
    player.load();

    $("title").text(songname + " - " + artistname + " | Frangitron Share");

    updateProgress();
}


function installCallbacks() {
    playlistRows.click(select);
    
    player.addEventListener("ended", ended);
    player.addEventListener("timeupdate", updateProgress);
    
    buttonPlay.click(play);
    buttonNext.click(next);
    buttonPrevious.click(previous);
    seekBarBackdrop.click(seek);
}


function setupAudioPlayer() {
    player.loop = false;
    installCallbacks();
    updatePlayer();
}
