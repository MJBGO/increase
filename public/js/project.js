$(document).ready(function() {
    $.getJSON(teamUrl, function(data) {
        $.each(data, function(index, value) {
            $('#devEquipe').append('<li class="list-group-item"><strong>' + value.name + '</strong>' +
            ' (' + Math.round(value.weight * 100) + '%)</li>');
        });
    });
});

$(document).on('click', '#btnMessages', function() {
    $('#btnMessages').hide();
    $('#divMessages').show();
});