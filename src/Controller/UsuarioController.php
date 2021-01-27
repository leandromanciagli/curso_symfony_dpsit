<?php

namespace App\Controller;

use App\Entity\Usuario;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/usuario")
 */
class UsuarioController extends AbstractController
{
    /**
     * @Route("/index", name="usuario_index")
     */
    public function index(): Response
    {
        $usuarios = $this->getDoctrine()->getRepository(Usuario::class)->findAll();
        return $this->render('usuario/index.html.twig', ['usuarios'=>$usuarios]);
    }

    /**
     * @Route("/filterByEmail", name="usuario_filter_by_email")
     */
    public function filterByEmail(): Response
    {
        $usuarios = $this->getDoctrine()->getRepository(Usuario::class)->tieneCuenta('@gmail.com');
        return $this->render('usuario/index.html.twig', ['usuarios'=>$usuarios]);
    }

    /**
     * @Route("/save", name="usuario_save")
     */
    public function save(Request $request): Response
    {
        $usuario = new Usuario(
            $request->get('nombre'),
            $request->get('apellido'),
            $request->get('email'),
            $request->get('password'),
        );
        $em = $this->getDoctrine()->getManager();
        $em->persist($usuario);
        $em->flush();
        return $this->redirectToRoute('usuario_index');
    }

}