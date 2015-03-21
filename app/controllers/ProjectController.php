<?php

//use \Phalcon\Http\Response;

class ProjectController extends ControllerBase
{

    public function equipeAction($idProject)
    {
        $builder = new \Phalcon\Mvc\Model\Query\Builder();

        // Construction d'une requête qui récupère tout en un seul accès BDD
        $usecases = $builder
            ->columns(array('idDev, identite as name, SUM(poids) as weight'))
            ->from('Usecase')
            ->join('User')
            ->where('idProjet = :id:', array('id' => $idProject))
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
                'weight' => $usecase->weight / $totalWeight
            );
        }

        return $this->response->setJsonContent($devList);
    }

}
