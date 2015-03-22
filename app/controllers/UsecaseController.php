<?php

class UsecaseController extends ControllerBase
{

    public function tasksAction($usecaseCode)
    {
        $tasks = Tache::find(array(
            "conditions" => "codeUseCase = ?1",
            "bind"       => array(1 => $usecaseCode)
        ));

        $tasksList = array();
        foreach($tasks as $task) {
            $tasksList[] = array(
                'name' => $task->getLibelle(),
                'date' => date('d/m/Y', $task->getDate()),
                'progress' => $task->getAvancement()
            );
        }

        return $this->response->setJsonContent($tasksList);
    }

}

