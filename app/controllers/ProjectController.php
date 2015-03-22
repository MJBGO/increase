<?php

use \Phalcon\Mvc\Model\Query\Builder;

class ProjectController extends ControllerBase
{

    /**
     * Retourne la liste des développeurs du projet
     *
     * @param $idProject int Id du projet
     * @return \Phalcon\Http\ResponseInterface
     */
    public function equipeAction($projectId)
    {
        $builder = new Builder();

        // Construction d'une requête qui récupère tout en un seul accès BDD
        $usecases = $builder
            ->columns(array('idDev, identite as name, SUM(poids) as weight'))
            ->from('Usecase')
            ->join('User')
            ->where('idProjet = :id:', array('id' => $projectId))
            ->groupBy(array('idDev'))
            ->getQuery()
            ->execute();

        // Calcul du poids total du projet
        $totalWeight = 0;
        foreach ($usecases as $usecase) {
            $totalWeight += $usecase->weight;
        }

        // Retourne la liste des développeurs sur le projet
        $devList = array();
        foreach ($usecases as $usecase) {
            $devList[] = array(
                'id' => $usecase->idDev,
                'name' => $usecase->name,
                'weight' => ceil(($usecase->weight / $totalWeight) * 100)
            );
        }

        return $this->response->setJsonContent($devList);
    }

    /**
     * Retourne la liste des Usecases du projet
     *
     * @param $projectId int Id du projet
     * @param $authorId int Auteur du projet
     * @return \Phalcon\Http\ResponseInterface
     */
    function authorAction($projectId, $authorId)
    {
        $builder = new Builder();

        // Construction d'une requête qui récupère et calcule tous les usercases en un seul accès BDD
        $usecases = $builder
            ->columns(array('code, nom as name, poids as weight, COUNT(Tache.id) as nbTasks, (SUM(Tache.avancement) / COUNT(Tache.id)) as progress'))
            ->from('Usecase')
            ->leftJoin('Tache')
            ->where('idDev = :devId:', array('devId' => $authorId))
            ->andWhere('idProjet = :projetId:', array('projetId' => $projectId))
            ->groupBy(array('code'))
            ->getQuery()
            ->execute();

        $usecaseList = array();
        foreach ($usecases as $usecase) {
            $usecaseList[] = array(
                "code"     => $usecase->code,
                "name"     => $usecase->name,
                "weight"   => (int) $usecase->weight,
                "nbTasks"  => (int) $usecase->nbTasks,
                "progress" => ceil($usecase->progress),
                "url"      => $this->url->get("usecase/tasks/" . $usecase->code)
            );
        }

        return $this->response->setJsonContent($usecaseList);
    }

}

