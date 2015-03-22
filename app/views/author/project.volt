{% extends 'layouts/project.volt' %}

{% block listContainer %}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Mes Uses cases</h1>
        </div>
        <ul class="list-group" id="listUsecases">
            <ul class="list-group usegroup maskUsecase">
                <li class="list-group-item usecase" data-id="url" data-url="[[url]]">
                    <div class="row">
                        <div class="col-md-5">
                            <span class="usecase-name" data-id="name"></span>
                            (<span class="usecase-weight" data-id="weight"></span>)
                        </div>
                        <div class="col-md-5">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-id="progress" style="width: [[progress]]%;">
                                    [[progress]]%
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <span class="nb-tasks" data-id="nbTasks"></span> tâche(s)
                        </div>
                    </div>
                </li>
                <ul class="list-group listTasks"></ul>
            </ul>
        </ul>
    </div>
{% endblock %}