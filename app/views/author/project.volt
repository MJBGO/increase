{%- macro showMessage(message, parentId) %}
    {% if message.getIdFil() == parentId or message.getIdFil() == null %}
        <div class="msg">
            <header>
                <span class="msg-object">{{ message.getObjet() }}</span>
                <span class="bullet">•</span>
                <span class="msg-user">{{ message.getUser().getIdentite() }}</span>
                <span class="bullet">•</span>
                <span class="msg-date">{{ date('d/m/Y H:i:s', message.getDate()) }}</span>
            </header>
            <div class="msg-text">
                {{ message.getContent() }}
            </div>
            <footer>
                <a href="#" class="msg-reply">Répondre</a>
            </footer>
        </div>
        <div class="msg-children">
            {% for child in message.getChildren() %}
                {{ showMessage(child, message.getId()) }}
            {% endfor %}
        </div>
    {% endif %}
{%- endmacro %}

<div class="col-md-2">
    <a href="#" class="thumbnail">
        {{ image("img/" ~ project.getNom() ~ ".png") }}
    </a>
</div>
<div class="col-md-10">
    <div class="page-header">
        <h1>{{ project.getNom() }}
            <small>[{{ project.getUser().getIdentite() }}]</small>
        </h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Détails du projet</h1>
        </div>
        <div class="panel-body">
            <p>{{ project.getDescription() }}</p>
            <p>Date de lancement : {{ date('d/m/Y', project.getDatelancement()) }}</p>
            <p>Date de fin prévue : {{ date('d/m/Y', project.getDatefinprevue()) }}</p>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Mes Uses cases</h1>
        </div>
        <ul class="list-group" id="listUsecases"></ul>
    </div>

    <div class="btns">
        <a id="btnMessages" class="btn btn-primary">Montrer les {{ messages|length }} messages</a>
    </div>

    <div id="divMessages">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title">{{ messages|length }} messages</h1>
            </div>
            <ul class="list-group" id="listMessages">
                {% for message in messages %}
                    {{ showMessage(message, -1) }}
                {% endfor %}
            </ul>
            <a href="#" id="btnAddMessage" class="btn btn-primary">Nouveau message</a>
        </div>
    </div>
    <a href="#" id="btnCloseProject" class="btn btn-primary">Fermer le projet</a>
</div>

{% block javascripts %}
    <script>
        var usecasesUrl = "{{ url("project/author/" ~ project.getId() ~ "/" ~ authorId) }}";
        var tasksUrl = "{{ url("usecase/tasks/") }}";
    </script>
    {{ javascript_include('js/project.js') }}
    {{ javascript_include('js/author.js') }}
{% endblock %}

{% block stylesheets %}
    {{ stylesheet_link('css/project.css') }}
    {{ stylesheet_link('css/author.css') }}
{% endblock %}