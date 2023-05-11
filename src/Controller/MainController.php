<?php

namespace App\Controller;

use App\Entity\Serie;
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


        $serie = new Serie();
        $serie
            ->setBackdrop("backdrop.png")
            ->setDateCreated(new \dateTime())
            ->setGenres("Thriller/Drama")
            -> setName("Utopia")
            ->setFirstAirDate(new \DateTime("-2 year"))
            ->setLastAirDate(new \DateTime("-2 month"))
            ->setPopularity(500)
            ->setPoster("poster.png")
            ->setStatus("canceled")
            ->setTmdbId(123456)
            ->setVote(5)
            ->setDateModified(new \DateTime());

        dump($serie);

//        //sauvegarde de mon instance grace à entity manager
//        $entityManager ->persist($serie);
//        $entityManager ->flush();
//
//        dump($serie);
//
//        //si j'ai un ID j'update
//        $serie->setName("codequantum");
//        $entityManager ->persist($serie);
//        $entityManager ->flush();
//
//        dump($serie);
//
//
//        //je supprime
//        $entityManager->remove($serie);
//        $entityManager->flush();


        //en passant par le repository
        $serieRepository->save($serie, true);

        dump($serie);

        return $this->render('serie/add.html.twig');

    }

}
