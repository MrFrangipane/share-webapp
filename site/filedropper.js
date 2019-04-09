$(document).on('dragenter', '#dropfile', function() {
    $(this).addClass("dragHover");

    return false;
});


$(document).on('dragover', '#dropfile', function(e){
    e.preventDefault();
    e.stopPropagation();

    if(!e.originalEvent.dataTransfer) {
        $(this).removeClass("dragHover");
        $(this).addClass("dragHoverError");
    } else {
        if(e.originalEvent.dataTransfer.items.length!= 1) {
            $(this).removeClass("dragHover");
            $(this).addClass("dragHoverError");
        }
    }

    return false;
});


$(document).on('dragleave', '#dropfile', function(e) {
    e.preventDefault();
    e.stopPropagation();

    $(this).removeClass("dragHover");
    $(this).removeClass("dragHoverError");

    return false;
});


$(document).on('drop', '#dropfile', function(e) {
    if(e.originalEvent.dataTransfer ) {
        if(e.originalEvent.dataTransfer.files.length == 1) {
            // Stop the propagation of the event
            e.preventDefault();
            e.stopPropagation();
            // Main function to upload
            var song_name = prompt("Give a song name for " + e.originalEvent.dataTransfer.files[0].name)
            //upload(e.originalEvent.dataTransfer.files);
        }
    }
    $(this).removeClass("dragHover");
    $(this).removeClass("dragHoverError");

    return false;
});