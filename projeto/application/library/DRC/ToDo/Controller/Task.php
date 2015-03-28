<?php
namespace DRC\ToDo\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller da aplicação
 * @package DRC\ToDo\Controller
 */
class Task
{
    /**
     * Exibe a listagem de tarefas
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
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

    /**
     * Exibe o formulário de criação
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function newTask(Request $request, Application $app)
    {
        return $app['twig']->render('new.twig', ['title' => 'DRC\ToDo :: Nova Tarefa']);
    }

    /**
     * Exibe o formulário de edição
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function saveTask(Request $request, Application $app)
    {
        $task = $this->getTask($request->get('id'),$app);
        return $app['twig']->render('save.twig', [
            'title' => 'DRC\ToDo :: Nova Tarefa',
            'task' => $task
        ]);
    }

    /**
     * Insere uma nova tarefa no BD
     * @param Request $request
     * @param Application $app
     * @return string|\Symfony\Component\HttpFoundation\RedirectResponse
     */
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

    /**
     * atualiza a tarefa
     * @param Request $request
     * @param Application $app
     * @return string|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function update(Request $request, Application $app)
    {
        $data = [
            'id' => $request->get('id'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'status' => $request->get('status')
        ];
        return $this->updateOnDb($data,$app);
    }

    /**
     * Atualiza uma tarefa no BD
     * usada por update e getTaskDone
     * @param $data
     * @param Application $app
     * @return string|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function updateOnDb($data, Application $app)
    {
        /**
         * @var \PDO $pdo
         */
        $pdo = $app['container']['pdo'];
        $update = $pdo->prepare(
            "UPDATE task
                SET title = :title,
                    description = :description,
                    status = :status,
                    last_modified = :last_modified
              WHERE id = :id"
        );
        $now = date('Y-m-d H:i:s');
        $task = $this->getTask($data['id'],$app);
        if($data['title']){
            $task->setTitle($data['title']);
        }
        if($data['description']){
            $task->setDescription($data['description']);
        }
        if(!is_null($data['status'])){
            $task->setStatus($data['status']);
        }
        $task->setLastModified($now);
        $success = $update->execute([
            'id' => $task->getId(),
            'title' => $task->getTitle(),
            'description' => $task->getDescription(),
            'status' => $task->getStatus(),
            'last_modified' => $task->getLastModified()
        ]);
        if($success){
            return $app->redirect('/');
        }
        return '<a href="javascript:history.back()">Erro, tentar novamente</a>';
    }

    /**
     * Salva uma tarefa como Feita
     * @param Request $request
     * @param Application $app
     * @return string|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function getTaskDone(Request $request, Application $app){
        $data = [
            'id' => $request->get('id'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'status' => \DRC\ToDo\Data\Task::STATUS_DONE
        ];
        return $this->updateOnDb($data,$app);
    }

    /**
     * Obtem um objeto task a partir de um id
     * @param int $id
     * @param Application $app
     * @return \DRC\ToDo\Data\Task | null
     */
    protected function getTask($id,Application $app)
    {
        /**
         * @var \PDO $pdo
         */
        $pdo = $app['container']['pdo'];
        $list = $pdo->prepare(
            'SELECT id,title,description,status,creation_date as creationDate,last_modified as lastModified
               FROM task
              WHERE id = :id');
        $list->setFetchMode(\PDO::FETCH_CLASS, 'DRC\ToDo\Data\Task');
        $list->execute(['id'=>$id]);
        return $list->fetch();
    }
}