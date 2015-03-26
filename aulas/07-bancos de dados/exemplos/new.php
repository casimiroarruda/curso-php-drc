<?php
$dsn = "mysql:host=localhost;dbname=report";
$username = 'web_user';
$password = 'xurumelas';
try{
    $pdo = new PDO($dsn,$username, $password);
} catch (PDOException $e){
    echo $e->getMessage();
}
//$statement = $pdo->query("SELECT id,payment_type,amount FROM line");
/*$statement = $pdo->prepare("SELECT id,payment_type,amount FROM line WHERE payment_type = ?");
$statement->execute(['Diners']);
$statement->setFetchMode(PDO::FETCH_OBJ);
foreach($statement as $each){
    print_r($each);
}
*/
$user = "' OR 1;/*";
$pdo->beginTransaction();
try {


    $statement = $pdo->prepare("SELECT * FROM users WHERE login = :login AND password = :pw");
    if (!$statement->execute(['login' => $user, 'pw' => ''])) {
        echo "deu erro";
    }
    var_dump($statement->fetch());
}catch (PDOException $pdoe){
    error_log($pdoe->getMessage());
    $pdo->rollBack();
}
$pdo->commit();
//var_dump($pdo);