<?php

//use \Phalcon\Http\Response;

class ProjectController extends ControllerBase
{

    /**
     * Retourne la liste des développeurs du projet
     *
     * @param $idProject int Id du projet
     * @return \Phalcon\Http\ResponseInterface
     */
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

    /**
     * Retourne la liste des messages du projet
     *
     * @param $idProject int Id du projet
     */
    public function messagesAction($idProject)
    {
        $messages = Message::find(array('idProjet' => $idProject));

        $messagesList = array();
        foreach($messages as $message) {
            $messagesList[] = array(
                'object' => $message->getObjet(),
                'user' => $message->getUser()->getIdentite(),
                'message' => $message->getContent(),
                'date' => date('d/m/Y H:i:s', strtotime($message->getDate())),
                'idFil' => $message->getIdFil()
            );
        }

        return $this->response->setJsonContent($messagesList);
    }

}

