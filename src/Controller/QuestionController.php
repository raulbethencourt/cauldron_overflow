<?php

namespace App\Controller;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class QuestionController extends AbstractController
{
    /**
     * @Route("/",name="app_homepage")
     */
    public function homepage(Environment $twig): Response
    {
        /*
        fun example of using the Twig service directly!
        $html = $twigEnvironment->render('question/homepage.html.twig');
        return new Response($html);
        */

        return $this->render('question/homepage.html.twig');
    }

    /**
     * @Route("/questions/{slug}",name="app_question_show")
     * @param $slug
     * @return Response
     */
    public function show($slug, MarkdownParserInterface $parser): Response
    {
        $answers = [
            'Make sure your cat is sitting `purrfectly` still',
            '**Honestly**, I like furry shoes better than MY cat',
            'Maybe... try saying the spell _backwards_ ?'
        ];

        $questionText = "I've been turned into a cat, any _thoughts_ on how to turn back? While I'm **adorable**, I don't really care for cat food.";
        $parsedQuestionText = $parser->transformMarkdown($questionText);

        return $this->render('question/show.html.twig', [
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'questionText' => $parsedQuestionText,
            'answers' => $answers
        ]);
    }
}
