function submitWord() {
    $.ajax({
        type: 'get',
        url: 'http://' + window.location.hostname + '/idiomas/' + "server/get-list.php",
        dataType: 'json',
        data: { word : "" + $(this).text() + "" },
        success: function (msg) {
            window.console.log(msg);
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
}

$(document).ready(function () {
    'use strict';
    var array = ['«', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'k', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '»'], i = 0;
    for (i = 0; i < array.length; i++) {
        $('#word-' + array[i] + '').on('click', submitWord);
    }
});