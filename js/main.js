function getWord(event, data) {
    'use strict';
    event.preventDefault();
    event.stopPropagation();
    $.ajax({
        type: 'get',
        url: 'http://' + window.location.hostname + '/idiomas/' + "server/get-word.php",
        dataType: 'json',
        data: data,
        success: function (msg) {
            if (msg.ok && msg.ok !== null && msg.ok !== 'undefined' && msg.ok.length >= 1) {
                $('#result-word-info').addClass('hidden');
                $('#table-word').removeClass('hidden');
                $('#table-word-tbody').html('');
                var i;
                for (i in msg.ok) {
                    var table = '<tr>';
                    table += '<td>' + msg.ok[i].english + '</td>';
                    table += '<td>' + msg.ok[i].spanish + '</td>';
                    table += '<td>' + msg.ok[i].pronunciation + '</td>';
                    table += '<td>' + msg.ok[i].extra + '</td>';
                    table += '<td>' + msg.ok[i].audio + '</td>';
                    table += '</tr>';
                    $('#table-word-tbody').append(table);
                }
            } else {
                $('#result-word-info').removeClass('hidden');
                $('#result-word-info>span').text('Su palabra no ha podido ser encontrada');
                window.console.log("Error: " + msg.ok);
            }
            if (msg.error) {
                $('#result-word-info').removeClass('hidden');
                $('#result-word-info>span').text('Su palabra no ha podido ser encontrada');
                window.console.log("Error: " + msg.error);
            }
        },
        error: function (jqXHR, msg, error) {
            $('#table-word').addClass('hidden');
            $('#result-word-info').removeClass('hidden');
            $('#result-word-info>span').text('Su palabra no ha podido ser encontrada');
            window.console.log("Error: " + error);
        }
    });
    return false;
}

$(document).ready(function () {
    'use strict';
    $('#english-word-form').submit(function (event) {
        getWord(event, $(this).serialize());
    });
    
    $('#spanish-word-form').submit(function (event) {
        getWord(event, $(this).serialize());
    });
});