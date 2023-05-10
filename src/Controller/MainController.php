<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main_home')]
    /**
     * @route("/home", name="main_home2")
     */
    public function home()
    {
       return $this->render('main/home.html.twig',);
    }



    #[Route('/test', name: 'main_test')]

    public function test(): Response
    {
        $username = "Max";
        $serie = ["title" => "The Witcher", "year" => 2019];
        return $this->render('main/test.html.twig',[
        "serie" => $serie,
        "nameOfUser" => $username
            ]);
    }

}
