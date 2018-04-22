<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SeminarController extends Controller
{
    /**
     * @Route("/seminar", name="seminar")
     */
    public function index()
    {
        return $this->render('seminar/index.html.twig', [
            'controller_name' => 'SeminarController',
        ]);
    }
}
