<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class LoginForm extends Form
{

    public function initialize($entity = null, $options = null)
    {

        // Name
        $name = new Text('identite');
        $name->setLabel('Prénom et nom');
        $name->setFilters(array('alpha'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Merci d\'entrer votre nom et prénom'
            ))
        ));
        $this->add($name);

        // Email
        $email = new Text('email');
        $email->setLabel('E-mail');
        $email->setFilters('email');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'E-mail obligatoire'
            )),
            new Email(array(
                'message' => 'E-mail non valide'
            ))
        ));
        $this->add($email);

        // Password
        $password = new Password('password');
        $password->setLabel('Mot de passe');
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Mot de passe obligatoire'
            ))
        ));
        $this->add($password);

        // Confirm Password
        $repeatPassword = new Password('repeatPassword');
        $repeatPassword->setLabel('Répéter le mot de passe');
        $repeatPassword->addValidators(array(
            new PresenceOf(array(
                'message' => 'Mot de passe de confirmation obligatoire'
            ))
        ));
        $this->add($repeatPassword);
    }
}