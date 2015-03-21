<?php

class UserController extends ControllerBase
{

    public function projectAction($id)
    {

        $project = Projet::findFirst($id);
        $messages = $project->getAllMessages();

        if (!is_null($project)) {
            $this->view->setVar('project', $project);
            $this->view->setVar('nbMessages', count($messages));


            if (!is_null($project)) {
                $this->view->setVar('project', $project);


            } else {
                // show 404 error
            }
        }
    }

}

