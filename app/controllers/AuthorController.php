<?php

class AuthorController extends ControllerBase
{

    public function projectAction($projectId, $authorId)
    {
        $project = Projet::findFirst($projectId);
        $messages = $project->getAllMessages();

        if (!is_null($project)) {
            $this->view->setVar('project', $project);
            $this->view->setVar('messages', $messages);
            $this->view->setVar('authorId', $authorId);
        } else {
            // show 404 error
        }

        $this->jquery->jsonArray(".maskUsecase", "project/author/" . $projectId . "/" . $authorId);
        $this->jquery->compile($this->view);
    }

}

