<?php
namespace DRC\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class User
{
    protected $pdo;
    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=report','web_user','xurumelas');
    }
    public function get(Request $request, Application $app)
    {
        $id = (int) $request->get('id');
        if(!$id){
            return null;
        }
        return $app->json($this->findOne($id));
    }

    public function findAll(Request $request, Application $app)
    {
        $statement = $this->pdo->prepare("SELECT id,login,password,name FROM users");
        $statement->setFetchMode(\PDO::FETCH_CLASS,'DRC\Data\User');
        $statement->execute();
        $collection = [];
        foreach($statement as $user){
            $collection[] = $user;
        }
        return $app->json($collection);
    }

    protected function findOne($id){
        $statement = $this->pdo->prepare("SELECT id,login,password,name FROM users WHERE id = :id");
        $statement->setFetchMode(\PDO::FETCH_CLASS,'DRC\Data\User');
        $statement->execute(['id'=>$id]);
        $obj = $statement->fetch();
        return $obj;
    }
    public function put(Request $request, Application $app)
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO users (login,password,name) VALUES (:login,:password,:name)");
        return $statement->execute(
            [
                'login'=>$request->get('login'),
                'password'=>$request->get('password'),
                'name'=>$request->get('name')
            ]);
    }
    public function post(Request $request, Application $app)
    {
        $statement = $this->pdo->prepare(
            "UPDATE users
                SET login = :login,
                    password = :password,
                    name = :name
              WHERE id = :id");
        return $statement->execute(
            [
                'login'=>$request->get('login'),
                'password'=>$request->get('password'),
                'name'=>$request->get('name'),
                'id'=> (int) $request->get('id')
            ]);
    }
    public function delete(Request $request, Application $app)
    {
        $statement = $this->pdo->prepare(
            "DELETE FROM users WHERE id = :id");
        return $statement->execute(
            [
                'id'=> (int) $request->get('id')
            ]);
    }
}