{% extends 'layouts/project.volt' %}

{% block listContainer %}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Équipe</h1>
        </div>
        <ul class="list-group" id="devEquipe"></ul>
    </div>
{% endblock %}

{% block javascripts %}
    {{ super() }}
    <script>
        var teamUrl = "{{ url("project/equipe/" ~ project.getId()) }}";
    </script>

    {{ javascript_include('js/user.js') }}
{% endblock %}