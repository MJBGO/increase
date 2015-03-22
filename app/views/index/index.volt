<div class="page-header">
    <h2>Connexion</h2>
</div>

{{ form('login', 'id': 'loginForm', 'onbeforesubmit': 'return false') }}

<fieldset>
    <div class="control-group">
        {{ form.label('identite', ['class': 'control-label']) }}
        <div class="controls">
            {{ form.render('identite', ['class': 'form-control']) }}
            <p class="help-block">(required)</p>
            <div class="alert alert-warning" id="name_alert">
                <strong>Warning!</strong> Please enter your full name
            </div>
        </div>
    </div>

    <div class="control-group">
        {{ form.label('email', ['class': 'control-label']) }}
        <div class="controls">
            {{ form.render('email', ['class': 'form-control']) }}
            <p class="help-block">(required)</p>
            <div class="alert alert-warning" id="email_alert">
                <strong>Warning!</strong> Please enter your email
            </div>
        </div>
    </div>

    <div class="control-group">
        {{ form.label('password', ['class': 'control-label']) }}
        <div class="controls">
            {{ form.render('password', ['class': 'form-control']) }}
            <p class="help-block">(minimum 8 characters)</p>
            <div class="alert alert-warning" id="password_alert">
                <strong>Warning!</strong> Please provide a valid password
            </div>
        </div>
    </div>

    <div class="control-group">
        {{ form.label('password', ['class': 'control-label']) }}
        <div class="controls">
            {{ form.render('repeatPassword', ['class': 'form-control']) }}
            <div class="alert" id="repeatPassword_alert">
                <strong>Warning!</strong> The password does not match
            </div>
        </div>
    </div>
    <br>
    <div class="form-actions">
        {{ submit_button('Valider', 'class': 'btn btn-primary', 'onclick': 'return SignIn.validate();') }}
    </div>

</fieldset>

{{ end_form() }}
