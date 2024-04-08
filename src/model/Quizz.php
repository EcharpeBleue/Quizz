<?php
namespace app\quizz\model;
use ArrayObject;

class Quizz
{
    private string $_title;
    private QuestionCollection $_questions;
    private int $_id;

    public function __construct(string $title = 'No title chosen', int $id=0)
    {
        $this->_title = $title;
        $this->_questions = new QuestionCollection();
        $this->_id=$id;
    }

    public function getTitle():string
    {
        return $this->_title;
    }

    public function getQuestions():QuestionCollection
    {
        return $this->_questions;
    }
    public function addQuestion(Question $question)
    {
        $this->_questions[]=$question;
    }
    public static function create($pJsonObject): Quizz
    {
        $quizz = new Quizz($pJsonObject->title);
        foreach ($pJsonObject->questions as $questionJson) {
            $question = new Question($questionJson->text);
             foreach($questionJson->responses as $reponseJson)
             {
                $reponse = new Reponse($reponseJson->text, $reponseJson->isValid, $reponseJson->id);
                $question->addReponse($reponse);
             }
            $quizz->addQuestion($question);
        }
        return $quizz;
        }
    public static function list():\ArrayObject
    {
        $liste = new \ArrayObject();
        $statement=Database::getInstance()->getConnexion()->prepare('select * from QUIZZ;');
        $statement->execute();
        while ($row = $statement->fetch()){
            $liste[] = new Quizz(id:$row['id'],title:$row['title']);
        }
        return $liste;
    }
    
    public static function findById(int $id):?Quizz
    {
        $statement=Database::getInstance()->getConnexion()->prepare('select * from QUIZZ where id=:id;');
        $statement->execute(['id'=>$id]);
        if ($row = $statement->fetch())
        return new Quizz(id:$row['id'],title:$row['title']);
    return null;
    }

    public static function filter(string $texte):?\ArrayObject
    {
        $statement=Database::getInstance()->getConnexion()->prepare('select * from QUIZZ where title like :textSearched;');
        $statement->execute(['textSearched'=>'%'.$texte.'%']);
        if ($row = $statement->fetch())
        return new Quizz(id:$row['id'],title:$row['title']);
    return null;
    }
}