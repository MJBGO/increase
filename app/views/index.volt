<!DOCTYPE html>
<html>
<head>
    <title>Increase</title>
    {{ stylesheet_link("css/bootstrap.min.css") }}
    {{ stylesheet_link("css/styles.css") }}
    {{ stylesheet_link('css/project.css') }}
    {{ stylesheet_link('css/author.css') }}

    {{ javascript_include('js/jquery.min.js') }}
    {{ javascript_include('js/bootstrap.min.js') }}
    {{ javascript_include('js/utils.js') }}
    {{ javascript_include('js/project.js') }}
    {{ javascript_include('js/author.js') }}
</head>
<body>
<div class="bs-docs-header">
    <div class="container">
        <div class="header">
            <h1>Increase</h1>
            <p>Manage the progress of your projects, improve communication with customers.</p>
        </div>
    </div>
</div>
<div class="second-header"></div>
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home</a></li>
    </ol>
</div>
<div class="container">
    {{ content() }}
</div>

</body>
</html>