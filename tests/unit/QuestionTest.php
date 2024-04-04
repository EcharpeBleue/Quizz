<?php
use PHPUnit\Framework\TestCase;
use app\quizz\model\Question;
use app\quizz\model\Reponse;
class QuestionTest extends TestCase
{
    public function test_1()
    {
        $question = new Question();
        $this->assertSame('No text selected', $question->getText());
    }
    public function test_2()
    {
        $question = new Question('Does this test works?');
        $this->assertSame('Does this test works?', $question->getText());
    }
    public function test_3()
    {
        $question = new Question('A quizz question');
        $question->addReponse(new Reponse('Is this question true?', true));
        $question->addReponse(new Reponse('Is this question false?', false));
        $this->assertSame('A quizz question', $question->getText());
        $this->assertSame(2, $question->getReponses()->count());
    }
}