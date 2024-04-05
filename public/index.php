<?php
declare(strict_types=1);
use app\quizz\model\Quizz;
require_once dirname(__DIR__) .'/vendor/autoload.php';
$json = file_get_contents('quizz.json');
$json_data = json_decode($json);
$quizz = Quizz::create($json_data);

 ?>