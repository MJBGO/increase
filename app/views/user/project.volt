{% extends 'layouts/project.volt' %}

{% block listContainer %}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Équipe</h1>
        </div>
        <ul class="list-group" id="devEquipe">
            <li id="maskTeam" class="list-group-item">
                <strong data-id="name"></strong>
                (<span data-id="weight"></span>)
            </li>
        </ul>
    </div>
{% endblock %}