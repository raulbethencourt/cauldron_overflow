<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/",name="app_homepage")
     */
    public function homepage()
    {
        dump($this);

        return $this->render('question/homepage.html.twig');
    }

    /**
     * @Route("/questions/{slug}",name="app_question_show")
     */
    public function show($slug)
    {
        $answers = [
            'Make sure your cat is sitting purrfectly still',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwrds ?'
        ];

        dump($this);

        return $this->render('question/show.html.twig', [
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'answers' => $answers
        ]);
    }
}
