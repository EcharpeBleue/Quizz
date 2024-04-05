<?php

namespace app\quizz\model;
Class Reponse
{
    private string $_text;
    private bool $_isValid;

    public function __construct(string $text, bool $pIsValid)
    {
        $this->_text = $text;
        $this->_isValid = $pIsValid;
    }

    public function getText():string
    {
        return $this->_text;
    }
    public function isValid():bool
    {
        return $this->_isValid;
    }
}