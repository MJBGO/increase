<?php

use \Phalcon\Http\Response;

class ProjectController extends ControllerBase
{

    public function equipeAction($id)
    {
        $usecase = Usecase::find("idProjet = " . $id);

        $this->view->disable();

        $response = new Response();
        $response->setContent(json_encode($usecase));

        return $response;
    }

}

