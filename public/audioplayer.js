var currentSong = 0;
var player = $("#audioPlayer")[0];
var seekBarBackdrop = $("#seekClickable");
var seekBar = $("#seekBar");
var buttonPlay = $("#playpause");
var buttonPrevious = $("#previous");
var buttonNext = $("#next");
var playlistRows = $("#playlist tr");
var headerSongTitle = $("#songTitle");
var headerSongDetails = $("#songDetails");
var headerAuthorIcon = $("#headerAuthorIcon");
var currentTime = $("#currentTime");
var totalTime = $("#totalTime");


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
    if( currentSong === -1 )
        currentSong = playlistRows.length - 1;

    updatePlayer();
    player.play();
}


function next(event) {
    event.preventDefault();
    currentSong++;
    if( currentSong === playlistRows.length )
        currentSong = 0;

    updatePlayer();
    player.play();
}

function seek(event) {
    var mousePosX = event.clientX - seekBarBackdrop.offset().left;
    player.currentTime = player.duration * (mousePosX / seekBarBackdrop.outerWidth());
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
    playlistRows.removeClass("current-song");

    var tableRow = $("#playlist tr:eq(" + currentSong + ")");
    var filename = $("#playlist tr:eq(" + currentSong + ") p:eq(2)").text();
    var artistname = $("#playlist tr:eq(" + currentSong + ") p:eq(0)").text();
    var songname = $("#playlist tr:eq(" + currentSong + ") p:eq(1)").text();
    var authoricon = $("#playlist tr:eq(" + currentSong + ") td:eq(0) img").attr('src');

    headerSongTitle.html(artistname);
    headerSongDetails.html(songname);
    headerAuthorIcon.css('background-image', 'url(' + authoricon, + ')');
    
    tableRow.scrollintoview();
    tableRow.addClass("current-song");

    player.src = filename;
    player.load();

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