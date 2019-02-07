<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Usager;
class HomePageController extends AbstractController
{
    /**
     * @Route("/home_page", name="home_page")
     */
    public function index()
    {
        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }

    /**
    * @Route("/usager/{nom}", name="usager")
    */
    public function usager($nom)
    {
      $usager = $this->getDoctrine()
                     ->getRepository(Usager::class)
                     ->findOneByNom($nom);
      if (!$usager)
        throw $this->createNotFoundException('Usager inconnu');
      return $this->render('home_page/usager.html.twig', ['usager' => $usager,]);
    }
}
