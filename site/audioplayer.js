var currentSong = 0;
var player = $("#audioPlayer")[0];
var seekBar = $("#seekBar");


function select(event) {
    event.preventDefault();
    currentSong = $(this).index();
    updatePlayer();
    $("#audioPlayer")[0].play();
}


function seek(event) {
    event.preventDefault();
}


function ended() {
    currentSong++;
    if( currentSong == $("#playlist tr").length )
        currentSong = 0;

    updatePlayer();
    $("#audioPlayer")[0].play();
}


function updateProgress() {
    var progress = (player.currentTime / player.duration) * 100;
    seekBar.width(progress + "%");
}


function updatePlayer() {
    $("#playlist tr").removeClass("current-song");

    var filename = $("#playlist tr:eq(" + currentSong + ") p:eq(2)").text();
    var artistname = $("#playlist tr:eq(" + currentSong + ") p:eq(0)").text();
    var songname = $("#playlist tr:eq(" + currentSong + ") p:eq(1)").text();

    player.src = filename;
    player.load();
    $("#playlist tr:eq(" + currentSong + ")").addClass("current-song");

    $("#songTitle").html(artistname);
    $("#songDetails").html(songname);
}


function installCallbacks() {
    $("#playlist tr").click(select);
    player.addEventListener("ended", ended);
    player.addEventListener("timeupdate", updateProgress);
    seekBar.click(seek);
}


function setupAudioPlayer() {
    installCallbacks();
    updatePlayer();
}