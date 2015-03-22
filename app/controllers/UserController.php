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

    public function projectsAction($idUser){

        $builder = new \Phalcon\Mvc\Model\Query\Builder();

        $projectList = Projet::find('idClient='.$idUser);
        $client = User::findFirst($idUser);

        $avancements = $builder
            ->columns(array('idProjet,SUM(avancement*poids)/100 as pourcentage'))
            ->from('Usecase')
            ->groupBy(array('idProjet'))
            ->getQuery()
            ->execute();

        $avancementList = array();
        foreach ($avancements as $avancement) {
            $avancementList[$avancement->idProjet] = $avancement->pourcentage;
        }


        if (!is_null($projectList)){
            $this->view->setVar('projects', $projectList);
            $this->view->setVar('client', $client);
            $this->view->setVar('avancement', $avancementList);

        }


    }
}

