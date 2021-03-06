<?php

use \Phalcon\Mvc\Model\Query\Builder;

class UserController extends ControllerBase
{

    /**
     * Récupère les données du projet
     *
     * @param $projectId int Identifiant du projet
     */
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

        $this->jquery->jsonArray(".maskTeam", "project/equipe/" . $projectId);
        $this->jquery->compile($this->view);
    }

    /**
     * Récupère tous les projets du client
     *
     * @param $projectId int Identifiant du client
     */
    public function projectsAction($idUser)
    {
        $builder = new Builder();
        $projectList = Projet::find('idClient='.$idUser);
        $client = User::findFirst($idUser);
        $avancements = $builder
            ->columns(array('idProjet,SUM(avancement*poids)/100 as pourcentage'))
            ->from('Usecase')
            ->groupBy(array('idProjet'))
            ->getQuery()
            ->execute();

        $timestatus = array();
        foreach ($projectList as $project){
            $timestatus[$project->getId()] = (date("d-m-Y", time()) - date("d-m-Y",$project->getDatelancement()))/(date("d-m-Y",$project->getDatefinprevue()) - date("d-m-Y",$project->getDatelancement()))*100;
        }

        $avancementList = array();
        foreach ($avancements as $avancement) {
            $avancementList[$avancement->idProjet] = ceil($avancement->pourcentage);
        }

        if (!is_null($projectList)){
            $this->view->setVar('projects', $projectList);
            $this->view->setVar('client', $client);
            $this->view->setVar('avancement', $avancementList);
            $this->view->setVar('time', $timestatus);
        }
    }
}

