<?php

namespace App\Controller;

use App\Entity\Producto;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/producto", name="producto")
 */
class ProductoController extends AbstractController
{
    /**
     * @Route("/index", name="producto_index")
     */
    public function index(): Response
    {
        $productos = $this->getDoctrine()->getRepository(Producto::class)->findAll();
        return $this->render('producto/index.html.twig', ['productos'=>$productos]);
    }

    /**
     * @Route("/economicos", name="producto_economico")
     */
    public function economicos(): Response
    {
        $productos = $this->getDoctrine()->getRepository(Producto::class)->masBaratoQue(50000);
        return $this->render('producto/index.html.twig', ['productos'=>$productos]);
    }

}