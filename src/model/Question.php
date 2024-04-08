<?php

namespace app\quizz\model;

Class Question 
{
    private string $_text;
    private ReponseCollection $_reponses;
    private int $_id;
    private string $_texte;

    public function __construct(string $text = 'No text selected', int $id=0, string $texte="")
    {
        $this->_text = $text;
        $this->_reponses = new ReponseCollection();
        $this->_id = $id;
        $this->_texte = $texte;
    }

    public function getText():string
    {
        return $this->_text;
    }
    public function getReponses():ReponseCollection
    {
        return $this->_reponses;
    }
    public function addReponse(Reponse $reponse)
    {
        $this->_reponses[]=$reponse;
    }
    public static function listById(int $id):?QuestionCollection
    {
        $liste = new QuestionCollection();
        $statement=Database::getInstance()->getConnexion()->prepare('select * from QUESTION where numQuizzId=:id;');
        $statement->execute(['id'=>$id]);
        while ($row = $statement->fetch()){
            $liste[] = new Question(id:$row['id'],texte:$row['texte']);
        }
        return $liste;
    }
}