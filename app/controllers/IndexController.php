<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $form = new LoginForm;

        if ($this->request->isPost()) {
            /*$user = Users::findFirstByLogin($login);
            if ($user) {
                if ($this->security->checkHash($password, $user->password)) {
                    //The password is valid
                }
            }*/
        }

        $this->view->form = $form;
    }

}

