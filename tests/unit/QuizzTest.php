<?php
use PHPUnit\Framework\TestCase;
use app\quizz\model\Quizz;
use app\quizz\model\Question;
class QuizzTest extends TestCase
{
    public function test_1()
    {
        $quizz = new Quizz();
        $this->assertSame('No title chosen', $quizz->getTitle());
    }
    public function test_2()
    {
        $quizz = new Quizz('Quizz about PHP');
        $this->assertSame('Quizz about PHP', $quizz->getTitle());
    }
    public function test_3()
    {
        $quizz = new Quizz('Quizz about PHP');
        $quizz->addQuestion(new Question('what is a constructor?'));
        $quizz->addQuestion(new Question('what is an attribute?'));
        $this->assertSame('Quizz about PHP', $quizz->getTitle());
        $this->assertSame(2, $quizz->getQuestions()->count());
    }
}