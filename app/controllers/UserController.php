<?php

class UserController extends ControllerBase
{

    public function projectAction($projectId)
    {
        $project = Projet::findFirst($projectId);
        $messages = $project->getAllMessages();

        if (!is_null($project)) {
            $this->view->setVar('project', $project);
            $this->view->setVar('messages', $messages);
        } else {
            // show 404 error
        }
    }

}

