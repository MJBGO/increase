<?php

class ErrorsController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Oops!');
        parent::initialize();
    }

    public function show404Action()
    {
        $url = $this->dispatcher->getControllerName()."/".$this->dispatcher->getPreviousActionName();
        $this->flash->error("Message d'erreur : La page demandée {$url} n'existe pas : Erreur 404");
    }

    public function show401Action()
    {
        $url = $this->dispatcher->getControllerName()."/".$this->dispatcher->getPreviousActionName();
        $this->flash->error("Message d'erreur : Vous n'êtes pas autorisé à accéder à cette page : Erreur 401");
    }

    public function show500Action()
    {
        $this->flash->error("Message d'erreur : Une erreur est survenue : Erreur 500");
    }
}
