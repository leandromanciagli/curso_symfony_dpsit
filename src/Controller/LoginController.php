<?php

namespace App\Controller;

use App\Entity\Usuario;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LoginController extends AbstractController
{
     /**
     * @Route("/login", name="login", methods={"GET"})
     */
    public function login(): Response
    {
        return $this->render('login.html.twig');
    }

    /**
     * @Route("/login_check", name="login_check", methods={"POST"})
     */
    public function login_check(Request $request): Response
    {   
        $email = $request->get('email');
        $password = $request->get('password');
        $usuario = $this->getDoctrine()->getRepository(Usuario::class)->findOneBy(['email' => $email, 'password' => $password]);
        if($usuario){
            $mensaje = "¡Bienvenido, ".$usuario->getNombre()." ".$usuario->getApellido()."!";
            $template = 'home.html.twig';
        }else{
            $mensaje = "Email o contraseña erróneos!";
            $template = 'login.html.twig';
        }
        return $this->render($template, ['mensaje' => $mensaje]);
    }
}