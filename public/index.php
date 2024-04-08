<?php
declare(strict_types=1);

use app\quizz\model\QuestionCollection;
use app\quizz\model\Quizz;
require_once dirname(__DIR__) .'/vendor/autoload.php';
$json = file_get_contents('quizz.json');
$json_data = json_decode($json);
$quizz = Quizz::create($json_data);

try {
    // $connexion = new PDO('mysql:host=mysql-server;dbname=quizzDB', 'db_user', 'password');
    // $statement=$connexion->prepare('select * from QUIZZ');
    // $statement->execute();
    // while ($row = $statement->fetch()){
    //     print_r($row);
    // }
    $liste = Quizz::list();
    // var_dump($liste);
} catch (PDOException $e) {
    echo "error:".$e->getMessage();
}
var_dump(QuestionCollection::getQuestions(1));


?>