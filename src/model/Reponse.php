<?php

namespace app\quizz\model;
Class Reponse
{
    private string $_text;
    private bool $_isValid;
    private int $_id;

    public function __construct(string $text, bool $isValid, int $id)
    {
        $this->_text = $text;
        $this->_isValid = $isValid;
        $this->_id = $id;
    }

    public function getText():string
    {
        return $this->_text;
    }
    public function isValid():bool
    {
        return $this->_isValid;
    }
    public static function listById(int $id):?ReponseCollection
    {
        $liste = new ReponseCollection();
        $statement=Database::getInstance()->getConnexion()->prepare('select * from REPONSE where numQuestionId=:id;');
        $statement->execute(['id'=>$id]);
        while ($row = $statement->fetch()){
            $liste[] = new Reponse(text:$row['texte'],id:$row['id'], isValid:$row['isValid']);
        }
        return $liste;
    }
}