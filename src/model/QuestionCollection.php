<?php
namespace app\quizz\model;

use ArrayObject;

class QuestionCollection extends ArrayObject implements \ArrayAccess, \Countable
{
    private $_values = [];
    private int $_position = 0;
    public function __construct()
    {
        $this->_values= [];
    }

    public function offsetExists($offset): bool
    {
        return isset($this->_values[$offset]);
    }

    public function offsetGet($offset): Question
    {
        return $this->_values[$offset];
    }

    public function offsetSet($offset, $value):void
    {
        if (!($value instanceof Question)){
            throw new \InvalidArgumentException("Must be a question");
        }

        parent::offsetSet($offset, $value);
    }

    public function offsetUnset($offset): void
    {
        unset($this->_values[$offset]);
    }

    public function count(): int
    {
        return count($this->_values);
    }

    public function rewind():void
    {
        $this->_position = 0;
    }

    public function key():int
    {
        return $this->_position;
    }

    public function current():Question
    {
        return $this->_values[$this->_position];
    }
    public function next():void
    {
        $this->_position++;
    }
    public function valid():bool
    {
        return isset($this->_values[$this->_position]);
    }
    public static function getQuestions(int $idQuizz):QuestionCollection
    {
        $liste = new QuestionCollection();
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM QUESTION where numQuizzId=:num;');
        $statement->execute(['num'=>$idQuizz]);
        while($row = $statement->fetch())
        {
            $liste[]=new Question(text:$row['texte'],id:$row['id']);
        }
        return $liste;
    }
}