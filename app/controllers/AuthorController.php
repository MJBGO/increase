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

    public function projectsAction($idAuthor){

        $builder = new \Phalcon\Mvc\Model\Query\Builder();



        $projects = $builder
            ->columns(array("projet.id,projet.nom,SUM(usecase.avancement*usecase.poids)/100 as pourcentage,projet.dateFinPrevue as fin,projet.dateLancement as debut"))
            ->from("usecase")
            ->join("projet", "projet.id=usecase.idProjet")
            ->where("usecase.idDev =". $idAuthor)
            ->groupBy(array('usecase.idProjet'))
            ->getQuery()
            ->execute();


        $author = User::findFirst($idAuthor);

        $timestatus = array();
        $avancementList = array();
        foreach ($projects as $project){
            $timestatus[$project->id] = (date("d-m-Y", time()) - date("d-m-Y",$project->debut))/(date("d-m-Y",$project->fin) - date("d-m-Y",$project->debut))*100;
            $avancementList[$project->id] = $project->pourcentage;
            $avancementList[$project->id] = $project->pourcentage;
        }


        if (!is_null($projects)){
            $this->view->setVar('projects', $projects);
            $this->view->setVar('author', $author);
            $this->view->setVar('avancement', $avancementList);
            $this->view->setVar('time',$timestatus);

        }


    }

}

