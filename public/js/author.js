/* Permet de récupérer les tâches associées à un usecase. Je n'ai pas eu le temps de convertir avec la library */
$(document).on('click', '#listUsecases .usecase', function() {
    $tasksDiv = $(this).parent().find('.listTasks');
    var isVisible = $tasksDiv.css('display') == 'block';
    if (isVisible) {
        $tasksDiv.hide();
    } else {
        var url = $(this).attr('data-url');

        $.getJSON(url, function (data) {
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

/* Affiche les boutons Modifier et Supprimer lors d'un clic sur une tâche */
$(document).on('click', '#listUsecases .task', function() {
    $('.task').removeClass('is-active');
    $('.btn-modify').show();
    $('.btn-delete').show();
    $(this).addClass('is-active');
});