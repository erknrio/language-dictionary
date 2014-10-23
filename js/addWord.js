function addWord(event, data) {
    'use strict';
    event.preventDefault();
    event.stopPropagation();
    var info = $('#result-word-info');
    $.ajax({
        type: 'post',
        url: 'http://' + window.location.hostname + '/idiomas/' + "server/add-word.php",
        dataType: 'json',
        data: data,
        success: function (msg) {
            if (msg.ok) {
                info.removeClass('hidden alert-danger').addClass('alert-success');
                info.text('Se ha insertado su palabra correctamente').fadeOut(4000);
            } else {
                info.removeClass('hidden');
                info.text('Ha habido un error al insertar la palabra').fadeOut(4000);
            }
        },
        error: function (jqXHR, msg, error) {
            info.removeClass('hidden');
            info.text('Ha habido un error al insertar la palabra').fadeOut(4000);
        }
    });
    return false;
}

$(document).ready(function () {
    'use strict';
    $('#add-word-form').submit(function (event) {
        addWord(event, $(this).serialize());
    });
});