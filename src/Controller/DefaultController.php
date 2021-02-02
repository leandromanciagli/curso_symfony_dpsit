<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig', ['nombre'=>'Leandro']);
    }

    /**
     * @Route("/nombres", name="nombres")
     */
    public function nombres(): Response
    {
        $nombres = ['Raúl', 'Camila', 'Yohana', 'Diego', 'Gabriel', 'Carlos', 'Belén'];
        return $this->render('default/nombres.html.twig', ['nombres'=>$nombres]);
    }
}