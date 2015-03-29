<div>
    <div id='title'>
        <h2> Mes Projets : {{ client.getIdentite() }} </h2>
    </div>
    <br>
    <div id='projectsList'>

        {% if projects | length == 0 %}
            <div class="alert alert-warning" role="alert"> Aucun projet disponible </div>
        {% endif %}


        {% for project in projects %}
          <div class="row">
            <div class="col-md-2"> {{ project.getNom() }} </div>
            <div class="col-md-7">
                <div class="progress">
                  <div
                    {% if avancement[project.getId()] >= time[project.getId()] %}
                        class="progress-bar progress-bar-success"
                    {% elseif avancement[project.getId()] <= time[project.getId()] %}
                        class="progress-bar progress-bar-warning"
                    {% elseif date('d-m-y', project.getDatefinprevue()) - date('d-m-y', time()) <= 0 %}
                        class="progress-bar progress-bar-danger"
                    {% endif %}
                   role="progressbar" aria-valuenow="{{ avancement[project.getId()] }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 1em; width: {{ avancement[project.getId()]}}%">
                    {{ avancement[project.getId()] }} %
                  </div>
                </div>
            </div>
            <div class="col-md-2">
                {{ date('d-m-y', project.getDatefinprevue()) - date('d-m-y', time()) }} jour(s) restant(s)
            </div>
            <div class="col-md-1">
                <a href="{{ url("user/project/" ~ project.getId()) }}"><button type="button" class="btn btn-primary">Ouvrir</button></a>
            </div>
            <br>
          </div>

        {% endfor %}
    </div>
</div>



{% block stylesheets %}
    {{ stylesheet_link('css/project.css') }}
{% endblock %}