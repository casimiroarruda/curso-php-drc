<?php
namespace DRC\ToDo\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Task
{
    public function listAll(Request $request, Application $app)
    {
        /**
         * @var \PDO $pdo
         */
        $pdo = $app['container']['pdo'];
        $list = $pdo->prepare(
            'SELECT id,title,description,status,creation_date as creationDate,last_modified as lastModified
               FROM task
              ORDER BY status DESC,creation_date ASC');
        $list->setFetchMode(\PDO::FETCH_CLASS, 'DRC\ToDo\Data\Task');
        $list->execute();
        $data = [
            'title' => 'DRC\ToDo :: listagem',
            'tasks' => $list->fetchAll()
        ];
        return $app['twig']->render('index.twig', $data);
    }

    public function newTask(Request $request, Application $app)
    {
        return $app['twig']->render('new.twig', ['title' => 'DRC\ToDo :: Nova Tarefa']);
    }

    public function insert(Request $request, Application $app)
    {
        /**
         * @var \PDO $pdo
         */
        $pdo = $app['container']['pdo'];
        $insert = $pdo->prepare(
            "INSERT INTO task
            (title,description,status,creation_date,last_modified) VALUES
            (:title,:description,:status,:creation_date,:last_modified)"
        );
        $now = date('Y-m-d H:i:s');
        $success = $insert->execute([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'status' => \DRC\ToDo\Data\Task::STATUS_ONGOING,
            'creation_date' => $now,
            'last_modified' => $now
        ]);
        if($success){
            return $app->redirect('/');
        }
        return '<a href="javascript:history.back()">Erro, tentar novamente</a>';
    }
}