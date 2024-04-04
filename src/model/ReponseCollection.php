<?php
namespace app\quizz\model;

class ReponseCollection implements \ArrayAccess, \Countable
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

    public function offsetGet($offset):Reponse
    {
        return $this->_values[$offset];
    }

    public function offsetSet($offset, $value):void
    {
        if (!($value instanceof Reponse)){
            throw new \InvalidArgumentException("Must be a  response");
        }

        if (empty($offset)) {
            $this->_values[] = $value;
        } else {
            $this->_values[$offset] = $value;
        }
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

    public function current():Reponse
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
}