<?php

namespace app\quizz\model;

Class Question 
{
    private string $_text;
    private ReponseCollection $_reponses;

    public function __construct(string $text = 'No text selected')
    {
        $this->_text = $text;
        $this->_reponses = new ReponseCollection();
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
}