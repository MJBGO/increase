$(document).ready(function() {
    $.getJSON(usecasesUrl, function(data) {
        $.each(data, function(index, value) {
            $('#listUsecases').append(
                '<ul class="list-group usegroup" data-code="' + value.code + '">' +
                '<li class="list-group-item usecase">' +
                '<div class="row">' +
                '<div class="col-md-5">' +
                '<span class="usecase-name">' + value.name + '</span> ' +
                '<span class="usecase-weight">(' + value.weight + ')</span>' +
                '</div>' +
                '<div class="col-md-6">' + getProgressBar(value.progress) + '</div>' +
                '<div class="col-md-1">' +
                '<span class="nb-tasks">' + value.nbTasks + ' ' + ((value.nbTasks > 1) ? 'tâches' : 'tâche') +
                '</span>' +
                '</div>' +
                '</div>' +
                '</li>' +
                '<ul class="list-group listTasks" id="divUseCase-' + index + '"></ul>' +
                '</ul>'
            );
        });
    });
});

$(document).on('click', '#listUsecases .usecase', function() {
    $tasksDiv = $(this).parent().find('.listTasks');
    var isVisible = $tasksDiv.css('display') == 'block';
    if (isVisible) {
        $tasksDiv.hide();
    } else {
        var code = $(this).parent().attr('data-code');

        $.getJSON(tasksUrl + code, function (data) {
            $tasksDiv.empty();
            $.each(data, function (index, value) {
                $tasksDiv.append(
                    '<li class="task list-group-item">' +
                    '<div class="row">' +
                    '<div class="col-md-9">' +
                    '<span class="usecase-name">' + value.name + '</span> ' +
                    '<span class="usecase-weight">(' + value.progress + ')</span>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<span class="nb-tasks">' + value.date +
                    '</span>' +
                    '</div>' +
                    '</div>' +
                    '</li>' +
                    '<li class="buttons list-group-item">' +
                    '<a href="#" class="btn btn-primary btn-add">Ajouter une tâche</a>' +
                    '<a href="#" class="btn btn-primary btn-modify">Modifier</a>' +
                    '<a href="#" class="btn btn-primary btn-delete">Supprimer</a>' +
                    '</li>'
                );
                $tasksDiv.show();
            });
        });
    }
});

$(document).on('click', '#listUsecases .task', function() {
    $('.task').removeClass('is-active');
    $('.btn-modify').show();
    $('.btn-delete').show();
    $(this).addClass('is-active');
});

function getProgressBar(progress) {
    return '<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="' + progress +
        '" aria-valuemin="0" aria-valuemax="100" style="width: ' + progress + '%;">' + progress + '%</div></div>';
}