<div>
    <div id='title'>
        <h2> Mes Projets : {{ client.getIdentite() }} </h2>
    </div>
    <br>
    <div id='projectsList'>

        {% for project in projects %}
          <div class="row">
            <div class="col-md-2"> {{ project.getNom() }} </div>
            <div class="col-md-7">
                <div class="progress">
                  <div
                    {#
                    {% if (((date('d-m-y', project.getDatefinprevue()) - date('d-m-y', time())/date('d-m-y', project.getDatefinprevue()) - date('d-m-y', project.getDatelancement())*100) <= avancement[project.getId()]) %}
                        class="progress-bar progress-bar-success"
                    {% elseif (((date('d-m-y', project.getDatefinprevue()) - date('d-m-y', time())/date('d-m-y', project.getDatefinprevue()) - date('d-m-y', project.getDatelancement())*100) >= avancement[project.getId()]) %}
                        class="progress-bar progress-bar-warning"
                    {% else %}
                        class="progress-bar progress-bar-danger"
                    {% endif %}

                    #}

                  class="progress-bar progress-bar-success"
                  role="progressbar" aria-valuenow="{{ avancement[project.getId()] }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ avancement[project.getId()]}}%">
                    {{ avancement[project.getId()] }} %
                  </div>
                </div>
            </div>
            <div class="col-md-2">
                {{ date('d-m-y', project.getDatefinprevue()) - date('d-m-y', time()) }} jour(s) restant(s)
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-primary">Ouvrir</button>
            </div>
            <br>
          </div>

        {% endfor %}
    </div>
</div>



{% block stylesheets %}
    {{ stylesheet_link('css/project.css') }}
{% endblock %}