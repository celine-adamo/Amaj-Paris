<?php

namespace App\Controller;

use App\Entity\Iconics;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="home_page")
     */
    public function index(): Response
    {
        $iconics = $this->entityManager->getRepository(Iconics::class)->findAll();

//        dd($iconics);

        return $this->render('home_page/index.html.twig', [
            'iconics' => $iconics,
        ]);
    }
}
