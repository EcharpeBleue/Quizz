<?php
use PHPUnit\Framework\TestCase;
use app\quizz\model\Reponse;

class ReponseTest extends TestCase
{
    public function test_1()
    {
        $reponse = new Reponse('Une réponse positive', true);
        $this->assertTrue($reponse->isValid());
    }

    public function test_2()
    {
        $reponse = new Reponse('Une réponse négative', false);
        $this->assertFalse($reponse->isValid());
    }
}