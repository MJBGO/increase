<?php

class UserController extends ControllerBase
{

    public function projectAction($id)
    {
<<<<<<< HEAD
        $project = Projet::findFirst($id);
        $messages = $project->getAllMessages();

        if (!is_null($project)) {
            $this->view->setVar('project', $project);
            $this->view->setVar('nbMessages', count($messages));
=======
        $project = Projet::findFirst($idclient);
        $client = User::findFirst($id);


        if (!is_null($project)) {
            $this->view->setVar('project', $project);


>>>>>>> Commencement Partie 2
        } else {
            // show 404 error
        }
    }

}

