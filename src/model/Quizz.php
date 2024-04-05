<?php
namespace app\quizz\model;

class Quizz
{
    private string $_title;
    private QuestionCollection $_questions;

    public function __construct(string $title = 'No title chosen')
    {
        $this->_title = $title;
        $this->_questions = new QuestionCollection();
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
             foreach($questionJson->reponses as $reponseJson)
             {
                $reponse = new Reponse($reponseJson->text, $reponseJson->isValid);
                $question->addReponse($reponse);
             }
            $quizz->addQuestion($question);
        }
        return $quizz;
        }
    
}