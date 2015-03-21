<?php

class UserController extends ControllerBase
{

    public function projectAction($id)
    {
        $project = Projet::findFirst($id);

        $this->view->setVar('project', $project);
    }

}

