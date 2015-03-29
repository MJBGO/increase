<div>
    <div id='title'>
        <h2> Mes Projets : {{ author.getIdentite() }} </h2>
    </div>
    <br>
    <div id='projectsList'>

        {% if projects | length == 0 %}
            <div class="alert alert-warning" role="alert"> Aucun projet disponible </div>
        {% endif %}


        {% for project in projects %}
          <div class="row">
            <div class="col-md-2"> {{ project.nom }} </div>
            <div class="col-md-7">
                <div class="progress">
                  <div
                    {% if avancement[project.id] >= time[project.id] %}
                        class="progress-bar progress-bar-success"
                    {% elseif avancement[project.id] <= time[project.id] %}
                        class="progress-bar progress-bar-warning"
                    {% elseif date('d-m-y', project.datefinprevue) - date('d-m-y', time()) <= 0 %}
                        class="progress-bar progress-bar-danger"
                    {% endif %}
                   role="progressbar" aria-valuenow="{{ avancement[project.id] }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 1em; width: {{ avancement[project.id]}}%">
                    {{ avancement[project.id] }} %
                  </div>
                </div>
            </div>
            <div class="col-md-2">
                {{ time[project.id] }} jour(s) restant(s)
            </div>
            <div class="col-md-1">
                <a href="{{ url("author/project/" ~ project.id ~ "/" ~ author.getId()) }}"><button type="button" class="btn btn-primary">Ouvrir</button></a>
            </div>
            <br>
          </div>

        {% endfor %}
    </div>
</div>



{% block stylesheets %}
    {{ stylesheet_link('css/project.css') }}
{% endblock %}