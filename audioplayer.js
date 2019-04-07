var currentSong = 0;

function updatePlayer() {
    $("#playlist tr").removeClass("current-song");
    $("#playlist tr:eq(" + currentSong + ")").addClass("current-song");
    $("#audioPlayer")[0].src = $("#playlist tr a")[currentSong];
}

function installCallbacks() {
    // PLAYLIST CLICK
    $("#playlist tr a").click(function(event){
        event.preventDefault();
        currentSong = $(this).parent().parent().index();
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