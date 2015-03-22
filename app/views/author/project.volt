{% extends 'layouts/project.volt' %}

{% block listContainer %}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Mes Uses cases</h1>
        </div>
        <ul class="list-group" id="listUsecases"></ul>
    </div>
{% endblock %}

{% block javascripts %}
    <script>
        var usecasesUrl = "{{ url("project/author/" ~ project.getId() ~ "/" ~ authorId) }}";
        var tasksUrl = "{{ url("usecase/tasks/") }}";
    </script>
    {{ javascript_include('js/author.js') }}

    {{ stylesheet_link('css/author.css') }}
{% endblock %}