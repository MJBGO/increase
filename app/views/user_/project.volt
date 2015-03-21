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
            <h1 class="panel-title">Équipe</h1>
        </div>
        <ul class="list-group" id="devEquipe"></ul>
    </div>

    <div class="btns">
        <a id="btnMessages" class="btn btn-primary">{{ nbMessages }} messages...</a>
    </div>

    <div id="divMessages">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title">{{ nbMessages }} messages</h1>
            </div>
            <ul class="list-group" id="listMessages"></ul>
        </div>
    </div>
</div>

{% block javascripts %}
    <script>
        $(document).ready(function() {
            $.getJSON('{{ url("project/equipe/" ~ project.getId()) }}', function(data) {
                $.each(data, function(index, value) {
                    $('#devEquipe').append('<li class="list-group-item"><strong>' + value.name + '</strong>' +
                    ' (' + Math.round(value.weight * 100) + '%)</li>');
                });
            });
        });

        $(document).on('click', '#btnMessages', function() {
            $('#btnMessages').hide();
            $('#divMessages').show();
            $.getJSON('{{ url("project/messages/" ~ project.getId()) }}', function(data) {
                $.each(data, function(index, value) {
                    $('#listMessages').append('<li class="list-group-item"><strong>' + value.user + '</strong>' +
                    ' - ' + value.object + ' [' + value.date + ']</li>');
                });
            });
        })
    </script>
{% endblock %}

<style>
    #divMessages {
        display: none;
    }
</style>