<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Question;


class QuestionController extends AbstractController
{
    /**
     * @Route ("/question/{id}", name="show_question")
     */
    public function showQuestion(Question $question)
    {
        return $this->render('base.html.twig',
            [
                'question' => $question,
                'answers' => $question->getAnswers()
            ]
        );
    }
}