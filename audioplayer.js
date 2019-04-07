var currentSong = 0;

function updatePlayer() {
    $("#playlist tr").removeClass("current-song");
    $("#playlist tr:eq(" + currentSong + ")").addClass("current-song");
    var filename = $("#playlist tr:eq(" + currentSong + ") td:eq(2)").text();
    $("#audioPlayer")[0].src = filename;
}

function installCallbacks() {
    // PLAYLIST CLICK
    $("#playlist tr").click(function(event){
        event.preventDefault();
        currentSong = $(this).index();
        updatePlayer();
        $("#audioPlayer")[0].play();
    });

    // SONG END
    $("#audioPlayer")[0].addEventListener("ended", function(){
        currentSong++;
        if( currentSong == $("#playlist tr").length )
            currentSong = 0;

        updatePlayer();
        $("#audioPlayer")[0].play();
    });
}

function setupAudioPlayer() {
    installCallbacks();
    updatePlayer();
}