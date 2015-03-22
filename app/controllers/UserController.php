<?php

class UserController extends ControllerBase
{

    public function projectAction($id)
    {
        $project = Projet::findFirst($id);
        $messages = $project->getAllMessages();

        if (!is_null($project)) {
            $this->view->setVar('project', $project);
            $this->view->setVar('messages', $messages);
        } else {
            // show 404 error
        }
    }

}

