<?php

class UserController extends ControllerBase
{

    public function projectAction($id)
    {
        $project = Projet::findFirst($id);

        if (!is_null($project)) {
            $this->view->setVar('project', $project);
        } else {
            // show 404 error
        }
    }

}

