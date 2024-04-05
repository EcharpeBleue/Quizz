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
    
    public function test_4()
    {
    $jsonObject = json_decode('{
        "title": "Quiz PHP Basique","questions": [
            {
              "text": "Que signifie PHP ?",
              "responses": [
                {"text": "Personal Home Page", "isValid": false},
                {"text": "PHP: Hypertext Preprocessor", "isValid": true},
                {"text": "Private Home Page", "isValid": false}
              ]
            },
            {
              "text": "Quelle fonction est utilisée pour insérer un élément à la fin d&quotun tableau en PHP ?",
              "responses": [
                {"text": "array_push()", "isValid": true},
                {"text": "array_pop()", "isValid": false},
                {"text": "array_insert()", "isValid": false},
                {"text": "array_unshift()", "isValid": false}
              ]
            }]
        }');
        $quizz = Quizz::create($jsonObject);
     
    $this->assertSame("Quiz PHP Basique", $quizz->getTitle());
    $this->assertSame("Que signifie PHP ?", $quizz->getQuestions()[0]->getText());
    $this->assertSame("Quelle fonction est utilisée pour insérer un élément à la fin d&quotun tableau en PHP ?",$quizz->getQuestions()[1]->getText(),'yolo trop couul');
        }
}