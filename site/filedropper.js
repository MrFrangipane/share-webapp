var form = $("#form")[0];
var message = $("#message");
var droppedFile = null;
var progress = $("#uploadProgress")
var isUploading = false;


function GUISetMessage(message_)
{
    message.html(message_);
}


function GUIResetMessage()
{
    GUISetMessage("Drop file on icon or browse ");
}


function GUISetUploading(isUploading_)
{
    isUploading = isUploading_;
    
    if( isUploading )
    {
        $("#form").hide();
        $("#dropfile").hide();

        $("#uploadDiv").show();

        GUISetMessage("Uploading ...");
    }
    else
    {
        $("#form").show();
        $("#dropfile").show();

        $("#uploadDiv").hide();
    }
}


$(document).on('dragenter', '#dropfile', function()
{
    if( isUploading ) { return false; }

    $(this).addClass("dragHover");

    return false;
});


$(document).on('dragover', '#dropfile', function(e)
{
    e.preventDefault();
    e.stopPropagation();

    return false;
});


$(document).on('dragleave', '#dropfile', function(e)
{
    e.preventDefault();
    e.stopPropagation();

    if( isUploading ) { return false; }

    $(this).removeClass("dragHover");

    return false;
});


$(document).on('drop', '#dropfile', function(e)
{
    e.preventDefault();
    e.stopPropagation();

    if( isUploading ) { return false; }

    $(this).removeClass("dragHover");

    if(e.originalEvent.dataTransfer ) {
        if(e.originalEvent.dataTransfer.files.length == 1) {
            droppedFile = e.originalEvent.dataTransfer.files[0];
            updateMessage();
        }
    }

    return false;
});


$(document).on('change', '#file', function(e)
{
    if( isUploading ) { return false; }

    droppedFile = this.files[0];
    updateMessage();
});


function updateMessage()
{
    var match = droppedFile.type.match('audio/mpeg') || droppedFile.type.match('audio/mp3');
    if( !match )
    {
        GUIResetMessage();
    } else
    {
        GUISetMessage(droppedFile.name);
    }
}


$("#form").submit(function(event)
{
    event.preventDefault();

    if( isUploading ) { return false; }
    
    if( droppedFile == null ) { return false; }
    
    var songName = prompt("Please enter a song name", "");
    if( songName == null || songName == "" ) { return false; }

    GUISetUploading(true);

    isUploading = true;

    var formData = new FormData();
    formData.append("file", droppedFile);
    formData.append("songName", songName);

    $.ajax({
        url:'upload',
		type: 'POST',
		data: formData,
        cache: false,
        contentType: false,
        processData: false,

		xhr: function () {
            var xhr = $.ajaxSettings.xhr();
            if (xhr.upload) {
                // For handling the progress of the upload
                xhr.upload.addEventListener("progress", function (e) {
                    if (e.lengthComputable) {
                        var percentComplete = e.loaded / e.total * 100;
                        progress.width(percentComplete + "%");
                    }
                }, false);
            }
            return xhr;
        },

        success: function(result) {
            progress.width("0%");
            GUISetMessage("Upload succes !");
            droppedFile = null;
            console.log(result);
            GUISetUploading(false);
        }
    });

    isUploading = false;
});


function setupUploader() {
    GUIResetMessage();
    GUISetUploading(false);
}
