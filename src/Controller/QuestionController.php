<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Question;


class QuestionController extends AbstractController
{
    /**
     * @Route ("/question/{position}",defaults={"position"=1}, name="show_question")
     */
    public function showQuestion(Question $question, SerializerInterface $serializer)
    {

        $data = [];
        $data[]= $question;
        $data[]= $question->getAnswers();
      //  dd($data);

        $jsonData = $serializer->serialize($data,'json');
        return new Response($jsonData, 200,['Content-Type'=> 'application/json']);


    }
}

